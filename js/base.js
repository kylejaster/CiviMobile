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

        // get array of url params        
        urlVars = getUrlVars();
        console.log(urlVars);
        
        // listen for click on event
        // then generate participants page
        if (urlVars.length >0){
            $.mobile.pageLoading();
             $().crmAPI ('Participant','get',{'version' :'3', 'event_id' : urlVars[0][1] }
               ,{ 
                   ajaxURL: crmajaxURL,
                   success:function (data){
                   $('#participants').attr('id','participants-'+urlVars[0][1]);
                   participantsList = $('#participants-'+urlVars[0][1]+' .participants-list');
                   participantsList.empty();  
                   $.each(data.values, function(key, value) {
                     participantsList.append('<li role="option" tabindex="-1" data-theme="c"><a>'+value.display_name+'</a></div></li>');        
                     });
                   participantsList.listview().listview('refresh');
                   $.mobile.pageLoading( true );
                   },
                 });
            }
        
        if ( event.target.id.indexOf('participants') >= 0) {
			// remove any existing swipe areas
			$('.divSwipe').remove();
			// add swipe event to the list item, removing it first (if it exists)
			$('ul#participants-list li').unbind('swiperight').bind('swiperight', function(e){
				// reference the just swiped list item
				var $li = $(this);
				// remove all swipe divs first
				$('.divSwipe').remove();
				// create buttons and div container
				var $divSwipe = $('<div class="divSwipe"></div>');
				var $myBtn01 = $('<a>Button One</a>')
								.attr({
									'class': 'aSwipeBtn ui-btn-up-b',
									'href': 'page.html'
								});
				var $myBtn02 = $('<a>Button Two</a>')
								.attr({
									'class': 'aSwipeBtn ui-btn-up-e',
									'href': 'page.html'
								});
				// insert swipe div into list item
				$li.prepend($divSwipe);
				// insert buttons into divSwipe
				$divSwipe.prepend($myBtn01,$myBtn02).show(100);
				// add escape route for swipe menu
				$('body').bind('tap', function(e){
					// if the triggering object is a button, fire it's tap event
					if (e.target.className.indexOf('aSwipeBtn') >= 0) $(e.target).trigger('click'); 
					// remove any existing cancel buttons
					$('.divSwipe').remove();
					// remove the event
					$('body').unbind('tap');
				});
			});
		}

        
        
function dump(arr,level) {
	var dumped_text = "";
	if(!level) level = 0;
	
	//The padding given at the beginning of the line.
	var level_padding = "";
	for(var j=0;j<level+1;j++) level_padding += "    ";
	
	if(typeof(arr) == 'object') { //Array/Hashes/Objects 
		for(var item in arr) {
			var value = arr[item];
			
			if(typeof(value) == 'object') { //If it is an array,
				dumped_text += level_padding + "'" + item + "' ...\n";
				dumped_text += dump(value,level+1);
			} else {
				dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
			}
		}
	} else { //Stings/Chars/Numbers etc.
		dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
	}
	return dumped_text;
 };
        
        
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