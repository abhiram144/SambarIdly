<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 *
 * @package imnews
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--menu-bar start-->
<header id="top">
    <div id="menubar">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-default">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <div class="navbar-header">
                        <?php if(has_custom_logo()){
                                echo get_custom_logo();
                            } ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                            <p class="ttl_tagline"><?php echo get_bloginfo('description'); ?></p>
                    </div>
                    <div class="collapse navbar-collapse inline-list" id="main-nav">
                        <?php wp_nav_menu( array( 
                            'theme_location' => 'primary',
                            'menu_class' => 'nav navbar-nav nav-category',
                            'container' => 'ul',
                        )); ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>