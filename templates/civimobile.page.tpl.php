<?php 
// $Id: page.tpl.php,v 1.0 kylejaster Exp $ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $civimobile_page_settings['language'] ?>" lang="<?php print $civimobile_page_settings['language'] ?>" >
  <head>
    <title><?php print $civimobile_page_settings['title'] ?></title>
    <?php print $civimobile_page_settings['head'] ?>
    <?php print $civimobile_page_settings['favicon'] ?>
    <?php print $civimobile_page_settings['styles'] ?>
    <?php print $civimobile_page_settings['scripts'] ?>

    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.css" />
    <script src="http://code.jquery.com/jquery-1.5.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.js"></script>
    <script src="<?php print $civimobile_page_settings['civicrm_base'] ?>/js/base.js"></script>
    <script src="<?php print $civimobile_page_settings['civimobile_assets'] ?>/js/rest.js"></script>
  </head>
<body> 
<div data-role="page" data-theme="b" id="jqm-home"> 
	<div id="jqm-homeheader">
	    <h3><?php print $civimobile_page_settings['title'] ?></h3>
	</div> 
	
	<div data-role="content"> 
		
		<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b"> 
			<li><a   href="<?php print base_path(); ?>/civicrm/ajax/rest?json=1&debug=1&version=3&entity=Event&action=get"
			         data-transition="slide">Events</a>
            </li> 
		</ul> 
		
 
		
 
	</div> 
</div> 
</body> 
</html> 

