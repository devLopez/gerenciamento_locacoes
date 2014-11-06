<!DOCTYPE html>
<html lang="pt-br" id="extr-page">
    <head>
        <meta charset="utf-8">
        <title>Sistema de Cobança On-line</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.min.css">
        <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
        <script src="./js/libs/jquery-2.0.2.min.js"></script>
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
        <div id="content" class="container">
            <?php $this->load->view('paginas/'.$view);?>
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
        <script src="js/app.min.js"></script>
        
        <script type="text/javascript">
            loadScript('./js/pentaurea.js');
        </script>
    </body>
</html>