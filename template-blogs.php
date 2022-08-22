<?php
//Template Name:blogs

get_header(); ?>
<!-- Page content-->
<div class="container blog-container">
    <?php if (get_option('select_posts_design', '') == "list") {
    ?>
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Blog post-->
                        <?php
                        $currentPage = get_query_var('paged');
                        $posts = new WP_Query(array(
                            'post_type' => 'post', // Default or custom post type
                            'posts_per_page' => 4, // Max number of posts per page
                            'paged' => $currentPage
                        ));
                        // Bottom pagination (pagination arguments)
                        if ($posts->have_posts()) {
                            while ($posts->have_posts()) :
                                $posts->the_post(); ?>
                                <div class="card main-cards mb-4">
                                    <a href="<?php the_permalink(); ?>"><img class="card-img-top" src=<?php the_post_thumbnail_url(); ?> alt="..." /></a>
                                    <div class="card-body">

                                        <div class="small text-muted author-link">Posted on <?php echo get_the_date() ?>, by <?php echo get_the_author_link(); ?></div>
                                        <h2 class="card-title h4"><?php the_title(); ?></h2>

                                        <p class="card-text text-left"><?php echo substr(get_the_content(), 0, 175) ?>...</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a class="btn btn-success" href="<?php the_permalink(); ?>">Read more →</a>
                                            <small>
                                                <?php
                                                $category = get_the_category();
                                                ?>
                                                <a class="post-cat" href="<?php echo get_category_link($category[0]->cat_ID) ?>"><?php echo $category[0]->cat_name ?></a>
                                            </small>
                                        </div>
                                    </div>

                                </div>

                                <!-- Pagination-->
                        <?php
                            endwhile;
                            if ($posts->max_num_pages > 1) {
                                echo "<div class='page-nav-container pagination justify-content-center align-items-center my-4'>" . paginate_links(array(
                                    'total' => $posts->max_num_pages,
                                    'prev_text'    => __('«'),
                                    'next_text'    => __('»'),

                                )) . "</div>";
                            }
                        }
                        ?>

                        <!-- Blog post-->
                    </div>
                </div>

            </div>
            <?php get_template_part('template-parts/aside-bar', 'none') ?>
        </div>
    <?php
    }
    ?>


    <?php if (get_option('select_posts_design', '') == "grid") {
    ?>
        <div class="row blog-container2 mb-5">
            <!-- Blog post-->
            <div class="col-lg-8">
                <div class="row">
                    <?php
                    $currentPage = get_query_var('paged');
                    $posts = new WP_Query(array(
                        'post_type' => 'post', // Default or custom post type
                        'posts_per_page' => 6, // Max number of posts per page
                        'paged' => $currentPage
                    ));
                    // Bottom pagination (pagination arguments)
                    if ($posts->have_posts()) {
                        while ($posts->have_posts()) :
                            $posts->the_post(); ?>
                            <div class="card col-sm-6 col-md-6 col-lg-5  px-0 main-cards mx-4 mb-4">
                                <a href="<?php the_permalink(); ?>"><img class="card-img-top" src=<?php the_post_thumbnail_url(); ?> alt="..." /></a>
                                <div class="card-body">

                                    <div class="small text-muted author-link">Posted on <?php echo get_the_date() ?>, by <?php echo get_the_author_link(); ?></div>
                                    <h2 class="card-title h4"><?php the_title(); ?></h2>

                                    <p class="card-text text-left"><?php echo substr(get_the_content(), 0, 175) ?>...</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a class="btn btn-success" href="<?php the_permalink(); ?>">Read more →</a>
                                        <small>
                                            <?php
                                            $category = get_the_category();
                                            ?>
                                            <a class="post-cat" href="<?php echo get_category_link($category[0]->cat_ID) ?>"><?php echo $category[0]->cat_name ?></a>
                                        </small>
                                    </div>
                                </div>

                            </div>

                            <!-- Pagination-->
                    <?php
                        endwhile;
                        if ($posts->max_num_pages > 1) {
                            echo "<div class='page-nav-container pagination justify-content-center align-items-center my-4'>" . paginate_links(array(
                                'total' => $posts->max_num_pages,
                                'prev_text'    => __('«'),
                                'next_text'    => __('»'),

                            )) . "</div>";
                        }
                        wp_reset_postdata();
                    }
                    ?>
                    <!-- Blog post-->

                </div>
            </div>
            <?php get_template_part('template-parts/aside-bar', 'none') ?>
        </div>
    <?php
    }
    ?>
</div>




<?php get_footer(); ?>