<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
 $aali_redux_demo = get_option('redux_demo');
get_header(); ?> 
<div class="aali_tm_page_wrapper">
    <div class="aali_tm_page_title">
        <div class="container">
            <h3><?php if(isset($aali_redux_demo['error'])){?>
                        <?php echo esc_attr($aali_redux_demo['error']);?>
                        <?php }else{?>
                        <?php echo esc_html__( 'ERROR', 'aali' );
                        }
                        ?></h3>
        </div>
        <span class="square moving_effect" data-direction="y" data-reverse="yes"></span>
        <span class="border moving_effect" data-direction="x" data-reverse="yes"></span>
    </div>
    <div class="page_content">
        <div class="col-12" style="text-align: center;">
            <div class="error-page-content text-center">
                <h1><?php if(isset($aali_redux_demo['title404'])){?>
                        <?php echo esc_attr($aali_redux_demo['title404']);?>
                        <?php }else{?>
                        <?php echo esc_html__( '404', 'aali' );
                        }
                        ?></h1>
                <h2><?php if(isset($aali_redux_demo['page_not_found'])){?>
                        <?php echo esc_attr($aali_redux_demo['page_not_found']);?>
                        <?php }else{?>
                        <?php echo esc_html__( 'Page Not Found', 'aali' );
                        }
                        ?></h2>
                <p><?php if(isset($aali_redux_demo['desc_404'])){?>
                        <?php echo esc_attr($aali_redux_demo['desc_404']);?>
                        <?php }else{?>
                        <?php echo esc_html__( 'Sorry, but the page you are looking for does not exist or has been removed', 'aali' ); }
                        ?></p>
                        <a class="cs-btn-one btn-md btn-primary-color" href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($aali_redux_demo['home_page'])){?>
                    <?php echo esc_attr($aali_redux_demo['home_page']);?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Go To Home', 'aali' );
                    }
                    ?></a>
            </div>
        </div>
    </div>
</div>
<?php
get_footer(); ?> 
