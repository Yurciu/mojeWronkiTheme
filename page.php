<?php
if ($pageUser->isMobile() || $pageUser->isTablet() ) get_header('mobile');
    else get_header();
?>

<?php tha_content_before() ?>
<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <div class="news news-list">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="entry">
                <?php the_post_thumbnail(); ?>
                <h1 class='text-center'><?php the_title(); ?></h1>
                <hr>
                <a href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'single-post', array('class' => 'entry-thumb') ); } ?>
                </a>
                <?php the_content('Czytaj więcej &rarr;'); ?>
                <div class="clear"></div>
            </div>
            <?php endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
          <div class="clearfix"></div>
        </div>
</div>
<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>