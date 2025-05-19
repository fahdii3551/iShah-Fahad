<?php $post_select = get_post_meta(get_the_ID(),'_cmb_post_select', true); ?>
<?php if($post_select == 'black'){?>
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
    <div class="page_content">
        <span class="squareLeft moving_effect" data-direction="y" data-reverse="yes"></span>
        <span class="squareRight moving_effect" data-direction="y" data-reverse="yes"></span>
        <div class="page_hero_header">
            <?php if(isset($aali_redux_demo['blog_single_image']['url']) && $aali_redux_demo['blog_single_image']['url'] != ''){?> 
            <div class="background">
                <div class="image" data-img-url="<?php echo esc_attr($aali_redux_demo['blog_single_image']['url']);?>"></div>
                <div class="overlay"></div>
            </div>
            <?php }else{?>
            <div class="background">
                <div class="image" data-img-url="<?php echo get_template_directory_uri();?>/img/news/3.jpg"></div>
                <div class="overlay"></div>
            </div>
            <?php } ?>
            <div class="content">
                <div class="container">
                    <div class="in">
                        <div class="metabox">
                            <div class="title">
                                <h3><?php the_title(); ?></h3>
                            </div>
                            <div class="info">
                                <span class="date"><?php the_time(get_option( 'date_format' ));?></span>
                                <span class="comment"><?php comments_number( esc_html__('0 Comments', 'aali'), esc_html__('1 Comment', 'aali'), esc_html__('% Comments', 'aali') ); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="square moving_effect" data-direction="x" data-reverse="no"></span>
            <span class="border moving_effect" data-direction="x" data-reverse="yes"></span>
        </div>
        <div class="container">
            <div class="aali_tm_flexbox">
                <div class="leftbox">
                    <div class="blog_single_details">
                        <?php the_content(); ?>
                            <?php wp_link_pages( array(
                                'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'aali' ),
                                'after'       => '</div>',
                                'link_before' => '<p class="page-number">',
                                'link_after'  => '</p>',
                            ) ); ?>
                        <div class="share_and_tags">
                            <div class="tags">
                                <span><?php echo esc_attr($aali_redux_demo['tags']);?></span>
                                <ul>
                                    <?php echo get_the_tag_list(); ?>
                                </ul>
                            </div>
                            <div class="share">
                                <span><?php echo esc_attr($aali_redux_demo['share']);?></span>
                                <ul>
                                    <?php if ($aali_redux_demo['facebook'] !='')  { ?>
                                    <li><a href="<?php echo esc_attr($aali_redux_demo['facebook']);?>"><img class="svg" src="<?php echo get_template_directory_uri();?>/img/svg/social/facebook.svg" alt="" /></a></li>
                                    <?php } ?>
                                    <?php if ($aali_redux_demo['twitter'] !='')  { ?>
                                    <li><a href="<?php echo esc_attr($aali_redux_demo['twitter']);?>"><img class="svg" src="<?php echo get_template_directory_uri();?>/img/svg/social/twitter.svg" alt="" /></a></li>
                                    <?php } ?>
                                    <?php if ($aali_redux_demo['instagram'] !='')  { ?>
                                    <li><a href="<?php echo esc_attr($aali_redux_demo['instagram']);?>"><img class="svg" src="<?php echo get_template_directory_uri();?>/img/svg/social/instagram.svg" alt="" /></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <?php comments_template();?>
                    </div>
                </div>
                <div class="rightbox">
                    <div class="aali_tm_sidebar">
                        <ul>
                            <?php get_sidebar();?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php
    get_footer();
?>

