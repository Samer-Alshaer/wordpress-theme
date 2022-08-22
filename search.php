<?php
get_header(); ?>
<!-- Page content-->
<div class="container blog-container">
    <div class="row">
        <?php if (have_posts()) { ?>
            <h1 class="search-page-title"><?php printf(__('Search Results for: %s', 'shape'), '<span>' . get_search_query() . '</span>'); ?></h1>
        <?php
        }
        ?>
        <!-- Blog entries-->
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Blog post-->
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="card  main-cards mb-4">
                                <a href="<?php the_permalink(); ?>"><img class="card-img-top" src=<?php the_post_thumbnail_url(); ?> alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?php the_date() ?></div>
                                    <div class="small text-muted author-link">By: <?php echo get_the_author_link(); ?> ,</div>
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
                        <?php endwhile;

                        ?>

                    <?php else :  echo "<h1>No results found</h1>";
                        echo "Sorry, but no results were found that match your search term, try searching using different words." ?>
                    <?php endif; ?>

                </div>
            </div>
            <?php if (get_next_posts_link()) : ?>
    <div class="nav-previous search-nav-previous page-nav-container pagination justify-content-center align-items-center my-4"><?php next_posts_link(__('Older posts <span> &rarr;</span>')); ?></div>
<?php endif; ?>

<?php if (get_previous_posts_link()) : ?>
    <div class="nav-next search-nav-next page-nav-container pagination justify-content-center align-items-center my-4"><?php previous_posts_link(__('<span> &larr; Newer posts </span>')); ?></div>
<?php endif; ?>
        </div>
        <?php get_template_part('template-parts/aside-bar', 'none') ?>
        
    </div>
</div>



</div>


<?php get_footer(); ?>