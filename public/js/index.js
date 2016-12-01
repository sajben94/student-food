$( document ).ready(function() {
    
    $('input[id^="expire"]').each(function(event) {
            $(this).val($('#date_picker').val());
    })
    
    
    
    $('#date_picker').change(function (e) {
        $('input[id^="expire"]').each(function(event) {
            $(this).val($('#date_picker').val());
               
        });
        
        $.cookie('date', $(this).val());
        
        var date = new Date($('#date_picker').val());
        
        var day = 1+ date.getDay();
        
        window.location.replace("/menu/"+day);
        
    });
    
    var str = window.location.pathname
    
    if (str.match("^/menu/%7Bid%7D")) {
        $.removeCookie('date');
    }
    
    /* save status in select */ 
    if(typeof($.cookie('date')) !== "undefined"){
        $("#date_picker").val($.cookie('date'));
        $('input[id^="expire"]').each(function(event) {
            $(this).val($('#date_picker').val());
        });
    }
  
    
});