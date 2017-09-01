<?php
/**
 * Template part for displaying posts
 *
 *
 * @package imnews
 */ ?>
<div class="mainnews-post">
    <div class="row">
        <div class="col-sm-12">
            <div class="news-title">
        <?php if ( is_single() ) :
            the_title( '<h3><b>', '</b></h3>' );
        else :
            the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
        endif;
        if ( 'post' === get_post_type() ) : 
             imnews_single_meta(); 
        endif; ?>
            </div>
        </div>
    </div>      
    <?php if ( has_post_thumbnail() ) { ?>
    <div class="label-img">
        <div>
            <?php the_post_thumbnail('full',array('class' => 'img-responsive mainnews-image')); ?>
        </div>
        <?php $imnews_categories = get_the_category(); ?>
        <div class="label">
            <div class="row label-row">
                <div class="col-sm-11 col-xs-9 label-column no-padding">
                    <span class="mcat_name"><?php if(isset($imnews_categories[0]->name)){ echo esc_html($imnews_categories[0]->name); } ?></span>                     
                </div>
                <?php $imnews_num_comments = get_comments_number(); 
                if($imnews_num_comments != 0){ ?>
                <div class="col-sm-1 col-xs-3 no-padding">
                    <div class="comments">
                        <i class="fa fa-comments  comments-icon"></i>
                        <span class="comments-no" ><?php if(isset($imnews_num_comments)){ echo esc_html($imnews_num_comments); } ?></span>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="news-details">
        <div class="news">
            <?php the_content();
            wp_link_pages( array(
                    'before' => '<div class="page-links"><span class="page-links-title">' . esc_html( 'Pages:', 'imnews'.'</span>' ),
                    'after'  => '</div>',
                ) ); ?>
        </div>
    </div>
</div>

<div class="relatednews-post">
        <?php if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;  ?>
    <div class="row like-article similar-article">
        <div class="col-sm-12">
            <h4><b><?php esc_html_e('SIMILAR NEWS','imnews'); ?></b></h4>
        </div>
    </div>
    <div class="row">
        <?php $imnews_related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
        foreach( $imnews_related as $post ) {
        setup_postdata($post); ?>
        <div class="col-sm-4">
            <div class="relatednews-post-panel">
                <div class="label-img">
                    <div class="relatednews-post-image">
                        <a href="<?php echo esc_url(get_the_permalink()); ?>">
                        <?php if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('imnews-related-thumbnail');
                                }else { ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri().'/images/default-260x165.png'); ?>" />
                        <?php } ?>
                        </a>
                    </div>
                    <?php $imnews_categories = get_the_category(); ?>
                    <div class="label">
                        <div class="row label-row">
                            <div class="col-sm-9 col-xs-9 label-column no-padding">
                                <span><?php if(isset($imnews_categories[0]->name)){ echo esc_html($imnews_categories[0]->name); } ?></span>
                            </div>
                            <?php $imnews_num_comments = get_comments_number();
                            if($imnews_num_comments != 0){ ?>
                            <div class="col-sm-3 col-xs-3 no-padding">
                                <div class="comments">
                                    <i class="fa fa-comments comments-icon"></i>
                                        <span class="comments-no" ><?php if(isset($imnews_num_comments)){ echo esc_html($imnews_num_comments); } ?></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <div class="relatednews-post-details">
                <div class="relatednews-post-title">
                    <h5><b><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></b></h5>
                </div>
                <div class="relatednews-post-news">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        </div> 
    </div>
    <?php }
    wp_reset_postdata(); ?>
</div>