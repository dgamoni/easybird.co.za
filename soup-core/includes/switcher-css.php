<?php 


function soup_pl_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex); 
   if(strlen($hex) == 3) {
      $r = hexdec($hex[0].$hex[0]);
      $g = hexdec($hex[1].$hex[1]);
      $b = hexdec($hex[2].$hex[2]);
   } else {
      $r = hexdec($hex[0].$hex[1]);
      $g = hexdec($hex[2].$hex[3]);
      $b = hexdec($hex[4].$hex[5]);
   } 
   return implode(', ',array($r, $g, $b));  
}

add_action('wp_head','soup_switcher_css');
function soup_switcher_css(){
	global $soup;
	$soup_brand_clr = (!empty($soup['brand-color'])) ? $soup['brand-color'] : '';
if(''!=$soup_brand_clr):
	$soup_brnd_rgb_clr = soup_pl_hex2rgb($soup_brand_clr);
?>
	<style> 
	/* -----------------------------------------------------------------------------

	Soup - Restaurant with Online Ordering System Template

	File:			Base SCSS File (Classic)
	Version:        1.0
	Last change:    05/04/17 
	Author:			Suelo 

	Table of Contents:

	1. Setup
	2. Basic
	3. Header 
	-- 4.1 Header Mobile
	-- 4.2 Navigation Desktop
	4. Content 
	-- 4.1 Blog
	-- 4.2 Features
	-- 4.3 Menu
	-- 4.4 Other
	-- 4.5 Page Title
	-- 4.6 Sections
	5. Footer
	6. Elements 
	-- 6.1 Alerts
	-- 6.2 Backgrounds
	-- 6.3 Badges
	-- 6.4 Buttons
	-- 6.5 Carousel
	-- 6.6 Forms 
	-- 6.7 Icons
	-- 6.8 Loader
	-- 6.9 Modals
	-- 6.10 Navigations
	-- 6.11 Notification Bar
	-- 6.12 Other
	-- 6.13 Pagination
	-- 6.14 Testimonials
	-- 6.15 Typography
	7. Widgets 
	8. Animations 

	-------------------------------------------------------------------------------- */
	@import url("https://fonts.googleapis.com/css?family=Oswald|Raleway:100,200,400,500");
	/* ----------------------------------------------------------------------------- */
	/* --- 1. SETUP
	/* ----------------------------------------------------------------------------- */
	html {
	  font-size: 14px;
	}

	@media only screen and (max-width: 575px) {
	  html {
	    font-size: 13px;
	  }
	}

	body {
	  position: relative;
	  color: #383c40;
	  font-family: "Helvetica Neue", "Raleway", sans-serif;
	  font-weight: 400;
	  line-height: 1.6;
	  overflow-x: hidden;
	  -webkit-font-smoothing: antialiased;
	  -moz-osx-font-smoothing: grayscale;
	  margin: 0 30px 30px;
	}

	@media only screen and (max-width: 1199px) {
	  body {
	    margin: 0 15px 15px;
	  }
	}

	@media only screen and (max-width: 575px) {
	  body {
	    margin: 0;
	  }
	}

	button, input {
	  font-family: inherit;
	}

	a {
	  color: inherit;
	  -webkit-transition: all 0.2s ease-in-out;
	  -moz-transition: all 0.2s ease-in-out;
	  -o-transition: all 0.2s ease-in-out;
	  transition: all 0.2s ease-in-out;
	}

	a:hover, a:focus {
	  text-decoration: none;
	  color: <?php echo $soup_brand_clr; ?>;
	}

	textarea:focus, input:focus, a:focus, a:visited, *:focus {
	  outline: none;
	}

	iframe {
	  border: none;
	}

	img {
	  max-width: 100%;
	  height: auto;
	  -webkit-backface-visibility: hidden;
	}

	#body-wrapper {
	  position: relative;
	}

	#body-wrapper:before {
	  position: absolute;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: rgba(0, 0, 0, 0.5);
	  content: ' ';
	  z-index: 899;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  visibility: hidden;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	  opacity: 0;
	}

	.dropdown-visible #body-wrapper:before {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	  visibility: visible;
	}

	.container > .main.left, .container > .sidebar.left {
	  float: left;
	}

	@media only screen and (max-width: 767px) {
	  .container > .main.left, .container > .sidebar.left {
	    float: none;
	  }
	}

	.container > .main.right, .container > .sidebar.right {
	  float: right;
	}

	@media only screen and (max-width: 767px) {
	  .container > .main.right, .container > .sidebar.right {
	    float: none;
	  }
	}
 
	@media only screen and (max-width: 767px) {
	  .container > .main {
	    width: 100%;
	    margin-bottom: 3rem;
	  }
	}

	.container > .sidebar {
	  width: 24%;
	}

	@media only screen and (max-width: 767px) {
	  .container > .sidebar {
	    width: 100%;
	  }
	}

	.container-md {
	  width: 860px;
	}

	@media only screen and (max-width: 767px) {
	  .container-md {
	    width: 730px;
	  }
	}

	@media only screen and (max-width: 575px) {
	  .container-md {
	    width: auto;
	  }
	}

	::selection {
	  background: <?php echo $soup_brand_clr; ?>;
	  color: #fff;
	}

	*::-moz-selection {
	  background: <?php echo $soup_brand_clr; ?>;
	  color: #fff;
	}

	/* ---------------------------------------------------------------------------- */
	/* --- 2. BASICS
	/* ----------------------------------------------------------------------------- */
	.relative {
	  position: relative;
	  z-index: 2;
	}

	.block {
	  display: block;
	}

	.dark {
	  color: #fff;
	}

	.pull-up-0 {
	  margin-top: -0px !important;
	}

	.pull-up-5 {
	  margin-top: -5px !important;
	}

	.pull-up-10 {
	  margin-top: -10px !important;
	}

	.pull-up-15 {
	  margin-top: -15px !important;
	}

	.pull-up-20 {
	  margin-top: -20px !important;
	}

	.pull-up-25 {
	  margin-top: -25px !important;
	}

	.pull-up-30 {
	  margin-top: -30px !important;
	}

	.pull-up-35 {
	  margin-top: -35px !important;
	}

	.pull-up-40 {
	  margin-top: -40px !important;
	}

	.pull-up-45 {
	  margin-top: -45px !important;
	}

	.pull-up-50 {
	  margin-top: -50px !important;
	}

	.push-down-0 {
	  margin-bottom: -0px !important;
	}

	.push-down-5 {
	  margin-bottom: -5px !important;
	}

	.push-down-10 {
	  margin-bottom: -10px !important;
	}

	.push-down-15 {
	  margin-bottom: -15px !important;
	}

	.push-down-20 {
	  margin-bottom: -20px !important;
	}

	.push-down-25 {
	  margin-bottom: -25px !important;
	}

	.push-down-30 {
	  margin-bottom: -30px !important;
	}

	.push-down-35 {
	  margin-bottom: -35px !important;
	}

	.push-down-40 {
	  margin-bottom: -40px !important;
	}

	.push-down-45 {
	  margin-bottom: -45px !important;
	}

	.push-down-50 {
	  margin-bottom: -50px !important;
	}

	.mb-6 {
	  margin-bottom: 5rem !important;
	}

	.animated {
	  visibility: hidden;
	}

	.animated.visible {
	  visibility: visible;
	}

	.border {
	  border: 1px solid #e0e0e0;
	}

	.dark .border {
	  border: 1px solid rgba(255, 255, 255, 0.15);
	}

	.border-top {
	  border-top: 1px solid #e0e0e0;
	}

	.dark .border-top, .dark.border-top {
	  border-top: 1px solid rgba(255, 255, 255, 0.15);
	}

	.border-bottom {
	  border-bottom: 1px solid #e0e0e0;
	}

	.dark .border-bottom, .dark.border-bottom {
	  border-bottom: 1px solid rgba(255, 255, 255, 0.15);
	}

	.shadow {
	  -webkit-box-shadow: 1px 1px 30px 0px rgba(0, 0, 0, 0.1);
	  -moz-box-shadow: 1px 1px 30px 0px rgba(0, 0, 0, 0.1);
	  box-shadow: 1px 1px 30px 0px rgba(0, 0, 0, 0.1);
	}

	.row.gutters-sm {
	  margin-left: -7.5px;
	  margin-right: -7.5px;
	}

	.row.gutters-sm > *[class^='col'], .row.gutters-sm > *[class*=' col'] {
	  padding-left: 7.5px;
	  padding-right: 7.5px;
	}

	.row.with-separator {
	  margin-left: -30px;
	  margin-right: -30px;
	}

	@media only screen and (max-width: 767px) {
	  .row.with-separator {
	    margin-left: -15px;
	    margin-right: -15px;
	  }
	}

	.row.with-separator > *[class^='col'], .row.with-separator > *[class*=' col'] {
	  padding-left: 30px;
	  padding-right: 30px;
	}

	.row.with-separator > *[class^='col']:not(:last-child), .row.with-separator > *[class*=' col']:not(:last-child) {
	  border-right: 1px solid #e0e0e0;
	}

	@media only screen and (max-width: 767px) {
	  .row.with-separator > *[class^='col']:not(:last-child), .row.with-separator > *[class*=' col']:not(:last-child) {
	    border-right: none;
	  }
	}

	@media only screen and (max-width: 767px) {
	  .row.with-separator > *[class^='col'], .row.with-separator > *[class*=' col'] {
	    padding-left: 15px;
	    padding-right: 15px;
	  }
	}

	.h-100 {
	  height: 100px;
	}

	.h-200 {
	  height: 200px;
	}

	.h-300 {
	  height: 300px;
	}

	.h-400 {
	  height: 400px;
	}

	.h-500 {
	  height: 500px;
	}

	.h-600 {
	  height: 600px;
	}

	.h-700 {
	  height: 700px;
	}

	.h-800 {
	  height: 800px;
	}

	.h-900 {
	  height: 900px;
	}

	.h-sm {
	  height: 40vh;
	}

	.h-md {
	  height: 60vh;
	}

	.h-lg {
	  height: 80vh;
	}

	.fullheight {
	  height: 100vh;
	}

	.min-fullheight {
	  min-height: 100vh;
	}

	.v-center {
	  position: relative;
	  top: 50%;
	  -webkit-transform: translate3d(0, -50%, 0);
	  -moz-transform: translate3d(0, -50%, 0);
	  -ms-transform: translate3d(0, -50%, 0);
	  -o-transform: translate3d(0, -50%, 0);
	  transform: translate3d(0, -50%, 0);
	  -webkit-transition: all 0.3s ease-out;
	  -moz-transition: all 0.3s ease-out;
	  -o-transition: all 0.3s ease-out;
	  transition: all 0.3s ease-out;
	}

	@media only screen and (max-width: 991px) {
	  .v-center {
	    top: 0;
	    -webkit-transform: translate3d(0, 0, 0);
	    -moz-transform: translate3d(0, 0, 0);
	    -ms-transform: translate3d(0, 0, 0);
	    -o-transform: translate3d(0, 0, 0);
	    transform: translate3d(0, 0, 0);
	  }
	}

	.v-bottom {
	  position: relative;
	  top: 80%;
	  -webkit-transform: translate3d(0, -100%, 0);
	  -moz-transform: translate3d(0, -100%, 0);
	  -ms-transform: translate3d(0, -100%, 0);
	  -o-transform: translate3d(0, -100%, 0);
	  transform: translate3d(0, -100%, 0);
	  -webkit-transition: all 0.3s ease-out;
	  -moz-transition: all 0.3s ease-out;
	  -o-transition: all 0.3s ease-out;
	  transition: all 0.3s ease-out;
	}

	@media only screen and (max-width: 991px) {
	  .v-bottom {
	    top: 0;
	    -webkit-transform: translate3d(0, 0, 0);
	    -moz-transform: translate3d(0, 0, 0);
	    -ms-transform: translate3d(0, 0, 0);
	    -o-transform: translate3d(0, 0, 0);
	    transform: translate3d(0, 0, 0);
	  }
	}

	@media only screen and (max-width: 991px) {
	  .h-sm, .h-md, .h-lg, .fullheight {
	    height: auto;
	  }
	}

	/* ---------------------------------------------------------------------------- */
	/* --- 3. HEADER
	/* ----------------------------------------------------------------------------- */
	#header {
	  position: relative;
	  width: 100%;
	  background-color: #fff;
	  z-index: 900;
	}

	@media only screen and (max-width: 991px) {
	  #header {
	    display: none;
	  }
	}

	#header.absolute {
	  position: absolute;
	}

	#header.light {
	  background-color: #fff;
	}

	#header.dark {
	  background-color: #282b2e;
	}

	#header.transparent {
	  background-color: transparent;
	  color: #fff;
	}

	#header .module {
	  line-height: 45px;
	  display: inline-block;
	}

	#header .module:not(.module-logo) {
	  padding-top: 27.5px;
	  padding-bottom: 27.5px;
	}

	#header .module.right {
	  float: right;
	}

	#header .module.left {
	  float: left;
	}

	#header .module-logo {
	  position: absolute;
	  top: 0;
	  left: 15px;
	  right: 15px;
	  text-align: center;
	  padding: 5rem 2rem;
	}

	#header .module-logo.light {
	  background-color: #fff;
	}

	#header .module-logo.dark {
	  background-color: #282b2e;
	}

	#header .module-logo img {
	  max-width: 150px;
	}

	#header .module-cart:hover, #header .module-cart:focus {
	  color: inherit;
	}

	#header .module-cart:hover .cart-value, #header .module-cart:focus .cart-value {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=60);
	  opacity: 0.6;
	}

	#header .module-cart .cart-icon {
	  position: relative;
	}

	#header .module-cart .cart-icon i {
	  font-size: 1.7rem;
	  display: inline-block;
	  color: #bbc4c6;
	}

	#header .module-cart .cart-icon .notification {
	  position: absolute;
	  top: -0.8rem;
	  right: 0;
	  background-color: #4aa36b;
	  color: #fff;
	  font-weight: 600;
	  font-size: 0.7rem;
	  display: inline-block;
	  -webkit-border-radius: 30px;
	  -moz-border-radius: 30px;
	  -ms-border-radius: 30px;
	  -o-border-radius: 30px;
	  border-radius: 30px;
	  padding: 0.15rem 0.3rem 0.2rem 0.35rem;
	  line-height: 1;
	}

	#header .module-cart .cart-value {
	  font-size: 1.4rem;
	  font-family: "Oswald", sans-serif;
	  border-left: 1px solid #e0e0e0;
	  margin-left: 0.5rem;
	  padding-left: 0.75rem;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	#header.transparent .module-cart .cart-value {
	  border-color: rgba(255, 255, 255, 0.15);
	}

	/* 3.1 Header Mobile
	----------------------------------------------------------*/
	#header-mobile {
	  position: fixed;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 60px;
	  z-index: 900;
	  display: none;
	}

	#header-mobile.light {
	  background-color: #fff;
	  -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
	  -moz-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
	  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
	}

	#header-mobile.dark {
	  background-color: #282b2e;
	}

	@media only screen and (max-width: 991px) {
	  #header-mobile {
	    display: block;
	  }
	}

	#header-mobile .module {
	  line-height: 60px;
	}

	#header-mobile .module-logo {
	  width: calc(100% - 90px);
	  margin: 0 auto;
	  text-align: center;
	}

	#header-mobile .module-logo img {
	  height: calc(60px - 30px);
	}

	#header-mobile .module-nav-toggle {
	  position: absolute;
	  top: 0;
	  left: 0;
	  width: 45px;
	  text-align: center;
	}

	#header-mobile .module-cart {
	  position: absolute;
	  top: 0;
	  right: 10px;
	}

	#header-mobile .module-cart i {
	  position: relative;
	  top: 4px;
	  font-size: 1.7rem;
	  display: inline-block;
	  color: #bbc4c6;
	}

	#header-mobile .module-cart .notification {
	  position: absolute;
	  top: 0.8rem;
	  right: 0;
	  background-color: #4aa36b;
	  color: #fff;
	  font-weight: 600;
	  font-size: 0.7rem;
	  display: inline-block;
	  -webkit-border-radius: 30px;
	  -moz-border-radius: 30px;
	  -ms-border-radius: 30px;
	  -o-border-radius: 30px;
	  border-radius: 30px;
	  padding: 0.15rem 0.3rem 0.2rem 0.35rem;
	  line-height: 1;
	}

	#nav-toggle {
	  width: 26px;
	  height: 26px;
	  position: relative;
	  -webkit-transform: rotate(0deg);
	  -moz-transform: rotate(0deg);
	  -ms-transform: rotate(0deg);
	  -o-transform: rotate(0deg);
	  transform: rotate(0deg);
	  -webkit-transition: 0.5s ease-in-out;
	  -moz-transition: 0.5s ease-in-out;
	  -o-transition: 0.5s ease-in-out;
	  transition: 0.5s ease-in-out;
	  cursor: pointer;
	  display: inline-block;
	  margin-top: 17px;
	}

	#nav-toggle span {
	  display: block;
	  position: absolute;
	  height: 2px;
	  width: 100%;
	  background: #383c40;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	  left: 0;
	  -webkit-border-radius: 2px;
	  -moz-border-radius: 2px;
	  -ms-border-radius: 2px;
	  -o-border-radius: 2px;
	  border-radius: 2px;
	  -webkit-transform: rotate(0deg);
	  -moz-transform: rotate(0deg);
	  -ms-transform: rotate(0deg);
	  -o-transform: rotate(0deg);
	  transform: rotate(0deg);
	  -webkit-transition: 0.25s ease-in-out;
	  -moz-transition: 0.25s ease-in-out;
	  -o-transition: 0.25s ease-in-out;
	  transition: 0.25s ease-in-out;
	}

	#nav-toggle span:nth-child(1) {
	  top: 3px;
	}

	#nav-toggle span:nth-child(2), #nav-toggle span:nth-child(3) {
	  top: 11px;
	}

	#nav-toggle span:nth-child(4) {
	  top: 19px;
	}

	#nav-toggle.open span:nth-child(1) {
	  top: 18px;
	  width: 0%;
	  left: 50%;
	}

	#nav-toggle.open span:nth-child(2) {
	  -webkit-transform: rotate(45deg);
	  -moz-transform: rotate(45deg);
	  -ms-transform: rotate(45deg);
	  -o-transform: rotate(45deg);
	  transform: rotate(45deg);
	}

	#nav-toggle.open span:nth-child(3) {
	  -webkit-transform: rotate(-45deg);
	  -moz-transform: rotate(-45deg);
	  -ms-transform: rotate(-45deg);
	  -o-transform: rotate(-45deg);
	  transform: rotate(-45deg);
	}

	#nav-toggle.open span:nth-child(4) {
	  top: 18px;
	  width: 0%;
	  left: 50%;
	}

	.dark #nav-toggle span {
	  background: #fff;
	}

	/* Panel Mobile */
	#panel-mobile {
	  position: fixed;
	  top: 0;
	  left: 0;
	  bottom: 0;
	  background-color: #fff;
	  width: 300px;
	  z-index: 970;
	  -webkit-box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.1);
	  -moz-box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.1);
	  box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.1);
	  display: none;
	  visibility: hidden;
	  -webkit-transform: translateX(-100%);
	  -moz-transform: translateX(-100%);
	  -ms-transform: translateX(-100%);
	  -o-transform: translateX(-100%);
	  transform: translateX(-100%);
	  -webkit-transition: all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
	  -moz-transition: all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
	  -o-transition: all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
	  transition: all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
	  overflow: auto;
	}

	@media only screen and (max-width: 991px) {
	  #panel-mobile {
	    display: block;
	  }
	}

	@media only screen and (max-width: 575px) {
	  #panel-mobile {
	    width: 100%;
	  }
	}

	#panel-mobile.show {
	  visibility: visible;
	  -webkit-transform: translateX(0);
	  -moz-transform: translateX(0);
	  -ms-transform: translateX(0);
	  -o-transform: translateX(0);
	  transform: translateX(0);
	}

	#panel-mobile .module-logo {
	  text-align: center;
	  padding: 5rem 2rem;
	  display: block;
	}

	#panel-mobile .module-navigation {
	  padding: 1rem 1.5rem;
	}

	#panel-mobile .module-social {
	  padding: 1rem;
	  text-align: center;
	}

	#panel-mobile .close {
	  position: absolute;
	  top: 1.5rem;
	  left: 1.5rem;
	  font-size: 1.3rem;
	}

	.nav-main-mobile {
	  font-family: "Oswald", sans-serif;
	  text-transform: uppercase;
	  -webkit-flex-direction: column;
	  flex-direction: column;
	}

	.nav-main-mobile li {
	  position: relative;
	}

	.nav-main-mobile li.has-dropdown:after {
	  position: absolute;
	  top: 1rem;
	  right: 1rem;
	  font-family: 'themify';
	  content: "\e62a";
	  margin-left: 0.5rem;
	  font-size: 0.75em;
	  display: inline-block;
	  vertical-align: middle;
	  color: #a4a7a9;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.nav-main-mobile > li {
	  position: relative;
	  border-bottom: 1px solid #e0e0e0;
	}

	.nav-main-mobile > li > a {
	  padding: 0.75rem 0;
	  display: block;
	}

	.nav-main-mobile > li .dropdown-container {
	  display: none;
	}

	.nav-main-mobile > li .dropdown-container .dropdown-image {
	  display: none;
	}

	.nav-main-mobile ul {
	  list-style: none;
	  margin: 0 0.5rem 1rem;
	  padding: 0 1rem;
	  font-size: 0.9rem;
	}

	.nav-main-mobile ul > li.has-dropdown:after {
	  top: 0.35rem;
	  right: 0;
	}

	.nav-main-mobile ul > li > a {
	  padding: 0.25rem 0;
	  display: block;
	}

	.nav-main-mobile ul ul {
	  padding: 0;
	  display: none;
	}

	/* 3.2 Navigation Desktop
	----------------------------------------------------------*/
	.nav-main {
	  font-family: "Oswald", sans-serif;
	  text-transform: uppercase;
	}

	.nav-main > li {
	  position: relative;
	}

	.nav-main > li:not(:last-child) {
	  margin-right: 1.5rem;
	}

	.nav-main > li.has-dropdown > a:after {
	  font-family: 'themify';
	  content: "\e62a";
	  margin-left: 0.5rem;
	  font-size: 0.75em;
	  display: inline-block;
	  vertical-align: middle;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
	  opacity: 0.5;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.nav-main > li.has-dropdown > a:hover, .nav-main > li.has-dropdown > a:focus {
	  color: inherit;
	}

	.nav-main > li.has-dropdown > a:hover:after, .nav-main > li.has-dropdown > a:focus:after {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	}

	.nav-main > li.has-dropdown.dropdown-show > a:after {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	  -webkit-transform: translateY(3px);
	  -moz-transform: translateY(3px);
	  -ms-transform: translateY(3px);
	  -o-transform: translateY(3px);
	  transform: translateY(3px);
	}

	.nav-main > li.has-dropdown.dropdown-show > .dropdown-container {
	  -webkit-transform: translateY(0);
	  -moz-transform: translateY(0);
	  -ms-transform: translateY(0);
	  -o-transform: translateY(0);
	  transform: translateY(0);
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	  visibility: visible;
	}

	.nav-main > li > a {
	  line-height: 45px;
	}

	.nav-main > li > a:hover, .nav-main > li > a:focus {
	  color: <?php echo $soup_brand_clr; ?>;
	}

	.nav-main > li .dropdown-container {
	  top: calc(100% + 45px);
	  left: 0;
	  position: absolute;
	  background-color: #fff;
	  display: -webkit-flex;
	  display: flex;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  -webkit-transform: translateY(10px);
	  -moz-transform: translateY(10px);
	  -ms-transform: translateY(10px);
	  -o-transform: translateY(10px);
	  transform: translateY(10px);
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	  opacity: 0;
	  visibility: hidden;
	  color: #383c40;
	  text-align: left;
	}

	.nav-main > li .dropdown-container .dropdown-mega {
	  padding: 0.5rem 1.5rem;
	}

	.nav-main > li .dropdown-container .dropdown-mega > li > a {
	  padding: 0.75rem 0;
	}

	.nav-main > li .dropdown-container .dropdown-image {
	  width: 250px;
	}

	.nav-main ul {
	  list-style: none;
	  padding: 5px;
	  margin: 0;
	  line-height: 1.5;
	  width: 200px;
	  background-color: #fff;
	}

	.nav-main ul li {
	  position: relative;
	}

	.nav-main ul li:not(:last-child) {
	  border-bottom: 1px solid #e0e0e0;
	}

	.nav-main ul li a {
	  display: block;
	  padding: 0.75rem 1rem;
	  font-size: 0.9rem;
	}

	.nav-main ul li.has-dropdown:after {
	  position: absolute;
	  top: 1rem;
	  right: 1rem;
	  font-family: 'themify';
	  content: "\e628";
	  font-size: 0.75em;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
	  opacity: 0.5;
	}

	.nav-main ul li > ul {
	  position: absolute;
	  top: 0;
	  left: calc(100% + 8px);
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  visibility: hidden;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	  opacity: 0;
	}

	.nav-main ul li.dropdown-show.has-dropdown:after {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	}

	.nav-main ul li.dropdown-show > ul {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	  visibility: visible;
	}

	/* ---------------------------------------------------------------------------- */
	/* --- 4. CONTENT
	/* ----------------------------------------------------------------------------- */
	#content {
	  position: relative;
	  overflow: hidden;
	}

	@media only screen and (max-width: 991px) {
	  #content {
	    margin-top: 60px;
	  }
	}

	.page-content {
	  padding-top: 2rem;
	  padding-bottom: 2rem;
	}

	/* 4.1 Blog
	----------------------------------------------------------*/
	.post {
	  margin-bottom: 1.5rem;
	}

	.post .post-image img {
	  width: 100%;
	}

	.post ul.post-meta {
	  position: relative;
	  list-style: none;
	  padding: 0;
	  margin: 0 0 2rem 0;
	  display: block;
	}

	.post ul.post-meta > li {
	  display: inline-block;
	  font-size: 12px;
	  color: #a4a7a9;
	  font-weight: 500;
	}

	.post ul.post-meta > li > span {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=70);
	  opacity: 0.7;
	}

	.post ul.post-meta > li:not(:last-child) {
	  margin-right: 8px;
	}

	.post ul.post-meta > li:not(:last-child):after {
	  content: "/";
	  margin-left: 8px;
	  font-size: 60%;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=70);
	  opacity: 0.7;
	}

	.post.post-wide {
	  display: -webkit-flex;
	  display: flex;
	}

	@media only screen and (max-width: 767px) {
	  .post.post-wide {
	    display: block;
	  }
	}

	.post.post-wide .post-image {
	  width: 60%;
	  background-size: cover;
	  background-position: center center;
	}

	@media only screen and (max-width: 767px) {
	  .post.post-wide .post-image {
	    width: 100%;
	    height: 300px;
	  }
	}

	.post.post-wide .post-content {
	  position: relative;
	  width: 40%;
	  background-color: #f3f4f4;
	  padding: 4rem;
	}

	@media only screen and (max-width: 767px) {
	  .post.post-wide .post-content {
	    width: 100%;
	    padding: 40px 30px;
	  }
	}

	.post.post-wide .post-content h4 {
	  margin-bottom: 25px;
	}

	.post.post-wide .post-content p {
	  color: #a4a7a9;
	}

	.post.post-wide:nth-child(2n) {
	  -webkit-flex-direction: row-reverse;
	  flex-direction: row-reverse;
	}

	.post.post-masonry .post-content {
	  position: relative;
	  background-color: #f3f4f4;
	  padding: 40px 30px;
	}

	.post.post-masonry .post-content:after {
	  position: absolute;
	  bottom: 100%;
	  left: 50%;
	  margin-left: -10px;
	  width: 0;
	  height: 0;
	  border-style: solid;
	  border-width: 0 10px 10px 10px;
	  border-color: transparent transparent #f3f4f4 transparent;
	  content: ' ';
	}

	.post.post-masonry .post-content h4 {
	  margin-bottom: 25px;
	}

	.post.post-masonry .post-content p {
	  color: #a4a7a9;
	}

	.post.single .date {
	  margin-bottom: 2rem;
	  font-size: 1.1rem;
	}

	.post.single .post-image {
	  height: 60vh;
	  background-position: center center;
	  background-size: cover;
	  background-repeat: no-repeat;
	  z-index: 0;
	  overflow: hidden;
	}

	.post.single .post-image > img {
	  -webkit-border-radius: 3px;
	  -moz-border-radius: 3px;
	  -ms-border-radius: 3px;
	  -o-border-radius: 3px;
	  border-radius: 3px;
	}

	.post.single .post-content {
	  background-color: #fff;
	  padding: 5rem;
	  z-index: 2;
	  margin-top: -10vh;
	}

	@media only screen and (max-width: 991px) {
	  .post.single .post-content {
	    padding: 3rem;
	  }
	}

	@media only screen and (max-width: 575px) {
	  .post.single .post-content {
	    padding: 1.5rem;
	  }
	}

	.post.single .post-module {
	  margin-top: 3rem;
	}

	.bg-light .post.post-masonry .post-content, .bg-light .post.post-wide .post-content, .bg-grey .post.post-masonry .post-content, .bg-grey .post.post-wide .post-content {
	  background-color: #fff;
	}

	.comments {
	  list-style: none;
	  padding: 0;
	  margin: 0;
	}

	.comments > li {
	  margin-bottom: 0.5rem;
	}

	.comments > li .avatar {
	  width: 58px;
	  height: 58px;
	  float: left;
	}

	@media only screen and (max-width: 575px) {
	  .comments > li .avatar {
	    width: 28px;
	    height: 28px;
	  }
	}

	.comments > li .avatar > img {
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	  width: 58px;
	  height: 58px;
	}

	@media only screen and (max-width: 575px) {
	  .comments > li .avatar > img {
	    width: 28px;
	    height: 28px;
	  }
	}

	.comments > li .content {
	  padding: 10px 0;
	  margin-left: 78px;
	}

	@media only screen and (max-width: 575px) {
	  .comments > li .content {
	    padding-top: 0;
	    margin-left: 38px;
	  }
	}

	.comments > li .content > .details {
	  font-size: 0.9rem;
	  color: #a4a7a9;
	}

	.comments > li ul {
	  padding-left: 58px;
	  list-style: none;
	}

	@media only screen and (max-width: 575px) {
	  .comments > li ul {
	    padding-left: 30px;
	  }
	}

	/* 4.2 Features
	----------------------------------------------------------*/
	.feature {
	  margin-bottom: 30px;
	  display: block;
	}

	.feature.feature-1 .feature-content {
	  padding-left: 65px;
	  padding-top: 1.5rem;
	}

	.feature.feature-1 .icon {
	  float: left;
	}

	.feature.feature-1 .icon.icon-sm + .feature-content {
	  padding-left: 55px;
	}

	.feature.feature-1 .icon.icon-lg + .feature-content {
	  padding-left: 120px;
	}

	.feature.feature-1 .icon.icon-circle + .feature-content {
	  padding-left: 95px;
	}

	.feature.feature-1 .icon.icon-circle.icon-sm + .feature-content {
	  padding-left: 64px;
	}

	.feature.feature-1 .icon.icon-circle.icon-lg + .feature-content {
	  padding-left: 140px;
	}

	/* 4.3 Menu
	----------------------------------------------------------*/
	/* Menu Sample */
	.menu-sample {
	  position: relative;
	  background-color: #282b2e;
	  overflow: hidden;
	}

	.menu-sample .image {
	  -webkit-transition: all 1.5s ease-out;
	  -moz-transition: all 1.5s ease-out;
	  -o-transition: all 1.5s ease-out;
	  transition: all 1.5s ease-out;
	}

	.menu-sample .title {
	  position: absolute;
	  bottom: 4.5rem;
	  right: 4.5rem;
	  color: #fff;
	  font-size: 5.5rem;
	  font-weight: 100;
	  margin-bottom: 0;
	}

	@media only screen and (max-width: 991px) {
	  .menu-sample .title {
	    font-size: 4rem;
	  }
	}

	.menu-sample:hover .image {
	  -webkit-transform: scale(1.05, 1.05);
	  -moz-transform: scale(1.05, 1.05);
	  -ms-transform: scale(1.05, 1.05);
	  -o-transform: scale(1.05, 1.05);
	  transform: scale(1.05, 1.05);
	}

	.menu-sample-carousel {
	  margin-bottom: 0;
	}

	.menu-sample-carousel .menu-sample:nth-child(2n+1) {
	  top: 10px;
	}

	.menu-sample-carousel .slick-list {
	  overflow: visible;
	}

	/* Menu Navigation */
	.nav-menu {
	  -webkit-flex-direction: column;
	  flex-direction: column;
	  padding: 1.5rem 2.5rem;
	  font-family: "Oswald", sans-serif;
	  text-transform: uppercase;
	  margin-bottom: 2rem;
	}

	.nav-menu li a {
	  padding: 0.5rem 0;
	  font-size: 1.1rem;
	  display: block;
	}

	/* Menu Category */
	.menu-category {
	  margin-bottom: 2rem;
	}

	.menu-category .menu-category-title {
	  position: relative;
	  height: 35vh;
	  min-height: 160px;
	  color: #fff;
	  padding: 3rem;
	  background-color: #282b2e;
	}

	@media only screen and (max-width: 991px) {
	  .menu-category .menu-category-title {
	    min-height: 100px;
	  }
	}

	.menu-category .menu-category-title .bg-image:after {
	  position: absolute;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  content: ' ';
	  background-image: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);
	}

	.menu-category .menu-category-title .title {
	  position: absolute;
	  bottom: 3rem;
	  left: 4rem;
	  font-size: 5rem;
	  z-index: 2;
	  margin-bottom: 0;
	}

	@media only screen and (max-width: 1500px) {
	  .menu-category .menu-category-title .title {
	    font-size: 4.5rem;
	  }
	}

	@media only screen and (max-width: 991px) {
	  .menu-category .menu-category-title .title {
	    font-size: 4rem;
	    bottom: 2rem;
	    left: 3rem;
	  }
	}

	@media only screen and (max-width: 991px) {
	  .menu-category .menu-category-title .title {
	    font-size: 3rem;
	    left: 2rem;
	  }
	}

	.menu-category .menu-category-title.collapse-toggle {
	  cursor: pointer;
	  height: 25vh;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.menu-category .menu-category-title.collapse-toggle:after {
	  position: absolute;
	  bottom: 3rem;
	  right: 3rem;
	  font-family: 'themify';
	  content: "\e64b";
	  display: inline-block;
	  font-size: 3rem;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
	  opacity: 0.5;
	  z-index: 2;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	@media only screen and (max-width: 1500px) {
	  .menu-category .menu-category-title.collapse-toggle:after {
	    bottom: 2.5rem;
	  }
	}

	@media only screen and (max-width: 991px) {
	  .menu-category .menu-category-title.collapse-toggle:after {
	    right: 2rem;
	    bottom: 2rem;
	    font-size: 2rem;
	  }
	}

	.menu-category .menu-category-title.collapse-toggle[aria-expanded="true"] {
	  height: 35vh;
	}

	.menu-category .menu-category-title.collapse-toggle[aria-expanded="true"]:after {
	  -webkit-transform: rotateX(180deg);
	  -moz-transform: rotateX(180deg);
	  -ms-transform: rotateX(180deg);
	  -o-transform: rotateX(180deg);
	  transform: rotateX(180deg);
	}

	.menu-category .menu-category-content {
	  border: 1px solid #e0e0e0;
	  background-color: #fff;
	}

	.menu-category .menu-category-content.padded {
	  padding: 15px;
	}

	.menu-list-item {
	  padding: 1.25rem 1.5rem;
	  line-height: 1.2;
	}

	@media only screen and (max-width: 575px) {
	  .menu-list-item {
	    padding: 1rem;
	  }
	}

	.menu-list-item:not(:last-child) {
	  border-bottom: 1px solid #e0e0e0;
	}

	.menu-grid-item {
	  line-height: 1.2;
	  margin-bottom: 1.5rem;
	}

	.menu-grid-item:not(:last-child) {
	  border-bottom: 1px solid #e0e0e0;
	}

	/* 4.4 Other
	----------------------------------------------------------*/
	/* Rate */
	.rate > i {
	  margin-right: 0.5em;
	  color: #bbc4c6;
	}

	.rate > i.active {
	  color: #ebd072 !important;
	}

	.rate.rate-lg {
	  font-size: 1.3em;
	}

	.rate.rate-sm {
	  font-size: 0.8em;
	}

	.dark .rate > i {
	  color: rgba(255, 255, 255, 0.4);
	}

	.rating {
	  unicode-bidi: bidi-override;
	  direction: rtl;
	  text-align: left;
	}

	.rating > i {
	  cursor: pointer;
	}

	.rating > i:hover, .rating > i:hover ~ i {
	  color: #ebd072;
	}

	/* Special Offer */
	.special-offer {
	  *zoom: 1;
	}

	.special-offer:after {
	  content: "";
	  display: table;
	  clear: both;
	}

	.special-offer .special-offer-image {
	  position: relative;
	  width: 50%;
	  float: left;
	  z-index: 1;
	}

	@media only screen and (max-width: 991px) {
	  .special-offer .special-offer-image {
	    width: auto;
	    float: none;
	  }
	}

	.special-offer .special-offer-content {
	  position: relative;
	  width: 55%;
	  margin-left: -5%;
	  margin-top: 5%;
	  float: left;
	  background-color: #f3f4f4;
	  padding: 4rem;
	  z-index: 2;
	}

	@media only screen and (max-width: 991px) {
	  .special-offer .special-offer-content {
	    float: none;
	    width: auto;
	    margin-left: 5%;
	    margin-top: -5%;
	    padding: 3rem;
	  }
	}

	.bg-light .special-offer .special-offer-content {
	  background-color: #fff;
	}

	/* Panel Details */
	.panel-details:not(:last-child) {
	  border-bottom: 1px solid #e0e0e0;
	}

	.panel-details .panel-details-title {
	  margin: 0;
	  padding: 1.25rem 0;
	}

	.panel-details .panel-details-title > label {
	  top: -0.25em;
	  margin-bottom: 0;
	  margin-right: 0;
	  display: inline-block;
	  vertical-align: middle;
	  float: left;
	  pointer-events: none;
	}

	.panel-details .panel-details-content {
	  padding: 1.25rem 2rem;
	  border-top: 1px solid #e0e0e0;
	}

	/* Grey to Color */
	.grey-to-color {
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  -webkit-filter: grayscale(100%);
	  -moz-filter: grayscale(100%);
	  filter: grayscale(100%);
	}

	.grey-to-color:hover, .grey-to-color:focus {
	  -webkit-filter: grayscale(0%);
	  -moz-filter: grayscale(0%);
	  filter: grayscale(0%);
	}

	/* Utility Box */
	.utility-box {
	  background-color: #fff;
	}

	.utility-box .utility-box-title,
	.utility-box .utility-box-content {
	  padding: 2rem;
	  position: relative;
	}

	.utility-box .utility-box-btn:hover, .utility-box .utility-box-btn:focus {
	  -webkit-transform: translateY(0);
	  -moz-transform: translateY(0);
	  -ms-transform: translateY(0);
	  -o-transform: translateY(0);
	  transform: translateY(0);
	}

	/* Image Box */
	.image-box {
	  margin-bottom: 2rem;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.image-box:hover {
	  -webkit-transform: translateY(-3px);
	  -moz-transform: translateY(-3px);
	  -ms-transform: translateY(-3px);
	  -o-transform: translateY(-3px);
	  transform: translateY(-3px);
	  -webkit-box-shadow: 0 0 25px 0 rgba(0, 0, 0, 0.05);
	  -moz-box-shadow: 0 0 25px 0 rgba(0, 0, 0, 0.05);
	  box-shadow: 0 0 25px 0 rgba(0, 0, 0, 0.05);
	}

	.image-box .image img {
	  width: 100%;
	}

	.image-box .title {
	  padding: 1.5rem;
	  text-align: center;
	  background-color: #fff;
	}

	/* Documentation */
	.example-box {
	  border: 1px solid #E1E1E8;
	  border-top-left-radius: 4px;
	  border-top-right-radius: 4px;
	}

	.example-box-content {
	  padding: 20px;
	}

	.example-box-content > *:last-child {
	  margin-bottom: 0;
	}

	.example-box-title {
	  padding: 10px 20px;
	  text-transform: uppercase;
	  font-size: 11px;
	  border-bottom: 1px solid #E1E1E8;
	  background-color: #F7F8F9;
	  color: #9b9fa1;
	  font-weight: 500;
	}

	.example-box + pre {
	  margin-top: -1px !important;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}

	pre {
	  tab-size: 4;
	}

	.prettyprint .tag {
	  font-size: 13px;
	  font-weight: normal;
	  padding: 0;
	}

	/* 4.5 Page Title
	----------------------------------------------------------*/
	.page-title {
	  position: relative;
	  padding: 6rem 0 7rem;
	}

	@media only screen and (max-width: 1500px) {
	  .page-title {
	    padding: 4rem 0 5rem;
	  }
	}

	.page-title.bg-dark {
	  background-color: #202225 !important;
	}

	.page-title.page-title-lg {
	  padding: 9rem 0;
	}

	@media only screen and (max-width: 1500px) {
	  .page-title.page-title-lg {
	    padding: 6rem 0;
	  }
	}

	.page-title h1 {
	  font-size: 5.5rem;
	}

	@media only screen and (max-width: 1500px) {
	  .page-title h1 {
	    font-size: 4.75rem;
	  }
	}

	@media only screen and (max-width: 991px) {
	  .page-title h1 {
	    font-size: 4rem;
	  }
	}

	@media only screen and (max-width: 575px) {
	  .page-title h1 {
	    font-size: 3.5rem;
	  }
	}

	/* 4.6 Sections
	----------------------------------------------------------*/
	section, .section {
	  position: relative;
	  padding-top: 5rem;
	  padding-bottom: 5rem;
	}

	@media only screen and (max-width: 1500px) {
	  section, .section {
	    padding-top: 4rem;
	    padding-bottom: 4rem;
	  }
	}

	section.cover, .section.cover {
	  padding-top: 0;
	  padding-bottom: 0;
	}

	section.section-lg, .section.section-lg {
	  padding-top: 8em;
	  padding-bottom: 8rem;
	}

	@media only screen and (max-width: 1500px) {
	  section.section-lg, .section.section-lg {
	    padding-top: 6rem;
	    padding-bottom: 6rem;
	  }
	}

	section.section-sm, .section.section-sm {
	  padding-top: 4.5rem;
	  padding-bottom: 4.5rem;
	}

	@media only screen and (max-width: 1500px) {
	  section.section-sm, .section.section-sm {
	    padding-top: 3.5rem;
	    padding-bottom: 3.5rem;
	  }
	}

	section.protrude, .section.protrude {
	  z-index: 2;
	}

	/* Section Main */
	.section-main {
	  height: calc(100vh - 100px - 30px);
	  padding-top: 0;
	  padding-bottom: 0;
	  overflow: hidden;
	}

	@media only screen and (max-width: 1199px) {
	  .section-main {
	    height: calc(100vh - 100px - 15px);
	  }
	}

	@media only screen and (max-width: 991px) {
	  .section-main {
	    height: auto;
	  }
	}

	.header-absolute .section-main {
	  height: calc(100vh - 30px);
	}

	@media only screen and (max-width: 1199px) {
	  .header-absolute .section-main {
	    height: calc(100vh - 15px);
	  }
	}

	@media only screen and (max-width: 991px) {
	  .header-absolute .section-main {
	    height: auto;
	  }
	}

	.section-main-1 > .container {
	  height: 100%;
	}

	.section-main-1 > .container .slide-container {
	  position: relative;
	  height: 100%;
	  display: -webkit-flex;
	  display: flex;
	  -webkit-align-items: center;
	  align-items: center;
	  -webkit-justify-content: flex-end;
	  justify-content: flex-end;
	}

	.section-main-1 > .container .image {
	  position: absolute;
	  top: 0;
	  bottom: 0;
	  right: 70px;
	  width: calc(1110px + ((100vw - 1110px) / 2) - 70px - 30px);
	  cursor: move;
	  overflow: hidden;
	}

	@media only screen and (max-width: 575px) {
	  .section-main-1 > .container .image {
	    width: auto;
	    left: -15px;
	    right: -15px;
	  }
	}

	.section-main-1 > .container .image .slick-dots {
	  position: absolute;
	  bottom: 25px;
	  left: 20px;
	  text-align: left;
	}

	.section-main-1 > .container .image .slide {
	  position: relative;
	}

	.section-main-1 > .container .image .slick-list, .section-main-1 > .container .image .slick-track {
	  height: 100%;
	  overflow: hidden;
	}

	.section-main-1 > .container .content {
	  position: relative;
	  background-color: #282b2e;
	  z-index: 5;
	  width: 45%;
	}

	@media only screen and (max-width: 991px) {
	  .section-main-1 > .container .content {
	    width: 80%;
	    margin-top: 90px;
	    margin-bottom: 90px;
	  }
	}

	@media only screen and (max-width: 575px) {
	  .section-main-1 > .container .content {
	    width: 90%;
	    margin-top: 160px;
	  }
	}

	.section-main-1 > .container .content .content-inner {
	  padding: 4rem;
	}

	@media only screen and (max-width: 1500px) {
	  .section-main-1 > .container .content .content-inner {
	    padding: 3rem;
	  }
	}

	@media only screen and (max-width: 991px) {
	  .section-main-1 > .container .content .content-inner {
	    padding: 2.5rem;
	  }
	}

	@media only screen and (max-width: 575px) {
	  .section-main-1 > .container .content .content-inner {
	    padding: 1.75rem;
	  }
	}

	.section-main-1 > .container .content .content-nav {
	  position: absolute;
	  top: 100%;
	  right: 0;
	}

	.section-main-1 > .container .content .content-nav > a {
	  float: left;
	  width: 70px;
	  height: 70px;
	  display: block;
	  background-color: #242729;
	  line-height: 70px;
	  text-align: center;
	  font-size: 1.4rem;
	}

	.section-main-1 > .container .content .content-nav > a > i {
	  display: inline-block;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.section-main-1 > .container .content .content-nav > a:hover > i, .section-main-1 > .container .content .content-nav > a:focus > i {
	  color: <?php echo $soup_brand_clr; ?>;
	}

	.section-main-1 > .container .content .content-nav > a:hover.next > i, .section-main-1 > .container .content .content-nav > a:focus.next > i {
	  -webkit-transform: translateX(3px);
	  -moz-transform: translateX(3px);
	  -ms-transform: translateX(3px);
	  -o-transform: translateX(3px);
	  transform: translateX(3px);
	}

	.section-main-1 > .container .content .content-nav > a:hover.prev > i, .section-main-1 > .container .content .content-nav > a:focus.prev > i {
	  -webkit-transform: translateX(-3px);
	  -moz-transform: translateX(-3px);
	  -ms-transform: translateX(-3px);
	  -o-transform: translateX(-3px);
	  transform: translateX(-3px);
	}

	.section-main-1 > .container .content .content-nav > a:not(:last-child) {
	  border-right: 1px solid rgba(255, 255, 255, 0.15);
	}

	@media only screen and (max-width: 991px) {
	  .section-main-2 {
	    padding-top: 5rem;
	    padding-bottom: 5rem;
	  }
	}

	.section-main-2 .section-slider {
	  height: 100%;
	}

	.section-main-2 .slide {
	  position: relative;
	  overflow: hidden;
	}

	.section-main-2 .slick-list, .section-main-2 .slick-track {
	  height: 100%;
	  overflow: hidden;
	}

	/* Section Double */
	.section-double {
	  padding-top: 0;
	  padding-bottom: 0;
	}

	.section-double > .row {
	  height: 35vw;
	  -webkit-align-items: center;
	  align-items: center;
	}

	@media only screen and (max-width: 1199px) {
	  .section-double > .row {
	    height: 60vh;
	  }
	}

	@media only screen and (max-width: 767px) {
	  .section-double > .row {
	    height: auto;
	  }
	}

	.section-double > .row > .image {
	  position: relative;
	  height: 100%;
	}

	@media only screen and (max-width: 767px) {
	  .section-double > .row > .image {
	    height: 60vh;
	  }
	}

	.section-double > .row > .image.right > .bg-image {
	  background-position: left center;
	}

	.section-double > .row > .image.left > .bg-image {
	  background-position: right center;
	}

	.section-double > .row > .image .btn-play {
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  -webkit-transform: translate3d(-50%, -50%, 0);
	  -moz-transform: translate3d(-50%, -50%, 0);
	  -ms-transform: translate3d(-50%, -50%, 0);
	  -o-transform: translate3d(-50%, -50%, 0);
	  transform: translate3d(-50%, -50%, 0);
	}

	.section-double > .row > .content {
	  padding: 4rem 8%;
	}

	/* BG Edge */
	.section-bg-edge {
	  overflow: hidden;
	  padding-top: 0;
	  padding-bottom: 0;
	  width: 100%;
	}

	.section-bg-edge .image {
	  position: absolute;
	  top: 0;
	  bottom: 0;
	  padding-left: 0;
	  padding-right: 0;
	}

	@media only screen and (max-width: 767px) {
	  .section-bg-edge .image {
	    left: 0;
	    right: 0;
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=25);
	    opacity: 0.25;
	  }
	}

	.section-bg-edge .image.right {
	  text-align: right;
	  right: 0;
	}

	.section-bg-edge .image.right .bg-image {
	  background-position: center left;
	}

	.section-bg-edge .image.left {
	  text-align: left;
	  left: 0;
	}

	.section-bg-edge .image.left .bg-image {
	  background-position: center right;
	}

	.section-bg-edge .image.bottom .bg-image {
	  background-position-y: top !important;
	}

	.section-bg-edge .container > div[class*="col-"] {
	  padding-top: 6rem;
	  padding-bottom: 6rem;
	}

	.section-bg-edge.section-sm .container > div[class*="col-"] {
	  padding-top: 4.5rem;
	  padding-bottom: 4.5rem;
	}

	.section-bg-edge.section-lg {
	  padding-top: 0;
	  padding-bottom: 0;
	}

	.section-bg-edge.section-lg .container > div[class*="col-"] {
	  padding-top: 8rem;
	  padding-bottom: 8rem;
	}

	/* Section Extended */
	.section-extended {
	  overflow: hidden;
	  padding-top: 0;
	  padding-bottom: 0;
	}

	.section-extended > .container {
	  padding-top: 6rem;
	  padding-bottom: 6rem;
	}

	.section-extended > .container:after {
	  position: absolute;
	  top: 0;
	  width: 100vw;
	  bottom: 0;
	  content: ' ';
	  background-color: #282b2e;
	}

	.section-extended > .container > * {
	  position: relative;
	  z-index: 2;
	}

	.section-extended.right > .container:after {
	  left: -60px;
	}

	.section-extended.left > .container:after {
	  right: -60px;
	}

	/* Section Gallery */
	.section-gallery {
	  position: relative;
	}

	.section-gallery .set-fullscreen {
	  position: absolute;
	  top: 2rem;
	  right: 2rem;
	  color: #fff;
	  z-index: 10;
	  font-size: 1.5rem;
	}

	.section-gallery .gallery-carousel {
	  position: relative;
	  height: 100vh;
	}

	.section-gallery .gallery-carousel .slide {
	  position: relative;
	}

	.section-gallery .gallery-carousel .slick-list, .section-gallery .gallery-carousel .slick-track {
	  height: 100%;
	  overflow: hidden;
	}

	.section-gallery .gallery-carousel:after {
	  position: absolute;
	  bottom: 0;
	  left: 0;
	  width: 100%;
	  height: 40%;
	  background-image: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
	  content: ' ';
	  z-index: 1;
	}

	.section-gallery .gallery-nav {
	  position: absolute;
	  width: 500px;
	  bottom: 30px;
	  left: calc(50% - 250px);
	  background-color: #000;
	  -webkit-box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.4);
	  -moz-box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.4);
	  box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.4);
	  z-index: 3;
	}

	.section-gallery .gallery-nav .slick-slide {
	  cursor: pointer;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=40);
	  opacity: 0.4;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.section-gallery .gallery-nav .slick-slide.slick-current {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	}

	.section-gallery .gallery-nav .slick-prev, .section-gallery .gallery-nav .slick-next {
	  visibility: visible;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	}

	.section-gallery .gallery-nav .slick-prev:before, .section-gallery .gallery-nav .slick-next:before {
	  color: #fff;
	  text-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
	}

	/* ---------------------------------------------------------------------------- */
	/* --- 5. FOOTER
	/* ----------------------------------------------------------------------------- */
	@media only screen and (max-width: 575px) {
	  #footer {
	    padding-bottom: 2rem;
	  }
	}

	#footer .footer-first-row {
	  padding-top: 5.5rem;
	  padding-bottom: 5.5rem;
	}

	@media only screen and (max-width: 1500px) {
	  #footer .footer-first-row {
	    padding-top: 4rem;
	    padding-bottom: 4rem;
	  }
	}

	#footer .footer-second-row {
	  border-top: 1px solid rgba(255, 255, 255, 0.15);
	  font-size: 0.9em;
	  padding-top: 3rem;
	  padding-bottom: 3rem;
	}

	@media only screen and (max-width: 1500px) {
	  #footer .footer-second-row {
	    padding-top: 2rem;
	    padding-bottom: 2rem;
	  }
	}

	/* Back to top */
	#back-to-top {
	  position: absolute;
	  bottom: 18px;
	  right: 18px;
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	  color: #fff;
	  width: 36px;
	  height: 36px;
	  background: #3e4043;
	  font-size: 14px;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  z-index: 650;
	  visibility: hidden;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	  opacity: 0;
	}

	#back-to-top:hover {
	  -webkit-transform: translateY(-3px);
	  -moz-transform: translateY(-3px);
	  -ms-transform: translateY(-3px);
	  -o-transform: translateY(-3px);
	  transform: translateY(-3px);
	}

	#back-to-top.visible {
	  visibility: visible;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	} 
	#back-to-top > * {
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  -webkit-transform: translate3d(-50%, -50%, 0);
	  -moz-transform: translate3d(-50%, -50%, 0);
	  -ms-transform: translate3d(-50%, -50%, 0);
	  -o-transform: translate3d(-50%, -50%, 0);
	  transform: translate3d(-50%, -50%, 0);
	}

	@media only screen and (max-width: 767px) {
	  #back-to-top {
	    bottom: 20px;
	    right: 20px;
	  }
	}

	/* Nav Footer */
	.nav-footer {
	  list-style: none;
	  margin: 0 0 1.5rem;
	  padding: 0;
	  display: inline-block;
	}

	.nav-footer > li {
	  display: block;
	  margin-bottom: 0.2em;
	}

	.nav-footer > li > a {
	  font-weight: 500;
	  font-size: 0.95rem;
	  font-family: "Oswald", sans-serif;
	  color: #a4a7a9;
	}

	.nav-footer > li > a:hover, .nav-footer > li > a:focus {
	  color: <?php echo $soup_brand_clr; ?>;
	}

	.nav-footer > li.active > a {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	}

	/* ---------------------------------------------------------------------------- */
	/* --- 6. ELEMENTS
	/* ----------------------------------------------------------------------------- */
	/* 6.1 Alerts
	----------------------------------------------------------*/
	.alert {
	  border: none;
	  font-weight: 300;
	  padding: 1rem 1.5rem;
	  -webkit-border-radius: 0;
	  -moz-border-radius: 0;
	  -ms-border-radius: 0;
	  -o-border-radius: 0;
	  border-radius: 0;
	}

	.alert-primary {
	  background-color: #faeeee;
	}

	.alert-primary .close {
	  background-color: #fff;
	  color: <?php echo $soup_brand_clr; ?>;
	  -webkit-box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	  -moz-box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	  box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	}

	.alert-primary .close:hover, .alert-primary .close:focus {
	  background-color: <?php echo $soup_brand_clr; ?>;
	  color: #fff;
	}

	.alert-secondary {
	  background-color: #e9eaea;
	}

	.alert-secondary .close {
	  background-color: #fff;
	  color: #25282a;
	  -webkit-box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	  -moz-box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	  box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	}

	.alert-secondary .close:hover, .alert-secondary .close:focus {
	  background-color: #25282a;
	  color: #fff;
	}

	.alert-info {
	  background-color: #eef7fc;
	}

	.alert-info .close {
	  background-color: #fff;
	  color: #56aee5;
	  -webkit-box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	  -moz-box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	  box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	}

	.alert-info .close:hover, .alert-info .close:focus {
	  background-color: #56aee5;
	  color: #fff;
	}

	.alert-warning {
	  background-color: #fdf5ec;
	}

	.alert-warning .close {
	  background-color: #fff;
	  color: #ec9744;
	  -webkit-box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	  -moz-box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	  box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	}

	.alert-warning .close:hover, .alert-warning .close:focus {
	  background-color: #ec9744;
	  color: #fff;
	}

	.alert-danger {
	  background-color: #fceeee;
	}

	.alert-danger .close {
	  background-color: #fff;
	  color: #e15757;
	  -webkit-box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	  -moz-box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	  box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	}

	.alert-danger .close:hover, .alert-danger .close:focus {
	  background-color: #e15757;
	  color: #fff;
	}

	.alert-success {
	  background-color: #edf6f0;
	}

	.alert-success .close {
	  background-color: #fff;
	  color: #4aa36b;
	  -webkit-box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	  -moz-box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	  box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	}

	.alert-success .close:hover, .alert-success .close:focus {
	  background-color: #4aa36b;
	  color: #fff;
	}

	.alert-dark {
	  background-color: #eaeaea;
	}

	.alert-dark .close {
	  background-color: #fff;
	  color: #282b2e;
	  -webkit-box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	  -moz-box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	  box-shadow: 1px 1px 20px 0 rgba(0, 0, 0, 0.07);
	}

	.alert-dark .close:hover, .alert-dark .close:focus {
	  background-color: #282b2e;
	  color: #fff;
	}

	/* 6.2 Backgrounds
	----------------------------------------------------------*/
	/* Image / Slideshow */
	.bg-image,
	.bg-slideshow {
	  position: absolute;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 100%;
	  background-position: center center;
	  background-size: cover;
	  background-repeat: no-repeat;
	  z-index: 0;
	}

	.bg-image.bottom,
	.bg-slideshow.bottom {
	  background-position-y: bottom;
	}

	.bg-image > img {
	  display: none;
	}

	.bg-image + * {
	  position: relative;
	}

	.bg-fixed {
	  background-attachment: fixed;
	}

	@media only screen and (max-width: 767px) {
	  .bg-fixed {
	    background-attachment: scroll;
	  }
	}

	.bg-slideshow .slick-list, .bg-slideshow .slick-track {
	  height: 100%;
	  overflow: hidden;
	}

	.bg-multiply {
	  mix-blend-mode: multiply;
	}

	.bg-overlay {
	  mix-blend-mode: overlay;
	}

	/* Video */
	.bg-video {
	  position: absolute;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 100%;
	}

	.bg-video-placeholder {
	  display: none;
	}

	/* Map */
	.bg-map {
	  position: absolute;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 100%;
	}

	.bg-map.with-joiner:after {
	  position: absolute;
	  top: 0;
	  left: 0;
	  right: 0;
	  height: 45%;
	  content: ' ';
	  background-image: linear-gradient(to bottom, #fff, rgba(255, 255, 255, 0));
	}

	.bg-map.light-overlay:after, .bg-map.dark-overlay:after {
	  position: absolute;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 100%;
	  content: ' ';
	  -webkit-transition: all 0.3s ease-out;
	  -moz-transition: all 0.3s ease-out;
	  -o-transition: all 0.3s ease-out;
	  transition: all 0.3s ease-out;
	}

	.bg-map.light-overlay:after {
	  background: rgba(255, 255, 255, 0.5);
	}

	.bg-map.dark-overlay:after {
	  background: rgba(0, 0, 0, 0.5);
	}

	.bg-map.light-overlay:hover:after, .bg-map.dark-overlay:hover:after {
	  visibility: hidden;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	  opacity: 0;
	}

	.bg-map + * {
	  position: relative;
	}

	/* Colors */
	.bg-white {
	  background-color: #fff;
	}

	.bg-light {
	  background-color: #f3f4f4;
	}

	.bg-black {
	  background-color: #000;
	}

	.bg-primary {
	  background-color: <?php echo $soup_brand_clr; ?> !important;
	}

	.bg-secondary {
	  background-color: #25282a !important;
	}

	.bg-info {
	  background-color: #56aee5 !important;
	}

	.bg-warning {
	  background-color: #ec9744 !important;
	}

	.bg-danger {
	  background-color: #e15757 !important;
	}

	.bg-success {
	  background-color: #4aa36b !important;
	}

	.bg-dark {
	  background-color: #282b2e !important;
	}

	.bg-primary-tint {
	  background-color: #d66565;
	}

	.bg-primary-shade {
	  background-color: #bc4c4c;
	}

	.bg-facebook {
	  background-color: #213553;
	}

	.bg-twitter {
	  background-color: #3aa8db;
	}

	.bg-google {
	  background-color: #d04f3e;
	}

	.bg-behance {
	  background-color: #1882ff;
	}

	.bg-dribbble {
	  background-color: #e95aae;
	}

	.bg-flickr {
	  background-color: #f9429c;
	}

	.bg-instagram {
	  background-color: #4f86ac;
	}

	.bg-linkedin {
	  background-color: #008bc2;
	}

	.bg-pinterest {
	  background-color: #cb1f24;
	}

	.bg-skype {
	  background-color: #00bef4;
	}

	.bg-slack {
	  background-color: #44ba97;
	}

	.bg-tumblr {
	  background-color: #435971;
	}

	.bg-vimeo {
	  background-color: #0bc4ef;
	}

	.bg-vine {
	  background-color: #00be9b;
	}

	.bg-youtube {
	  background-color: #ed4533;
	}

	/* 6.3 Badges
	----------------------------------------------------------*/
	.badge {
	  border: none;
	  padding: 0.5rem 1rem;
	  -webkit-border-radius: 2rem;
	  -moz-border-radius: 2rem;
	  -ms-border-radius: 2rem;
	  -o-border-radius: 2rem;
	  border-radius: 2rem;
	  font-weight: 600;
	  font-size: 70%;
	}

	.badge-primary {
	  background-color: <?php echo $soup_brand_clr; ?>;
	}

	.badge-secondary {
	  background-color: #25282a;
	}

	.badge-info {
	  background-color: #56aee5;
	}

	.badge-warning {
	  background-color: #ec9744;
	}

	.badge-danger {
	  background-color: #e15757;
	}

	.badge-success {
	  background-color: #4aa36b;
	}

	.badge-dark {
	  background-color: #282b2e;
	}

	/* 6.4 Buttons
	----------------------------------------------------------*/
	.btn {
	  position: relative;
	  font-family: "Oswald", sans-serif;
	  font-weight: 400;
	  text-transform: uppercase;
	  -webkit-border-radius: 0;
	  -moz-border-radius: 0;
	  -ms-border-radius: 0;
	  -o-border-radius: 0;
	  border-radius: 0;
	  padding: 0.75rem 2rem 1rem;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  outline: none;
	  background: transparent;
	  border-width: 2px;
	  -webkit-backface-visibility: hidden;
	  -moz-backface-visibility: hidden;
	  -ms-backface-visibility: hidden;
	  -o-backface-visibility: hidden;
	  backface-visibility: hidden;
	  cursor: pointer;
	}

	@media only screen and (max-width: 575px) {
	  .btn {
	    padding-left: 1.25rem;
	    padding-right: 1.25rem;
	  }
	}

	.btn:before {
	  position: absolute;
	  top: -2px;
	  left: -2px;
	  bottom: -2px;
	  right: -2px;
	  -webkit-transform-origin: center bottom;
	  -moz-transform-origin: center bottom;
	  -ms-transform-origin: center bottom;
	  -o-transform-origin: center bottom;
	  transform-origin: center bottom;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  content: ' ';
	  visibility: hidden;
	  -webkit-transform: scaleY(0);
	  -moz-transform: scaleY(0);
	  -ms-transform: scaleY(0);
	  -o-transform: scaleY(0);
	  transform: scaleY(0);
	}

	.btn:hover, .btn:focus, .btn:active, .btn:focus:active {
	  outline: none;
	  -webkit-transform: translateY(-2px);
	  -moz-transform: translateY(-2px);
	  -ms-transform: translateY(-2px);
	  -o-transform: translateY(-2px);
	  transform: translateY(-2px);
	  -webkit-box-shadow: none;
	  -moz-box-shadow: none;
	  box-shadow: none;
	}

	.btn:hover:before, .btn:focus:before, .btn:active:before, .btn:focus:active:before {
	  visibility: visible;
	  -webkit-transform: scaleY(1);
	  -moz-transform: scaleY(1);
	  -ms-transform: scaleY(1);
	  -o-transform: scaleY(1);
	  transform: scaleY(1);
	}

	.btn > span {
	  position: relative;
	  z-index: 2;
	}

	.btn i {
	  position: relative;
	  top: 1px;
	}

	.btn i > i {
	  display: inline-block;
	  -webkit-transition: -webkit-transform 0.2s ease-out, opacity 0.2s ease-out;
	  -moz-transition: -moz-transform 0.2s ease-out, opacity 0.2s ease-out;
	  -o-transition: -o-transform 0.2s ease-out, opacity 0.2s ease-out;
	  transition: transform 0.2s ease-out, opacity 0.2s ease-out;
	}

	.btn img {
	  height: 1em;
	  position: relative;
	  top: -0.05em;
	  display: inline-block;
	  vertical-align: middle;
	}

	/* Sizes */
	.btn-lg {
	  padding: 1.5rem 3rem 1.75rem;
	  font-size: 1.2rem;
	  -webkit-border-radius: 0;
	  -moz-border-radius: 0;
	  -ms-border-radius: 0;
	  -o-border-radius: 0;
	  border-radius: 0;
	}

	@media only screen and (max-width: 575px) {
	  .btn-lg {
	    padding-left: 1.5rem;
	    padding-right: 1.5rem;
	  }
	}

	.btn-sm {
	  padding: 0.75rem 1.2rem;
	  font-size: 0.9rem;
	  -webkit-border-radius: 0;
	  -moz-border-radius: 0;
	  -ms-border-radius: 0;
	  -o-border-radius: 0;
	  border-radius: 0;
	}

	/* Types */
	.btn-primary {
	  border-color: <?php echo $soup_brand_clr; ?>;
	  background-color: <?php echo $soup_brand_clr; ?>;
	  color: #fff;
	}

	.btn-primary:before {
	  background-color: rgba(0,0,0,.1);
	}

	.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary:focus:active {
	  border-color: <?php echo $soup_brand_clr; ?>;
	  background-color: <?php echo $soup_brand_clr; ?>;
	  color: #fff;
	}

	.btn-secondary {
	  border-color: #25282a;
	  background-color: #25282a;
	  color: #fff;
	}

	.btn-secondary:before {
	  background-color: #212426;
	}

	.btn-secondary:hover, .btn-secondary:focus, .btn-secondary:active, .btn-secondary:focus:active {
	  border-color: #25282a;
	  background-color: #25282a;
	  color: #fff;
	}

	.btn-info {
	  border-color: #56aee5;
	  background-color: #56aee5;
	  color: #fff;
	}

	.btn-info:before {
	  background-color: #4d9dce;
	}

	.btn-info:hover, .btn-info:focus, .btn-info:active, .btn-info:focus:active {
	  border-color: #56aee5;
	  background-color: #56aee5;
	  color: #fff;
	}

	.btn-warning {
	  border-color: #ec9744;
	  background-color: #ec9744;
	  color: #fff;
	}

	.btn-warning:before {
	  background-color: #d4883d;
	}

	.btn-warning:hover, .btn-warning:focus, .btn-warning:active, .btn-warning:focus:active {
	  border-color: #ec9744;
	  background-color: #ec9744;
	  color: #fff;
	}

	.btn-danger {
	  border-color: #e15757;
	  background-color: #e15757;
	  color: #fff;
	}

	.btn-danger:before {
	  background-color: #cb4e4e;
	}

	.btn-danger:hover, .btn-danger:focus, .btn-danger:active, .btn-danger:focus:active {
	  border-color: #e15757;
	  background-color: #e15757;
	  color: #fff;
	}

	.btn-success {
	  border-color: #4aa36b;
	  background-color: #4aa36b;
	  color: #fff;
	}

	.btn-success:before {
	  background-color: #439360;
	}

	.btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success:focus:active {
	  border-color: #4aa36b;
	  background-color: #4aa36b;
	  color: #fff;
	}

	.btn-dark {
	  border-color: #282b2e;
	  background-color: #282b2e;
	  color: #fff;
	}

	.btn-dark:before {
	  background-color: #242729;
	}

	.btn-dark:hover, .btn-dark:focus, .btn-dark:active, .btn-dark:focus:active {
	  border-color: #282b2e;
	  background-color: #282b2e;
	  color: #fff;
	}

	.btn-secondary:before {
	  background-color: <?php echo $soup_brand_clr; ?>;
	}

	.btn-link {
	  color: inherit;
	}

	.btn-link:hover, .btn-link:focus, .btn-link:active, .btn-link:focus:active {
	  color: <?php echo $soup_brand_clr; ?>;
	  text-decoration: none;
	}

	.btn-outline-primary {
	  border-color: <?php echo $soup_brand_clr; ?>;
	  color: inherit;
	}

	.btn-outline-primary:before {
	  background-color: <?php echo $soup_brand_clr; ?>;
	}

	.btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active, .btn-outline-primary:focus:active {
	  border-color: <?php echo $soup_brand_clr; ?>;
	  background: transparent;
	  color: #fff;
	}

	.btn-outline-secondary {
	  border-color: #25282a;
	  color: inherit;
	}

	.btn-outline-secondary:before {
	  background-color: #25282a;
	}

	.btn-outline-secondary:hover, .btn-outline-secondary:focus, .btn-outline-secondary:active, .btn-outline-secondary:focus:active {
	  border-color: #25282a;
	  background: transparent;
	  color: #fff;
	}

	.btn-outline-info {
	  border-color: #56aee5;
	  color: inherit;
	}

	.btn-outline-info:before {
	  background-color: #56aee5;
	}

	.btn-outline-info:hover, .btn-outline-info:focus, .btn-outline-info:active, .btn-outline-info:focus:active {
	  border-color: #56aee5;
	  background: transparent;
	  color: #fff;
	}

	.btn-outline-warning {
	  border-color: #ec9744;
	  color: inherit;
	}

	.btn-outline-warning:before {
	  background-color: #ec9744;
	}

	.btn-outline-warning:hover, .btn-outline-warning:focus, .btn-outline-warning:active, .btn-outline-warning:focus:active {
	  border-color: #ec9744;
	  background: transparent;
	  color: #fff;
	}

	.btn-outline-danger {
	  border-color: #e15757;
	  color: inherit;
	}

	.btn-outline-danger:before {
	  background-color: #e15757;
	}

	.btn-outline-danger:hover, .btn-outline-danger:focus, .btn-outline-danger:active, .btn-outline-danger:focus:active {
	  border-color: #e15757;
	  background: transparent;
	  color: #fff;
	}

	.btn-outline-success {
	  border-color: #4aa36b;
	  color: inherit;
	}

	.btn-outline-success:before {
	  background-color: #4aa36b;
	}

	.btn-outline-success:hover, .btn-outline-success:focus, .btn-outline-success:active, .btn-outline-success:focus:active {
	  border-color: #4aa36b;
	  background: transparent;
	  color: #fff;
	}

	.btn-outline-dark {
	  border-color: #282b2e;
	  color: inherit;
	}

	.btn-outline-dark:before {
	  background-color: #282b2e;
	}

	.btn-outline-dark:hover, .btn-outline-dark:focus, .btn-outline-dark:active, .btn-outline-dark:focus:active {
	  border-color: #282b2e;
	  background: transparent;
	  color: #fff;
	}

	.btn-outline-white {
	  border-color: #fff;
	  color: inherit;
	}

	.btn-outline-white:hover, .btn-outline-white:focus, .btn-outline-white:active, .btn-outline-white:focus:active {
	  border-color: #fff;
	  background: #fff;
	  color: <?php echo $soup_brand_clr; ?>;
	}

	.btn-group > .btn:first-child:not(:last-child) {
	  -moz-border-radius-bottomright: 0;
	  -webkit-border-bottom-right-radius: 0;
	  border-bottom-right-radius: 0;
	  -moz-border-radius-topright: 0;
	  -webkit-border-top-right-radius: 0;
	  border-top-right-radius: 0;
	}

	.btn-group > .btn:last-child:not(:first-child) {
	  -moz-border-radius-bottomleft: 0;
	  -webkit-border-bottom-left-radius: 0;
	  border-bottom-left-radius: 0;
	  -moz-border-radius-topleft: 0;
	  -webkit-border-top-left-radius: 0;
	  border-top-left-radius: 0;
	}

	.btn-group > .btn:not(.btn-link):not(:first-child) {
	  border-left: 1px solid rgba(255, 255, 255, 0.2);
	}

	.btn-group > .btn-secondary:not(:first-child) {
	  border-left-color: rgba(255, 255, 255, 0.15) !important;
	}

	.btn-group > .btn-dark:not(:first-child) {
	  border-left-color: rgba(255, 255, 255, 0.15) !important;
	}

	.btn-group .btn-outline-primary + .price {
	  background-color: <?php echo $soup_brand_clr; ?>;
	  color: #fff;
	}

	.btn-group .btn:hover, .btn-group .btn:focus {
	  -webkit-transform: translateY(0);
	  -moz-transform: translateY(0);
	  -ms-transform: translateY(0);
	  -o-transform: translateY(0);
	  transform: translateY(0);
	}

	.btn-group .price {
	  font-family: "Oswald", sans-serif;
	  font-weight: 400;
	  text-transform: uppercase;
	  padding: 0.75rem 1rem 1rem;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.btn-group .price.price-lg {
	  padding: 1.5rem 1rem 1.75rem;
	  font-size: 1.2rem;
	}

	/* Submit Button */
	.btn-submit .description {
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.btn-submit .success, .btn-submit .error {
	  position: absolute;
	  left: 0;
	  right: 0;
	  text-align: center;
	  visibility: hidden;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.btn-submit svg {
	  position: relative;
	  top: -0.5rem;
	  height: 2.5rem;
	  width: 2.5rem;
	}

	.btn-submit.loading {
	  -webkit-pointer-events: none;
	  pointer-events: none;
	}

	.btn-submit.success .description, .btn-submit.error .description {
	  visibility: hidden;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	  opacity: 0;
	}

	.btn-submit.success .success {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	  visibility: visible;
	}

	.btn-submit.success .success > svg > path {
	  stroke-dashoffset: 0;
	  -webkit-transition: all 0.3s ease-out;
	  -webkit-transition-delay: 0.25s;
	  -moz-transition: all 0.3s ease-out 0.25s;
	  -o-transition: all 0.3s ease-out 0.25s;
	  transition: all 0.3s ease-out 0.25s;
	}

	.btn-submit.error {
	  background-color: #bbc4c6;
	  border-color: #bbc4c6;
	}

	.btn-submit.error .error {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	  visibility: visible;
	}

	@-moz-keyframes btnLoading {
	  0% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	  12% {
	    -webkit-transform: scale(0.7, 0.7);
	    -moz-transform: scale(0.7, 0.7);
	    -ms-transform: scale(0.7, 0.7);
	    -o-transform: scale(0.7, 0.7);
	    transform: scale(0.7, 0.7);
	  }
	  38% {
	    -webkit-transform: scale(1.1, 1.1);
	    -moz-transform: scale(1.1, 1.1);
	    -ms-transform: scale(1.1, 1.1);
	    -o-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  62% {
	    -webkit-transform: scale(0.8, 0.8);
	    -moz-transform: scale(0.8, 0.8);
	    -ms-transform: scale(0.8, 0.8);
	    -o-transform: scale(0.8, 0.8);
	    transform: scale(0.8, 0.8);
	  }
	  87% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}

	@-webkit-keyframes btnLoading {
	  0% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	  12% {
	    -webkit-transform: scale(0.7, 0.7);
	    -moz-transform: scale(0.7, 0.7);
	    -ms-transform: scale(0.7, 0.7);
	    -o-transform: scale(0.7, 0.7);
	    transform: scale(0.7, 0.7);
	  }
	  38% {
	    -webkit-transform: scale(1.1, 1.1);
	    -moz-transform: scale(1.1, 1.1);
	    -ms-transform: scale(1.1, 1.1);
	    -o-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  62% {
	    -webkit-transform: scale(0.8, 0.8);
	    -moz-transform: scale(0.8, 0.8);
	    -ms-transform: scale(0.8, 0.8);
	    -o-transform: scale(0.8, 0.8);
	    transform: scale(0.8, 0.8);
	  }
	  87% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}

	@-o-keyframes btnLoading {
	  0% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	  12% {
	    -webkit-transform: scale(0.7, 0.7);
	    -moz-transform: scale(0.7, 0.7);
	    -ms-transform: scale(0.7, 0.7);
	    -o-transform: scale(0.7, 0.7);
	    transform: scale(0.7, 0.7);
	  }
	  38% {
	    -webkit-transform: scale(1.1, 1.1);
	    -moz-transform: scale(1.1, 1.1);
	    -ms-transform: scale(1.1, 1.1);
	    -o-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  62% {
	    -webkit-transform: scale(0.8, 0.8);
	    -moz-transform: scale(0.8, 0.8);
	    -ms-transform: scale(0.8, 0.8);
	    -o-transform: scale(0.8, 0.8);
	    transform: scale(0.8, 0.8);
	  }
	  87% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}

	@-ms-keyframes btnLoading {
	  0% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	  12% {
	    -webkit-transform: scale(0.7, 0.7);
	    -moz-transform: scale(0.7, 0.7);
	    -ms-transform: scale(0.7, 0.7);
	    -o-transform: scale(0.7, 0.7);
	    transform: scale(0.7, 0.7);
	  }
	  38% {
	    -webkit-transform: scale(1.1, 1.1);
	    -moz-transform: scale(1.1, 1.1);
	    -ms-transform: scale(1.1, 1.1);
	    -o-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  62% {
	    -webkit-transform: scale(0.8, 0.8);
	    -moz-transform: scale(0.8, 0.8);
	    -ms-transform: scale(0.8, 0.8);
	    -o-transform: scale(0.8, 0.8);
	    transform: scale(0.8, 0.8);
	  }
	  87% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}

	@keyframes btnLoading {
	  0% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	  12% {
	    -webkit-transform: scale(0.7, 0.7);
	    -moz-transform: scale(0.7, 0.7);
	    -ms-transform: scale(0.7, 0.7);
	    -o-transform: scale(0.7, 0.7);
	    transform: scale(0.7, 0.7);
	  }
	  38% {
	    -webkit-transform: scale(1.1, 1.1);
	    -moz-transform: scale(1.1, 1.1);
	    -ms-transform: scale(1.1, 1.1);
	    -o-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  62% {
	    -webkit-transform: scale(0.8, 0.8);
	    -moz-transform: scale(0.8, 0.8);
	    -ms-transform: scale(0.8, 0.8);
	    -o-transform: scale(0.8, 0.8);
	    transform: scale(0.8, 0.8);
	  }
	  87% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}

	/* Play Button */
	.btn-play {
	  background-color: transparent;
	  -webkit-appearance: none;
	  -moz-appearance: none;
	  appearance: none;
	  border: none;
	  outline: none;
	  cursor: pointer;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  position: relative;
	  display: inline-block;
	  font-size: 52px;
	  width: 92px;
	  height: 92px;
	  vertical-align: middle;
	  border: 2px solid #fff;
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	}

	.btn-play:before {
	  position: absolute;
	  top: -1px;
	  left: -1px;
	  bottom: -1px;
	  right: -1px;
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	  background-color: #fff;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	  opacity: 0;
	  visibility: hidden;
	  content: ' ';
	}

	.btn-play:after {
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  -webkit-transform: translate3d(-50%, -50%, 0);
	  -moz-transform: translate3d(-50%, -50%, 0);
	  -ms-transform: translate3d(-50%, -50%, 0);
	  -o-transform: translate3d(-50%, -50%, 0);
	  transform: translate3d(-50%, -50%, 0);
	  -webkit-filter: blur(0);
	  -moz-filter: blur(0);
	  filter: blur(0);
	  border-style: solid;
	  border-width: 8px 0 8px 14px;
	  border-color: transparent transparent transparent #ffffff;
	  content: ' ';
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.btn-play:hover, .btn-play:focus, .btn-play:active, .btn-play:focus:active {
	  outline: none;
	}

	.btn-play:hover:before, .btn-play:focus:before, .btn-play:active:before, .btn-play:focus:active:before {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	  visibility: visible;
	}

	.btn-play:hover:after, .btn-play:focus:after, .btn-play:active:after, .btn-play:focus:active:after {
	  border-color: transparent transparent transparent #383c40;
	}

	/* Play Button #2 */
	.btn-play-2 {
	  background-color: transparent;
	  -webkit-appearance: none;
	  -moz-appearance: none;
	  appearance: none;
	  border: none;
	  outline: none;
	  cursor: pointer;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  position: relative;
	  display: inline-block;
	  vertical-align: middle;
	  font-weight: 600;
	}

	.btn-play-2 > span {
	  position: relative;
	  width: 40px;
	  height: 40px;
	  border: 2px solid <?php echo $soup_brand_clr; ?>;
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	  display: inline-block;
	  vertical-align: middle;
	  margin-right: 1rem;
	}

	.btn-play-2 > span:before {
	  position: absolute;
	  top: 0;
	  left: 0;
	  bottom: 0;
	  right: 0;
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	  background-color: <?php echo $soup_brand_clr; ?>;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  -webkit-transform: scale(0.9, 0.9);
	  -moz-transform: scale(0.9, 0.9);
	  -ms-transform: scale(0.9, 0.9);
	  -o-transform: scale(0.9, 0.9);
	  transform: scale(0.9, 0.9);
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	  opacity: 0;
	  visibility: hidden;
	  content: ' ';
	}

	.btn-play-2 > span:after {
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  -webkit-transform: translate3d(-50%, -50%, 0);
	  -moz-transform: translate3d(-50%, -50%, 0);
	  -ms-transform: translate3d(-50%, -50%, 0);
	  -o-transform: translate3d(-50%, -50%, 0);
	  transform: translate3d(-50%, -50%, 0);
	  -webkit-filter: blur(0);
	  -moz-filter: blur(0);
	  filter: blur(0);
	  border-style: solid;
	  border-width: 6px 0 6px 10px;
	  border-color: transparent transparent transparent <?php echo $soup_brand_clr; ?>;
	  content: ' ';
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.btn-play-2:hover, .btn-play-2:focus, .btn-play-2:active, .btn-play-2:focus:active {
	  outline: none;
	  color: inherit;
	}

	.btn-play-2:hover > span:before, .btn-play-2:focus > span:before, .btn-play-2:active > span:before, .btn-play-2:focus:active > span:before {
	  -webkit-transform: scale(1.2, 1.2);
	  -moz-transform: scale(1.2, 1.2);
	  -ms-transform: scale(1.2, 1.2);
	  -o-transform: scale(1.2, 1.2);
	  transform: scale(1.2, 1.2);
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	  visibility: visible;
	}

	.btn-play-2:hover > span:after, .btn-play-2:focus > span:after, .btn-play-2:active > span:after, .btn-play-2:focus:active > span:after {
	  border-color: transparent transparent transparent #fff;
	}

	/* Download Button */
	.btn-download {
	  background-color: transparent;
	  -webkit-appearance: none;
	  -moz-appearance: none;
	  appearance: none;
	  border: none;
	  outline: none;
	  cursor: pointer;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  position: relative;
	  font-weight: 300;
	  -webkit-border-radius: 40px;
	  -moz-border-radius: 40px;
	  -ms-border-radius: 40px;
	  -o-border-radius: 40px;
	  border-radius: 40px;
	  color: #fff;
	  padding: 1rem 2rem;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  display: inline-block;
	  outline: none;
	  -webkit-backface-visibility: hidden;
	  -moz-backface-visibility: hidden;
	  -ms-backface-visibility: hidden;
	  -o-backface-visibility: hidden;
	  backface-visibility: hidden;
	  font-family: "Oswald", sans-serif;
	  background-color: #282b2e;
	  min-width: 220px;
	  margin-bottom: 0.2rem;
	  text-align: left;
	}

	@media only screen and (max-width: 575px) {
	  .btn-download {
	    min-width: 180px;
	  }
	}

	.btn-download > .i {
	  display: inline-block;
	  vertical-align: middle;
	  margin-right: 1rem;
	}

	.btn-download > .i i {
	  font-size: 1.5rem;
	}

	.btn-download > .i img {
	  height: 1.4rem;
	}

	.btn-download > .content {
	  display: inline-block;
	  vertical-align: middle;
	  line-height: 1.1;
	}

	.btn-download > .content > span:first-child {
	  font-size: 0.9rem;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
	  opacity: 0.5;
	  display: block;
	}

	.btn-download > .content > span:last-child {
	  font-size: 1.25rem;
	}

	.btn-download:hover, .btn-download:focus, .btn-download:active, .btn-download:focus:active {
	  outline: none;
	  color: #fff;
	  -webkit-transform: translateY(2px);
	  -moz-transform: translateY(2px);
	  -ms-transform: translateY(2px);
	  -o-transform: translateY(2px);
	  transform: translateY(2px);
	}

	/* 6.5 Carousel
	----------------------------------------------------------*/
	.carousel {
	  position: relative;
	}

	.carousel.carousel-items {
	  margin-left: -15px;
	  margin-right: -15px;
	}

	.carousel.carousel-items .carousel-item {
	  padding-left: 15px;
	  padding-right: 15px;
	}

	.carousel.slider .slide {
	  overflow: hidden !important;
	}

	/* Arrows */
	.slick-prev,
	.slick-next {
	  position: absolute;
	  display: block;
	  height: 20px;
	  width: 45px;
	  line-height: 0px;
	  font-size: 0px;
	  cursor: pointer;
	  background: transparent;
	  color: transparent;
	  top: 50%;
	  -webkit-transform: translate(0, -50%);
	  -moz-transform: translate(0, -50%);
	  -ms-transform: translate(0, -50%);
	  -o-transform: translate(0, -50%);
	  transform: translate(0, -50%);
	  padding: 0;
	  border: none;
	  outline: none;
	  z-index: 2;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  visibility: hidden;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	  opacity: 0;
	  text-align: center;
	}

	.slick-prev:hover, .slick-prev:focus,
	.slick-next:hover,
	.slick-next:focus {
	  outline: none;
	  background: transparent;
	  color: transparent;
	}

	.slick-prev:hover:before, .slick-prev:focus:before,
	.slick-next:hover:before,
	.slick-next:focus:before {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
	  opacity: 0.8;
	}

	.slick-prev.slick-disabled:before,
	.slick-next.slick-disabled:before {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=30);
	  opacity: 0.3;
	}

	.slick-prev:before,
	.slick-next:before {
	  font-family: 'themify';
	  font-size: 1.7rem;
	  line-height: 1;
	  color: #383c40;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=70);
	  opacity: 0.7;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.slick-prev {
	  left: -45px;
	}

	[dir="rtl"] .slick-prev {
	  left: auto;
	  right: -45px;
	}

	.slick-prev:before {
	  content: '\e629';
	}

	[dir="rtl"] .slick-prev:before {
	  content: '\e628';
	}

	.slick-next {
	  right: -45px;
	}

	[dir="rtl"] .slick-next {
	  left: -45px;
	  right: auto;
	}

	.slick-next:before {
	  content: '\e628';
	}

	[dir="rtl"] .slick-next:before {
	  content: '\e629';
	}

	.slick-slider:hover .slick-prev,
	.slick-slider:hover .slick-next {
	  visibility: visible;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	}

	/* Dots */
	.slick-dots {
	  list-style: none;
	  display: block;
	  text-align: center;
	  padding: 0;
	  margin: 1rem 0 0;
	  width: 100%;
	}

	.slick-dots li {
	  position: relative;
	  display: inline-block;
	  height: 20px;
	  width: 20px;
	  margin: 0;
	  padding: 0;
	  cursor: pointer;
	}

	.slick-dots li button {
	  position: relative;
	  border: 0;
	  background: transparent;
	  display: block;
	  height: 100%;
	  width: 100%;
	  outline: none;
	  line-height: 0px;
	  font-size: 0px;
	  color: transparent;
	  cursor: pointer;
	}

	.slick-dots li button:hover, .slick-dots li button:focus {
	  outline: none;
	}

	.slick-dots li button:before {
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  margin-left: -3px;
	  margin-top: -3px;
	  width: 6px;
	  height: 6px;
	  background-color: #383c40;
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=40);
	  opacity: 0.4;
	  content: ' ';
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  -webkit-transform-origin: center bottom;
	  -moz-transform-origin: center bottom;
	  -ms-transform-origin: center bottom;
	  -o-transform-origin: center bottom;
	  transform-origin: center bottom;
	}

	.slick-dots li.slick-active button:before {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	}

	.inner-controls .slick-prev:before, .inner-controls .slick-next:before {
	  color: #fff;
	  text-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
	}

	.inner-controls .slick-prev {
	  left: 25px;
	}

	[dir="rtl"] .inner-controls .slick-prev {
	  right: 25px;
	}

	.inner-controls .slick-next {
	  right: 25px;
	}

	[dir="rtl"] .inner-controls .slick-next {
	  left: 25px;
	}

	.inner-controls .slick-dots {
	  position: absolute;
	  bottom: 20px;
	}

	.inner-controls .slick-dots li button:before {
	  background-color: #fff;
	}

	.inner-controls .slick-dots li.slick-active button:before {
	  background-color: #fff;
	}

	/* 6.6 Forms
	----------------------------------------------------------*/
	/* Form Group */
	.form-group {
	  margin-bottom: 0.5rem;
	}

	/* Input Group */
	.input-group .btn:hover, .input-group .btn:focus, .input-group .btn:active, .input-group .btn:focus:active {
	  -webkit-transform: translateY(0);
	  -moz-transform: translateY(0);
	  -ms-transform: translateY(0);
	  -o-transform: translateY(0);
	  transform: translateY(0);
	}

	.input-group-btn:not(:first-child) > .btn, .input-group-btn:not(:first-child) > .btn-group {
	  margin-left: -2px;
	}

	/* Form Control */
	.form-control {
	  -webkit-appearance: none;
	  -moz-appearance: none;
	  appearance: none;
	  border-color: #e0e0e0;
	  font-weight: 300;
	  padding: 1rem;
	  border: 2px solid #e0e0e0;
	  -webkit-box-shadow: inset 1px 1px 2px 0 rgba(40, 43, 46, 0.06);
	  -moz-box-shadow: inset 1px 1px 2px 0 rgba(40, 43, 46, 0.06);
	  box-shadow: inset 1px 1px 2px 0 rgba(40, 43, 46, 0.06);
	  -webkit-border-radius: 0;
	  -moz-border-radius: 0;
	  -ms-border-radius: 0;
	  -o-border-radius: 0;
	  border-radius: 0;
	}

	.form-control:focus {
	  border-color: <?php echo $soup_brand_clr; ?>;
	  -webkit-box-shadow: inset 1px 1px 2px 0 rgba(209, 84, 84, 0.1);
	  -moz-box-shadow: inset 1px 1px 2px 0 rgba(209, 84, 84, 0.1);
	  box-shadow: inset 1px 1px 2px 0 rgba(209, 84, 84, 0.1);
	}

	.form-control.error {
	  border-color: #f6cdcd;
	  background-color: #fefcfc;
	}

	.form-control:-ms-input-placeholder {
	  color: inherit;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
	  opacity: 0.5;
	}

	.form-control:-moz-placeholder {
	  color: inherit;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
	  opacity: 0.5;
	}

	.form-control::-moz-placeholder {
	  color: inherit;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
	  opacity: 0.5;
	}

	.form-control::-webkit-input-placeholder {
	  color: inherit;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
	  opacity: 0.5;
	}

	.form-control-sm {
	  padding: 0.75rem;
	  font-size: 0.9rem;
	  -webkit-border-radius: 0;
	  -moz-border-radius: 0;
	  -ms-border-radius: 0;
	  -o-border-radius: 0;
	  border-radius: 0;
	}

	.form-control-lg {
	  padding: 1.75rem;
	  font-size: 1.2rem;
	  -webkit-border-radius: 0;
	  -moz-border-radius: 0;
	  -ms-border-radius: 0;
	  -o-border-radius: 0;
	  border-radius: 0;
	}

	.dark .form-control {
	  border-color: #fff;
	}

	/* Select */
	.select-container {
	  position: relative;
	}

	.select-container:after {
	  position: absolute;
	  top: 50%;
	  display: block;
	  -webkit-transform: translate3d(0, -50%, 0);
	  -moz-transform: translate3d(0, -50%, 0);
	  -ms-transform: translate3d(0, -50%, 0);
	  -o-transform: translate3d(0, -50%, 0);
	  transform: translate3d(0, -50%, 0);
	  right: 13px;
	  font-size: 0.8rem;
	  color: #383c40;
	  font-family: themify;
	  content: "\e62a";
	}

	select.form-control:not([size]):not([multiple]) {
	  height: calc(3.25rem + 4px);
	}

	/* Label */
	label {
	  font-weight: 400;
	}

	/* Custom Controls */
	.custom-control {
	  min-height: 1.5em;
	  padding-left: 1.9em;
	  margin-right: 1em;
	}

	/* Radio - Custom */
	.custom-radio .custom-control-input + .custom-control-indicator {
	  top: 0.1em;
	  font-weight: 400;
	  font-family: "Oswald", sans-serif;
	  width: 1.3em;
	  height: 1.3em;
	  margin-right: 0.5rem;
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	  border: 2px solid #e0e0e0;
	  background-color: #fff;
	}

	.custom-radio .custom-control-input + .custom-control-indicator > svg {
	  position: absolute;
	  top: 0;
	  left: 0;
	  height: 100%;
	  width: 100%;
	}

	.custom-radio .custom-control-input + .custom-control-indicator > svg > path {
	  stroke: <?php echo $soup_brand_clr; ?>;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.custom-radio .custom-control-input:checked + .custom-control-indicator > svg > path {
	  stroke-dashoffset: 0;
	}

	.custom-radio .custom-control-input:focus + .custom-control-indicator {
	  -webkit-box-shadow: none;
	  -moz-box-shadow: none;
	  box-shadow: none;
	  border-color: #cacaca;
	}

	/* Checkbox - Custom */
	.custom-checkbox .custom-control-input + .custom-control-indicator {
	  top: 0.1em;
	  font-weight: 400;
	  font-family: "Oswald", sans-serif;
	  width: 1.3em;
	  height: 1.3em;
	  margin-right: 0.5rem;
	  -webkit-border-radius: 0;
	  -moz-border-radius: 0;
	  -ms-border-radius: 0;
	  -o-border-radius: 0;
	  border-radius: 0;
	  border: 2px solid #e0e0e0;
	  background-color: #fff;
	}

	.custom-checkbox .custom-control-input + .custom-control-indicator > svg {
	  position: absolute;
	  top: 0;
	  left: 0;
	  height: 100%;
	  width: 100%;
	}

	.custom-checkbox .custom-control-input + .custom-control-indicator > svg > path {
	  stroke: <?php echo $soup_brand_clr; ?>;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.custom-checkbox .custom-control-input:checked + .custom-control-indicator > svg > path {
	  stroke-dashoffset: 0;
	}

	.custom-checkbox .custom-control-input:focus + .custom-control-indicator {
	  -webkit-box-shadow: none;
	  -moz-box-shadow: none;
	  box-shadow: none;
	}

	/* 6.7 Icons
	----------------------------------------------------------*/
	.icon {
	  position: relative;
	  display: inline-block;
	  font-size: 40px;
	  width: 52px;
	  vertical-align: middle;
	}

	.icon.icon-sm {
	  font-size: 18px;
	  width: 30px;
	}

	.icon.icon-lg {
	  font-size: 76px;
	  width: 88px;
	}

	.icon.icon-xl {
	  font-size: 120px;
	  width: 130px;
	}

	.icon.icon-primary {
	  color: <?php echo $soup_brand_clr; ?>;
	}

	.icon.icon-secondary {
	  color: #25282a;
	}

	.icon.icon-info {
	  color: #56aee5;
	}

	.icon.icon-warning {
	  color: #ec9744;
	}

	.icon.icon-danger {
	  color: #e15757;
	}

	.icon.icon-success {
	  color: #4aa36b;
	}

	.icon.icon-dark {
	  color: #282b2e;
	}

	.icon.icon-dark {
	  color: rgba(0, 0, 0, 0.4);
	}

	.icon.icon-default {
	  color: #bbc4c6;
	}

	.icon.icon-facebook {
	  color: #bbc4c6;
	}

	.icon.icon-facebook:hover, .icon.icon-facebook:focus {
	  color: #213553;
	}

	.icon.icon-twitter {
	  color: #bbc4c6;
	}

	.icon.icon-twitter:hover, .icon.icon-twitter:focus {
	  color: #3aa8db;
	}

	.icon.icon-google {
	  color: #bbc4c6;
	}

	.icon.icon-google:hover, .icon.icon-google:focus {
	  color: #d04f3e;
	}

	.icon.icon-behance {
	  color: #bbc4c6;
	}

	.icon.icon-behance:hover, .icon.icon-behance:focus {
	  color: #1882ff;
	}

	.icon.icon-dribbble {
	  color: #bbc4c6;
	}

	.icon.icon-dribbble:hover, .icon.icon-dribbble:focus {
	  color: #e95aae;
	}

	.icon.icon-flickr {
	  color: #bbc4c6;
	}

	.icon.icon-flickr:hover, .icon.icon-flickr:focus {
	  color: #f9429c;
	}

	.icon.icon-instagram {
	  color: #bbc4c6;
	}

	.icon.icon-instagram:hover, .icon.icon-instagram:focus {
	  color: #4f86ac;
	}

	.icon.icon-linkedin {
	  color: #bbc4c6;
	}

	.icon.icon-linkedin:hover, .icon.icon-linkedin:focus {
	  color: #008bc2;
	}

	.icon.icon-pinterest {
	  color: #bbc4c6;
	}

	.icon.icon-pinterest:hover, .icon.icon-pinterest:focus {
	  color: #cb1f24;
	}

	.icon.icon-skype {
	  color: #bbc4c6;
	}

	.icon.icon-skype:hover, .icon.icon-skype:focus {
	  color: #00bef4;
	}

	.icon.icon-slack {
	  color: #bbc4c6;
	}

	.icon.icon-slack:hover, .icon.icon-slack:focus {
	  color: #44ba97;
	}

	.icon.icon-tumblr {
	  color: #bbc4c6;
	}

	.icon.icon-tumblr:hover, .icon.icon-tumblr:focus {
	  color: #435971;
	}

	.icon.icon-vimeo {
	  color: #bbc4c6;
	}

	.icon.icon-vimeo:hover, .icon.icon-vimeo:focus {
	  color: #0bc4ef;
	}

	.icon.icon-vine {
	  color: #bbc4c6;
	}

	.icon.icon-vine:hover, .icon.icon-vine:focus {
	  color: #00be9b;
	}

	.icon.icon-youtube {
	  color: #bbc4c6;
	}

	.icon.icon-youtube:hover, .icon.icon-youtube:focus {
	  color: #ed4533;
	}

	.icon.icon-circle {
	  height: 52px;
	  font-size: 20px;
	  text-align: center;
	  color: #fff;
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	  text-align: center;
	}

	.icon.icon-circle > * {
	  position: relative;
	  z-index: 2;
	  line-height: 48px;
	}

	.icon.icon-circle.icon-xs {
	  height: 26px;
	  font-size: 11px;
	}

	.icon.icon-circle.icon-xs > * {
	  line-height: 26px;
	}

	.icon.icon-circle.icon-sm {
	  height: 30px;
	  font-size: 12px;
	}

	.icon.icon-circle.icon-sm > * {
	  line-height: 30px;
	}

	.icon.icon-circle.icon-lg {
	  height: 88px;
	  font-size: 36px;
	}

	.icon.icon-circle.icon-lg > * {
	  line-height: 88px;
	}

	.icon.icon-circle.icon-primary {
	  background-color: <?php echo $soup_brand_clr; ?>;
	}

	.icon.icon-circle.icon-secondary {
	  background-color: #25282a;
	}

	.icon.icon-circle.icon-info {
	  background-color: #56aee5;
	}

	.icon.icon-circle.icon-warning {
	  background-color: #ec9744;
	}

	.icon.icon-circle.icon-danger {
	  background-color: #e15757;
	}

	.icon.icon-circle.icon-success {
	  background-color: #4aa36b;
	}

	.icon.icon-circle.icon-dark {
	  background-color: #282b2e;
	}

	.icon.icon-circle.icon-white {
	  color: <?php echo $soup_brand_clr; ?>;
	}

	.icon.icon-circle.icon-white:before {
	  background-color: #fff;
	}

	.icon.icon-circle.icon-facebook {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-facebook:hover, .icon.icon-circle.icon-facebook:focus {
	  color: #fff;
	  background-color: #213553;
	}

	.icon.icon-circle.icon-twitter {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-twitter:hover, .icon.icon-circle.icon-twitter:focus {
	  color: #fff;
	  background-color: #3aa8db;
	}

	.icon.icon-circle.icon-google {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-google:hover, .icon.icon-circle.icon-google:focus {
	  color: #fff;
	  background-color: #d04f3e;
	}

	.icon.icon-circle.icon-behance {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-behance:hover, .icon.icon-circle.icon-behance:focus {
	  color: #fff;
	  background-color: #1882ff;
	}

	.icon.icon-circle.icon-dribbble {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-dribbble:hover, .icon.icon-circle.icon-dribbble:focus {
	  color: #fff;
	  background-color: #e95aae;
	}

	.icon.icon-circle.icon-flickr {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-flickr:hover, .icon.icon-circle.icon-flickr:focus {
	  color: #fff;
	  background-color: #f9429c;
	}

	.icon.icon-circle.icon-instagram {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-instagram:hover, .icon.icon-circle.icon-instagram:focus {
	  color: #fff;
	  background-color: #4f86ac;
	}

	.icon.icon-circle.icon-linkedin {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-linkedin:hover, .icon.icon-circle.icon-linkedin:focus {
	  color: #fff;
	  background-color: #008bc2;
	}

	.icon.icon-circle.icon-pinterest {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-pinterest:hover, .icon.icon-circle.icon-pinterest:focus {
	  color: #fff;
	  background-color: #cb1f24;
	}

	.icon.icon-circle.icon-skype {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-skype:hover, .icon.icon-circle.icon-skype:focus {
	  color: #fff;
	  background-color: #00bef4;
	}

	.icon.icon-circle.icon-slack {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-slack:hover, .icon.icon-circle.icon-slack:focus {
	  color: #fff;
	  background-color: #44ba97;
	}

	.icon.icon-circle.icon-tumblr {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-tumblr:hover, .icon.icon-circle.icon-tumblr:focus {
	  color: #fff;
	  background-color: #435971;
	}

	.icon.icon-circle.icon-vimeo {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-vimeo:hover, .icon.icon-circle.icon-vimeo:focus {
	  color: #fff;
	  background-color: #0bc4ef;
	}

	.icon.icon-circle.icon-vine {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-vine:hover, .icon.icon-circle.icon-vine:focus {
	  color: #fff;
	  background-color: #00be9b;
	}

	.icon.icon-circle.icon-youtube {
	  color: #fff;
	  background-color: #bbc4c6;
	}

	.icon.icon-circle.icon-youtube:hover, .icon.icon-circle.icon-youtube:focus {
	  color: #fff;
	  background-color: #ed4533;
	}

	.icon.icon-circle.icon-hover:hover:before, .icon.icon-circle.icon-hover:focus:before {
	  -webkit-transform: scale(1.1, 1.1);
	  -moz-transform: scale(1.1, 1.1);
	  -ms-transform: scale(1.1, 1.1);
	  -o-transform: scale(1.1, 1.1);
	  transform: scale(1.1, 1.1);
	}

	.dark .icon-circle.icon-facebook {
	  background-color: #3e4043;
	}

	.dark .icon-circle.icon-twitter {
	  background-color: #3e4043;
	}

	.dark .icon-circle.icon-google {
	  background-color: #3e4043;
	}

	.dark .icon-circle.icon-behance {
	  background-color: #3e4043;
	}

	.dark .icon-circle.icon-dribbble {
	  background-color: #3e4043;
	}

	.dark .icon-circle.icon-flickr {
	  background-color: #3e4043;
	}

	.dark .icon-circle.icon-instagram {
	  background-color: #3e4043;
	}

	.dark .icon-circle.icon-linkedin {
	  background-color: #3e4043;
	}

	.dark .icon-circle.icon-pinterest {
	  background-color: #3e4043;
	}

	.dark .icon-circle.icon-skype {
	  background-color: #3e4043;
	}

	.dark .icon-circle.icon-slack {
	  background-color: #3e4043;
	}

	.dark .icon-circle.icon-tumblr {
	  background-color: #3e4043;
	}

	.dark .icon-circle.icon-vimeo {
	  background-color: #3e4043;
	}

	.dark .icon-circle.icon-vine {
	  background-color: #3e4043;
	}

	.dark .icon-circle.icon-youtube {
	  background-color: #3e4043;
	}

	.i-before {
	  margin-right: 8px;
	}

	.i-after {
	  margin-left: 8px;
	}

	.i-before-after {
	  margin-right: 8px;
	  margin-left: 8px;
	}

	/* 6.8 Loaders
	----------------------------------------------------------*/
	.animsition-loading {
	  border-width: 2px;
	  border-style: solid;
	  border-left-color: #383c40;
	  border-right-color: #e0e0e0;
	  border-top-color: #e0e0e0;
	  border-bottom-color: #e0e0e0;
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	  -webkit-animation: loaderAnimation 1s linear infinite;
	  -moz-animation: loaderAnimation 1s linear infinite;
	  -ms-animation: loaderAnimation 1s linear infinite;
	  -o-animation: loaderAnimation 1s linear infinite;
	  animation: loaderAnimation 1s linear infinite;
	}

	@-moz-keyframes loaderAnimation {
	  0% {
	    -webkit-transform: rotate(0deg);
	    -moz-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    -o-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  100% {
	    -webkit-transform: rotate(360deg);
	    -moz-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    -o-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}

	@-webkit-keyframes loaderAnimation {
	  0% {
	    -webkit-transform: rotate(0deg);
	    -moz-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    -o-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  100% {
	    -webkit-transform: rotate(360deg);
	    -moz-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    -o-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}

	@-o-keyframes loaderAnimation {
	  0% {
	    -webkit-transform: rotate(0deg);
	    -moz-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    -o-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  100% {
	    -webkit-transform: rotate(360deg);
	    -moz-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    -o-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}

	@-ms-keyframes loaderAnimation {
	  0% {
	    -webkit-transform: rotate(0deg);
	    -moz-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    -o-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  100% {
	    -webkit-transform: rotate(360deg);
	    -moz-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    -o-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}

	@keyframes loaderAnimation {
	  0% {
	    -webkit-transform: rotate(0deg);
	    -moz-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    -o-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  100% {
	    -webkit-transform: rotate(360deg);
	    -moz-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    -o-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}

	/* 6.10 Navs
	----------------------------------------------------------*/
	/* Pills */
	.nav-pills > .nav-item > .nav-link {
	  font-family: "Oswald", sans-serif;
	  font-size: 1rem;
	  font-weight: 300;
	  text-transform: uppercase;
	  -webkit-border-radius: 0;
	  -moz-border-radius: 0;
	  -ms-border-radius: 0;
	  -o-border-radius: 0;
	  border-radius: 0;
	  padding: 1rem 1.8rem;
	  background-color: #f3f4f4;
	}

	.nav-pills > .nav-item > .nav-link.active {
	  background-color: <?php echo $soup_brand_clr; ?>;
	  color: #fff;
	}

	.nav-pills > .nav-item > .nav-link.active:hover, .nav-pills > .nav-item > .nav-link.active:focus {
	  background-color: <?php echo $soup_brand_clr; ?>;
	}

	.nav-pills > .nav-item + .nav-item {
	  margin-left: 0;
	}

	/* Tabs */
	.nav-tabs > .nav-item > .nav-link {
	  position: relative;
	  font-family: "Oswald", sans-serif;
	  padding: 1rem 2rem;
	  font-weight: 300;
	  margin-right: 0;
	  text-transform: uppercase;
	  -webkit-border-radius: 0;
	  -moz-border-radius: 0;
	  -ms-border-radius: 0;
	  -o-border-radius: 0;
	  border-radius: 0;
	}

	/* Vertical Navigation */
	.nav-vertical {
	  -webkit-flex-direction: column;
	  flex-direction: column;
	  margin-bottom: 1.5rem;
	}

	.nav-vertical li a {
	  font-weight: 500;
	  padding: 0.75rem 0;
	  display: block;
	}

	.nav-vertical li a:hover, .nav-vertical li a:focus {
	  background: transparent;
	}

	.nav-vertical > li:not(:last-child) {
	  border-bottom: 1px solid #e0e0e0;
	}

	.nav-vertical > li > a:hover, .nav-vertical > li > a:focus {
	  color: <?php echo $soup_brand_clr; ?>;
	}

	.nav-vertical > li > a.active {
	  color: <?php echo $soup_brand_clr; ?>;
	}

	.nav-vertical > li > a.active + ul {
	  display: block;
	}

	.nav-vertical > li > ul {
	  padding: 0 0.75rem;
	  margin: 0 0 0.75rem;
	  list-style: none;
	  display: none;
	}

	.nav-vertical > li > ul li a {
	  padding: 0.2rem 0;
	  font-size: 0.9rem;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
	  opacity: 0.5;
	}

	.nav-vertical > li > ul li a.active, .nav-vertical > li > ul li a:hover, .nav-vertical > li > ul li a:focus {
	  color: inherit;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	}

	/* Nav Icons */
	.nav-icons {
	  margin-bottom: 40px;
	}

	.nav-icons a {
	  margin-right: 15px;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
	  opacity: 0.5;
	}

	.nav-icons a:hover, .nav-icons a:focus {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	}

	/* Nav Additional */
	#nav-additional {
	  position: fixed;
	  top: 0;
	  left: 460px;
	  bottom: 0;
	  width: 300px;
	  background-color: #f3f4f4;
	  z-index: 899;
	  padding: 2.25rem;
	  overflow: auto;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  -webkit-transform: translateX(-100%);
	  -moz-transform: translateX(-100%);
	  -ms-transform: translateX(-100%);
	  -o-transform: translateX(-100%);
	  transform: translateX(-100%);
	  visibility: hidden;
	  -webkit-box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.1);
	  -moz-box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.1);
	  box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.1);
	}

	#nav-additional.show {
	  -webkit-transform: translateX(0);
	  -moz-transform: translateX(0);
	  -ms-transform: translateX(0);
	  -o-transform: translateX(0);
	  transform: translateX(0);
	  visibility: visible;
	}

	#nav-additional .close {
	  position: absolute;
	  top: 20px;
	  right: 20px;
	}

	@media only screen and (max-width: 1500px) {
	  #nav-additional {
	    left: 360px;
	  }
	}

	@media only screen and (max-width: 767px) {
	  #nav-additional {
	    left: 300px;
	    width: 260px;
	  }
	}

	@media only screen and (max-width: 575px) {
	  #nav-additional {
	    left: 0;
	    width: calc(100% - 55px);
	    z-index: 901;
	  }
	}

	/* 6.11 Notification Bar
	----------------------------------------------------------*/
	#notification-bar {
	  position: fixed;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  font-weight: 300;
	  color: #fff;
	  z-index: 960;
	  -webkit-transition: all 0.4s ease-out;
	  -moz-transition: all 0.4s ease-out;
	  -o-transition: all 0.4s ease-out;
	  transition: all 0.4s ease-out;
	  -webkit-transform: translateY(100%);
	  -moz-transform: translateY(100%);
	  -ms-transform: translateY(100%);
	  -o-transform: translateY(100%);
	  transform: translateY(100%);
	  visibility: hidden;
	  text-align: center;
	  -webkit-box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, 0.1);
	  -moz-box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, 0.1);
	  box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, 0.1);
	  font-family: "Oswald", sans-serif;
	}

	#notification-bar > div {
	  padding: 1.5rem;
	  font-size: 14px;
	}

	#notification-bar > div.success {
	  background-color: #4aa36b;
	}

	#notification-bar > div.error {
	  background-color: #e15757;
	}

	#notification-bar.visible {
	  -webkit-transform: translateY(0);
	  -moz-transform: translateY(0);
	  -ms-transform: translateY(0);
	  -o-transform: translateY(0);
	  transform: translateY(0);
	  visibility: visible;
	}

	#notification-bar .close {
	  position: absolute;
	  top: 15px;
	  right: 15px;
	  font-size: 1rem;
	}

	/* 6.9 Modals
	----------------------------------------------------------*/
	.modal.fade .modal-dialog {
	  -webkit-transform: scale(0.9, 0.9);
	  -moz-transform: scale(0.9, 0.9);
	  -ms-transform: scale(0.9, 0.9);
	  -o-transform: scale(0.9, 0.9);
	  transform: scale(0.9, 0.9);
	}

	.modal.show .modal-dialog {
	  -webkit-transform: scale(1, 1);
	  -moz-transform: scale(1, 1);
	  -ms-transform: scale(1, 1);
	  -o-transform: scale(1, 1);
	  transform: scale(1, 1);
	}

	.modal-content {
	  -webkit-border-radius: 0;
	  -moz-border-radius: 0;
	  -ms-border-radius: 0;
	  -o-border-radius: 0;
	  border-radius: 0;
	  -webkit-box-shadow: 5px 5px 50px 0px rgba(0, 0, 0, 0.3);
	  -moz-box-shadow: 5px 5px 50px 0px rgba(0, 0, 0, 0.3);
	  box-shadow: 5px 5px 50px 0px rgba(0, 0, 0, 0.3);
	  border: none;
	  overflow: hidden;
	}

	.modal-header {
	  position: relative;
	  padding: 2rem;
	}

	.modal-header.modal-header-lg {
	  padding: 7rem 2rem 1.5rem;
	}

	.modal-header > .close {
	  position: absolute;
	  top: 1rem;
	  right: 1rem;
	  z-index: 2;
	}

	.modal > .close {
	  position: absolute;
	  top: 20px;
	  right: 20px;
	}

	.modal-btn:hover, .modal-btn:focus {
	  -webkit-transform: translateY(0);
	  -moz-transform: translateY(0);
	  -ms-transform: translateY(0);
	  -o-transform: translateY(0);
	  transform: translateY(0);
	}

	.modal-product-details {
	  background-color: #f3f4f4;
	  padding: 1.5rem 2rem;
	}

	.modal-body {
	  padding: 1.5rem 2rem;
	}

	.modal-footer {
	  padding: 1.5rem 2rem;
	}

	.modal-backdrop {
	  background-color: #282b2e;
	}

	.modal-backdrop.show {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=40);
	  opacity: 0.4;
	}

	/* Modal Video */
	.modal-video {
	  text-align: center;
	}

	@media only screen and (max-width: 767px) {
	  .modal-video {
	    text-align: left;
	  }
	}

	.modal-video iframe {
	  width: 768px;
	  max-width: 100%;
	  display: block;
	}

	.modal-video:before {
	  display: inline-block;
	  vertical-align: middle;
	  content: " ";
	  height: 100%;
	}

	@media only screen and (max-width: 767px) {
	  .modal-video:before {
	    display: none;
	  }
	}

	.modal-video .modal-dialog {
	  display: inline-block;
	  text-align: left;
	  vertical-align: middle;
	  margin-top: 70px;
	}

	.modal-video .modal-content {
	  background-color: #000;
	}

	/* 6.12 Other
	----------------------------------------------------------*/
	/* Body Overlay */
	#body-overlay {
	  position: fixed;
	  top: 0;
	  right: 0;
	  bottom: 0;
	  width: 100vw;
	  background-color: rgba(0, 0, 0, 0.5);
	  z-index: 899;
	  content: ' ';
	  z-index: 925;
	  display: none;
	}

	/* Separator */
	hr {
	  margin-top: 3rem;
	  margin-bottom: 3rem;
	}

	@media only screen and (max-width: 767px) {
	  hr {
	    margin-top: 2rem;
	    margin-bottom: 2rem;
	  }
	}

	hr.hr-md {
	  margin-top: 2rem;
	  margin-bottom: 2rem;
	}

	hr.hr-sm {
	  margin-top: 1rem;
	  margin-bottom: 1rem;
	}

	.dark hr {
	  border-color: rgba(255, 255, 255, 0.15);
	}

	/* Shapes */
	.shape {
	  display: inline-block;
	  width: 64px;
	  height: 64px;
	}

	.shape.circle {
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	}

	.shape.square {
	  -webkit-border-radius: 5px;
	  -moz-border-radius: 5px;
	  -ms-border-radius: 5px;
	  -o-border-radius: 5px;
	  border-radius: 5px;
	}

	/* Close */
	.close {
	  color: inherit;
	  text-shadow: none;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=60);
	  opacity: 0.6;
	  font-size: 14px;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	}

	.close:hover, .close:focus, .close:active, .close:focus:active {
	  outline: none;
	  color: inherit;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	  opacity: 1;
	}

	.dark .close {
	  color: #fff;
	}

	/* Stick to content */
	@media only screen and (max-width: 991px) {
	  .stick-to-content {
	    position: relative !important;
	    top: 0 !important;
	  }
	}

	/* Images */
	.img-thumbnail, .rounded {
	  -webkit-border-radius: 0.75rem;
	  -moz-border-radius: 0.75rem;
	  -ms-border-radius: 0.75rem;
	  -o-border-radius: 0.75rem;
	  border-radius: 0.75rem;
	}

	/* Actions link */
	.action-icon {
	  color: #a4a7a9;
	  margin: 0 0.1em;
	}

	.action-icon:hover, .action-icon:focus {
	  color: #383c40;
	}

	/* 6.13 Pagination
	----------------------------------------------------------*/
	/* Pagination */
	.pagination > .page-item {
	  display: inline-block;
	  vertical-align: middle;
	}

	.pagination > .page-item > .page-link {
	  border: none;
	  color: #383c40;
	  font-weight: 600;
	  display: inline-block;
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	  -webkit-transition: all 0.25s ease-out;
	  -moz-transition: all 0.25s ease-out;
	  -o-transition: all 0.25s ease-out;
	  transition: all 0.25s ease-out;
	  display: block;
	  padding: .25rem .75rem;
	  background-color: transparent;
	}

	.pagination > .page-item > .page-link.active {
	  color: <?php echo $soup_brand_clr; ?>;
	}

	.pagination > .page-item > .page-link:hover {
	  background-color: transparent;
	  color: <?php echo $soup_brand_clr; ?>;
	}

	.pagination > .page-item:first-child > .page-link, .pagination > .page-item:last-child > .page-link {
	  padding: 0;
	  width: 2rem;
	  text-align: center;
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	  -webkit-transition: all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
	  -moz-transition: all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
	  -o-transition: all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
	  transition: all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
	  color: #383c40;
	}

	.pagination > .page-item:first-child > .page-link > i, .pagination > .page-item:last-child > .page-link > i {
	  line-height: 26px;
	  font-size: 0.8rem;
	}

	.pagination > .page-item:first-child > .page-link:hover, .pagination > .page-item:last-child > .page-link:hover {
	  color: #a4a7a9;
	}

	.pagination > .page-item:first-child > a:hover {
	  -webkit-transform: translateX(-2px);
	  -moz-transform: translateX(-2px);
	  -ms-transform: translateX(-2px);
	  -o-transform: translateX(-2px);
	  transform: translateX(-2px);
	}

	.pagination > .page-item:last-child > a:hover {
	  -webkit-transform: translateX(2px);
	  -moz-transform: translateX(2px);
	  -ms-transform: translateX(2px);
	  -o-transform: translateX(2px);
	  transform: translateX(2px);
	}

	.pagination > .page-item.active > .page-link {
	  color: <?php echo $soup_brand_clr; ?>;
	  background-color: transparent;
	}

	.pagination > .page-item.disabled {
	  pointer-events: none;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
	  opacity: 0.5;
	}

	/* 6.14 Cart
	----------------------------------------------------------*/
	#panel-cart {
	  position: fixed;
	  top: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #fff;
	  width: 370px;
	  z-index: 950;
	  -webkit-box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.1);
	  -moz-box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.1);
	  box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.1);
	  font-size: 0.95rem;
	  visibility: hidden;
	  -webkit-transform: translateX(100%);
	  -moz-transform: translateX(100%);
	  -ms-transform: translateX(100%);
	  -o-transform: translateX(100%);
	  transform: translateX(100%);
	  -webkit-transition: all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
	  -moz-transition: all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
	  -o-transition: all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
	  transition: all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
	}

	@media only screen and (max-width: 575px) {
	  #panel-cart {
	    width: 100%;
	  }
	}

	#panel-cart.show {
	  visibility: visible;
	  -webkit-transform: translateX(0);
	  -moz-transform: translateX(0);
	  -ms-transform: translateX(0);
	  -o-transform: translateX(0);
	  transform: translateX(0);
	}

	#panel-cart .panel-cart-container {
	  position: absolute;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  padding-bottom: 90px;
	  overflow: auto;
	  z-index: 2;
	  background-color: #fff;
	}

	#panel-cart .panel-cart-title {
	  display: -webkit-flex;
	  display: flex;
	  -webkit-align-items: center;
	  align-items: center;
	  padding: 1.5rem;
	  background-color: #f3f4f4;
	}

	#panel-cart .panel-cart-title .title {
	  margin-bottom: 0;
	}

	#panel-cart .panel-cart-title .close {
	  margin-left: auto;
	}

	#panel-cart .panel-cart-action {
	  position: absolute;
	  bottom: 0;
	  left: 0;
	  width: 100%;
	  white-space: nowrap;
	  z-index: 3;
	}

	#panel-cart .panel-cart-action:hover, #panel-cart .panel-cart-action:focus {
	  -webkit-transform: translateY(0);
	  -moz-transform: translateY(0);
	  -ms-transform: translateY(0);
	  -o-transform: translateY(0);
	  transform: translateY(0);
	}

	.cart-summary {
	  padding: 1.5rem;
	}

	.table-cart {
	  line-height: 1.25;
	  width: 100%;
	}

	.table-cart th, .table-cart td {
	  vertical-align: middle;
	  padding: 1rem 1.5rem;
	  border-bottom: 1px solid #e0e0e0;
	}

	.table-cart .title .name {
	  font-weight: 500;
	  display: block;
	}

	.table-cart .price {
	  font-weight: 500;
	}

	.table-cart .actions {
	  white-space: nowrap;
	}

	/* 6.15 Typography 
	----------------------------------------------------------*/
	/* Headings */
	h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 {
	  margin-top: 0;
	  margin-bottom: 2rem;
	  font-weight: 200;
	}

	h1, .h1 {
	  font-size: 4.5rem;
	  font-weight: 100;
	}

	@media only screen and (max-width: 1500px) {
	  h1, .h1 {
	    font-size: 3.5rem;
	  }
	}

	h2, .h2 {
	  font-size: 3.5rem;
	  font-weight: 100;
	}

	@media only screen and (max-width: 1500px) {
	  h2, .h2 {
	    font-size: 3rem;
	  }
	}

	h3, .h3 {
	  font-size: 2.5rem;
	}

	@media only screen and (max-width: 1500px) {
	  h3, .h3 {
	    font-size: 2.25rem;
	  }
	}

	h4, .h4 {
	  font-size: 1.75rem;
	}

	@media only screen and (max-width: 1500px) {
	  h4, .h4 {
	    font-size: 1.6rem;
	  }
	}

	h5, .h5 {
	  font-size: 1.4rem;
	}

	h6, .h6 {
	  font-size: 1.1rem;
	  font-weight: 500;
	}

	/* Display */
	.display-1, .display-2, .display-3, .display-4 {
	  font-weight: 100;
	}

	@media only screen and (max-width: 1500px) {
	  .display-2 {
	    font-size: 4.75rem;
	  }
	}

	@media only screen and (max-width: 991px) {
	  .display-2 {
	    font-size: 3.5rem;
	  }
	}

	/* Paragraph */
	p {
	  font-size: 1rem;
	  font-weight: 200;
	  margin-bottom: 2rem;
	}

	p.lead {
	  font-size: 1.2rem;
	}

	/* Blockquote */
	.blockquotes .blockquote:nth-child(2n-1) {
	  margin-right: 4.5rem;
	}

	@media only screen and (max-width: 575px) {
	  .blockquotes .blockquote:nth-child(2n-1) {
	    margin-right: 1rem;
	  }
	}

	.blockquotes .blockquote:nth-child(2n) {
	  margin-left: 4.5rem;
	}

	@media only screen and (max-width: 575px) {
	  .blockquotes .blockquote:nth-child(2n) {
	    margin-left: 1rem;
	  }
	}

	.blockquote {
	  position: relative;
	  border: none;
	  padding: 0;
	  margin-bottom: 1.5rem;
	}

	.blockquote .blockquote-content {
	  position: relative;
	  background-color: #f3f4f4;
	  padding: 2rem;
	  margin-bottom: 0.8rem;
	}

	.blockquote .blockquote-content:after {
	  position: absolute;
	  top: 100%;
	  right: 0;
	  width: 0;
	  height: 0;
	  border-style: solid;
	  border-width: 0 20px 20px 0;
	  border-color: transparent #f3f4f4 transparent transparent;
	  content: ' ';
	}

	.blockquote .blockquote-content.dark {
	  background-color: #282b2e;
	}

	.blockquote .blockquote-content.dark:after {
	  border-color: transparent #282b2e transparent transparent;
	}

	.blockquote .blockquote-content p {
	  font-size: 1.75rem;
	  font-weight: 200;
	  line-height: 1.3;
	  margin-bottom: 0;
	}

	.blockquote.blockquote-lg .blockquote-content {
	  padding: 3rem;
	}

	.blockquote.blockquote-lg .blockquote-content p {
	  font-size: 3.5rem;
	  font-weight: 100;
	}

	@media only screen and (max-width: 767px) {
	  .blockquote.blockquote-lg .blockquote-content p {
	    font-size: 2.5rem;
	    font-weight: 200;
	  }
	}

	.blockquote footer {
	  font-size: 0.9rem;
	  padding: 0 2rem;
	  font-weight: 500;
	}

	.blockquote footer:before {
	  display: none;
	}

	.blockquote footer img {
	  width: 32px;
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	  margin-right: 0.35rem;
	}

	.blockquote footer .name {
	  white-space: nowrap;
	}

	/* Sizes */
	.text-lg {
	  font-size: 1.35rem;
	}

	@media only screen and (max-width: 575px) {
	  .text-lg {
	    font-size: 1.2rem;
	  }
	}

	.text-md {
	  font-size: 1.1rem;
	}

	.text-sm {
	  font-size: 0.95rem;
	}

	.text-xs {
	  font-size: 0.85rem;
	}

	/* Colors */
	.text-primary {
	  color: <?php echo $soup_brand_clr; ?> !important;
	}

	.text-secondary {
	  color: #25282a !important;
	}

	.text-info {
	  color: #56aee5 !important;
	}

	.text-warning {
	  color: #ec9744 !important;
	}

	.text-danger {
	  color: #e15757 !important;
	}

	.text-success {
	  color: #4aa36b !important;
	}

	.text-dark {
	  color: #282b2e !important;
	}

	.text-dark {
	  color: #383c40 !important;
	}

	.text-muted {
	  color: #a4a7a9 !important;
	}

	.dark .text-muted {
	  color: rgba(255, 255, 255, 0.5) !important;
	}

	a.text-primary:hover, a.text-primary:focus {
	  color:  <?php echo $soup_brand_clr; ?> !important;
	}

	a.text-secondary:hover, a.text-secondary:focus {
	  color: #1e2022 !important;
	}

	a.text-info:hover, a.text-info:focus {
	  color: #458bb7 !important;
	}

	a.text-warning:hover, a.text-warning:focus {
	  color: #bd7936 !important;
	}

	a.text-danger:hover, a.text-danger:focus {
	  color: #b44646 !important;
	}

	a.text-success:hover, a.text-success:focus {
	  color: #3b8256 !important;
	}

	a.text-dark:hover, a.text-dark:focus {
	  color: #202225 !important;
	}

	.list-check {
	  list-style: none;
	  padding: 0;
	  margin: 0 0 2rem 0;
	}

	.list-check > li {
	  position: relative;
	  padding-left: 1.5em;
	}

	.list-check > li:not(:last-child) {
	  padding-bottom: 0.25em;
	  margin-bottom: 0.25em;
	}

	.list-check > li:before {
	  position: absolute;
	  top: 0;
	  left: 0;
	  font-family: 'Themify';
	  content: '\e64c';
	  color: #4aa36b;
	}

	.list-check > li.false:before {
	  color: #bbc4c6;
	  content: '\e646';
	}

	/* ---------------------------------------------------------------------------- */
	/* --- 7. WIDGETS
	/* ----------------------------------------------------------------------------- */
	.widget {
	  margin-bottom: 2.4rem;
	}

	.widget .owl-pagination .owl-page span {
	  width: 7px;
	  height: 7px;
	}

	@media only screen and (max-width: 767px) {
	  .sidebar .widget {
	    width: 47%;
	    float: left;
	  }
	  .sidebar .widget:nth-child(2n-1) {
	    margin-right: 3%;
	  }
	}

	@media only screen and (max-width: 575px) {
	  .sidebar .widget {
	    width: 100%;
	    float: left;
	    margin-right: 0 !important;
	  }
	}

	/* About
	----------------------------------------------------------*/
	.widget-about .text {
	  position: relative;
	  padding-left: 60px;
	}

	.widget-about .text:after {
	  position: absolute;
	  top: -54px;
	  left: -10px;
	  font-size: 10rem;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=10);
	  opacity: 0.1;
	  content: '\201c';
	}

	/* Recent Posts
	----------------------------------------------------------*/
	.list-posts {
	  list-style: none;
	  margin: 0;
	  padding: 0;
	}

	.list-posts > li {
	  margin-bottom: 1.5rem;
	  line-height: 1.2;
	}

	.list-posts > li .image {
	  float: left;
	  width: 48px;
	}

	.list-posts > li .image > img {
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -ms-border-radius: 50%;
	  -o-border-radius: 50%;
	  border-radius: 50%;
	}

	.list-posts > li .content {
	  margin-left: 77px;
	  padding-top: 0.2rem;
	}

	.list-posts > li .title {
	  font-weight: 500;
	  display: block;
	}

	.list-posts > li .date {
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=70);
	  opacity: 0.7;
	  font-size: 0.85rem;
	  font-weight: 200;
	}

	.list-posts > li .date:after {
	  font-family: 'themify';
	  content: '\e628';
	  font-size: 80%;
	  vertical-align: middle;
	  margin-left: 0.5rem;
	}

	/* Twitter
	----------------------------------------------------------*/
	.twitter-feed ul {
	  list-style: none;
	  padding: 0 0 0 2rem;
	  margin: 0;
	  overflow: hidden;
	}

	.twitter-feed ul li {
	  position: relative;
	  margin-bottom: 0.5rem;
	  font-weight: 200;
	  background-color: #fff;
	  padding: 1rem;
	}

	.twitter-feed ul li:before {
	  position: absolute;
	  top: 0.3rem;
	  left: -25px;
	  font-family: 'themify';
	  color: #3aa8db;
	  content: "\e74b";
	}

	.twitter-feed ul li .tweet {
	  margin-bottom: 0;
	  font-size: 0.9rem;
	}

	.twitter-feed ul li .timePosted {
	  display: block;
	  font-size: 0.8rem;
	  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
	  opacity: 0.5;
	  margin-top: 0.5rem;
	  margin-bottom: 0;
	}

	/* ----------------------------------------------------------------------------- */
	/* --- 8. ANIMATIONS
	/* ----------------------------------------------------------------------------- */
	.animated {
	  -webkit-animation-delay: 0.2s;
	  -moz-animation-delay: 0.2s;
	  -ms-animation-delay: 0.2s;
	  -o-animation-delay: 0.2s;
	  animation-delay: 0.2s;
	}

	/* Zooming */
	.zooming {
	  -webkit-animation: zooming 18s infinite both;
	  -moz-animation: zooming 18s infinite both;
	  -ms-animation: zooming 18s infinite both;
	  -o-animation: zooming 18s infinite both;
	  animation: zooming 18s infinite both;
	}

	@-moz-keyframes zooming {
	  0% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	  50% {
	    -webkit-transform: scale(1.1, 1.1);
	    -moz-transform: scale(1.1, 1.1);
	    -ms-transform: scale(1.1, 1.1);
	    -o-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  100% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}

	@-webkit-keyframes zooming {
	  0% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	  50% {
	    -webkit-transform: scale(1.1, 1.1);
	    -moz-transform: scale(1.1, 1.1);
	    -ms-transform: scale(1.1, 1.1);
	    -o-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  100% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}

	@-o-keyframes zooming {
	  0% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	  50% {
	    -webkit-transform: scale(1.1, 1.1);
	    -moz-transform: scale(1.1, 1.1);
	    -ms-transform: scale(1.1, 1.1);
	    -o-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  100% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}

	@-ms-keyframes zooming {
	  0% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	  50% {
	    -webkit-transform: scale(1.1, 1.1);
	    -moz-transform: scale(1.1, 1.1);
	    -ms-transform: scale(1.1, 1.1);
	    -o-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  100% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}

	@keyframes zooming {
	  0% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	  50% {
	    -webkit-transform: scale(1.1, 1.1);
	    -moz-transform: scale(1.1, 1.1);
	    -ms-transform: scale(1.1, 1.1);
	    -o-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  100% {
	    -webkit-transform: scale(1, 1);
	    -moz-transform: scale(1, 1);
	    -ms-transform: scale(1, 1);
	    -o-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}

	.hanging {
	  -webkit-animation: hanging 8s infinite both;
	  -moz-animation: hanging 8s infinite both;
	  -ms-animation: hanging 8s infinite both;
	  -o-animation: hanging 8s infinite both;
	  animation: hanging 8s infinite both;
	}

	/* Hanging */
	@-moz-keyframes hanging {
	  0% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -ms-transform: translateY(0);
	    -o-transform: translateY(0);
	    transform: translateY(0);
	  }
	  50% {
	    -webkit-transform: translateY(-3.5%);
	    -moz-transform: translateY(-3.5%);
	    -ms-transform: translateY(-3.5%);
	    -o-transform: translateY(-3.5%);
	    transform: translateY(-3.5%);
	  }
	  100% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -ms-transform: translateY(0);
	    -o-transform: translateY(0);
	    transform: translateY(0);
	  }
	}

	@-webkit-keyframes hanging {
	  0% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -ms-transform: translateY(0);
	    -o-transform: translateY(0);
	    transform: translateY(0);
	  }
	  50% {
	    -webkit-transform: translateY(-3.5%);
	    -moz-transform: translateY(-3.5%);
	    -ms-transform: translateY(-3.5%);
	    -o-transform: translateY(-3.5%);
	    transform: translateY(-3.5%);
	  }
	  100% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -ms-transform: translateY(0);
	    -o-transform: translateY(0);
	    transform: translateY(0);
	  }
	}

	@-o-keyframes hanging {
	  0% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -ms-transform: translateY(0);
	    -o-transform: translateY(0);
	    transform: translateY(0);
	  }
	  50% {
	    -webkit-transform: translateY(-3.5%);
	    -moz-transform: translateY(-3.5%);
	    -ms-transform: translateY(-3.5%);
	    -o-transform: translateY(-3.5%);
	    transform: translateY(-3.5%);
	  }
	  100% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -ms-transform: translateY(0);
	    -o-transform: translateY(0);
	    transform: translateY(0);
	  }
	}

	@-ms-keyframes hanging {
	  0% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -ms-transform: translateY(0);
	    -o-transform: translateY(0);
	    transform: translateY(0);
	  }
	  50% {
	    -webkit-transform: translateY(-3.5%);
	    -moz-transform: translateY(-3.5%);
	    -ms-transform: translateY(-3.5%);
	    -o-transform: translateY(-3.5%);
	    transform: translateY(-3.5%);
	  }
	  100% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -ms-transform: translateY(0);
	    -o-transform: translateY(0);
	    transform: translateY(0);
	  }
	}

	@keyframes hanging {
	  0% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -ms-transform: translateY(0);
	    -o-transform: translateY(0);
	    transform: translateY(0);
	  }
	  50% {
	    -webkit-transform: translateY(-3.5%);
	    -moz-transform: translateY(-3.5%);
	    -ms-transform: translateY(-3.5%);
	    -o-transform: translateY(-3.5%);
	    transform: translateY(-3.5%);
	  }
	  100% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -ms-transform: translateY(0);
	    -o-transform: translateY(0);
	    transform: translateY(0);
	  }
	}

	/* Blinking */
	.blinking {
	  -webkit-animation: blinking 2s infinite both;
	  -moz-animation: blinking 2s infinite both;
	  -ms-animation: blinking 2s infinite both;
	  -o-animation: blinking 2s infinite both;
	  animation: blinking 2s infinite both;
	}

	@-moz-keyframes blinking {
	  0% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	    opacity: 1;
	  }
	  50% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	    opacity: 0;
	  }
	  100% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	    opacity: 1;
	  }
	}

	@-webkit-keyframes blinking {
	  0% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	    opacity: 1;
	  }
	  50% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	    opacity: 0;
	  }
	  100% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	    opacity: 1;
	  }
	}

	@-o-keyframes blinking {
	  0% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	    opacity: 1;
	  }
	  50% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	    opacity: 0;
	  }
	  100% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	    opacity: 1;
	  }
	}

	@-ms-keyframes blinking {
	  0% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	    opacity: 1;
	  }
	  50% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	    opacity: 0;
	  }
	  100% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	    opacity: 1;
	  }
	}

	@keyframes blinking {
	  0% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	    opacity: 1;
	  }
	  50% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	    opacity: 0;
	  }
	  100% {
	    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	    opacity: 1;
	  }
	}

</style>
<?php endif;
}