<div class="wrap NEW_EasyGDPR">
    <h2><?php _e("samer theme settings") ?></h2>
    <?php

    if (isset($_POST['save_theme_settings'])) {
        update_option('footer_made_text', sanitize_text_field($_POST['footer_text']));
        update_option('select_news_ticker_status', sanitize_text_field($_POST['select_news_ticker_status']));
        update_option('select_breadcrumb_status', sanitize_text_field($_POST['select_breadcrumb_status']));
        update_option('select_posts_design', sanitize_text_field($_POST['select_posts_design']));
    ?>
        <div id="setting-error-settings_updated" class="notice notice-success settings-error  is-dismissible">
            <p><strong><?php _e('samer theme settings have been updated.'); ?></strong></p>
        </div>
    <?php
    }

    $footer_made_text = get_option('footer_made_text', '');
    $news_ticker_status = get_option('select_news_ticker_status', '');
    $breadcrumb_status = get_option('select_breadcrumb_status', '');
    $posts_design = get_option('select_posts_design', '');
    ?>



    <form action="" method="post">
        <label for="select_news_ticker_status"><?php _e('News Ticker:'); ?></label>
        <select name="select_news_ticker_status" class="select_news_ticker_status" id="select_news_ticker_status">
            <option name="news_ticker_show" class="news_ticker_show" id="news_ticker_show" value="1">Show</option>
            <option name="news_ticker_hide" id="news_ticker_hide" value="0">Hide</option>
        </select>

        <label for="select_breadcrumb_status"><?php _e('Breadcrumb:'); ?></label>
        <select name="select_breadcrumb_status" class="select_breadcrumb_status" id="select_breadcrumb_status">
            <option name="breadcrumb_show" class="breadcrumb_show" id="breadcrumb_show" value="1">Show</option>
            <option name="breadcrumb_hide" id="breadcrumb_hide" value="0">Hide</option>
        </select>

        <label for="select_posts_design"><?php _e('Posts Design:'); ?></label>
        <select name="select_posts_design" class="select_posts_design" id="select_posts_design">
            <option name="list" id="list" value="list">List</option>
            <option name="grid" class="grid" id="grid" value="grid">Grid</option>
        </select>

        <label for="footer_text"><?php _e('Footer Made By Text:'); ?></label>
        <textarea name="footer_text" id="footer_text" cols="60" rows="5" placeholder="GDPR Frontend Text"><?php esc_attr_e($footer_made_text) ?></textarea>


        <div class="btn_container">
            <input type="submit" name="save_theme_settings" class="button button-primary" value="Save Theme Settings">
        </div>
    </form>


</div>
<?php
if ($news_ticker_status == 1) {
?>
    <script>
        const dropdownElement = document.querySelector("#news_ticker_show")
        dropdownElement.setAttribute("selected", "selected");
    </script>
<?php
}
if ($news_ticker_status == 0) {
?>
    <script>
        const dropdownElement = document.querySelector("#news_ticker_hide")
        dropdownElement.setAttribute("selected", "selected");
    </script>
<?php
}
/* ---------------------------------- */

if ($breadcrumb_status == 1) {
?>
    <script>
        const dropdownElement2 = document.querySelector("#breadcrumb_show")
        dropdownElement2.setAttribute("selected", "selected");
    </script>
<?php
}
if ($breadcrumb_status == 0) {
?>
    <script>
        const dropdownElement2 = document.querySelector("#breadcrumb_hide")
        dropdownElement2.setAttribute("selected", "selected");
    </script>
<?php
}
/* ---------------------------------- */

if ($posts_design == "grid") {
?>
    <script>
        const dropdownElement3 = document.querySelector("#grid")
        dropdownElement3.setAttribute("selected", "selected");
    </script>
<?php
}
if ($posts_design == "list") {
?>
    <script>
        const dropdownElement3 = document.querySelector("#list")
        dropdownElement3.setAttribute("selected", "selected");
    </script>
<?php
}
