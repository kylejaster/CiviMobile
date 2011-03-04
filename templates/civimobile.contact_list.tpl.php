<? require('civimobile.header.php'); 
?>


<div data-role="page" data-theme="b" id="jqm-contacts"> 
	<div id="jqm-contactsheader" data-role="header">
    <div data-role="navbar">
      <ul>
        <li><a href="/civimobile/contact" class="ui-btn-active" data-ajax="false">Contacts</a></li>
        <li><a href="/civimobile/events" data-ajax="false">Events</a></li>
      </ul>
    </div><!-- /navbar -->

	</div> 
	
	<div data-role="content" id="contact-content"> 
	</div> 
	<script>
/* why isn't it called all the time ?!? */
jQuery(document).ready(function($) {
    
<?php
//   $results=json_encode (civicrm_api("Contact","get", array ('sequential' =>'1', 'version'=>3, 'return' =>'display_name,phone')));	
//   //$results=json_encode (civicrm_api("Contact","get", array ('sequential' =>'1')));	
//   echo "contacts = $results;\n";
?>


    $().crmAPI ('Contact','get',{'version' :'3', 'return' : 'display_name,phone' }
          ,{ 
            ajaxURL: crmajaxURL,
            success:function (data){
              $('#contact-content').html('<ul id="contacts" data-role="listview" data-inset="true" data-filter="true" ></ul>');
              $('#home-content').append('<ul id="events-list" data-role="listview" data-inset="true" data-filter="true" ></ul>');
                $.each(data.values, function(key, value) {
      $('#contacts').append('<li role="option" tabindex="-1" data-ajax="false" data-theme="c" id="event-'+value.contact_id+'" ><a href="/civimobile/contact/'+value.contact_id+'/" data-role="contact-'+value.contact_id+'">'+value.display_name+'</a></li>');
              });
            $('#contacts').listview();
              },
           }
        );



 
   
});
</script>
</div> 

<? require('civimobile.footer.php'); ?>
