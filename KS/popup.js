
$(document).ready(function(){
    $('#popupbtn').on('click',function(){
        $('#popup').css('display','block');
    });
    $('#x').on('click',function(){
        $('#popup').css('display','none');
    });

    $('#ok').on('click', function() {
		    const $ip = $('#ip').val();
		    const $select =parseInt($('#pgselect').val());
		    switch ($select) {
		        case 1:	    
		        						AndroidBridge.postMessage($ip,$select);      			    
		                                 
		            break;
		        case 3:   	
		        						AndroidBridge.postMessage($ip,$select);					
		                             
		            break;
		        case 4:			
		        						AndroidBridge.postMessage($ip,$select);
		                    
		            break;
		    }
		});
});
