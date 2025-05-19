<!doctype html>
<html <?php language_attributes(); ?>>
<?php $aali_redux_demo = get_option('redux_demo'); ?>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
    <link rel="shortcut icon" href="<?php if(isset($aali_redux_demo['favicon']['url'])){?><?php echo esc_url($aali_redux_demo['favicon']['url']); ?><?php }?>">
    <?php }?>
    <?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- < NAVIGATION WITH BACKGROUND COLOR NAVBAR >............................................ -->
<!-- removed navbar-toggleable-md because responsive issues. Find out why ..... -->
<!-- start page-wrapper -->
<!-- PRELOADER -->
<div id="preloader">
    <div class="loader_line"></div>
</div>
<!-- /PRELOADER -->
<!-- WRAPPER ALL -->
<div class="aali_tm_all_wrap" data-magic-cursor="show">   
    <div class="aali_tm_modalbox">
        <div class="box_inner">
            <div class="close">
                <a href="#"><img class="svg" src="<?php echo get_template_directory_uri();?>/img/svg/cancel.svg" alt="" /></a>
            </div>
            <div class="description_wrap"></div>
        </div>
    </div>  
    <!-- MOBILE MENU -->
    <div class="aali_tm_mobile_menu">
        <div class="mobile_menu_inner">
            <div class="mobile_in">
                <?php if(isset($aali_redux_demo['logo']['url']) && $aali_redux_demo['logo']['url'] != ''){?> 
                <div class="logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_attr($aali_redux_demo['logo_dark']['url']);?>" alt="" /></a>
                </div>
                <?php }else{?>
                <div class="logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri();?>/img/logo/dark.png" alt="" /></a>
                </div>
                <?php } ?>
                <div class="trigger">
                    <div class="hamburger hamburger--slider">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dropdown">
            <div class="dropdown_inner">
                    <?php 
                    wp_nav_menu( 
                        array( 
                            'theme_location' => 'primary_light',
                            'container' => '',
                            'menu_class' => '', 
                            'menu_id' => '',
                            'menu'            => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'echo'            => true,
                             'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                             'walker'            => new aali_wp_bootstrap_navwalker(),
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class=" anchor_nav %2$s" >%3$s</ul>',
                            'depth'           => 0,        
                        )
                    ); ?>
            </div>
        </div>
    </div>
    <!-- /MOBILE MENU -->
    <!-- HEADER -->
    <div class="aali_tm_header" data-position="fixed" data-skin="light">
        <div class="container">
            <div class="inner">
                <?php if(isset($aali_redux_demo['logo']['url']) && $aali_redux_demo['logo']['url'] != ''){?> 
                <div class="logo">
                    <a class="light" href="<?php echo esc_attr($aali_redux_demo['logo']['url']);?>" alt="" /></a>
                    <a class="dark" href="<?php echo esc_attr($aali_redux_demo['logo_dark']['url']);?>" alt="" /></a>
                </div>
                <?php }else{?>
                <div class="logo">
                    <a class="light" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri();?>/img/logo/logo.png" alt="" /></a>
                    <a class="dark" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri();?>/img/logo/dark.png" alt="" /></a>
                </div>
                <?php } ?>
                <div class="menu">
                    <?php 
                    wp_nav_menu( 
                        array( 
                            'theme_location' => 'primary_light',
                            'container' => '',
                            'menu_class' => '', 
                            'menu_id' => '',
                            'menu'            => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'echo'            => true,
                             'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                             'walker'            => new aali_wp_bootstrap_navwalker(),
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class=" anchor_nav %2$s" >%3$s</ul>',
                            'depth'           => 0,        
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </div>