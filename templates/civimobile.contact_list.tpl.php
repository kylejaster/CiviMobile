<? require('civimobile.header.php'); 
?>
<script>
/* why isn't it called all the time ?!? */
jQuery(document).ready(function($) {
<?
   $results=json_encode (civicrm_api("Contact","get", array ('sequential' =>'1', 'version'=>3, 'return' =>'display_name,phone')));	
   //$results=json_encode (civicrm_api("Contact","get", array ('sequential' =>'1')));	
   echo "contacts = $results;\n";
?>
   $('#contact-content').html('<ul id="contacts" data-role="listview" data-inset="true" data-filter="true" ></ul>');
 
   $.each(contacts.values, function(key, value) {
      $('#contacts').append('<li role="option" tabindex="-1" data-theme="c" id="event-'+value.contact_id+'" ><a href="/civimobile/contact/'+value.contact_id+'" data-role="contact-'+value.contact_id+'">'+value.display_name+'</a></li>');
              });
            $('#contacts').listview();
});
</script>

<div data-role="page" data-theme="b" id="jqm-contacts"> 
	<div id="jqm-contactsheader" data-role="header">
    <div data-role="navbar">
      <ul>
        <li><a href="/civimobile/contact" class="ui-btn-active">Contacts</a></li>
        <li><a href="/civimobile/events">Events</a></li>
      </ul>
    </div><!-- /navbar -->

	</div> 
	
	<div data-role="content" id="contact-content"> 
	</div> 
</div> 

<? require('civimobile.footer.php'); ?>
