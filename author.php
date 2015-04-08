<?php get_header(); ?>


<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <article class="news news-list">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="entry">
<?php the_post_thumbnail(); ?>

<a title="" class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
     <p class="entry-date"><span class="info"><?php the_time('j F Y'); ?> - Autor: <?php the_author(); ?> - <?php comments_popup_link('Brak komentarzy', '1 Komentarz',      'Komentarzy: %'); ?></span></p>
<a href="<?php the_permalink(); ?>">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'single-post', array('class' => 'entry-thumb') ); } ?>
</a>
<?php the_content('Czytaj więcej &rarr;'); ?>
<div class="clear"></div>
</div> <!-- end entry -->
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<div class=”commentsblock”>
<?php comments_template(); ?>
</div>

          <div class="clearfix"></div>
        </article>

      </div>
<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>