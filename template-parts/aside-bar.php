<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <input type="text" placeholder="search about post.." name="keyword" id="keyword" onkeyup="fetch()"></input>
            <div id="datafetch"></div>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row list-unstyled-c">
                <div class="all_categories_side">
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
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Archiv</div>
        <div class="card-body Archiv"><?php wp_get_archives('type=monthly'); ?></div>
    </div>
</div>