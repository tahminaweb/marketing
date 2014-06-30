<?php

global $page_object, $wpdb, $current_user, $template;
$page = (object) maybe_unserialize( $page_object );
$screen = get_template_directory_uri() . '/marketing/css/stylesheets/screen.css';
$css_dir = get_template_directory_uri() . '/marketing/land/'.$template.'/css/';
$jsdir = get_template_directory_uri() . '/marketing/land/'.$template.'/js/';
$boot = get_template_directory_uri() . '/marketing/land/'.$template.'/bootstrap/';
$imgdir = get_template_directory_uri() . '/marketing/css/stylesheets/img/';

if( function_exists( 'is_mobile' ) && function_exists( 'is_iphone' ) ) {
  $device = ( ( is_mobile() || is_iphone() ) ? 'mobile' : 'desktop' );
}
else {
  $device = 'desktop';
}

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo stripslashes($page->page['title']); ?></title>
        <meta name="description" content="<?php echo $page->seo['description']; ?>">
        <meta name="keywords" content="<?php echo $page->seo['keywords']; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php echo $css_dir; ?>normalize.css">
        <link rel="stylesheet" href="<?php echo $css_dir; ?>main.css">
        <link rel="stylesheet" href="<?php echo $screen; ?>">
        <link rel="stylesheet" href="<?php echo $boot; ?>css/bootstrap.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="<?php echo $boot; ?>js/bootstrap.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/javascripts/ketchup/jquery.ketchup.all.min.js"></script>
        <script src="<?php echo $jsdir; ?>plugins.js"></script>
        <script src="<?php echo $jsdir; ?>main.js"></script>
        <script src="<?php echo $jsdir; ?>vendor/modernizr-2.6.2.min.js"></script>
        <!-- Custom designs -->
        <style type="text/css">
            /* Override default template style */
            body {
                background: #<?php echo $page->page['bcolor']; ?>!important;
                color: #<?php echo $page->page['tcolor']; ?>!important;
            }
            /* HEADER */
            .header-container {
                background: #<?php echo $page->header['bg']; ?>!important;
                border-bottom: <?php echo $page->header['border']; ?>px solid #<?php echo $page->header['bcolor']; ?>!important;
                color: #<?php echo $page->header['text']; ?>!important;
            }
            .header-image {
                border-bottom: 2px solid #<?php echo $page->header['bcolor']; ?>!important;
            }
            /* SIDEBAR */
            aside#sidebar {
                background: #<?php echo $page->sidebar['bg']; ?>!important;
                color: #<?php echo $page->sidebar['text']; ?>!important;
                border-top: <?php echo $page->sidebar['border']; ?>px solid #<?php echo $page->sidebar['bcolor']; ?>!important;
            }
            /* FOOTER */
            footer#footer .footer-wrap {
                background: #<?php echo $page->footer['bg']; ?>!important;
                color: #<?php echo $page->footer['text']; ?>!important;
                border-top: <?php echo $page->footer['border']; ?>px solid #<?php echo $page->footer['bcolor']; ?>!important;
            }
        </style>
    </head>
    <body class="marketing landing-page <?php echo get_query_var('marketing_page_id'); ?> <?php echo $device; ?>">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix container">
                <h1 class="page-title logo stage-branging">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo $page->attachments['logo'][0]; ?>" class="branding logo">
                    </a>
                    <span class="page-description" style="text-indent:-9999px;display:inline-block;"><?php echo $page->seo['title']; ?></span>
                </h1>
            </header>
        </div>

        <div class="header-image">
            <div class="header-image-inner white">
                <img src="<?php echo $page->attachments['bgimg'][0]; ?>">
            </div>
        </div>

        <div id="breadcrumbs" class="container">
            <div class="breadcrumbs-wrapper wrapper">
                <ul class="breadcrumbs clearfix">
                    <li class="red first breadcrumb col-md-3 col-xs-6 alpha">
                        <div class="breadcrumb-wrapper hidden-xs">
                            <strong class="uppercase">Step 1</strong> - <span>Enter your details below</span>
                        </div>
                        <div class="breadcrumb-wrapper hidden-md hidden-lg">
                            <strong>Fill your details</strong>
                        </div>
                    </li>
                    <li class="black second breadcrumb col-md-2 col-xs-6 gamma">
                        <div class="breadcrumb-wrapper hidden-xs">
                            <strong class="uppercase">Step 2</strong> - <span>Click Submit</span>
                        </div>
                        <div class="breadcrumb-wrapper hidden-md hidden-lg">
                            <strong>Click submit</strong>
                        </div>
                    </li>
                    <li class="lightgray third breadcrumb col-md-4 col-xs-6 delta">
                        <div class="breadcrumb-wrapper hidden-xs">
                            <strong class="uppercase">Step 3</strong> - <span>Receive an email with your password</span>
                        </div>
                        <div class="breadcrumb-wrapper hidden-md hidden-lg">
                            <strong>Get password</strong>
                        </div>
                    </li>
                    <li class="white fourth breadcrumb col-md-3 col-xs-6 omega">
                        <div class="breadcrumb-wrapper hidden-xs">
                            <strong class="uppercase">Step 4</strong> - <span>Access the App</span>
                        </div>
                        <div class="breadcrumb-wrapper hidden-md hidden-lg">
                            <strong>Access the App</strong>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Add your site or application content here -->
        <div class="clearfix main-container container" id="main">
            <div class="main-content-wrapper col-md-8 col-xs-12">
                <div class="wrap clearfix bottom-shadow">
                    <div class="success">Your details have been successfully saved</div>
                    <div class="error">Your details have NOT been saved!</div>
                    <div class="col-md-12 col-xs-12 page-content main wrapper">
                        <?php echo stripslashes($page->page['content']); ?>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <?php get_template_part('marketing/form'); ?>
                    </div>
                    <div class="foot col-md-12 col-xs-12">
                        <h2>Looking for your ideal role?</h1>
                        <a href="http://castings.thestage.co.uk/?utm_source=studentslanding&amp;utm_medium=banner&amp;utm_content=home&amp;utm_campaign=castings">
                            <img src="<?php echo $imgdir; ?>castings-register.png" class="img-responsive" alt="Advert" id="advertImg">
                        </a>
                    </div>
                </div><!-- .wrap -->
            </div><!-- .main-content-wrapper -->
            <aside id="sidebar" class="sidebar col-md-4 col-xs-12 bottom-shadow">
                <div class="sidebar-inner">
                    <?php echo stripslashes($page->page['sidebar']); ?>
                </div>
            </aside>
        </div>

        <footer id="footer" class="container nofloat">
            <div class="footer-inner">
                <div class="footer-wrap"><?php echo stripslashes($page->page['footer']); ?></span>
            </div>
        </footer>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-78953-1');ga('send','pageview');
        </script>
    </body>
</html>
