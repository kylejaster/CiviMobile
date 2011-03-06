<?php require('civimobile.header.php'); 
global $base_url;

?>

<div data-role="page" data-theme="b" id="jqm-events"> 
<script>
$(function (){
window.console && console && console.log ("loading...");
      $().crmAPI ('Event','get',{'version' :'3' }
        ,{ 
          ajaxURL: crmajaxURL,
          success:function (data){
            $('#event-content').html('<ul id="events-list" data-role="listview" data-inset="true" data-filter="true" ></ul>');
            $.each(data.values, function(key, value) {
              $('#events-list').append('<li role="option" tabindex="-1" data-theme="c" id="event-'+value.id+'" ><a href="'+base_url+'civimobile/participants&event_id='+value.id+'" data-role="participants-'+value.id+'">'+value.title+'</a></li>');
              });
            $('#events-list').listview();
            },
         }
      );
});
</script>
	<div id="jqm-homeheader">
    <div data-role="navbar">
      <ul>
        <li><a href="<?php print $base_url.base_path(); ?>contact" data-ajax="false">Contacts</a></li>
        <li><a href="<?php print $base_url.base_path(); ?>events" class="ui-btn-active" data-ajax="false">Events</a></li>
      </ul>
    </div><!-- /navbar -->
	</div> 
	
	<div data-role="content" id="event-content"> 
	  <div>Loading...</div>	
	</div> 
</div> 

<?php require('civimobile.footer.php'); ?>
