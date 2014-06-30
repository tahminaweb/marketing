<?php

global $page_object, $wpdb, $current_user, $template;
$page = (object) maybe_unserialize( $page_object );
//print_r($page);
//print_r($page);
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
            .signup {
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
            label,
            .radio label {
                display: block;
                padding-left: 7px;
            }
            .radio label {
                font-weight: normal;
            }
            .radio {
                border-top: 1px dashed #bdbbde;
                border-bottom: 1px dashed #bddbde;
                padding-top: 5px;
                padding-bottom: 5px;
                background-color: #f5f5f5;
                font-weight: bold;
            }
            .txt {
                padding: 0 7px;
            }
            .checkbox label {
                display: block;
            }
            .button {
                text-align: center;
                margin-top: 20px;
            }
            fieldset > p {
                padding: 0 7px;
            }

        </style>
    </head>
    <body class="narrow <?php echo $device; ?> marketing landing-page <?php echo get_query_var('marketing_page_id'); ?>">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="main" class="main main-content">
            <div class="bodyframe">

                <div class="header header-container">
                    <div class="homelink">
                        <img src="<?php echo $page->attachments['logo'][0]; ?>" class="branding logo">
                    </div>
                    <div class="alt">
                        <h1><?php echo $page->seo['title']; ?></h1>
                    </div>
                    <div class="blurb">
                        <h2><?php echo $page->seo['title']; ?></h2>
                    </div>
                    <div class="bgimg">
                        <img src="<?php echo $page->attachments['bgimg'][0]; ?>" class="header-background-image">
                    </div>
                </div>

                <div class="content">
                    <div class="col-md-12 col-xs-12">
                        <h3><?php echo $page->seo['description']; ?></h3>
                        <?php
                        $content = apply_filters('the_content', $page->page['content']);
                        $content = stripslashes($content);
                        echo $content;
                        ?>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="success">Your details have been successfully saved</div>
                        <div class="error">Your details have NOT been saved!</div>
                        <div class="signup col-md-10" style="float:none;margin-left:auto;margin-right:auto;text-align:left;">
                            <?php get_template_part('marketing/form'); ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="footer">
                    <div class="contact">
                        <?php echo stripslashes( apply_filters( 'the_content', $page->page['footer'] ) ); ?>
                    </div>
                    <div id="follow">
                        <h4>Network With Us.</h4>
                        <ul>
                            <li class="twitter"><a href="http://twitter.com/<?php echo $page->social['tw']; ?>"></a></li>
                            <li class="linkedin"><a href="http://www.linkedin.com/<?php echo $page->social['li']; ?>"></a></li>
                            <li class="facebook"><a href="http://www.facebook.com/<?php echo $page->social['fb']; ?>"></a></li>
                            <li class="youtube"><a href="http://www.youtube.com/<?php echo $page->social['yt']; ?>"></a></li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="copyright">
                            <p><?php echo $page->footer['copyright_note']; ?></p>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
