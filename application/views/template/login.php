<!DOCTYPE html>
<html lang="pt-br" id="extr-page">
    <head>
        <meta charset="utf-8">
        <title><?php echo $titulo?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" media="all">
        <link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css"  media="all">
        <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.min.css" media="all">
        <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.min.css" media="all">
        <link rel="shortcut icon" href="./img/favicon/icon.png" type="image/png">
        <link rel="icon" href="./img/favicon/icon.png" type="image/png">
        <script src="./js/libs/jquery.js"></script>
    </head>

    <body id="login" class="animated fadeInDown">
        <!-- Header da página -->
        <header id="header">
            <div id="logo-group">
                <span id="logo">
                    <img src="./img/reservado/logo.png" alt="Clube Campestre Pentáurea">
                </span>
            </div>
        </header>
        <!--*****************************************************************-->

        <!-- Conteúdo -->
        <div id="" role="main">
            <div id="content" class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-xs hidden-sm"></div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <br><br>
                        <?php $this->load->view('paginas/'.$view);?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-xs hidden-sm"></div>
                </div>
            </div>
        </div>
        <!--================================================== -->

        <!-- jQuery e jQuery UI -->
        <script src="./js/libs/jquery-ui-1.10.3.min.js"></script>
        
        <!-- Twitter Bootstrap JS -->
        <script src="js/bootstrap/bootstrap.min.js"></script>
        
        <!-- Notificações -->
        <script src="./js/notification/SmartNotification.min.js" type="text/javascript"></script>

        <!-- JQUERY MASKED INPUT -->
        <script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>

        <!-- MAIN APP JS FILE -->
        <script src="js/app.config.js"></script>
        <script src="js/app.min.js"></script>
        
        <script src="./js/pentaurea.js"></script>
    </body>
</html>