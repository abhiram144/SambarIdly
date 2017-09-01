<?php
/**
 * The template for displaying Comments.
 **/
if ( post_password_required() ) return; 
if ( have_comments() ): ?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="comment-area">
            <?php wp_list_comments(array('avatar_size' => 80,'status' => 'approve', 'style' => 'div', 'short_ping' => true,)); 
             the_comments_navigation(); ?>
        </div>
    </div>
</div>
<?php endif; 
if ( comments_open()) { ?>
<div class="row">
    <div class="col-md-12">
        <div class="comments-count">
            <h5><?php comments_number(); ?></h5>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 leave_form">
        <?php comment_form(); ?>
    </div>
</div>
<?php } 