<?php
/**
 * The template for displaying the footer
 *
 */
 if(get_theme_mod('hide_footer_widget_bar',1) != 0): ?>
 <footer class="widget-footer">
    <div class="container">
      <div class="widget-footer-row">
        <div class="row">
          <?php if(is_active_sidebar('footer-1')): ?>
            <div class="col-md-<?php echo esc_attr(get_theme_mod('footer_widget_style')); ?> col-xs-12"><?php dynamic_sidebar('footer-1'); ?></div>
          <?php endif ?>
          <?php if(is_active_sidebar('footer-2')): ?>
            <div class="col-md-<?php echo esc_attr(get_theme_mod('footer_widget_style')); ?> col-xs-12"><?php dynamic_sidebar('footer-2'); ?></div>
          <?php endif ?>
          <?php if(is_active_sidebar('footer-3')): ?>
            <div class="col-md-<?php echo esc_attr(get_theme_mod('footer_widget_style')); ?> col-xs-12"><?php dynamic_sidebar('footer-3'); ?></div>
          <?php endif ?>
          <?php if(is_active_sidebar('footer-4')): ?>
            <div class="col-md-<?php echo esc_attr(get_theme_mod('footer_widget_style')); ?> col-xs-12"><?php dynamic_sidebar('footer-4'); ?></div>
          <?php endif ?>
        </div>
      </div>
    </div>
</footer>
<?php endif; ?>
<footer class="menu-footer">
  <div class="container">
    <div class="menu-footer-row">
      <div class="row">
        <div class="col-sm-9 col-xs-12">
          <nav class="navbar">
            <?php if (has_nav_menu('footer-menu')) {
              $imnews_defaults = array( 'theme_location' => 'footer-menu', 'menu_class' => 'nav navbar-nav menu-footer-links' );
              wp_nav_menu($imnews_defaults);
            } ?>
          </nav>
        </div>
        <div class="col-sm-3">
            <div class="footer-copyrights">
              <?php $copyrights = get_theme_mod('footer_copyrights');
              if($copyrights){  
                echo wp_kses_post(get_theme_mod('footer_copyrights')).'<br>';  
              }  ?>
              <p><?php esc_html_e( 'Powered By ', 'imnews'); ?><a href="<?php echo esc_url('https://vaultthemes.com/wordpress-themes/imnews/'); ?>"><?php esc_html_e('IMNews WordPress Theme','imnews'); ?></a></p>
              
            </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?> 
</body>
</html>