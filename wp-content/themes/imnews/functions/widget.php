<?php 
function imnews_register_custom_widgets() {
    register_widget( 'imnews_widget_recent_posts' );
    register_widget( 'IMNews_Categories_Custom' );
}
add_action( 'widgets_init', 'imnews_register_custom_widgets' );
class imnews_widget_recent_posts extends WP_Widget {
    function __construct() {
        $widget_ops = array('classname' => 'imnews_widget_recent_posts', 'description' => esc_html__( "The most recent posts on your site", 'imnews') );
        parent::__construct('imnews-recent-posts', esc_html__('IMNews Recent Posts', 'imnews'), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';
        add_action( 'save_post', array($this, 'imnews_flush_widget_cache') );
        add_action( 'deleted_post', array($this, 'imnews_flush_widget_cache') );
        add_action( 'switch_theme', array($this, 'imnews_flush_widget_cache') );
    }
    function widget($args, $instance) {
        $imnews_cache = wp_cache_get('imnews_widget_recent_posts', 'widget');
        if ( !is_array($imnews_cache) )
            $imnews_cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $imnews_cache[ $args['widget_id'] ] ) ) {
            echo $imnews_cache[ $args['widget_id'] ];
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts', 'imnews' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
        if ( ! $number )
            $number = 10;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        $imnews_r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($imnews_r->have_posts()) :
        echo $args['before_widget'];
        if ( $title ) echo $args['before_title'] . $title . $args['after_title']; ?>
        <?php while ( $imnews_r->have_posts() ) : $imnews_r->the_post(); ?>
            <div class="sidenews-post">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="row sidenews-updates">
                        <div class="col-sm-5 col-xs-4">
                            <div class="sidenews-post-image">
                                <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail();
                                }else{?>
                                    <img class="img-responsive" src="<?php echo esc_url(get_template_directory_uri().'/images/default-260x165.png'); ?>" />
                            <?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-7 col-xs-8">
                            <div class="sidenews-post-details">
                                <p class="sidenews-post-date"><?php imnews_side_meta(); ?></p>
                                <h5 class="sidenews-post-heading"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php echo $args['after_widget'];
        wp_reset_postdata();
        endif;
        $imnews_cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('imnews_widget_recent_posts', $imnews_cache, 'widget');
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
        $instance['show_date'] = (bool) $new_instance['show_date'];
        $this->imnews_flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['imnews_widget_recent_posts']) )
            delete_option('imnews_widget_recent_posts');
        return $instance;
    }
    function imnews_flush_widget_cache() {
        wp_cache_delete('imnews_widget_recent_posts', 'widget');
    }
    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false; ?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:','imnews' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:', 'imnews' ); ?></label>
        <input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        <p><input class="checkbox" type="checkbox" <?php checked( esc_attr($show_date) ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
        <label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php esc_html_e( 'Display post date?', 'imnews' ); ?></label></p>
<?php }
}
/**
 * Duplicated and tweaked WP core Categories widget class
 */
class IMNews_Categories_Custom extends WP_Widget_Categories {
  function __construct() {
    $widget_ops = array( 'classname' => 'widget_categories widget_categories_custom', 'description' => esc_html__( "A list of categories, with slightly tweaked output.", 'imnews'  ) );
    parent::__construct( 'imnews-categories-custom', esc_html__( 'IMNews Categories', 'imnews' ), $widget_ops );
  }
  function widget( $args, $instance ) {
    extract( $args );

    $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( 'Categories', 'imnews'  ) : $instance['title'], $instance, $this->id_base);

    echo $args['before_widget'];
    if ( $title )
      echo $args['before_title'] . $title . $args['after_title'];
    ?>
    <ul class="categories">
    <?php
      $pattern = '#<li([^>]*)><a([^>]*)>(.*?)<\/a>\s*\(([0-9]*)\)\s*<\/li>#i';  // removed ( and )
      $replacement = '<li$1><a$2>$3<span class="news-numbers">$4</span></a>'; // give cat name and count a span, wrap it all in a link
      $subject      = wp_list_categories( 'echo=0&orderby=name&exclude=&title_li=&depth=1&show_count=1' );    
      echo preg_replace( $pattern, $replacement, $subject );?>
    </ul>
    <?php
    echo $args['after_widget'];
  }
function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = sanitize_text_field( $new_instance['title'] );
    $instance['count'] = $new_instance['count'];
    $instance['hierarchical'] = 0;
    $instance['dropdown'] = 0;
        return $instance;
  }
function form( $instance ) {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
    $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
    $count = ( ! empty( $instance['count'] ) ) ? true : false;
    $hierarchical = false;
    $dropdown = false; ?>
    <p><label for="<?php echo esc_attr($this->get_field_id('title', 'imnews' )); ?>"><?php _e( 'Title:', 'imnews'  ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo $title; ?>" /></p>
    <input type="checkbox" class="checkbox" id="<?php echo esc_attr($this->get_field_id('count')); ?>" name="<?php echo esc_attr($this->get_field_name('count')); ?>"<?php checked( esc_attr($count) ); ?> />
    <label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php _e( 'Show post counts', 'imnews'  ); ?></label><br />
<?php
  }
}