
<?php
 require_once('civimobile.header.php'); 

?>
<div data-role="page" data-theme="c" id="participant_status" class="participant_status"> 
	<div id="jqm-participant_status" data-role="header">
	    <h3>Participant Status</h3>
	   <a href="/civimobile/civimobile" data-ajax="false" data-direction="reverse" data-role="button" data-icon="home" data-iconpos="notext" class="ui-btn-right jqm-home">Home</a>

	</div> 
	
	<div data-role="content" id="participant_status-content"> 
          <a id="status-1" data-role="button" class="status-1 status-button" href="#">Registered</a>
          <a id="status-2" data-role="button" class="status-2 status-button" href="#">Attended</a>
          <a id="status-3" data-role="button" class="status-3 status-button" href="#">No-show</a>
          <a id="contact-record" data-role="button" href="#civimobile/contact/5">View Contact Record</a>
	</div>
	<script>
    
    
	
	</script>
	
	 
</div> 

<?php require('civimobile.footer.php'); ?>
