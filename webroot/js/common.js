/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){   
    init_utc_time();    
})(jQuery);

function init_utc_time() {
    $('time.utc').each(function() {
        var $time = $(this);        
        var time = $time.attr('data-utc-time');
        var date = new Date(time);
        var gmt_date =date.toString();
        var index = gmt_date.indexOf('GMT');
        var str_date = gmt_date.substr(0, index -1);        
        $time.text(str_date);
    });
}