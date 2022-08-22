<footer class="container-fluid py-4 bg-light">
    <div class="row justify-content-between">
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 footer">
            <div class="d-flex justify-content-lg-center align-items-center header-logo">
                <?php echo get_custom_logo() ?>
                <h3 class="mx-2 mt-2"><a style="color:black" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a></h3>
            </div>
        </div>

        <?php
        wp_nav_menu(array(
            'menu' => 'footer_menu',
            'theme_location' => 'footer_menu',
            'menu_class' => 'custom_nav_class_footer',
            'menu_id' => 'custom_nav_class_footer',
            'container' => 'div',
            'container_class' => 'col-lg-4 mt-4 footer_menu',
        ));

        ?>
    </div>
    <div class="d-flex justify-content-center">
        <p class="footer-right-p">Made with <i class="fas fa-heart" color="red"></i> by
            <?php esc_html_e(get_option('footer_made_text', __('Samer Alshaer'))) ?> </p>
    </div>
</footer>
<!--------- end footer section --------->

<?php wp_footer(); ?>
</body>

</html>