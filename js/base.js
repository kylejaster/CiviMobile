function getUrlVars() {
			var vars = [], hash;
			var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
			for(var i = 0; i < hashes.length; i++) {
				hash = hashes[i].split('=');
				vars.push(hash[0]);
				vars[hash[0]] = hash[1];
			}
			return vars;
		}


        // generate list of events
        $().crmAPI ('Event','get',{'version' :'3' }
          ,{ 
            ajaxURL: crmajaxURL,
            success:function (data){
              $('#home-content').append('<ul id="events-list" data-role="listview" data-inset="true"></ul>');
              $.each(data.values, function(key, value) {
                $('#events-list').append('<li role="option" tabindex="-1" data-theme="c" id="event-'+value.id+'" ><a href="civimobile/participants&event_id='+value.id+'" data-role="participants-'+value.id+'">'+value.title+'</a></li>');
                });
              $('#events-list').listview();
              },
           }
        );


$(function(){

	$('div').live('pageshow',function(event, ui){
        
        console.log($.mobile.subPageUrlKey);
        console.log(ui.toSource());
        
        // get array of url params        
        var urlVars = getUrlVars();
        
        if (urlVars.length >0){
            $.mobile.pageLoading();
             
             
             // On Event Participants Listing page
             if (urlVars[0][0] == 'event_id') {
             $().crmAPI ('Participant','get',{'version' :'3', 'event_id' : urlVars[0][1] }
               ,{ 
                   ajaxURL: crmajaxURL,
                   success:function (data){
                   $('#participants').attr('id','participants-'+urlVars[0][1]);
                   participantsList = $('#participants-'+urlVars[0][1]+' .participants-list');
                   participantsList.empty();  
                   $.each(data.values, function(key, value) {
                     participant = '<li role="option" tabindex="-1" data-theme="c" data-icon="check"data-role="participant_id-'+value.participant_id+'">';
                     participant += '<p class="ui-li-aside ui-li-desc"><strong>'+value.participant_status+'</strong></p>';
                     participant += '<h3 class="ul-li-heading">'+value.display_name+'<h3>';
                     participant += '<a href="'+base_url+'civimobile/status&participant_id="'+value.participant_id+'" data-rel="dialog" data-transition="pop"></a>';
                     participant += '</li>';
                     participantsList.append(participant);        
                     });
                   participantsList.listview().listview('refresh');
                   $.mobile.pageLoading( true );
                   },
                 });
            }
            
        
        
        
        }
        


        
		function getUrlVars() {
			var vars = [], hash;
			var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
			for(var i = 1; i < hashes.length; i++) {
				hash = hashes[i].split('=');
				vars.push([hash[0], hash[1]]);
				//vars[hash[0]] = hash[1];
			}
			return vars;
		}

	});

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