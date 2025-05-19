<?php
     $aali_redux_demo = get_option('redux_demo');
     get_header(); 
?>
<div class="aali_tm_page_wrapper">
    <div class="aali_tm_page_title">
        <div class="container">
            <h3><?php printf( esc_html__( 'Category Archives: %s', 'aali' ), single_cat_title( '', false ) ); ?></h3>
        </div>
        <span class="square moving_effect" data-direction="y" data-reverse="yes"></span>
        <span class="border moving_effect" data-direction="x" data-reverse="yes"></span>
    </div>
    <div class="page_content">
        <span class="squareLeft moving_effect" data-direction="y" data-reverse="yes"></span>
        <span class="squareRight moving_effect" data-direction="y" data-reverse="yes"></span>
        <div class="container">
            <div class="aali_tm_flexbox">
                <div class="leftbox">
                    <div class="blog_list">
                        <ul>
                            <?php 
                                while (have_posts()): the_post(); 
                            ?>
                            <li>
                                <div class="list_inner">
                                    <?php if (get_post_thumbnail_id() !='')  { ?>
                                    <div class="image">
                                        <a href="<?php the_permalink();?>">
                                            <img src="<?php echo get_template_directory_uri();?>/img/thumbs/87-48.jpg" alt="" />
                                            <div class="main" data-img-url="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>"></div>
                                        </a>
                                    </div>
                                    <?php } ?>
                                    <div class="details">
                                        <div class="metabox">
                                            <div class="info">
                                                <span class="date"><?php the_time(get_option( 'date_format' ));?></span>
                                                <span class="comment"><?php comments_number( esc_html__('0 Comments', 'aali'), esc_html__('1 Comment', 'aali'), esc_html__('% Comments', 'aali') ); ?></span>
                                            </div>
                                            <div class="title">
                                                <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <p><?php if(isset($aali_redux_demo['blog_excerpt'])){?>
                                                <?php echo esc_attr(aali_excerpt($aali_redux_demo['blog_excerpt'])); ?>
                                                <?php }else{?>
                                                <?php echo esc_attr(aali_excerpt(50)); } ?></p>
                                        </div>
                                        <div class="links">
                                            <div class="aali_tm_button">
                                                <a href="<?php the_permalink();?>"><span><?php if(isset($aali_redux_demo['read_more'])){?>
                                                <?php echo esc_attr($aali_redux_demo['read_more']);?>
                                                <?php }else{?>
                                                <?php echo esc_html__( 'Full Story', 'aali' ); } ?></span></a>
                                            </div>
                                            <div class="share">
                                                <span>Share:</span>
                                                <ul>
                                                    <li><a href="https://www.facebook.com/"><img class="svg" src="<?php echo get_template_directory_uri();?>/img/svg/social/facebook.svg" alt="" /></a></li>
                                                    <li><a href="https://twitter.com/"><img class="svg" src="<?php echo get_template_directory_uri();?>/img/svg/social/twitter.svg" alt="" /></a></li>
                                                    <li><a href="https://www.instagram.com/"><img class="svg" src="<?php echo get_template_directory_uri();?>/img/svg/social/instagram.svg" alt="" /></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <div class="aali_tm_pagination">
                        <?php 
                            $pagination = array(
                            'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
                            'format'    => '',
                            'prev_text' => wp_specialchars_decode(esc_html__( '<i class="icon-left-open-1"></i>', 'aali' ),ENT_QUOTES),
                            'next_text' => wp_specialchars_decode(esc_html__( '<i class="icon-right-open-1"></i>', 'aali' ),ENT_QUOTES),
                            'type'      => 'list',
                            'end_size'    => 3,
                            'mid_size'    => 3
                            );
                            if(paginate_links( $pagination ) != ''){
                                $return =  paginate_links( $pagination );
                                echo str_replace( "<ul class='page-numbers'>", '<ul >', $return );
                            }
                            ?>
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
<?php
    get_footer();
?>