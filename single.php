<?php
get_header(); ?>
<!-- Page content-->
<div class="container" style="margin:144px auto;">
    <div class="row">
        <div class="col-lg-8 rounded-2 px-5 pt-4" style="background-color:#fff;">
            <?php
            while (have_posts()) {
                the_post();
            ?>
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1"><?php the_title(); ?></h1>
                        <div class="fst-italic mb-2" style="color:#7d7d7d">Posted on <?php echo get_the_date(); ?>, by <?php the_author(); ?></div>
                        <!-- Post categories-->
                        <?php
                        $category_id = get_cat_ID(get_the_category()[0]->cat_name);
                        $category_link = get_category_link($category_id);
                        ?>
                        <a class="badge bg-secondary text-decoration-none link-light" href="<?php echo esc_url($category_link) ?>"><?php echo get_the_category()[0]->cat_name ?></a>
                    </header>

                    <figure class="mb-4"><img class="img-fluid rounded" style="width:800px; height:400px" src=<?php the_post_thumbnail_url(); ?> alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4"><?php echo get_the_content(get_the_ID()); ?></p>
                    </section>
                </article>
                <div>
                    <div class="social_nav d-flex justify-content-end align-items-center footer-right-icon">
                        <span style="color:#837e7e;font-weight: 600;padding-bottom: 17px;"><i class='bx bxs-share-alt'></i> Shares</span>
                        <ul>
                            <li><a href="https://www.facebook.com/sharer.php?u=<?php the_permalink();  ?>"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/share?url=<?php the_permalink();  ?>&text=<?php the_title(); ?>"><i class="fab fa-twitter-square"></i></a></li>
                            <li><a href="https://pinterest.com/pin/create/bookmarklet/?media=<?php the_post_thumbnail_url(); ?>&url=<?php the_permalink();  ?>&description=<?php the_title(); ?>"><i class="fab fa-pinterest"></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?text=<?php the_permalink();  ?>"><i class="fab fa-whatsapp-square"></i></a></li>
                            <li><a href="mailto:?subject=<?php the_permalink();  ?>"><i class="fas fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
            <?php 
            }
            ?>
        </div>
        <?php get_template_part('template-parts/aside-bar', 'none') ?>
    </div>
    <div id="commentss">
        <h3 class="d-flex align-items-center mb-0 px-1"><i class='bx bxs-comment-detail' style='margin-right: 1rem;color:rgba(244,239,239,0.99)'></i>
            <?php
            if (get_comments_number($post->ID) == 0) {
                echo ("No");
            } else {
                echo get_comments_number($post->ID);
            }
            ?>
            Comments</h1>
    </div>
    <?php
    if (comments_open() || get_comments_number()) {
        comments_template();
    }
    ?>
</div>
<?php
get_footer();
