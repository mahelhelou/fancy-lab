# Submit Theme to WordPress

```php
// To submit theme to wordpress.org, you can't create a theme that's totally depending on another plugin
// require get_theme_file_path( 'inc/wc_modifications.php' );
/* if ( class_exists( 'WooCommerce' ) ) {
	require get_theme_file_path( 'inc/wc_modifications.php' );
} */
```
