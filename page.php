<?php get_header(); ?>
<div class="container page_main position-relative">
   
    <?php if (get_option('select_breadcrumb_status', '')) {
    ?>
        <div class="row justify-content-end align-items-center" style="gap: 74%; border-bottom: 2px solid cornflowerblue;padding-bottom: 5px;">


            <div class="col-6 d-flex page_breadcrumbs position-relative">
                <span><a href="<?php echo site_url(); ?>">Home /</a></span>
                <span><?php
                        the_title();
                    ?></span>
            </div>

        </div>
    <?php
    }
    ?>

    <div class="col-12 page_content position-relative">
        <?php
        echo get_the_content();
        ?>
    </div>
</div>
</div>

<?php get_footer(); ?>