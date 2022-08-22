<?php

get_header(); ?>
<!-- Page content-->
<div class="container blog-container">
    <div class="row">

        <!-- Blog entries-->
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Blog post-->
                    <?php
                    if (have_posts()) {
                        while (have_posts()) :
                            the_post(); ?>
                            <div class="card main-cards mb-4">
                                <a href="<?php the_permalink(); ?>"><img class="card-img-top" src=<?php the_post_thumbnail_url(); ?> alt="..." /></a>
                                <div class="card-body">

                                    <div class="small text-muted author-link">Posted on <?php the_date() ?>, by <?php echo get_the_author_link(); ?></div>
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
                    <?php
                        endwhile;
                    }
                    ?>
                </div>
            </div>

        </div>
        <?php get_template_part('template-parts/aside-bar', 'none') ?>
    </div>

</div>

<?php get_footer(); ?>