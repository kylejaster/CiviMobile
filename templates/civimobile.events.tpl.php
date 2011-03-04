<? require('civimobile.header.php'); 
?>
<script>
$(function (){
console && console.log ("loading...");
            $('#event-content').html('<ul id="events-list" data-role="listview" data-inset="true" data-filter="true" ></ul>');
      $().crmAPI ('Event','get',{'version' :'3' }
        ,{ 
          ajaxURL: crmajaxURL,
          success:function (data){
            $('#event-content').html('<ul id="events-list" data-role="listview" data-inset="true" data-filter="true" ></ul>');
            $.each(data.values, function(key, value) {
              $('#events-list').append('<li role="option" tabindex="-1" data-theme="c" id="event-'+value.id+'" ><a href="civimobile/participants&event_id='+value.id+'" data-role="participants-'+value.id+'">'+value.title+'</a></li>');
              });
            $('#events-list').listview();
            },
         }
      );
});
</script>

<div data-role="page" data-theme="b" id="jqm-events"> 
	<div id="jqm-homeheader">
    <div data-role="navbar">
      <ul>
        <li><a href="/civimobile/contact">Contacts</a></li>
        <li><a href="/civimobile/events" class="ui-btn-active">Events</a></li>
      </ul>
    </div><!-- /navbar -->
	</div> 
	
	<div data-role="content" id="event-content"> 
	  <div>Loading...</div>	
	</div> 
</div> 

<? require('civimobile.footer.php'); ?>
