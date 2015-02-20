<!DOCTYPE html>
<html lang="pt-br">	
    <head>
        <meta charset="utf-8">
        <title>.:: SGL Início ::.</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- #CSS Links -->
        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/font-awesome.min.css">

        <!-- SmartAdmin Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/smartadmin-production.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/smartadmin-skins.min.css">
        
        <!-- Estilo personalizado do Pentáurea -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/pentaurea.css">

        <!-- Icones -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/icones.css">
        
        <!-- xEditable -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>js/plugin/xeditable/css/bootstrap-editable.css">
        
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>js/plugin/osx/css/osx.css" media="all">

        <!-- #FAVICONS -->
        <link rel="shortcut icon" href="./img/favicon/icon.png" type="image/png">
        <link rel="icon" href="./img/favicon/icon.png" type="image/png">

    </head>
    <body class="smart-style-2 menu-on-top">
        <!-- Exibe o progresso das requisições ajax 
        <div class="carregando"></div>
        <div class="carregando-backdrop"></div>-->
        
        <?php $this->load->view('paginas/' . $view); ?>
        
        <!-- #PAGE FOOTER -->
        <div class="page-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <span class="txt-color-white">Sistema de Gerência de Locações © 2014</span>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- END FOOTER -->

        <!--================================================== -->

        <!-- #PLUGINS -->
        <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
        <script src="<?php echo base_url()?>js/libs/jquery.js"></script>
        <script src="<?php echo base_url()?>js/libs/jquery-ui-1.10.3.min.js"></script> 

        <!-- BOOTSTRAP JS -->
        <script src="<?php echo base_url()?>js/bootstrap/bootstrap.min.js"></script>

        <!-- CUSTOM NOTIFICATION -->
        <script src="<?php echo base_url()?>js/notification/SmartNotification.min.js"></script>

        <!-- JARVIS WIDGETS -->
        <script src="<?php echo base_url()?>js/smartwidgets/jarvis.widget.min.js"></script>

        <!-- JQUERY VALIDATE -->
        <script src="<?php echo base_url()?>js/plugin/jquery-validate/jquery.validate.min.js"></script>

        <!-- JQUERY MASKED INPUT -->
        <script src="<?php echo base_url()?>js/plugin/masked-input/jquery.maskedinput.min.js"></script>

        <!-- JQUERY SELECT2 INPUT -->
        <script src="<?php echo base_url()?>js/plugin/select2/select2.min.js"></script>

        <!-- browser msie issue fix -->
        <script src="<?php echo base_url()?>js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

        <!-- MAIN APP JS FILE -->
        <script src="<?php echo base_url()?>js/app.min.js"></script>

        
        <!-- BlockUI -->
        <script src="<?php echo base_url()?>js/blockUi/blockUI.js"></script>
        
        <!-- HTML5 Utils, utilizado na detecção da conectividade -->
        <script src="<?php echo base_url()?>js/h5utils/h5utils.js"></script>
        
        <!-- Configurações do Ajax -->
        <script src="<?php echo base_url()?>js/ajaxSetup.js"></script>
        
        <script src="<?php echo base_url()?>js/plugin/osx/js/osx.js"></script>
        
        <script type="text/javascript">
            // Carrega o script personalizado Pentáurea
            loadScript('./js/pentaurea.js');

            /** Inicialização dos tooltips e popovers **/
            $("[rel=tooltip]").tooltip();
            
            $('body').tooltip({
                selector: '[rel="tooltip"]'
            });
            
            $('body').popover({
            	container: 'body',
                selector: '[rel="popover"]',
                placement: 'top',
                trigger: 'hover'
            });
            //******************************************************************
            
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
                if(navigator.onLine) {
                    msg_sucesso('Online');
                }
                else {
                    msg_erro('Offline');
                }
            }
            addEvent(window, 'online', verifica_conectividade);
            addEvent(window, 'offline', verifica_conectividade);
            //******************************************************************
        </script>
    </body>

</html>