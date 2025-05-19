<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<?php if ( have_comments() ) : ?>
<div class="aali_tm_comments">
    <div class="title"><h3><?php comments_number( esc_html__(' 0 Comments', 'aali'), esc_html__(' 1 Comment', 'aali'), esc_html__('% Comments', 'aali') ); ?></h3></div>
    <div class="list">
    <ul>
        <?php wp_list_comments('callback=aali_theme_comment'); ?>
    <ul>
</div>
</div>
<div class="col-md-12"> 
<!-- START PAGINATION -->
<?php
if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
?>
<div class="pagination_area">
     <nav>
          <ul class="pagination">
               <li> <?php paginate_comments_links( 
              array(
              'prev_text' => wp_specialchars_decode(esc_html__( '<i class="fa fa-angle-left"></i>', 'aali' ),ENT_QUOTES),
              'next_text' => wp_specialchars_decode(esc_html__( '<i class="fa fa-angle-right"></i>', 'aali' ),ENT_QUOTES),
              ));  ?>
                </li>
          </ul>
     </nav>
</div>                                       
<?php endif; ?>
<!-- END PAGINATION --> 
</div>
<?php endif; ?>     
<?php
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
$aria_req = ( $req ? " aria-required='true'" : '' );
$comment_args = array(
        'id_form' => 'contact_form',        
        'class_form' => 'contact_form',                         
        'title_reply'=> wp_specialchars_decode(esc_html__( 'Leave A Comment', 'aali' ),ENT_QUOTES),
        'fields' => apply_filters( 'comment_form_default_fields', array(
              
            'author' => '
                        <div class="input_list">
                          <input type="text" name="author" class="form-control" placeholder="'.esc_attr__('Your Name ', 'aali').'" required="'.esc_attr__('required', 'aali').'" data-error="'.esc_attr__('Name is required.', 'aali').'">
                         </div>',
            'email' => '<div class="input_list">
                             <input type="email" name="email" class="form-control" placeholder="'.esc_attr__('Your Email', 'aali').'" required="'.esc_attr__('required', 'aali').'" data-error="'.esc_attr__('Valid email is required.', 'aali').'">
                             <div class="help-block with-errors"></div>
                        </div>',
            'phone' => '<div class="input_list">
                             <input type="text" name="phone" class="form-control" placeholder="'.esc_attr__('Your Phone', 'aali').'" required="'.esc_attr__('required', 'aali').'" data-error="'.esc_attr__('Valid email is required.', 'aali').'">
                             <div class="help-block with-errors"></div>
                        </div>',
        ) ),   
          'comment_field' => '<div class="message_area">
                                <textarea id="message"  name="comment" class="form-control" placeholder="'.esc_attr__('Write A Comment', 'aali').'" required="'.esc_attr__('required', 'aali').'" data-error="'.esc_attr__('Please,leave us a message.', 'aali').'"></textarea>
                                  <div class="help-block with-errors"></div>
                              </div>
                              ', 
                
         'label_submit' => esc_html__( 'Post A Comment', 'aali' ),
         'comment_notes_before' => '',
         'comment_notes_after' => '',               
)
?>
<div class="aali_tm_comment_filed">
    <div class="fields">
        <?php if ( comments_open() ) : ?>
            <?php comment_form($comment_args); ?>
        <?php endif; ?> 
    </div>
</div>