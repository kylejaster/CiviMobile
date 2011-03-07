<?php require_once('civimobile.header.php'); ?>

<div data-role="page" data-theme="b" id="jqm-home"> 
	<div id="jqm-homeheader" data-role="header">
	    <h3><?php print $civimobile_page_settings['title'] ?></h3>
	    <?php 
	    $params = array ('version' =>'3', 'activity_id' =>'2', 'return' =>'source_contact_id,source_record_id');
        $results= civicrm_api("Activity","get",$params);
        ?>
	</div> 
	
	<div data-role="content" id="home-content"> 
    
	</div> 
</div> 

<div data-role="page" data-theme="b" id="jqm-participants"> 
	<div id="jqm-participantsheader" data-role="header">
	    <h3><?php print $civimobile_page_settings['title'] ?></h3>
	</div> 
	
	<div data-role="content" id="participants-content"> 

	</div> 
</div> 

<div data-role="page" data-theme="e" id="jqm-participant"> 
	<div id="jqm-participantheader" data-role="header">
	    <h3><?php print $civimobile_page_settings['title'] ?></h3>
	</div> 
	
	<div data-role="content" id="participant-content"> 

	</div> 
</div> 


<div data-role="page" data-theme="b" id="jqm-contacts"> 
	<div id="jqm-contactsheader" data-role="header">
	    <h3><?php print $civimobile_page_settings['title'] ?></h3>
	</div> 
	
	<div data-role="content" id="contacts-content"> 

	</div> 
</div> 

<div data-role="page" data-theme="b" id="jqm-contact"> 
	<div id="jqm-contactheader" data-role="header">
	    <h3><?php print $civimobile_page_settings['title'] ?></h3>
	</div> 
	
	<div data-role="content" id="contact-content"> 

	</div> 
</div> 

<?php require('civimobile.footer.php'); ?>
