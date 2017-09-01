<form method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url() ); ?>" _lpchecked="1">
	<fieldset>
		<input type="text" name="s" id="s" value="<?php _e('Search this site...','publishable-mag'); ?>" onblur="if (this.value == '') {this.value = '<?php _e('Search this site...','publishable-mag'); ?>';}" onfocus="if (this.value == '<?php _e('Search this site...','publishable-mag'); ?>') {this.value = '';}" >
		<input type="submit" value="<?php esc_attr_e( 'Search', 'publishable-mag' ); ?>" />
	</fieldset>
</form>
