<?php

/* ======================================================================
	header.php
	Template for header content.
 * ====================================================================== */

?><!DOCTYPE html>
<!-- Conditional class for older versions of IE -->
<!--[if lt IE 9 & !IEMobile]><html class="ie" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8 | IEMobile]><!--><html <?php language_attributes(); ?>><!--<![endif]-->

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php if ( is_home () ) : ?><meta name="description" content="<?php bloginfo('description'); ?>"><?php endif; ?>

		<!-- Mobile Screen Resizing -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Force latest available IE rendering engine and Chrome Frame (if installed) -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- Favicons https://github.com/audreyr/favicon-cheat-sheet -->
		<link rel="shortcut icon" type="image/ico" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico">
		<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.png">
		<meta name="msapplication-TileColor" content="#FFFFFF">
		<meta name="msapplication-TileImage" content="<?php bloginfo('stylesheet_directory'); ?>/favicon.png">

		<!-- Feeds & Pings -->
		<link rel="alternate" type="application/rss+xml" title="<?php printf( __( '%s RSS Feed', 'kraken' ), get_bloginfo( 'name' ) ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


		<!-- Feature Test -->
		<script>var isFontFaceSupported=function(e){"use strict";var t,s=document,n=s.head||s.getElementsByTagName("head")[0]||s.documentElement,r=s.createElement("style"),c="@font-face { font-family: 'webfont'; src: 'https://'; }",o=!1,a=function(){var t=e.navigator.userAgent.toLowerCase(),s=t.match(/applewebkit\/([0-9]+)/gi)&&parseFloat(RegExp.$1),n=t.match(/w(eb)?osbrowser/gi),r=t.indexOf("windows phone")>-1&&e.navigator.userAgent.match(/IEMobile\/([0-9])+/)&&parseFloat(RegExp.$1)>=9,c=533>s&&t.indexOf("Android 2.1")>-1;return n||c||r}();if(r.type="text/css",n.insertBefore(r,n.firstChild),t=r.sheet||r.styleSheet,t&&!a)try{t.insertRule(c,0),o=t.cssRules[0].cssText&&/webfont/i.test(t.cssRules[0].cssText),t.deleteRule(t.cssRules.length-1)}catch(u){}return o}(this),selectorSupported=function(e){"use strict";var t,s,n=document,r=n.documentElement,c=r.getElementsByTagName("head")[0],o=n.implementation||{hasFeature:function(){return!1}},a=n.createElement("style");return a.type="text/css",(c||r).insertBefore(a,(c||r).firstChild),s=a.sheet||a.styleSheet,s&&e?(t=o.hasFeature("CSS2","")?function(e){try{s.insertRule(e+"{ }",0),s.deleteRule(s.cssRules.length-1)}catch(t){return!1}return!0}:function(e){return s.cssText=e+" { }",0!==s.cssText.length&&!/unknown/i.test(s.cssText)&&0===s.cssText.indexOf(e)},t(e)):!1};isFontFaceSupported&&selectorSupported(":before")&&(document.documentElement.className+=(document.documentElement.className?" ":"")+"font-face");</script>

		<!-- HTML5 Shim for IE 6-8 -->
		<!--[if lt IE 9]>
			<script src="<?php bloginfo('stylesheet_directory'); ?>/js/min/html5.min.js"></script>
		<![endif]-->

		<!-- stylesheet -->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css">
		<!-- stylesheets for IE 6-8 -->
		<!--[if lt IE 9]>
			<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie.css" type="text/css">
			<link media="print" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie-print.css" type="text/css">
		<![endif]-->		

		<?php wp_head(); ?>

	</head>

	<body>

		<!-- Old Browser Warning -->
		<!--[if lt IE 9]>
			<section>
				<p>Did you know that your web browser is a bit old? Some of the content on this site might not work right as a result. <a href="http://whatbrowser.org">Upgrade your browser</a> for a faster, safer, and better web experience.</p>
			</section>
		<![endif]-->

		<!-- Skip link for better accessibility -->
		<a class="screen-reader" href="#main">Skip to main content</a>

		<?php get_template_part( 'nav-main', 'Site Navigation' ); ?>

		<section id="main">