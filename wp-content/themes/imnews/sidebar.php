<?php
/**
 * The sidebar containing the main widget area
 *
 * 
 * @package imnews
 */

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
	return;
} ?>
<div class="col-sm-3">
    <div class="side-area">
    	<?php dynamic_sidebar( 'main-sidebar' ); ?>
    </div>
</div>