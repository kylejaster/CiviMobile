<? require('civimobile.header.php'); 
?>
<script>
$().crmAPI ('Event','get',{'version' :'3', }
  ,{ success:function (data){    
      $.each(data, function(key, value) {
        $('#jqm-events').append(value+'<br />');
      });
    }
});
</script>

<div data-role="page" data-theme="b" id="jqm-events"> 
	<div id="jqm-homeheader">
	    <h3><?php print $civimobile_page_settings['title'] ?></h3>
	</div> 
	
	<div data-role="content"> 
		
		<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b"> 
			<li data-role="list-divider" role="heading" tabindex="0">Events</li>
		</ul> 
	</div> 
</div> 

<? require('civimobile.footer.php'); ?>
