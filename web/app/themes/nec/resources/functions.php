<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'nec');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'nec'), __('Invalid PHP version', 'nec'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'nec'), __('Invalid WordPress version', 'nec'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'nec'),
            __('Autoloader not found.', 'nec')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'nec'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__).'/config/assets.php',
            'theme' => require dirname(__DIR__).'/config/theme.php',
            'view' => require dirname(__DIR__).'/config/view.php',
        ]);
    }, true);

/**
 * @param $classes
 * @param $item
 * @param $args
 *
 * @return array
 */
add_filter('nav_menu_css_class', 'add_menu_bem_classes', 1, 3);
function add_menu_bem_classes($classes, $item, $args) {
    $submenu = $classes;
    if($args->theme_location == 'header_menu') {
        $classes = [];
        $classes[] = 'header__menu__item';
        if (in_array('menu-item-has-children', $submenu)) {
            $classes[] = 'header__menu__item--submenu';
        }
        if (in_array('current_page_item', $submenu)) {
            $classes[] = 'header__menu__item--active';
        }
    } else if ($args->theme_location == 'top_header_menu') {
        $classes = [];
        $classes[] = 'top-header__menu__item';
        if (in_array('menu-item-has-children', $submenu)) {
            $classes[] = 'top-header__menu__item--submenu';
        }
        if (in_array('current_page_item', $submenu)) {
            $classes[] = 'top-header__menu__item--active';
        }
    }
    return $classes;
}

/**
 * @init
 * @cptui_register_my_cpts
 */
add_action('init', 'cptui_register_my_cpts');
function cptui_register_my_cpts()
{
    /**
     * Post Type: News.
     */

    $labels = [
        "name"          => __("News", "nec"),
        "singular_name" => __("News", "nec"),
    ];

    $args = [
        "label"                 => __("News", "nec"),
        "labels"                => $labels,
        "description"           => "",
        "public"                => true,
        "publicly_queryable"    => true,
        "show_ui"               => true,
        "show_in_rest"          => true,
        "rest_base"             => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive"           => true,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "delete_with_user"      => false,
        "exclude_from_search"   => false,
        "capability_type"       => "post",
        "map_meta_cap"          => true,
        "hierarchical"          => true,
        "rewrite"               => ["slug" => "news", "with_front" => true],
        "query_var"             => true,
        "menu_icon"             => "dashicons-clipboard",
        "supports"              => ["title", "editor", "thumbnail", "excerpt"],
        "taxonomies"            => ["post_tag"],
    ];

    register_post_type("news", $args);

    /**
     * Post Type: Events.
     */

    $labels = [
        "name"          => __("Events", "nec"),
        "singular_name" => __("Event", "nec"),
    ];

    $args = [
        "label"                 => __("Events", "nec"),
        "labels"                => $labels,
        "description"           => "",
        "public"                => true,
        "publicly_queryable"    => true,
        "show_ui"               => true,
        "show_in_rest"          => true,
        "rest_base"             => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive"           => false,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "delete_with_user"      => false,
        "exclude_from_search"   => false,
        "capability_type"       => "post",
        "map_meta_cap"          => true,
        "hierarchical"          => true,
        "rewrite"               => ["slug" => "event", "with_front" => true],
        "query_var"             => true,
        "menu_icon"             => "dashicons-calendar-alt",
        "supports"              => ["title", "editor", "thumbnail", "excerpt"],
        "taxonomies"            => ["post_tag"],
    ];

    register_post_type("event", $args);

    /**
     * Post Type: Programs.
     */

    $labels = [
        "name"          => __("Programs", "nec"),
        "singular_name" => __("Program", "nec"),
    ];

    $args = [
        "label"                 => __("Programs", "nec"),
        "labels"                => $labels,
        "description"           => "",
        "public"                => true,
        "publicly_queryable"    => true,
        "show_ui"               => true,
        "show_in_rest"          => true,
        "rest_base"             => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive"           => false,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "delete_with_user"      => false,
        "exclude_from_search"   => false,
        "capability_type"       => "post",
        "map_meta_cap"          => true,
        "hierarchical"          => true,
        "rewrite"               => ["slug" => "programs", "with_front" => true],
        "query_var"             => true,
        "menu_icon"             => "dashicons-book-alt",
        "supports"              => ["title", "editor", "thumbnail", "excerpt", "trackbacks", "custom-fields", "comments", "revisions", "author", "page-attributes", "post-formats"],
        "taxonomies"            => ["post_tag"],
    ];

    register_post_type("programs", $args);
}

/**
 * @init
 * @cptui_register_my_taxes
 */
