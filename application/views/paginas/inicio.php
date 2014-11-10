<!-- #HEADER -->
<header id="header">
    <div id="logo-group">

        <!-- Logo -->
        <span id="logo"> <img src="img/reservado/logo.png" alt="Clube Campestre Pentáurea"> </span>
        <!--*********************************************************-->

        <span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>

        <!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
        <div class="ajax-dropdown">

            <!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
            <div class="btn-group btn-group-justified" data-toggle="buttons">
                <label class="btn btn-default">
                    <input type="radio" name="activity" id="ajax/notify/mail.html">
                    Msgs (14) </label>
                <label class="btn btn-default">
                    <input type="radio" name="activity" id="ajax/notify/notifications.html">
                    notify (3) </label>
                <label class="btn btn-default">
                    <input type="radio" name="activity" id="ajax/notify/tasks.html">
                    Tasks (4) </label>
            </div>

            <!-- notification content -->
            <div class="ajax-notifications custom-scroll">

                <div class="alert alert-transparent">
                    <h4>Click a button to show messages here</h4>
                    This blank page message helps protect your privacy, or you can show the first message here automatically.
                </div>

                <i class="fa fa-lock fa-4x fa-border"></i>

            </div>
            <!-- end notification content -->

            <!-- footer: refresh area -->
            <span> Last updated on: 12/12/2013 9:43AM
                <button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
                    <i class="fa fa-refresh"></i>
                </button> </span>
            <!-- end footer -->

        </div>
        <!-- END AJAX-DROPDOWN -->
    </div>

    <!-- #TOGGLE LAYOUT BUTTONS -->
    <!-- pulled right: nav area -->
    <div class="pull-right">

        <!-- collapse menu button -->
        <div id="hide-menu" class="btn-header pull-right">
            <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
        </div>
        <!-- end collapse menu -->


        <!-- #Voice Command: Start Speech -->
        <div id="speech-btn" class="btn-header transparent pull-right">
            <div> 
                <a href="javascript:void(0)" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a> 
                <div class="popover bottom"><div class="arrow"></div>
                    <div class="popover-content">
                        <h4 class="vc-title">Voice command activated <br><small>Please speak clearly into the mic</small></h4>
                        <h4 class="vc-title-error text-center">
                            <i class="fa fa-microphone-slash"></i> Voice command failed
                            <br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
                            <br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- end voice command -->

    </div>
    <!-- end pulled right: nav area -->

</header>
<!-- END HEADER -->

<!-- #NAVIGATION -->
<aside id="left-panel">
    <nav>
        <ul>
            <li>
                <a href="index.php?/inicio/home">
                    <i class="fa fa-lg fa-fw fa-home"></i> 
                    <span class="menu-item-parent">Início</span>
                </a>
            </li>
            <li>
                <a href="index.php?/admin/mensagens">
                    <i class="fa fa-lg fa-fw fa-inbox"></i> 
                    <span class="menu-item-parent">Mensagens</span>
                    <span class="badge pull-right inbox-badge">14</span>
                </a>
            </li>
            <li>
                <a href="index.php?/admin/fazer_baixas">
                    <i class="fa fa-lg fa-fw fa-download"></i>
                    <span class="menu-item-parent">Baixas a Fazer</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-lg fa-fw fa-users"></i> 
                    <span class="menu-item-parent">Associados</span>
                </a>
                <ul>
                    <li>
                        <a href="index.php?/global/pesquisar">
                            <i class="fa fa-lg fa-fw fa-search"></i> Pesquisar Cadastrados
                        </a>
                    </li>
                    <li>
                        <a href="index.php?/admin/associados/novo">
                            <i class="fa fa-lg fa-fw fa-plus"></i> Novo Associado
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-lg fa-fw fa-file-text-o"></i> 
                    <span class="menu-item-parent">Relatórios</span>
                </a>
                <ul>
                    <li>
                        <a href="index.php?/admin/relatorios/cobranca">
                            <i class="fa fa-lg fa-fw fa-calendar"></i> Cobrança
                        </a>
                    </li>
                    <li>
                        <a href="index.php?/admin/relatorios/usuarios_cadastrados">
                            <i class="glyphicon glyphicon-user"></i> Usuários Cadastrados
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-lg fa-fw fa-cog"></i> 
                    <span class="menu-item-parent">Opções</span>
                </a>
                <ul>
                    <li>
                        <a href="#">
                            <i class="fa fa-lg fa-fw fa-plus"></i> Cadastros
                        </a>
                        <ul>
                            <li>
                                <a href="index.php?/admin/opcoes/cadastros/usuarios_sistema">
                                    <i class="glyphicon glyphicon-user"></i> Usuários do Sistema
                                </a>
                            </li>
                            <li>
                                <a href="index.php?/admin/opcoes/cadastros/tipos_recebimento">
                                    <i class="fa fa-lg fa-fw fa-money"></i> Tipos de Recebimento
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?/admin/opcoes/envio_email">
                            <i class="fa fa-lg fa-fw fa-envelope"></i> Envio de E-mail
                        </a>
                    </li>
                    <li>
                        <a href="index.php?/admin/opcoes/mensalidades">
                            <i class="fa fa-lg fa-fw fa-calendar"></i> Mensalidades
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a id="logoff" onclick="logoff('<?php echo app_baseurl() . 'login/logoff' ?>')" href="#">
                    <i class="fa fa-lg fa-fw fa-sign-out"></i> 
                    <span class="menu-item-parent">Fazer Logoff</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
<!-- END NAVIGATION -->

<!-- #MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">
        <!-- breadcrumb -->
        <ol class="breadcrumb"></ol>
        <!--********************************************************-->
    </div>
    <!--************************************************************-->

    <!-- #MAIN CONTENT (As páginas serão inseridas aqui via ajax) -->
    <div id="content"></div>
    <!--************************************************************-->

</div>
<!-- END #MAIN PANEL -->