# Submit Theme to WordPress

```php
// To submit theme to wordpress.org, you can't create a theme that's totally depending on another plugin
// require get_theme_file_path( 'inc/wc-modifications.php' );
/* if ( class_exists( 'WooCommerce' ) ) {
	require get_theme_file_path( 'inc/wc-modifications.php' );
} */
```

Because we want to distribute theme, we can't depend on third party plugins, as well as `Custom Post Types` and `Shortcodes`! So, we'll create dynamic slider with `Theme Customizer`.