add_action('init', 'cptui_register_my_taxes');
function cptui_register_my_taxes()
{
    /**
     * Taxonomy: Categories.
     */

    $labels = [
        "name"          => __("Category", "nec"),
        "singular_name" => __("Category", "nec"),
    ];

    $args = [
        "label"                 => __("Category", "nec"),
        "labels"                => $labels,
        "public"                => true,
        "publicly_queryable"    => true,
        "hierarchical"          => true,
        "show_ui"               => true,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "query_var"             => true,
        "rewrite"               => ['slug' => 'news_cat', 'with_front' => true,],
        "show_admin_column"     => true,
        "show_in_rest"          => true,
        "rest_base"             => "news_cat",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit"    => false,
    ];
    register_taxonomy("news_cat", ["news"], $args);

    /**
     * Taxonomy: Categories.
     */

    $labels = [
        "name"          => __("Category", "nec"),
        "singular_name" => __("Category", "nec"),
    ];

    $args = [
        "label"                 => __("Category", "nec"),
        "labels"                => $labels,
        "public"                => true,
        "publicly_queryable"    => true,
        "hierarchical"          => true,
        "show_ui"               => true,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "query_var"             => true,
        "rewrite"               => ['slug' => 'event_cat', 'with_front' => true,],
        "show_admin_column"     => true,
        "show_in_rest"          => true,
        "rest_base"             => "event_cat",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit"    => true,
    ];
    register_taxonomy("event_cat", ["event"], $args);

    /**
     * Taxonomy: Categories.
     */

    $labels = [
        "name"          => __("School", "nec"),
        "singular_name" => __("School", "nec"),
    ];

    $args = [
        "label"                 => __("School", "nec"),
        "labels"                => $labels,
        "public"                => true,
        "publicly_queryable"    => true,
        "hierarchical"          => true,
        "show_ui"               => true,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "query_var"             => true,
        "rewrite"               => ['slug' => 'programs_cat', 'with_front' => true,],
        "show_admin_column"     => true,
        "show_in_rest"          => true,
        "rest_base"             => "programs_cat",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit"    => true,
    ];
    register_taxonomy("programs_cat", ["programs"], $args);


    /**
     * Taxonomy: Programs Level.
     */

    $labels = [
        "name"          => __("Level", "nec"),
        "singular_name" => __("Level", "nec"),
    ];

    $args = [
        "label"                 => __("Level", "nec"),
        "labels"                => $labels,
        "public"                => true,
        "publicly_queryable"    => true,
        "hierarchical"          => true,
        "show_ui"               => true,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "query_var"             => true,
        "rewrite"               => ['slug' => 'programs_level', 'with_front' => true,],
        "show_admin_column"     => true,
        "show_in_rest"          => true,
        "rest_base"             => "programs_level",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit"    => true,
    ];
    register_taxonomy("programs_level", ["programs"], $args);
}

add_filter('manage_edit-article_columns', 'my_columns');
function my_columns($columns) {
    $columns['article_category'] = 'Category';
    return $columns;
}


/**
 * Register the column by Taxonomy
 */
add_action( 'admin_init', 'nec_programs_cat_image_hooks' );
function nec_programs_cat_image_hooks() {
    $taxonomy = 'programs_cat';
    add_filter( 'manage_' . $taxonomy . '_custom_column', 'nec_programs_cat_image_taxonomy_rows',15, 3 );
    add_filter( 'manage_edit-' . $taxonomy . '_columns',  'nec_programs_cat_image_taxonomy_columns' );
}

/**
 * @param $original_columns
 * @return array
 */
function nec_programs_cat_image_taxonomy_columns( $original_columns ) {
    $new_columns = $original_columns;
    array_splice( $new_columns, 1 );
    $new_columns['image'] = esc_html__( 'Image', 'taxonomy-images' );
    return array_merge( $new_columns, $original_columns );
}

/**
 * @param $row
 * @param $column_name
 * @param $term_id
 */
function nec_programs_cat_image_taxonomy_rows( $row, $column_name, $term_id ){
    $t_id = $term_id;
    $meta = get_field('category_image', 'programs_cat_' . $term_id);

    if ('image' === $column_name) :
        if( $meta ) :
            echo '<img src="'.$meta['sizes']['thumbnail'].'" width="75" height="75" />';
        endif;
    endif;
}





/**
 * ACF Google API KEY
 * @add_action
 * @acf/init
 * @nec_acf_init
 */
add_action('acf/init', 'nec_acf_init');
function nec_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyCSqQeiH6f0iSnHMZ0-WMAcZKkS3dKjEqQ');
}
/**
 * Add Box Gutenberg
 */
