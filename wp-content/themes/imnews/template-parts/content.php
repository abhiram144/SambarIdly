<div class="container" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="row main-row">
        <div class="col-sm-9">    
            <div class="news-posts">
                <div class="other-news">
                    <?php if ( have_posts() ) :       
                    while ( have_posts() ) : the_post(); ?>
                    <div class="othernews-post">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="label-img">
                                            <div class="othernews-post-image">
                                                <a href="<?php the_permalink(); ?>">
                                                   <?php if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail('imnews-thumbnail-image');
                                                    }else { ?>
                                                        <img src="<?php echo esc_url(get_template_directory_uri().'/images/default-260x165.png'); ?>" />
                                                    <?php } ?>
                                                </a>
                                            </div>
                                            <?php $imnews_categories = get_the_category(); ?>
                                            <div class="label">
                                                <div class="row label-row">
                                                    <div class="col-sm-9 col-xs-9 label-column">
                                                        <span><?php if(isset($imnews_categories[0]->name)){ echo esc_html($imnews_categories[0]->name); } ?></span>
                                                    </div>
                                                    <?php $imnews_num_comments = get_comments_number();
                                                    if($imnews_num_comments != 0){ ?>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <div class="comments">
                                                            <i class="fa fa-comments  comments-icon"></i>
                                                            <span class="comments-no" ><?php if(isset($imnews_num_comments)){ echo esc_html($imnews_num_comments); } ?></span>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="othernews-post-details">
                                            <h4 class="othernews-post-title"><b><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></b></h4>
                                            <div class="othernews-post-news">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                <?php endwhile;
                endif; ?>
                </div>
                <div class="more-info">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php the_posts_pagination( array(
                                'mid_size' => 10,
                                'Previous' => esc_html__( 'Back', 'imnews' ),
                                'Next' => esc_html__( 'Onward', 'imnews' ),
                            ) ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>