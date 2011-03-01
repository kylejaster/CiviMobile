$().crmAPI ('Event','get',{'version' :'3', }
  ,{ success:function (data){    
      $.each(data, function(key, value) {
        // do something 
        });
    }
});