add_action('acf/init', 'nec_acf_register_blocks_gutenberg');
function nec_acf_register_blocks_gutenberg() {

    // check function exists.
    if( function_exists('acf_register_block_type') ) {

        /**
         * Contact Block
         */
        acf_register_block_type(array(
            'name'              => 'Contact Section',
            'title'             => __('Contact Section'),
            'description'       => __('A custom contact section block.'),
            'render_callback'   => 'nec_acf_register_blocks_gutenberg_contact_callback',
            'category'          => 'formatting',
            'post_types'        => ['news', 'event'],
            'mode'              => 'edit',
        ));

        /**
         * Location Block
         */
        acf_register_block_type(array(
            'name'              => 'Loaction Section',
            'title'             => __('Loaction Section'),
            'description'       => __('A custom loaction section block.'),
            'render_callback'   => 'nec_acf_register_blocks_gutenberg_location_callback',
            'category'          => 'formatting',
            'post_types'        => ['news', 'event'],
            'mode'              => 'edit',
        ));
    }
}

/**
 * Contact Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function nec_acf_register_blocks_gutenberg_contact_callback( $block, $content = '', $is_preview = false, $post_id = 0 ) {

    // Create id attribute allowing for custom "anchor" value.
    $id = 'contact-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" and "align" values.
    $className = 'contact';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }

    // Load values and assing defaults.

    $contact_image = get_field('image') ?: 263;
    $contact_name = get_field('contact_name') ?: 'Firstname Lasntame';
    $contact_position = get_field('contact_position') ?: 'Position / Title';
    $contact_place = get_field('contact_place') ?: 'Manchester Campus';
    $contact_email = get_field('contact_email') ?: 'name@nec.edu';
    $contact_phone = get_field('contact_phone') ?: '123.456.7890';

    ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

        <!-- Contact -->
        <div class="newssingle__contact">

            <!-- Title -->
            <h5 class="newssingle__contact-title">
                <?= _e('Contact') ?>
            </h5>
            <!-- End Title -->

            <!-- Card -->
            <div class="newssingle__contact-card">

                <!-- Image -->
                <div class="newssingle__contact-card--image">
                    <?php echo wp_get_attachment_image( $contact_image, [120,120] ); ?>
                </div>
                <!-- End Image -->

                <div class="newssingle__contact-card--info">

                    <!-- User -->
                    <div class="newssingle__contact-card--user">
                        <strong><?= $contact_name ?></strong>
                        <span><?= $contact_position ?></span>
                        <span><?= $contact_place ?></span>
                    </div>
                    <!-- End User -->

                    <!-- User -->
                    <div class="newssingle__contact-card--otcher">
                        <span class="email"><?= $contact_email ?></span>
                        <span class="phone"><?= $contact_phone ?></span>
                    </div>
                    <!-- End User -->

                </div>


            </div>
            <!-- End Card -->

        </div>
        <!-- End Contact -->

    </div>
    <?php
}

/**
 * Location Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function nec_acf_register_blocks_gutenberg_location_callback( $block, $content = '', $is_preview = false, $post_id = 0 ) {

    // Create id attribute allowing for custom "anchor" value.
    $id = 'location-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" and "align" values.
    $className = 'location';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }

    // Load values and assing defaults.

    $field_map = get_field('mapa') ?: '';
    $field_address = get_field('address') ?: '';
    $field_date = get_field('date') ?: '';
    $field_link = get_field('link') ?: '';

    ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

        <script type="text/javascript">
            var map;
            function initMap() {
                map = new google.maps.Map(document.getElementById('googleMap'), {
                    center: {lat: <?= $field_map['lat'] ?>, lng: <?= $field_map['lng'] ?>},
                    zoom: 8,
                    disableDefaultUI: true,
                    styles: [{
                        stylers: [{
                            saturation: -100
                        }]
                    }]
                });
            }
        </script>

        <!-- Location -->
        <div class="newssingle__location">

            <!-- Left -->
            <div class="newssingle__location-left">
                <!-- Title -->
                <h5 class="newssingle__location-title">
                    <?= _e('Location') ?>
                </h5>
                <!-- End Title -->

                <!-- Mapa -->
                <div class="newssingle__location-mapa" id="googleMap"></div>
                <!-- End Mapa -->

                <!-- Address -->
                <div class="newssingle__location-address">
                    <?= $field_address ?>
                </div>
                <!-- End Address -->

            </div>
            <!-- End Left -->

            <!-- Right -->
            <div class="newssingle__location-right">

                <!-- Title -->
                <h5 class="newssingle__location-title">
                    <?= _e('Date and Time') ?>
                </h5>
                <!-- End Title -->

                <!-- Date -->
                <div class="newssingle__location-date">
                    <?= $field_date ?>
                </div>
                <!-- End Date -->

                <!-- Date -->
                <div class="newssingle__location-link">
                    <a href="<?= $field_link['url'] ?>"><?= $field_link['title'] ?></a>
                </div>
                <!-- End Date -->


            </div>
            <!-- End Right -->

        </div>
        <!-- End Contact -->

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSqQeiH6f0iSnHMZ0-WMAcZKkS3dKjEqQ&callback=initMap"></script>

    </div>
    <?php
}
