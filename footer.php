<?php $aali_redux_demo = get_option('redux_demo');?> 
<div class="aali_tm_section">
    <div class="aali_tm_copyright">
        <div class="container">
            <div class="copyright_inner">
                    <?php if ( is_active_sidebar( 'footer-area-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-1' ); ?>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-area-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-2' ); ?>
                    <?php endif; ?>
                <span class="border moving_effect" data-direction="y" data-reverse="yes"></span>
            </div>
        </div>
        <span class="square moving_effect" data-direction="x">
            <a class="totop" href="#">
                <img class="svg one" src="<?php echo get_template_directory_uri();?>/img/svg/arrow-top.svg" alt="" />
                <img class="svg two" src="<?php echo get_template_directory_uri();?>/img/svg/arrow-top.svg" alt="" />
            </a>
        </span>
    </div>
</div>
<!-- /COPYRIGHT -->
<!-- MAGIC CURSOR -->
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>
<!-- /MAGIC CURSOR -->
</div>
<?php wp_footer(); ?>

</body>
</html>