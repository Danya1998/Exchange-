 var i = 0;
            $(document).ready(function() {
                $('#p24').bind('keyup paste change', UpdatePrices);
                $('#btc').bind('keyup paste change', UpdatePrices);
                $('#uah_com').bind('keyup paste change', UpdatePrices);
            });
            function UpdatePrices() { 
                var uah = $('#p24').val().split(',').join('.');
                var btc = $('#btc').val().split(',').join('.');
                var uah_com = $('#uah_com').val().split(',').join('.');
                var io_comission=0.04;
                var znak_com = 1;
                                    var course = 160100;                 
                if ( $(document.activeElement).is('#p24')){
                    $('#uah_com').val((uah/(1-znak_com*io_comission)).toFixed(2)); 
                    $('#btc').val((uah/course).toFixed(6)); 
                } else if ( $(document.activeElement).is('#btc') ){
                    $('#p24').val((btc*course).toFixed(2)); 
                    $('#uah_com').val((btc*course/(1-znak_com*io_comission)).toFixed(2));                   
                } else if ( $(document.activeElement).is('#uah_com')) {     
                    $('#p24').val((uah_com*(1-znak_com*io_comission)).toFixed(2));                  
                    $('#btc').val((uah_com*(1-znak_com*io_comission)/(course)).toFixed(6)); 
                } else {
                    $('#uah_com').val((uah/(1-znak_com*io_comission)).toFixed(2)); 
                    $('#btc').val((uah/course).toFixed(6)); 
                }
            }
            setTimeout(UpdatePrices,1);