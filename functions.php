<?php

function  test_set_style()
{
    // Google Fonts 
    wp_enqueue_style('test-fonts1', get_template_directory_uri() . 'https://fonts.googleapis.com/css2?family=Courgette&family=Permanent+Marker&display=swap', array(), '1.0', 'all');
    wp_enqueue_style('test-fonts2', get_template_directory_uri() . 'https://fonts.gstatic.com', array(), '1.0', 'all');
    wp_enqueue_style('test-fonts2', get_template_directory_uri() . 'https://fonts.gstatic.com', array(), '1.0', 'all');

    // Vendor CSS Files 
    wp_enqueue_style('test-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), '1.0', 'all');
    wp_enqueue_style('test-hover', get_template_directory_uri() . '/assets/vendor/hover.css/hover-min.css', array(), '1.0', 'all');
    wp_enqueue_style('test-animate', get_template_directory_uri() . '/assets/vendor/hover css/hover-min.css', array(), '1.0', 'all');

    // CSS Files
    wp_enqueue_style('test-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');
    wp_enqueue_style('test-fontawesome', get_template_directory_uri() . '/assets/vendor/fontawesome/css/all.min.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'test_set_style');


function test_set_scripts()
{
    // js Files
    wp_enqueue_script('test-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
    wp_enqueue_script('test-fontawesome', get_template_directory_uri() . '/assets/vendor/fontawesome/js/all.min.js', array(), '1.0', true);
    wp_enqueue_script('test-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'test_set_scripts');

function theme_custom_stup()
{
    add_theme_support('custom-logo', array(
        'height'  => 100,
        'width'  => 400,
    ));
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_custom_stup');

function create_custom_menus_theme_f()
{
    register_nav_menus(array(
        'header_menu' => __('my menu header'),
        'footer_menu' => __('my menu footer'),
    ));
}
add_action('after_setup_theme', 'create_custom_menus_theme_f');


add_action('wp_footer', 'ajax_fetch');
function ajax_fetch()
{
?>
    <script type="text/javascript">
        function fetch() {

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'data_fetch',
                    keyword: jQuery('#keyword').val()
                },
                success: function(data) {
                    jQuery('#datafetch').html(data);
                }
            });

        }
    </script>

    <?php
}

add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');
function data_fetch()
{

    $the_query = new WP_Query(array('posts_per_page' => -1, 'post_status' => 'publish', 's' => esc_attr($_POST['keyword']), 'post_type' => 'post'));
    if ($_POST['keyword'] != null) {
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <h6><a href="<?php echo esc_url(post_permalink()); ?>"><?php the_title(); ?></a></h6>

<?php endwhile;
            wp_reset_postdata();
        endif;

        die();
    } else {
        if (!$the_query->the_post()) {
            echo "results: ";
        }
    }
}

add_filter( 'pre_get_posts', 'add_cpt_in_search_result' );

function add_cpt_in_search_result( $query ) {

    if ( $query->is_search ) {
    $query->set( 'post_type', array( 'post', 'status'=> 'publish' ) );
    }

    return $query;
}

function aj_modify_posts_per_page( $query ) {
    if ( $query->is_search() ) {
    $query->set( 'posts_per_page', '4' );
    }
    }
    add_action( 'pre_get_posts', 'aj_modify_posts_per_page' );



