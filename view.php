<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link href="css/bootstrap-datepicker.css" rel="stylesheet">
        <script src="js/bootstrap-datepicker.js" charset="UTF-8"></script>
    </head>
    <body>
        
        <div class="container well">
            <?php if(isset($_SESSION['success'])&&(!$_SESSION['success'])):?>
                <div class="alert alert-danger">
                    <?= $_SESSION['message'];?>
                    <button type="button" class="close" data-dismiss="alert">x</button>
                </div>
            <?php endif;?>
            <div class="row">
                <div class="col-xs-6">
                    <div id="sandbox-container" class="datepicker-half">
                        <input type="text" class="form-control" name="date1" value="Выберите начальную дату">
                    </div>
                    <div id="sandbox-container" class="datepicker-half">
                        <input type="text" class="form-control" name="date2" value="Выберите конечную дату">
                    </div>
                </div>
                <div class="col-xs-6">
                    Последняя проверка:   <?php if(isset($_SESSION['lastResponse'])):?>
                                            <span class="glyphicon 
                                        <?= $_SESSION['lastResponse']['equal'] ? 'glyphicon-thumbs-up' : 'glyphicon-thumbs-down'?>" 
                                        aria-hidden="true"></span>
                                        <?php endif;?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-5 pre-scrollable semiWindow">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Пинг</th>
                                <th>Сравнение</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($_SESSION['list'])):?>
                                <?php foreach ($_SESSION['list'] as $item):?>
                                    <tr>
                                        <th><a href="index.php" id="<?= $item['id']?>"><?= $item[REQUEST_DATE]?></a></th>
                                        <th><?= $item[TIME]?></th>
                                        <th><span class="glyphicon 
                                        <?= $item[EQUAL] ? 'glyphicon-thumbs-up' : 'glyphicon-thumbs-down'?>" 
                                        aria-hidden="true"></span></th>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
                
                 <div class="col-xs-12 col-md-5 pre-scrollable semiWindow col-md-offset-1">
                     <table>
                         <tbody>
                             <tr><th>Время запроса:</th><th></th></tr>
                             <tr><th>Время ответа:</th><th></th></tr>
                             <tr><th>Время ожидания:</th><th></th></tr>
                             <tr><th>Результат проверки:</th><th></th></tr>
                             <tr><th>Ответ сервера:</th><th></th></tr>
                         </tbody>
                     </table>
                </div>
            </div>
           
        </div>
        <script>
             $('#sandbox-container input').datepicker().on('changeDate', function(e) {
                 $(this).datepicker('hide');
             });
             
    
            $('[name=date2]').change(function(){
                 var date1 = $('[name=date1]').val();
                 var date2 = $('[name=date2]').val();

                 $.ajax({
                        url: 'index.php',
                        type: "POST",
                        data: `date1=${date1}&date2=${date2}`,
                        success: function(data){
                          //alert('Load was performed.' + data);
                          console.log(data);
                        }
                      });
             });
                     
             
        </script>
    </body>
</html>

