# Documentation Reference

1. Init pages in WooCommerce
2. Import products
3. Declare WooCommerce support
4. Edit WooCommerce Templates

## Plugins

## List of Function Used in This Theme

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
    - `add_image_size();`
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
  - WooCommerce pages
    - Cart
    - Checkout
    - My account
    - Shop
  - Slider pages
    - Up to 50% OFF This Week!
    - Trendy Fashion Hats - 30% OFF
    - Winter Warm-up Sale
- Posts
  - Post 1 - 10 (Cat: Blog, Lorem: 60 words)
- Menus
  - MainMenu
    - [Home, About, Blog, Contact]
  - FooterMenu
    - [Home, About, Blog, Contact]
  - WidgetMenu
    - My account, Shop, Cart, Checkout

## Building features

1. Enqueue scripts
2. Add theme support/features

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

## Adding Slider to homepage

- Enqueue slider files
- Add HTML
- Add image size function to `functions.php`
- Create slider pages
- Prepare fields in `customizer.php` file
- Looping slider's slides and render in HTML
- Edit CSS

## Add product list

- The usage of `woocommerce shortcode` is good and save time
- The only problem is with layout and design, but you can edit CSS to solve this problem
- `Popular products`
  - Use shortcode from woocommerce
- `New Arrivals`
  - Use shortcode from woocommerce
- Use theme customizer to control
  - Number of products to show
  - Number of columns to show

## Add Deal of The Week

- Write HTML
- Add the feature in customizer
  - The user can enable/disable this feature/section

## Add blog posts in the `template-home.php`

- Override default loop and write custom loop
  - This is because we're writing a loop for posts in a page
- Add support for `post-thumbnails`
- Render the loop in HTML

## Add blog posts in `index.php`

- Render the post's content, image, meta..
- Add pagination
  - Use `Readings -> Posts per page`
  - Use function to render pagination

## Add single post

- Add image, content, meta
- Add link to pages to part of the content
- Add comment template

## Add 404 error page

- Say sorry for nothing to show
- Include a widget of latest blog posts

## Add sidebars

- Write the code in `functions.php`
- Make `sidebar.php` file and write the structure
- Include `get_sidebar();` anywhere in the file
- From admin area, drag widgets to the required sidebar

## Add translation to the theme

- You job is to make theme ready for translation, not to translate it!
- Add support in `functions.php`
- Start make translation ready in HTML pages
  - `__('some content');` used for something won't appear in HTML
  - `_e('some content');` used for any content will render in HTML
- Use POEdit software
  - Download these [files](https://github.com/fxbenard/Blank-WordPress-Pot)
    - Rename `WordPress-Blank.pot` to `$your-text-domain.pot` and copy the file to `/languages/` directory
    - Open file in POEdit
    - Go to `Catalog -> Properties -> Rename the file and version`
    - Click `Update from code` button
    - Save the file
    - Reload theme
    - In case of problem, go to `File -> Compile to MO`
  - Start translation
    - `File -> New from POT/PO file`
    - Select language of translation
    - Click save button

## Add Security to theme

- `$title = '<script>alert('You have just hacked')</script>`
  - if `echo $title;` -> script will be excuted as an alert
  - if `echo esc_html( $title );` -> script wont excuted and it will render as a normal title (like <h1>)
- `esc_html`
- `esc_html_e`
- `esc_html__`
- `esc_url`
- `esc_attr`
- `esc_attr_e`
