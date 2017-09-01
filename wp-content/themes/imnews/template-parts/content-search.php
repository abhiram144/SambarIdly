<div class="inline-dropdown">
    
        <div class="container">
            <div class="row row-margin">
            <div class="col-sm-12">
                <span class="title-sortnews"><b><?php printf( esc_html__( 'Search Results for: %s', 'imnews' ), '<span>' . get_search_query() . '</span>' ); ?></b></span>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row main-row">
        <div class="news-posts">    
            <div class="col-sm-9">
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
                                                    <?php if(isset($imnews_categories[0]->name)){ ?>
                                                    <div class="col-sm-9 col-xs-9 label-column">
                                                        <span><?php if(isset($imnews_categories[0]->name)){ echo esc_html($imnews_categories[0]->name); } ?></span>
                                                    </div>
                                                    <?php } 
                                                    $imnews_num_comments = get_comments_number();
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
                                            <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php esc_html_e('Read More','imnews'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                   </div>
                   <?php endwhile; 
                   endif; ?>
                   <div class="more-info">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php the_posts_pagination( array(
                                    'screen_reader_text' => ' ',
                                    'prev_text'          => esc_html__( 'Previous', 'imnews' ),
                                    'next_text'          => esc_html__( 'Next', 'imnews' ),
                                ) ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>