var options = { ajaxURL:"/civimobile/civicrm/ajax/rest" };

$().crmAPI ('Event','get',{'version' :'3' }
  ,{ 
    ajaxURL:"/civimobile/civicrm/ajax/rest",
    success:function (data){    
      $.each(data.values, function(key, value) {
        $('#jqm-events .ui-listview').append('<li role="option" tabindex="-1" data-theme="c" class="ui-btn ui-btn-icon-right ui-li ui-btn-up-c"><div class="ui-btn-inner"><div class="ui-btn-text"><a href="#" class="ui-link-inherit">'+value.title+'</a></div><span class="ui-icon ui-icon-arrow-r"></span></div></li>');
        });
      },
   }
);


$().crmAPI ('Participant','get',{'version' :'3', 'event_id' : '1' }
  ,{ 
      ajaxURL:"/civimobile/civicrm/ajax/rest",
      success:function (data){    
      $.each(data.values, function(key, value) {
        $('#jqm-events .ui-listview').append('<li role="option" tabindex="-1" data-theme="c" class="ui-btn ui-btn-icon-right ui-li ui-btn-up-c"><div class="ui-btn-inner"><div class="ui-btn-text"><a href="#" class="ui-link-inherit">'+value.display_name+'</a></div><span class="ui-icon ui-icon-arrow-r"></span></div></li>');        
        });
      },
    });