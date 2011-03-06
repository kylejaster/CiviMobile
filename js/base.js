
        // generate list of events
        $().crmAPI ('Event','get',{'version' :'3' }
          ,{ 
            ajaxURL: crmajaxURL,
            success:function (data){
              $('#home-content').append('<ul id="events-list" data-role="listview" data-inset="true" data-filter="true" ></ul>');
              $.each(data.values, function(key, value) {
                $('#events-list').append('<li role="option" tabindex="-1" data-theme="c" id="event-'+value.id+'" ><a href="civimobile/participants&event_id='+value.id+'" data-role="participants-'+value.id+'">'+value.title+'</a></li>');
                });
              $('#events-list').listview();
              },
           }
        );


$(function(){

	$('div').live('pageshow',function(event, ui){
        
      //  console.log($.mobile.subPageUrlKey);
      //  console.log(ui.toSource());
        
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
                     participant = '<li role="option" tabindex="-1" data-theme="c" data-transition="slide-up" data-icon="check"data-role="participant_id-'+value.participant_id+'">';
                     participant += '<p class="ui-li-aside ui-li-desc"><strong>'+value.participant_status+'</strong></p>';
                     participant += '<h3 class="ul-li-heading">'+value.display_name+'<h3>';
                     participant += '<a href="'+base_url+'civimobile/status&participant_id='+value.participant_id+'&participant_status_id='+value.participant_status_id+'"  data-role="participant_status"></a>';
                     participant += '</li>';
                     participantsList.append(participant);        
                     });
                   participantsList.listview().listview('refresh');
                   $.mobile.pageLoading( true );
                   },
                 });
            }
            
            // On Participant Status page
             if (urlVars[0][0] == 'participant_id') {
                participant_status = $('#participant_status .participant_status-list');
                participant_status.listview().listview('refresh');
                participant_id = urlVars[0][1];
                
                $().crmAPI ('participant','get',{id:participant_id}, 
               {
                  ajaxURL: crmajaxURL,
                  callBack: function(data,settings){
                  $.mobile.pageLoading();
                  if (data.is_error == 1) {
                    $.mobile.pageLoading( true );
                    alert('Whoops - flaky internet! Try again...');
                  } else {
                  $.each(data.values, function(key, value) {
                     $('#jqm-participant_status .ui-title').html(value.display_name);
                     $('#status-'+value.participant_status_id).attr('data-theme','b').toggleClass('ui-btn-up-c').toggleClass('ui-btn-up-b');       
                     });
                    $.mobile.pageLoading( true );


                    
                  }
                  
                }
               });
                
                $('.status-button').click(function(){
                    new_participant_status = $(this).attr('id').replace('status-','');
                    setParticipantStatus(participant_id, new_participant_status);
                });
                
            }
        
        }

	});

});

        
        function setParticipantStatus(participant_id, status) {
            $.mobile.pageLoading();
            
            $().crmAPI ('participant','update',{id:participant_id,status_id:status}, 
               {
                  ajaxURL: crmajaxURL,
                  callBack: function(result,settings){
                  if (result.is_error == 1) {
                    $.mobile.pageLoading( true );
                    alert('Whoops - flaky internet! Try again...');
                  } else {
                    console.log('success');
                    $.mobile.pageLoading( true );
                    $('.ui-btn-up-b').attr('data-theme','c').removeClass('ui-btn-up-b').addClass('ui-btn-up-c');
                    $('.ui-btn-hover-c').attr('data-theme','c').removeClass('ui-btn-hover-b').addClass('ui-btn-hover-c');
                    $('#status-'+status).attr('data-theme','b').removeClass('ui-btn-up-c').removeClass('ui-btn-hover-c').addClass('ui-btn-up-b');
                  }
                  
                }
               });
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


