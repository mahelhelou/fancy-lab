# Declare WooCommerce Support

## Search Keywords

- Add WooCommerce support
- Init WooCommerce support
- Check if theme supports WooCommerce

- In WordPress, adding `WooCommerce` plugin doesn't mean that your theme is compatible with `WooCommerce`.
- Adding support of `WooCommerce` to your theme will allow you to write reviews about the products instead of regular wordpress comments (in the case of not declaring `WooCommerce` support)

## To Check if the Theme Supports WooCommerce

- Go to `WooCommerce -> Status`
- Search for `WooCommerce support:` keyword
- You should see true tick if the theme supports `WooCommerce`

## How to Add WooCommerce Support in WordPress

- In `functions.php` file, add this code

```php
add_theme_support( 'woocommerce' ); // Add WooCommerce support to the WP theme
```

- To specify the look of the products in the theme in terms of size & numbers:
  - Control product image size
  - Control number of products in `Shop` page
    - You can see this from: `Appearance -> Customize -> WooCommerce -> Product catalog`

```php
add_theme_support( 'woocommerce', array(
	'thumbnail_image_width' => 255,
	'single_image_width'	=> 255,
	'product_grid' 			=> array(
    'default_rows'    => 10,
    'min_rows'        => 5,
    'max_rows'        => 10,
    'default_columns' => 1,
    'min_columns'     => 1, // by default is 4
    'max_columns'     => 1,
    )
) );
```

- Change the look and feel of product images

```php
add_theme_support( 'wc-product-gallery-zoom' ); // Zoom on hover
add_theme_support( 'wc-product-gallery-lightbox' ); // Open in light box
add_theme_support( 'wc-product-gallery-slider' ); // Show product gallery
```
