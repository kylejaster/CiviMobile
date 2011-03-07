<? require('civimobile.header.php'); ?>


<div data-role="page" data-theme="b" id="jqm-contacts"> 
	<div id="jqm-contactsheader" data-role="header">
        <h3>Search Contacts</h3>
	</div> 
	
	<div data-role="content" id="contact-content"> 
    <div class="ui-listview-filter ui-bar-c">
        <input type="search" name="sort_name" id="sort_name" value="" />
    </div>
    </div> 
    <div data-role="footer" data-id="global-footer" data-position="fixed" data-theme="a">
	<div data-role="navbar" data-theme="a">
      <ul>
        <li><a href="<?php print $base_url.base_path(); ?>contact" class="ui-btn-active" data-ajax="false" data-icon="search">Contacts</a></li>
        <li><a href="<?php print $base_url.base_path(); ?>events" data-ajax="false" data-icon="grid">Events</a></li>
      </ul>
    </div><!-- /navbar -->
    </div><!-- /footer --> 
    
	<script>
jQuery(document).ready(function($) {
    
<?php
   $results=json_encode(civicrm_api("Contact","get", array ('sequential' =>'1', 'version'=>3, 'return' =>'display_name,phone')));	
   echo "contacts = $results;\n";
    ///start with all the contacts (well the 25 first, ordered by the ever so useful contact_id), would be great to sort by desc modification date & user = current user? 
?>
   $('#contact-content').append('<ul id="contacts" data-role="listview" data-inset="false" data-filter="false" ></ul>');
   $.each(contacts.values, function(key, value) {
     $('#contacts').append('<li role="option" tabindex="-1" data-ajax="false" data-theme="c" id="contact-'+value.contact_id+'" ><a href="#contact/'+value.contact_id+'" data-role="contact-'+value.contact_id+'">'+value.display_name+'</a></li>');
   });
   $('#contacts').listview();


  $('#sort_name').change (function () {
    contactSearch ($(this).val());
  }); 
   
});


function contactSearch (q){
    $.mobile.pageLoading( );
    $().crmAPI ('Contact','get',{'version' :'3', 'sort_name': q, 'return' : 'display_name,phone' }
          ,{ 
            ajaxURL: crmajaxURL,
            success:function (data){
              if ($('#contacts').length == 0) {
                cmd = null;
                $('#contact-content').append('<ul id="contacts" data-role="listview" data-inset="true" data-filter="false" ></ul>');
              }
              else {
                cmd = "refresh";
                $('#contacts').empty();
              }
              $.each(data.values, function(key, value) {
                $('#contacts').append('<li role="option" tabindex="-1" data-ajax="false" data-theme="c" id="event-'+value.contact_id+'" ><a href="#contact/'+value.contact_id+'" data-role="contact-'+value.contact_id+'">'+value.display_name+'</a></li>');
              });
           $.mobile.pageLoading( true );
           $('#contacts').listview(cmd);
          }
   });
}

</script>
</div> 

<? require('civimobile.footer.php'); ?>