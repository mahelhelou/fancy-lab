# Edit WooCommerce Templates

## Search Keywords

- How to edit WooCommerce templates?
- Customize WooCommerce template files

- There're two ways to customize `WooCommerce` template files:
  1. By overriding template files
  2. By using hooks (Actions & filters)

## Method 1: Overriding WooCommerce Files

> This method is well-documented in the original file template!

- Copy file from `WooCommerce` plugin
- Paste it in the root theme folder, in `WooCommerce` sub directory
- Customize the template using HTML or add more PHP hooks

> **Demo:** See `/woocommerce/archive-products.php` file.

## Drawbacks of This Method

- This method requires try and error, many times
- WooCommerce changes from time to time, so you will track the changes made on their files, especially `hooks`, then update your code.
- You can track the changes by going to `WooCommerce -> status`, and you will see all the files overridden.
- Fortunately, the changes to temp files are rare!

## Method 1 Example: Modify `archive-product.php` File (Shop Page)

### My Modifications

1. Wrap all hooks inside `<div class="container"><div class="row">`
2. Create 2 columns, 1 for sidebar, and another for the main content

**Note:** `PHP` original comments has been removed from this file.

```php
<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
// 1. Wrap the document with `container` and `row`
<div class="container">
  <div class="row">
    // 2. Create a column for the main content
    <div class="col-lg-9 col-md-8 order-1 order-md-2">
    <?php
      do_action( 'woocommerce_before_main_content' );?>

        <header class="woocommerce-products-header">
          <?php
            if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
              <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
            <?php endif; ?>

          <?php
            do_action( 'woocommerce_archive_description' ); ?>
        </header>
    <?php
      if ( woocommerce_product_loop() ) {
        do_action( 'woocommerce_before_shop_loop' );
        woocommerce_product_loop_start();

      if ( wc_get_loop_prop( 'total' ) ) {
        while ( have_posts() ) {
          the_post();

          do_action( 'woocommerce_shop_loop' );
          wc_get_template_part( 'content', 'product' );
        }
      }

        woocommerce_product_loop_end();
        do_action( 'woocommerce_after_shop_loop' );
      } else {
        do_action( 'woocommerce_no_products_found' );
      }

      do_action( 'woocommerce_after_main_content' ); ?>
    </div>
    // 3. Create a column for the sidebar
    <div class="col-lg-3 col-md-4 order-2 order-md-1">
      <?php
  		  do_action( 'woocommerce_sidebar' ); ?>
    </div>
  </div>
</div>

<?php get_footer( 'shop' );
```

## Method 2: Use `WooCommerce` Actions and Filters Hooks

- It's recommended by `WooCommerce` community.
- You will apply very few changes to the template files.
- No need to copy the original `WooCommerce` file, that means, you don't need to apply any change in the original file / template.
- It's more complicated, and takes time to understand the process.
- 