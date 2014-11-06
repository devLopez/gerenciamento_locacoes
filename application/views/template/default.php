<!DOCTYPE html>
<html lang="pt-br">	
    <head>
        <meta charset="utf-8">
        <title> Sistema de Cobrança on-Line</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- #CSS Links -->
        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">

        <!-- SmartAdmin Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.min.css">
        
        <!-- Estilo personalizado do Pentáurea -->
        <link rel="stylesheet" type="text/css" media="screen" href="./css/pentaurea.css">

        <!-- #FAVICONS -->
        <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

        <!-- #GOOGLE FONT -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
    </head>
    <body class="smart-style-2 menu-on-top">
        <?php $this->load->view('paginas/' . $view); ?>
        
        <!-- #PAGE FOOTER -->
        <div class="page-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <span class="txt-color-white">Sistema de Cobrança On-Line © 2014</span>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- END FOOTER -->

        <!--================================================== -->

        <!-- #PLUGINS -->
        <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
        <script src="js/libs/jquery-2.0.2.min.js"></script>
        <script src="js/libs/jquery-ui-1.10.3.min.js"></script>

        <!-- IMPORTANT: APP CONFIG -->
        <script src="js/app.config.js"></script>

        <!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
        <script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

        <!-- BOOTSTRAP JS -->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!-- CUSTOM NOTIFICATION -->
        <script src="js/notification/SmartNotification.min.js"></script>

        <!-- JARVIS WIDGETS -->
        <script src="js/smartwidgets/jarvis.widget.min.js"></script>

        <!-- JQUERY VALIDATE -->
        <script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>

        <!-- JQUERY MASKED INPUT -->
        <script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>

        <!-- JQUERY SELECT2 INPUT -->
        <script src="js/plugin/select2/select2.min.js"></script>

        <!-- browser msie issue fix -->
        <script src="js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

        <!-- FastClick: For mobile devices: you can disable this in app.js -->
        <script src="js/plugin/fastclick/fastclick.min.js"></script>

        <!--[if IE 8]>
                <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
        <![endif]-->

        <!-- MAIN APP JS FILE -->
        <script src="js/app.min.js"></script>

        <!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
        <!-- Voice command : plugin -->
        <script src="./js/speech/voicecommand.min.js"></script>
        
        <!-- BlockUI -->
        <script src="./js/blockUi/blockUI.js"></script>
        
        <!-- HTML5 Utils, utilizado na detecção da conectividade -->
        <script src="./js/h5utils/h5utils.js"></script>
        
        <!-- Configurações do Ajax -->
        <script src="./js/ajaxSetup.js"></script>
        
        <script type="text/javascript">
            loadScript('./js/pentaurea.js');
            
            
            /**
             * verifica_conectividade()
             * 
             * Função desenvolvida para verificar a conectividade do dispositivo
             * 
             * @author  html5Demos.com
             * @see     http://html5demos.com/offline
             */
            function verifica_conectividade()
            {
                if(navigator.onLine)
                {
                    msg_sucesso('Online');
                }
                else
                {
                    msg_erro('Offline');
                }
            }
            addEvent(window, 'online', verifica_conectividade);
            addEvent(window, 'offline', verifica_conectividade);
            //******************************************************************
        </script>
    </body>

</html>