<? require('civimobile.header.php'); ?>


<div data-role="page" data-theme="b" id="jqm-contacts"> 
	<div id="jqm-contactsheader" data-role="header">
        <h3>Search Contacts</h3>
        	    <a href="/civimobile" data-ajax="false" data-direction="reverse" data-role="button" data-icon="home" data-iconpos="notext" class="ui-btn-right jqm-home">Home</a>

	</div> 
	
	<div data-role="content" id="contact-content"> 
    <div class="ui-listview-filter ui-bar-c">
        <input type="search" name="sort_name" id="sort_name" value="" />
    </div>
    </div>
    	 
    <div data-role="footer" data-id="global-footer" data-position="fixed" data-theme="a">
	<div data-role="navbar" data-theme="a">
      <ul>
        <li><a href="/civimobile/contact" class="ui-btn-active" data-ajax="false" data-icon="search">Contacts</a></li>
        <li><a href="/civimobile/events" data-ajax="false" data-icon="grid">Events</a></li>
      </ul>
    </div><!-- /navbar -->
    </div><!-- /footer --> 
    <div style="display:none" id="add_contact">
    <div data-role="fieldcontain">
        <label for="name">First Name</label>
        <input type="text" name="first_name" id="first_name" value=""  />
    </div>
    <div data-role="fieldcontain">
        <label for="name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value=""  />
    </div>
    <div data-role="fieldcontain">
        <label for="name">Email</label>
        <input type="email" name="email" id="email" value=""  />
    </div>    
    <div data-role="fieldcontain">
        <label for="name">Phone</label>
        <input type="tel" name="tel" id="tel" value=""  />
    </div>
    <div data-role="fieldcontain">
    	<label for="textarea">Note:</label>
    	<textarea cols="40" rows="8" name="note" id="note"></textarea>
    </div>
    <a href="#" id="save-contact" data-role="button">Save Contact</a> 
    </div>
    
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
              if (data.count == 0) {
                cmd = null;
                $('#contact-content').append($('#add_contact'));
                $('#contacts').hide();
                $('#add_contact').show();
                populateContactForm();
                $('#save-contact').click(function(){ createContact(); });                              
              }
              else {
                cmd = "refresh";
                $('#contacts').show();
                $('#add_contact').hide();
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

function populateContactForm() {
    $('#phone, #email, #note, #last_name, #first_name').val('');    

    searchTerms = $('#sort_name').val().split(' ');

    $('#first_name').val(searchTerms[0]); 

    if (searchTerms[1]){
        $('#last_name').val(searchTerms[1]); 
        }
    }

function createContact() {

      first_name = $('#first_name').val(); 
      last_name = $('#last_name').val(); 
      phone = $('#tel').val(); 
      email = $('#email').val(); 
      note = $('#note').val(); 

    
        $().crmAPI ('Contact','create',{
            'version' :'3', 
            'contact_type' :'Individual', // only individuals for now
            'first_name' :first_name, 
            'last_name' : last_name, 
            'phone' : phone, 
            'email' : email, 
            'notes' : note
            }
          ,{ success:function (data){    
              $.each(data.values, function(key, value) { 
                $.mobile.changePage("/civimobile/contact/"+value.id);
                });
            }
        });
    }

</script>
</div> 

<? require('civimobile.footer.php'); ?>