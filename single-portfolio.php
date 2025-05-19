<?php $portfolio_select = get_post_meta(get_the_ID(),'_cmb_portfolio_select', true); ?>
<?php if($portfolio_select == 'black'){?>
<?php
   $aali_redux_demo = get_option('redux_demo');
   get_header('blog-dark'); 
?>
<?php }else{?>
<?php
   $aali_redux_demo = get_option('redux_demo');
   get_header(); 
?>
<?php } ?>
<?php 
    while (have_posts()): the_post();
?>
<div class="aali_tm_page_wrapper">
    <div class="aali_tm_portfolio_single">
        <span class="squareLeft moving_effect" data-direction="y" data-reverse="yes"></span>
        <span class="squareRight moving_effect" data-direction="y" data-reverse="yes"></span>
        <div class="container">
            <div class="main_image">
                <img src="<?php echo get_template_directory_uri();?>/img/thumbs/4-2.jpg" alt="" />
                <div class="main" data-img-url="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>"></div>
            </div>
            <div class="maincontent">
                <div class="item_title">
                    <span><a href="#">Branding</a></span>
                    <h3><?php the_title(); ?></h3>
                </div>
                
                <?php the_content(); ?>
                <?php wp_link_pages( array(
                    'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'aali' ),
                    'after'       => '</div>',
                    'link_before' => '<p class="page-number">',
                    'link_after'  => '</p>',
                ) ); ?>
                        
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php
    get_footer();
?>

