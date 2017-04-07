 $('.datepicker-half input').datepicker({
            locale: 'ru',
            format: 'yyyy-mm-dd',
         }).on('changeDate', function(e) {
         $(this).datepicker();
     });
     var clickHandler = function(){
         id = $(this).attr('id');
         $.ajax({
                url: '/serviceMonitoring/Controller/get.php',
                type: "POST",
                data: `id=${id}`,
                success: function(html){
                  $('#item_body').html(html);
                }
              });
     }

     $('.link').click(clickHandler);

    $('[name=date2]').change(function(){
         var date1 = $('[name=date1]').val();
         var date2 = $('[name=date2]').val();
         if(date1>date2) {
             alert('Начальная дата должна быть меньше конечной');
         } else {
            $.ajax({
                   url: '/serviceMonitoring/Controller/get.php',
                   type: "POST",
                   data: `date1=${date1}&date2=${date2}`,
                   success: function(html){
                        $('#list_body').html(html);
                        $('.link').click(clickHandler);
                   }
                 });
         }
     });

