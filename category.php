<?php
if ($pageUser->isMobile() || $pageUser->isTablet() ) get_header('mobile');
    else get_header();
?>


<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <div class="news news-list">
        <h1 class='text-center'><?php single_cat_title( '', true );?></h1> <hr />

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class='row'>
            <div class="col-lg-3 col-md-3 col-sm-5">
            <?php echo the_post_thumbnail('thumbnail', array('class' => 'thumbnail pull-left img-responsive') ); ?>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-7">
            <h2>
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h2>
            <?php the_time('j F Y') ?>
        </div>

        <div class='clearfix'></div>
        <hr>
</div>




<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php wpex_pagination(); ?>
          <div class="clearfix"></div>
        </div>

      </div>
<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>
<?php
if ($pageUser->isMobile() || $pageUser->isTablet() ) get_footer('mobile');
    else get_footer();
?>