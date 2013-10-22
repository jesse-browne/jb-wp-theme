<?php
/* Set often used urls in variable for re use */
$site_url =      get_site_url();
$template_url =  get_bloginfo('template_url');

/* Render home page */
if (is_home()) { 
    $args = array('posts_per_page' => 4);
    $posts = get_posts($args); ?>
    	            <!-- Main Heading -->
                    <h1>Web apps, browser games and thoughts</h1>
                    <!-- Tag Line -->
                    <h5>By Jesse Browne, web application developer</h5>
                    <!-- Container with description and most recent activity -->
                    <div id="big-container">
                        <div class="big-container-body">
                            Aside from working on <a href="http://www.greenpag.es/">greenpag.es</a>, 
                            Jesse is learning to make games for the browser, 
                            begrudgingly finding out more about server administration than he 
                            ever intended, learning to illustrate and happily 
                            experimenting with different Python frameworks. 
                        </div>
                        <div class="big-container-body"> <?php 
                        foreach ($posts as $post) {
                            global $post;
                            setup_postdata($post);
                            $link = get_permalink($post->ID); ?>
                            <div class="small-container">
                                <div class="small-container-title">
                                    <a href="<?php echo $link; ?>">
                                        <span><?php echo $post->post_title; ?></span>
                                    </a>   
                                </div>
                                <div class="small-container-body">
                                    <div class="small-container-image">
                                        <?php get_index_post_image($post); ?>
                                    </div>                  
                                </div> 
                            </div> <?php 
                        } ?>
                        </div>                              
                    </div> <?php 
}

/* Render list view of articles and projects */
if ( (!is_home()) && (!is_single()) ) {
    if ( have_posts() ) {
        global $post;
		while ( have_posts() ) {
			the_post();
			default_loop_title();
			get_index_post_image($post);
		} 
	}
}

/* Render single pages */
if (is_single()) {
    default_single();
}

if (is_page()) {
    default_single();
}

function default_single() {
    if ( have_posts() ) {
	    global $post; 
	    the_post();
	    get_single_post_image($post); ?>
			        <div class="page-container-text"> <?php
        if (!is_page()) {
	        default_single_title();
        }
        the_content(); 
        if (!is_page()) {
	        get_my_comments();
        }        
        ?>
			        </div> <?php
    }
}

/* Get titles, images and comments */
function default_loop_title() {
	/**
	 * Print title of post to product index page
	 * with link to product page
	 */
    global $post;
	$title = $post->post_title;
	$link = get_permalink($post->ID);
	?><h1><a href="<?php  echo $link ?>" title="<?php $title ?>" rel="bookmark"><?php echo $title; ?></a></h1><?php 
}

function default_single_title() {
	/**
	 * Print title of post
	 */
    global $post;
	$title = esc_attr(get_the_title($post->ID)); ?>
	
	<h1><?php echo $title; ?></h1> <?php 
}

function get_index_post_image($post) {
    global $post;
    if ( has_post_thumbnail() ) {
        $link = get_permalink($post->ID); ?>
        <a href="<?php echo $link; ?>">
        <?php the_post_thumbnail('jb_custom'); ?>
		</a> <?php
    }
}

function get_single_post_image($post) { 
    global $post; ?>
		            <div class="page-container-image">
	                    <?php the_post_thumbnail(); ?>
	                </div> <?php
}

function get_my_comments() { 
	/**
	 * Render Livefyre comments
	 */
	
	$category = ( !is_home() ) ? get_product_category() : '';
	
	if ( ($category == 'Projects') || ($category == 'Articles') ) { ?>
		<!-- START: Livefyre Embed -->
		<div id="livefyre-comments"></div>
		<script type="text/javascript" src="http://zor.livefyre.com/wjs/v3.0/javascripts/livefyre.js"></script>
		<script type="text/javascript">
		(function () {
		    var articleId = fyre.conv.load.makeArticleId(null);
		    fyre.conv.load({}, [{
		        el: 'livefyre-comments',
		        network: "livefyre.com",
		        siteId: "345600",
		        articleId: articleId,
		        signed: false,
		        collectionMeta: {
		            articleId: articleId,
		            url: fyre.conv.load.makeCollectionUrl(),
		        }
		    }], function() {});
		}());
		</script>
		<!-- END: Livefyre Embed --> <?php 
	}
}
?>
