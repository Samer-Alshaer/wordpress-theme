<?php get_header(); ?>


<!--------- start news ticker section --------->
<?php if (get_option('select_news_ticker_status', '')) {
?>
    <section class="news-ticker" id="news-ticker">
        <div class="ticker-latest">
            <h6>Breaking News</h6>
        </div>
        <div class="ticker">
            <div class="hmove">
                <?php

                $lastposts = get_posts(array(
                    'post_status' => 'publish',
                    'posts_per_page' => 10
                ));

                if ($lastposts) {
                    foreach ($lastposts as $post) :
                ?>
                        <div class="hitem"><a href="<?php the_permalink(); ?>"><span><?php echo substr(get_the_content(), 0, 110) ?></span></a></div>
                <?php
                    endforeach;
                }
                ?>
            </div>
        </div>
    </section>
<?php
}
?>


<!--------- start news1 section --------->
<section class="news1" id="news1" style="<?php if (!get_option('select_news_ticker_status', '')) {
                                                echo "margin-top:100px";
                                            } ?>">
    <div class="container">
        <div class="row">
            <div class="title">
                <h2>Latest News</h2>
            </div>
            <?php
            $lastposts_media_b = get_posts(array(
                'post_status' => 'publish',
                'posts_per_page' => 1
            ));
            if ($lastposts_media_b) {
                foreach ($lastposts_media_b as $post) :
            ?>
                    <figure class="figure col-lg-6">
                        <a href=""></a><img style="width: 600px;max-height: 400px;" src=<?php the_post_thumbnail_url(); ?> class="img-fluid rounded shadow-lg" alt="A generic square placeholder image with rounded corners in a figure.">
                        <div class="carousel-content">
                            <p>
                                <?php echo substr(get_the_content(), 0, 200) ?>...</p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-success">Read More</a>
                        </div>
                    </figure>
            <?php
                endforeach;
            }
            ?>

            <div class="col-lg-6 align-items-stretch">
                <div class="list-unstyled">
                    <?php

                    $lastposts_media =  new WP_Query(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 3
                    ));
                    if ($lastposts_media->have_posts()) {
                        while ($lastposts_media->have_posts()) {
                            $lastposts_media->the_post()
                    ?>
                            <div class="media">
                                <div class="img-cont">
                                    <a href="<?php the_permalink() ?>"><img class="mr-3" src=<?php the_post_thumbnail_url(); ?> alt=""></a>
                                </div>

                                <div class="media-body">
                                    <a href="<?php the_permalink(); ?>">
                                        <h5 class="mt-0 mb-1"><?php the_title(); ?></h5>
                                    </a>
                                    <?php echo substr(get_the_content(), 0, 175) ?>
                                    <h6 class="media-footer"><?php echo get_the_date(); ?></h6>
                                </div>
                            </div>
                    <?php

                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------- end news1 section --------->

<!--------- start news2 section --------->

<section class="container mb-5">
    <div class="row row-cols-1  g-4">
        <div class="title2">
            <h2>Global News</h2>
        </div>
        <?php
        $lastposts_purple_Guy_card = get_posts(array(
            'post_status' => 'publish',
            'posts_per_page' => 6
        ));
        if ($lastposts_purple_Guy_card) {
            foreach ($lastposts_purple_Guy_card as $post) :
        ?>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card purple_Guy-card">
                        <img src=<?php the_post_thumbnail_url(); ?> class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 style="text-align:right; color:#878787"><?php echo get_the_date(); ?></h6>
                            <a href="<?php the_permalink(); ?>">
                                <h5 class="card-title"><?php the_title(); ?></h5>
                            </a>
                            <p class="card-text"><?php echo substr(get_the_content(), 0, 170) ?>...</p>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="btn btn-outline-success">Read More</a>
                    </div>
                </div>
        <?php
            endforeach;
        }
        ?>
    </div>
</section>

<section class="container mb-5">
    <div class="row g-4">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="title3">
                <h2>Categories</h2>
            </div>

            <div class="index-categories">
                <?php $args = array(
                    'exclude'     => '',
                    'hide_empty'  => 0,
                    'style'   => '',
                    'order'        => 'ASC',
                    'orderby'      => 'name',
                    'separator'    => '',
                );
                ?>
                <?php echo wp_list_categories($args)   ?>
            </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="title4">
                <h2>Tags</h2>
            </div>

            <div class="index-tags">
                <?php
                $tags = get_tags();
                if ($tags) {
                ?><?php
                    foreach ($tags as $tag) {
                    ?>
                <span>
                    <a href="<?php echo get_tag_link($tag->term_id) ?>"><?php echo $tag->name; ?></a>
                </span>
            <?php
                    }

            ?>
        <?php } ?>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>