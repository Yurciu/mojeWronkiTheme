<!doctype html>
<?php tha_html_before(); ?>
<html class="no-js" lang='pl_PL' xmlns:fb='http://ogp.me/ns/fb#' prefix='og: http://ogp.me/ns#'>
<head>
    <?php tha_head_top(); ?>
    <meta charset="<?php echo bloginfo('charset');?>">
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <?php generalSEOElements(); ?>
    <?php SEOheader(); ?>

    <link rel="stylesheet" href="//mojewronki.pl/wp-content/themes/wronczanie/style.css" type="text/css" />
    <link rel="icon"  href="//mojewronki.pl/favicon.ico" />

    <script type="application/ld+json">
        { "@context": "http://schema.org", "@type": "WebSite", "url": "http://mojewronki.pl/", "potentialAction": { "@type": "SearchAction", "target": "http://mojewronki.pl/?s={search_term_string}", "query-input": "required name=search_term_string" }}
    </script>
    <?php tha_head_bottom(); ?>
    <?php wp_head(); ?>

</head>
<body class='container spraybg' itemscope itemtype="http://schema.org/WebPage">
<?php tha_body_top();?>
<?php tha_header_before(); ?>
<div class='row header text-center' id='header'>
    <?php //tha_header_top(); ?>
    <div class='col-lg-2 col-md-12 col-sm-12 col-xs-12 '>
        <a href="<?php bloginfo( 'home' ); ?>" title="mojeWronki/pl- Lokalny Portal Informacyjny" class="logo">
        <img height='128px' width='128px' src="http://s.mojewronki.pl/2015/01/Lokalny-portal-informacyjny.png" alt="<?php wp_title(); ?>
        <?php bloginfo(    'description'); ?>" itemprop='primaryImageOfPage'/></a>
    </div>

  <div class='col-lg-1 hidden-md hidden-sm hidden-xs'></div>

    <?php if (is_active_sidebar('left_top_ad')) : ?>
    <div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 top-buffer-obiect'>
        <?php dynamic_sidebar('left_top_ad');?>
    </div>
    <?php endif;?>

    <?php if (is_active_sidebar('middle_top_ad')) : ?>
    <div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 top-buffer-obiect'>
        <?php dynamic_sidebar('middle_top_ad');?>
    </div>
    <?php endif;?>

    <?php if (is_active_sidebar('right_top_ad')) : ?>
    <div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 top-buffer-obiect'>
        <?php dynamic_sidebar('right_top_ad');?>
    </div>
    <?php endif;?>

  <?php tha_header_bottom(); ?>
</div>
<?php tha_header_after(); ?>

<div class="row hidden-xs hidden-print">
    <div class="col-lg-12 col-md-12 col-sm-12 top-buffer-obiect">
    <?php /* Primary navigation */
        wp_nav_menu( array(
            'menu' => 'top_menu',
            'depth' => 1,
            'container' => false,
            'menu_class' => 'nav nav-tabs',
            //Process nav menu using our custom nav walker
            'walker' => new wp_bootstrap_navwalker())
            );
    ?>
    </div>
</div>
<div class="row content">
