<? require('civimobile.header.php'); ?>

<div data-role="page" data-theme="b" id="jqm-home"> 
	<div id="jqm-homeheader">
	    <h3><?php print $civimobile_page_settings['title'] ?></h3>
	</div> 
	
	<div data-role="content"> 
		
		<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b"> 
			<li><a   href="<?php print base_path(); ?>civimobile/events" data-transition="slide">Events</a>
            </li> 
		</ul> 
	</div> 
</div> 

<? require('civimobile.footer.php'); ?>
