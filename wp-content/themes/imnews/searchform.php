<?php
/**
 * Template for displaying search forms in Theme
 **/ ?>
<aside class="side-area-post">
	<div class="search-box">
		<div class="row">
			<div class="col-sm-12">
    			<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
	    			<div class="input-group search-box-input">
		    			<input type="text" value="<?php echo esc_attr(get_search_query()); ?>" name="s" id="s" class="form-control search-box-form" placeholder="<?php echo esc_attr__('Search','imnews'); ?>" />
		    			<span class="input-group-btn search-button-span">
		    				<button class="btn btn-default search-button" type="submit"><i class="fa fa-search"></i></button>
						</span>
					</div>	
				</form>	
			</div>
		</div>		
	</div>
</aside>