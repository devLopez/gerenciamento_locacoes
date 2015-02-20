<!DOCTYPE html>
<html lang="pt-br" id="extr-page">
    <head>
        <meta charset="utf-8">
        <title><?php echo $titulo?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/bootstrap.min.css" media="all">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/font-awesome.min.css"  media="all">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/smartadmin-production.min.css" media="all">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/smartadmin-skins.min.css" media="all">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/pentaurea.css" media="all">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/pentaurea.css" media="all">
        
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>js/plugin/osx/css/osx.css" media="all">
        
        <link rel="shortcut icon" href="./img/favicon/icon.png" type="image/png">
        <link rel="icon" href="./img/favicon/icon.png" type="image/png">
        <script src="./js/libs/jquery.js"></script>
    </head>

    <body id="login" class="animated fadeInDown">
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
        <script src="<?php echo base_url()?>js/libs/jquery-ui-1.10.3.min.js"></script>
        
        <!-- Twitter Bootstrap JS -->
        <script src="<?php echo base_url()?>js/bootstrap/bootstrap.min.js"></script>
        
        <!-- Notificações -->
        <script src="<?php echo base_url()?>js/notification/SmartNotification.min.js" type="text/javascript"></script>

        <!-- JQUERY MASKED INPUT -->
        <script src="<?php echo base_url()?>js/plugin/masked-input/jquery.maskedinput.min.js"></script>

        <!-- MAIN APP JS FILE -->
        <script src="<?php echo base_url()?>js/app.min.js"></script>
        
        <script src="<?php echo base_url()?>js/plugin/osx/js/osx.js"></script>
        
        <script src="<?php echo base_url()?>js/pentaurea.js"></script>
    </body>
</html>