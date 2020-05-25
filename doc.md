# Documentation

## Keep in your mind

- Adding `WooCommerce` plugin doesn't mean that your theme is compatible with `WooCommerce`
- Adding support of `woocommerce` to your theme will allow you to write reviews about the prodoct instead of regular wordpress comments (in the case of not declaring woocommerce support)

## Declaring woocommerce support

- Your new custom doesn't support full features of woocommerce yet

  - Go to `WooCommerce -> Status -> WooCommerce support: Not declared` Not decalred means your theme isn't support woocommerce yet

- in `functions.php` file, write this code

```php
add_theme_support( 'woocommerce' );
// woocommerce stauts not is: woocommerce support (true sign)
```

- To declare the look of the products in the theme

```php
// Supporting woocommerce
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

- Control the look and feel of product images

```php
// Adding look and feel for product images
add_theme_support( 'wc-product-gallery-zoom' ); // Hover zoom
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

// Set maximum width of images or products
if ( ! isset( $content_width ) ) {
  $content_width = 600;
}
```

## Modifying woocommerce pages

- Never touch plugin's files directly
- There're two ways to modify template files in woocommerce
  - Template overrides
    - Quite easy to use
    - Requires patiance, try and errors (For this custom woocommerce theme costs more than simple theme)
    - Well documented in the plugin itself to modify
    - Works only if your theme declared woocommerce support
    - Keeps original template files un-touched
    - Once understood, it's very easy to make any customization
      - Please pay attention that woocommerce core plugin may apply some changes in later versions. To keep what's been change, go to `WooCommerce -> Status` and see what's changed?
  - Actions & Filters hooks
    - Plugin to help: `Simply show hooks By Stuart O'Brien, cxThemes`
    - Recommended by `WooCommerce` documentation
    - Few or no changes needed for template files
    - More complicated (cons)



## Plugins

- `Show current template` By `JOTAKI Taisuke`

## Import CSV Data

- [Topic link](https://docs.woocommerce.com/document/product-csv-importer-exporter/)
- [Products CSV](https://github.com/woocommerce/woocommerce/tree/master/sample-data)
- In WordPress dashboard, go to `Tools -> import -> Run importer`
- Choose the CSV file and press continue
- Click `Run importer`
