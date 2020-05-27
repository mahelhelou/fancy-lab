# Documentation

## Plugins

- `Show current template` By `JOTAKI Taisuke`
- `Simply Show Hooks` By `Stuart O'Brien, cxThemes`

## List of function used in this theme

- Attribute functions
  - `body_class();`
  - `language_attributes();`
  - `bloginfo( 'charset' );`
- Files division functions
  - `wp_head();`
  - `wp_footer();`
  - `get_header();`
  - `get_footer();`
- `functions.php` functions
  - `wp_enqueue_style`
  - `wp_enqueue_script`
    - `microtime();`
  - `register_nav_menus( $array );`
  - `add_theme_support`
    - `woocommerce`
      - `thumbnail_image_width`
      - `single_image_width`
      - `product_grid`
        - `default_rows`
        - `min_rows`
        - `max_rows`
        - `default_columns`
        - `min_columns`
        - `max_columns`
    - `wc-product-gallery-zoom`
    - `wc-product-gallery-slider`
    - `wc-product-gallery-lightbox`
    - `custom-logo`
      - `height`
      - `width`
      - `flex_height`
      - `flex_width`
  -
- Hooks
  - `wp_enqueue_scripts`
  - `after_setup_theme`

## Database

- Pages
  - Home
    - Page attributes: Template => Template Home
  - About
  - Blog
  - Contact
- Posts
  - Post 1 (cat: blog, lorem: 60)
  - Post 2 (cat: blog, lorem: 60)
  - Post 3 (cat: blog, lorem: 60)
- Menus
  - MainMenu
    - [Home, About, Blog, Contact]
  - FooterMenu
    - [Home, About, Blog, Contact]

## Building features

1. Enqueue scripts
2. Add theme support/features

## Keep in your mind

- Adding `WooCommerce` plugin doesn't mean that your theme is compatible with `WooCommerce`
- Adding support of `woocommerce` to your theme will allow you to write reviews about the prodoct instead of regular wordpress comments (in the case of not declaring woocommerce support)

## Declaring woocommerce support

- Your new custom theme doesn't support full features of woocommerce yet

  - Go to `WooCommerce -> Status -> WooCommerce support: Not declared` Not decalred means your theme isn't support woocommerce yet

- in `functions.php` file, write this code

```php
add_theme_support( 'woocommerce' );
// woocommerce stauts not is: woocommerce support (true sign)
```

- To specify the look of the products in the theme
  - Control product image size
  - Control number of products in `Shop` page
    - You can see this from: `Appearance -> Customize -> WooCommerce -> Product catalog`

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

- Specify the look and feel of product images

```php
// Adding look and feel for product images
add_theme_support( 'wc-product-gallery-zoom' ); // zoom on hover
add_theme_support( 'wc-product-gallery-lightbox' ); // open in lightbox
add_theme_support( 'wc-product-gallery-slider' ); // show product gallery
```

## Modifying woocommerce pages

- Never touch plugin's files directly
- Never delete any hook, because it may be used from other plugins
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

## Modifying `archive-product.php`

- Use overriding method by creating `woocommerce/archive-products.php` and manipulate the file (documented there)
- Use `functions.php` file to edit, update or create actions and filters (documented there)

## Modifying `single-product.php` file

- Use conditional tags (ifs) to echo content's width
- Edit page layout using CSS

## Modifying Cart page

- Edit the `page.php` file to reflect the changes on all pages
  - Increase the content width using `.col` class
- Edit page look using CSS

## Modifying Checkout page

- You can copy the content of the file and modify the look in `woocommerce/checkout.php` file (but this takes a while and changes disappear on plugin update)
- Modify the grid system used by woocommerce
  - Use the same rules (css props) used by Bootstrap
- Edit CSS

## Modifying Account page

- Enable payment settings
  - `WooCommerce -> Settings -> Payment -> Enable bank payment`

## Modifying Menu

- Include `class-wp-bootstrap-navwalker.php`
- Edit CSS

## Modifying Search form

- Include `seachform.php`
  - Control the logic in that file
- Edit CSS

## Modifying Shopping cart

- Edit HTML
- Update cart items using AJAX
  - Edit `x` WooCommerce function in `functions.php`
- Edit CSS

## Adding custom logo

- Create the feature in `functions.php` file
- Upload the logo using theme customize
- Write logic in HTML
- Edit CSS

## Import CSV Data

- [Topic link](https://docs.woocommerce.com/document/product-csv-importer-exporter/)
- [Products CSV](https://github.com/woocommerce/woocommerce/tree/master/sample-data)
- In WordPress dashboard, go to `Tools -> import -> Run importer`
- Choose the CSV file and press continue
- Click `Run importer`
