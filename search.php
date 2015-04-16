<?php get_header(); ?>

<?php

    global $query_string;

    $query_args = explode("&", $query_string);
    $search_query = array();

    foreach($query_args as $key => $string) {
        $query_split = explode("=", $string);
        $search_query[$query_split[0]] = urldecode($query_split[1]);
    }

    $search = new WP_Query($search_query);

?>

<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="news news-list">
        <h1 class='text-center'>Wyniki wyszukiwania</h1>
        <small class='text-center'>Wyszukiwana fraza <em itemprop='specialty'><?php echo get_search_query()."</em> została odnaleziona ";
        if ($wp_query->found_posts > 1) echo $wp_query->found_posts." razy.</small>";
        else echo $wp_query->found_posts." raz.</small>";
        ?>
        <hr>

        <ul class='menu text-center'>
        <?php if (have_posts()) : while (have_posts()) : the_post();?>
            <li class='menu-item' id="post-<?php the_ID(); ?>">
                <a itemprop='relatedLink' href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </li>
        <?php endwhile; ?>
        <?php wpex_pagination(); ?>
        <?php else : ?>
        <h4>Przykro nam, ale nie mamy tego, czego szukasz. Może nazwij to inaczej?</h4>
        <?php get_search_form(); ?>
        <?php endif; ?>
</div>
</ul>
</div>
<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>