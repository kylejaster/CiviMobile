$().crmAPI ('Event','get',{'version' :'3' }
  ,{ success:function (data){    
      $.each(data.values, function(key, value) {
        alert('<li>'+value.title+'</li>');
        });
      },
   }
);


function civimobileCreatePage (json) {
    
    }

$(document).ready(function() {
// bit confused as of why it's there.
    $('a').live('click', function(){
    $().crmAPI ('Event','get',{'version':3}  ,{ success:function (data){    
       console.log(data.values);
    }});
//    linkURL = $(this).attribute('href');
    $.getJSON(linkURL, function(data) {
      $(document).append('<div data-role="page" data-theme="b" id="jqm-events">');
    });
  });
});
