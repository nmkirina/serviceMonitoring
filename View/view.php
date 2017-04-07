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
           <?php include 'errorMessage.php';?>
            <div class="row">
                <div class="col-xs-6">
                    <div id="sandbox-container1" class="datepicker-half">
                        <input type="text" class="form-control" name="date1" value="Выберите начальную дату" >
                    </div>
                    <div id="sandbox-container2" class="datepicker-half">
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
                        <tbody id="list_body">
                            <?php include 'list.php';?>
                        </tbody>
                    </table>
                </div>
                
                 <div class="col-xs-12 col-md-5 pre-scrollable semiWindow col-md-offset-1">
                    <div id="item_body">
                        <?php include 'item.php';?>
                    </div>
                </div>
            </div>
           
        </div>
        <script src="js/view.js" type="text/javascript"></script>
    </body>
</html>

