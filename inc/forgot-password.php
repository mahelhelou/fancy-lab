<?php
function frgpassword(){
  global $wpdb,$wp_hasher;

  $methode = $_GET;
  if(empty($methode['username'])){
      $response = [ 'error' => true, 'code' => 400, "message" => "Enter username or Register email" ];
  } else {
      $custom_users_table = CUSTOM_USER_TABLE;
      $sql = $wpdb->prepare( "SELECT * FROM `{$custom_users_table}` WHERE `user_login` = %s OR `user_email` = %s;", array( $methode['username'], $methode['username'] ) );
      $userdata = $wpdb->get_results($sql);
      if(empty($userdata)){
         $response = [ 'error' => true, 'code' => 404, "message" => "User Not Found {$methode['username']}" ];
      } else {
          $user = $userdata['0'];

          $allow = apply_filters( 'allow_password_reset', (is_multisite() && is_user_spammy( $user )) ? false : true, $user->ID );
          if ( ! $allow ) {
              $response = [ 'error' => true, 'code' => 403, "message" => "Password reset is not allowed for this user" ];
          } else {
             $key = wp_generate_password( 20, false );
             do_action( 'retrieve_password_key', $user->user_login, $key );
             if ( empty( $wp_hasher ) ) {
                  require_once ABSPATH . WPINC . '/class-phpass.php';
                  $wp_hasher = new PasswordHash( 8, true );
             }
             // update new password into database
             $wpdb->query($wpdb->prepare("UPDATE {$custom_users_table} SET user_activation_key= %s WHERE ID = %s"), array((time() . ':' . $wp_hasher->HashPassword( $key )), $user->ID));
             $link = home_url("wp-login.php?action=rp&key={$key}&login={$user->user_login}&wp_lang=en_US");

             $message = "Someone has requested a password reset for the following account: \n Site Name: ".get_bloginfo()." From Mobile App \n \n Username: {$user->user_login} \n If this was a mistake, ignore this email and nothing will happen. \n To reset your password, visit the following address: \n {$link} \n This password reset request originated from the IP address ".ns_wp_user_ip();
             $headers = array('From: '.get_bloginfo()." Mobile App ".' <accounts@'.$_SERVER['SERVER_NAME'].'>');

             wp_mail($user->user_email,"[".get_bloginfo()."] Password Reset",$message,$headers);
             $response = [ 'error' => false, 'code' => 200, "message" => "Password reset link has been sent to your registered email" ];
          }
      }
  }
  return new WP_REST_Response($response, $response['code']);
}

register_rest_route('neoistone/v2', '/frgpassword', array(
  'methode' => "GET",
  'callback' => "frgpassword",
  "permission_callback" => "frgpassword"
));