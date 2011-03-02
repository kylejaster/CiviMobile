

// generate list of events
$().crmAPI ('Event','get',{'version' :'3' }
  ,{ 
    ajaxURL: crmajaxURL,
    success:function (data){
      $('#home-content').append('<ul id="events-list" data-role="listview" data-inset="true"></ul>');
      $.each(data.values, function(key, value) {
        $('#events-list').append('<li role="option" tabindex="-1" data-theme="c" id="event-'+value.id+'"><a href="#'+value.id+'">'+value.title+'</a></li>');
        });
      $('#events-list').listview();
      },
   }
);


// listen for click on event
// then generate participants page


$().crmAPI ('Participant','get',{'version' :'3', 'event_id' : '1' }
  ,{ 
      ajaxURL: crmajaxURL,
      success:function (data){    
      $.each(data.values, function(key, value) {
        $('#jqm-events .ui-listview').append('<li role="option" tabindex="-1" data-theme="c"><a href="#">'+value.display_name+'</a></div></li>');        
        });
      $('#jqm-events .ui-listview').listview('refresh');
      },
    });

/*
$().crmAPI ('participant','update',{id:id,status_id:toStatus}, 
       {callBack: function(result,settings){
          if (result.is_error == 1) {
            $(settings.msgbox)
            .addClass('msgnok')
            .html(result.error_message);
            return false;
          } else {
            $('#crm-participant_'+id)
            .find('td.crm-participant-status_'+fromStatus)
            .removeClass('crm-participant-status_'+fromStatus)
            .addClass('crm-participant-status_'+toStatus)
            .html(name); 
          }
        }
       });
       */