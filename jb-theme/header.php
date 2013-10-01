<!DOCTYPE html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<?php 
		global $post;
		$site_url =      get_site_url();
        $template_url =  get_bloginfo('template_url');
	    $title =         ( is_home() || is_page() ) ? 'Jesse Browne' : $post->post_title . ' | Jesse Browne';
	    $description =   'Jesse Browne | Web Application Developer';
	    $category =      ( !is_home() ) ? get_product_category() : '';
		?>

        <title><?php echo $title; ?></title>
        
        <!-- Place favicon.ico and apple-touch-icon.png here -->
        
        <!-- Load style sheets, webfonts and media queries  -->
        <link rel="stylesheet" href="<?php echo $template_url;?>/template/css/normalize.css">
        <link rel="stylesheet" href="<?php echo $template_url;?>/template/css/main.css">
        <link rel="stylesheet" href="<?php echo $template_url;?>/template/css/webfonts.css">
        
        <script src="<?php echo $template_url;?>/template/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">
                You are using an <strong>outdated</strong> browser. 
                Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.
            </p>
        <![endif]-->
        <div class="wrapper">
            <header>
                <!-- Nest all visibile content in 'pos' divs, to control pretty positioning with min-width and side margins -->
                <div class="pos">
                    <nav id="logo">
                        <a href="<?php echo $site_url; ?>">jb</a>
                    </nav>
                    <nav class="header-nav-bar">
                        <ul>
                            <li <?php if ($category == 'Projects') { echo 'id="active"'; } ?>><a href="<?php echo $site_url; ?>/projects/">Projects</a></li>
                            <li <?php if ($category == 'Articles') { echo 'id="active"'; } ?>><a href="<?php echo $site_url; ?>/articles/">Articles</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
            <div class="pos"> 
                <div class="page-container">