
<?
 require_once('civimobile.header.php'); 
 global $base_url;
?>
<div data-role="page" data-theme="b" id="participants"> 
	<div id="jqm-participants" data-role="header">
	    <h3>Participants</h3>
	</div> 
	
	<div data-role="content" id="participants-content"> 
        <ul class="participants-list" data-role="listview" data-filter="true"></ul>
	</div>
	<div data-role="footer" data-position="fixed" data-id="global-footer" data-theme="a">
	<div data-role="navbar" data-theme="a">
      <ul>
        <li><a href="<?php print $base_url.base_path(); ?>contact" data-ajax="false" data-icon="search">Contacts</a></li>
        <li><a href="<?php print $base_url.base_path(); ?>events" class="ui-btn-active" data-ajax="false" data-icon="grid">Events</a></li>
      </ul>
    </div><!-- /navbar -->
    </div><!-- /footer --> 
</div> 

<? require('civimobile.footer.php'); ?>
