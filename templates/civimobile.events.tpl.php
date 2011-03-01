<? require('civimobile.header.php'); ?>
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
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
		</ul> 
	</div> 
</div> 

<? require('civimobile.footer.php'); ?>
