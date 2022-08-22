<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <?php wp_head(); ?>
    <title>Connatix News</title>
</head>

<body>
    <!--------- start nav --------->
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="d-flex align-items-center header-logo">
                    <?php echo get_custom_logo() ?>
                    <h3 class="mx-2 mt-2"><a style="color:black"
                            href="<?php echo site_url(); ?>"><?php bloginfo( 'name' ); ?></a></h3>
                    <?php bloginfo( 'description' ); ?>
                </div>
                <i class='bx bx-menu navbar-toggler'></i>
                <?php

                wp_nav_menu(array(
                    'menu' => 'header_menu',
                    'theme_location' => 'header_menu',
                    'menu_class' => 'custom_nav_class',
                    'menu_id' => 'custom_nav_id',
                    'container' => 'div',
                ));

                ?>
                <div class="search">
                    <?php get_search_form(); ?>
                </div>
              
            </div>
            </div>
        </nav>
    </header>
    <!--------- end nav ----------->