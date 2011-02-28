<?php 
// $Id: page.tpl.php,v 1.0 kylejaster Exp $ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $civimobile_page_settings['language'] ?>" lang="<?php print $civimobile_page_settings['language'] ?>" >
  <head>
    <title><?php print $civimobile_page_settings['title'] ?></title>
    <?php print $civimobile_page_settings['head'] ?>
    <?php print $civimobile_page_settings['favicon'] ?>
    <?php print $civimobile_page_settings['styles'] ?>
    
    <script type="text/javascript" src="js/jquery.js"></script> 
	<script type="text/javascript" src="js/"></script> 
	<script type="text/javascript" src="experiments/themeswitcher/jquery.mobile.themeswitcher.js"></script> 
	<script type="text/javascript" src="docs/_assets/js/jqm-docs.js"></script>
    <?php print $civimobile_page_settings['scripts'] ?>
    
  </head>
<body> 
<div data-role="page" data-theme="b" id="jqm-home"> 
	<div id="jqm-homeheader"> 
		<h1 id="jqm-logo"><img src="docs/_assets/images/jquery-logo.png" alt="jQuery Mobile Framework" width="235" height="61" /></h1> 
		<p>A Touch-Optimized Web Framework for Smartphones &amp; Tablets</p> 
		<p id="jqm-version">Alpha Release</p> 
	</div> 
	
	<div data-role="content"> 
		
		<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b"> 
			<li data-role="list-divider">Overview</li> 
			<li><a href="docs/about/intro.html">Intro to jQuery Mobile</a></li> 
			<li><a href="docs/about/features.html">Features</a></li> 
			<li><a href="docs/about/accessibility.html">Accessibility</a></li> 
			<li><a href="docs/about/platforms.html">Supported platforms</a></li> 
		</ul> 
		
		<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b"> 
			<li data-role="list-divider">API</li> 
			<li><a href="docs/api/globalconfig.html">Configuring defaults</a></li> 
			<li><a href="docs/api/events.html">Events</a></li> 
			<li><a href="docs/api/methods.html">Methods &amp; Utilities</a></li> 
			<li><a href="docs/api/mediahelpers.html">Responsive Layout</a></li> 
			<li><a href="docs/api/themes.html">Theme framework</a></li> 
		</ul> 
		
		<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b"> 
			<li data-role="list-divider">Components</li> 
			<li><a href="docs/pages/index.html">Pages &amp; dialogs</a></li> 
			<li><a href="docs/toolbars/index.html">Toolbars</a></li> 
			<li><a href="docs/buttons/index.html">Buttons</a></li> 
			<li><a href="docs/content/index.html">Content formatting</a></li> 
			<li><a href="docs/forms/index.html">Form elements</a></li> 
			<li><a href="docs/lists/index.html">List views</a></li> 
		</ul> 
		
 
		
 
	</div> 
</div> 
</body> 
</html> 

