<?php
/*
 * Main Sidebar
 */
function imnews_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Main Sidebar', 'imnews'),
        'id' => 'main-sidebar',
        'description' => esc_html__('Main sidebar that appears on the right.', 'imnews'),
        'before_widget' => '<aside class="side-area-post">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="side-area-heading"><h4><b>',
        'after_title' => '</b></h4></div>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 1', 'imnews'),
        'id' => 'footer-1',
        'description' => esc_html__('Main sidebar that appears on the right.', 'imnews'),
        'before_widget' => '<div class="widget-footer-heading">',
        'after_widget' => '</div>',
        'before_title' => '<h4><b>',
        'after_title' => '</b></h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 2', 'imnews'),
        'id' => 'footer-2',
        'description' => esc_html__('Main sidebar that appears on the right.', 'imnews'),
        'before_widget' => '<div class="widget-footer-heading">',
        'after_widget' => '</div>',
        'before_title' => '<h4><b>',
        'after_title' => '</b></h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 3', 'imnews'),
        'id' => 'footer-3',
        'description' => esc_html__('Main sidebar that appears on the right.', 'imnews'),
        'before_widget' => '<div class="widget-footer-heading">',
        'after_widget' => '</div>',
        'before_title' => '<h4><b>',
        'after_title' => '</b></h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 4', 'imnews'),
        'id' => 'footer-4',
        'description' => esc_html__('Main sidebar that appears on the right.', 'imnews'),
        'before_widget' => '<div class="widget-footer-heading">',
        'after_widget' => '</div>',
        'before_title' => '<h4><b>',
        'after_title' => '</b></h4>',
    ));
}
add_action('widgets_init', 'imnews_widgets_init');

function imnews_single_meta() {
    $imnews_categories_list = get_the_category_list(', ','');
    $imnews_tags_list = get_the_tag_list('Tags: ',', ','');
    $imnews_author= ucfirst(get_the_author());
    $imnews_author_url= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
    $imnews_comments = wp_count_comments(get_the_ID());     
    $imnews_date = sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date()));?>   
    <ul>
        <li><?php esc_html_e('By :', 'imnews'); ?><a href="<?php echo $imnews_author_url; ?>" rel="tag"><?php echo ' '.$imnews_author; ?></a></li>
        <li><?php echo $imnews_date; ?></li>
        <li><?php esc_html_e('Category :','imnews'); echo ' '.$imnews_categories_list; ?></li>
        <li><?php echo ' '.$imnews_tags_list; ?></li>
    </ul>
<?php }
function imnews_side_meta() {
    $imnews_author= ucfirst(get_the_author());
    $imnews_author_url= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
    $imnews_date = sprintf('<time datetime="%1$s">%2$s</time>', get_the_date('c'), get_the_date('F d , Y'));
    echo $imnews_date; 
}