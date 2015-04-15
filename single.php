<?php get_header(); ?>
<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 col-lg-push-2 col-md-push-2 col-sm-push-3">
  <div class="news news-list">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="entry" itemscope itemtype='http://schema.org/Article'>
      <div class="row">
        <div class="col-lg-12">
        <?php if ( has_post_thumbnail() ) the_post_thumbnail('promo-size', array('class' => 'thumbnail img-responsive', 'itemprop' => 'thumbnailUrl')); ?>
        <h1 class="article-h1" itemprop='headline'><?php the_title(); ?></h1>
        </div>
      </div>
      <hr>
      <div itemprop='articleBody'>
        <?php the_content('Czytaj więcej &rarr;'); ?>
      </div>
      <hr>
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
        <?php
          $posttags = get_the_tags();
          if ($posttags)
              foreach($posttags as $tag)
                  echo "<a rel='tag' href='".get_tag_link($tag->term_id)."'><h2 class='btn btn-primary btn-xs tagBtn'>".$tag->name."</h2></a>";
        ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="art-info">
            <?php the_time('j F Y'); ?><br>
            <?php the_author(); ?>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <?php echo "<div class='news-avatar' >".officeBase64Thumb($post->post_author, "AV-64")."</div>"; ?>
          <div class="clearfix"></div>
        </div>
      </div>
      <hr>
      <div class='visible-lg'>
        <script async data-key="6C21-308E-EA6F-82FE-1YE5oK">
          var __nc_widgets = __nc_widgets || [];
          var __nc_j = __nc_j || null;

                  __nc_widgets.push(['6C21-308E-EA6F-82FE-1YE5oK', 'mojewronki.pl', 'carousel', 2, 1]);

                  (function() {
                    var __nc = document.createElement('script'); __nc.type = 'text/javascript'; __nc.async = true; __nc.id = 'Nextclick_Manager';
            __nc.src = '//nextclick.pl/widget/widget.carousel.2.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(__nc, s);
          })();
        </script>
      </div>
      <?php echo do_shortcode('[fbcomments url="'.get_permalink().'" width="100%" count="off" num="6"]'); ?>
      <div class="clear"></div>
    </div> <!-- end entry -->
    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
    <div class="clearfix"></div>
  </div>
</div>
<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>