<? require('civimobile.header.php'); 
?>
<script>
/*$().crmAPI ('Event','get',{'version' :'3', }
  ,{ success:function (data){    
alert ("why is that called?");
      $.each(data, function(key, value) {
        $('#jqm-events').append(value+'<br />');
      });
    }
});
*/
</script>

<div data-role="page" data-theme="b" id="jqm-contacts"> 
	<div id="jqm-homeheader" data-role="header">
    <div data-role="navbar">
      <ul>
        <li><a href="/civimobile/contact" class="ui-btn-active">Contacts</a></li>
        <li><a href="/civimobile/events">Events</a></li>
      </ul>
    </div><!-- /navbar -->

	</div> 
	
	<div data-role="content"> 
		
		<ul data-role="listview"  data-filter="true" data-inset="true" data-theme="c" data-dividertheme="b"> 
			<li data-role="list-divider" role="heading" tabindex="0">Contacts</li>
		</ul> 
	</div> 
</div> 

<? require('civimobile.footer.php'); ?>
