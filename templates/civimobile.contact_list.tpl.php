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
<div data-role="fieldcontain">
    <label for="search">Name or email</label>
    <input type="search" name="sort_name" id="sort_name" value="" />
</div>
	</div> 
	<script>
/* why isn't it called all the time ?!? */
jQuery(document).ready(function($) {
              $('#contact-content').append('<ul id="contacts" data-role="listview" data-inset="true" data-filter="false" ></ul>');
    
// @kyle: if you can solve your civicrm_api issue, we have an example where both the civicrm_api and the ajax are used
<?php
//   $results=json_encode (civicrm_api("Contact","get", array ('sequential' =>'1', 'version'=>3, 'return' =>'display_name,phone')));	
//   //$results=json_encode (civicrm_api("Contact","get", array ('sequential' =>'1')));	
//   echo "contacts = $results;\n";
?>

contactSearch (''); 
///start with all the contacts (well the 25 first, ordered by the ever so useful contact_id by default)

  $('#sort_name').change (function () {
    contactSearch ($(this).val());
  }); 
   
});


function contactSearch (q){
  
    $().crmAPI ('Contact','get',{'version' :'3', 'sort_name': q, 'return' : 'display_name,phone' }
          ,{ 
            ajaxURL: crmajaxURL,
            success:function (data){
      $('#contacts').empty();
                $.each(data.values, function(key, value) {
      $('#contacts').append('<li role="option" tabindex="-1" data-ajax="false" data-theme="c" id="event-'+value.contact_id+'" ><a href="/civimobile/contact/'+value.contact_id+'/" data-role="contact-'+value.contact_id+'">'+value.display_name+'</a></li>');
              });
           if (q == "") {
             $('#contacts').listview();
           } else {
             $('#contacts').listview("refresh");
           }
              },
           }
        );
}

</script>
</div> 

<? require('civimobile.footer.php'); ?>
