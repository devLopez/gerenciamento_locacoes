<!-- Barra no topo, onde há alguns links e a logo da empresa -->
<header id="header">
    <div id="logo-group">
        <span id="logo">
            <img src="./img/reservado/logo.png" alt="Clube Campestre Pentáurea" title="Clube Campestre Pentáurea">
        </span>
    </div>
    <div class="pull-right">
    	<!-- Botão Para Esconder/ Mostrar Menu -->
		<div id="hide-menu" class="btn-header pull-right">
			<span>
				<a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu">
				    <i class="fa fa-align-justify"></i>
				</a>
			</span>
		</div>
		<!--*****************************************************************-->
        
        <!-- Exibe o nome e a foto do associado -->
		<ul id="mobile-profile-img" class="header-dropdown-list padding-5">
			<li class="">
				<a href="#" class="no-margin">
					Olá <span id="nome_usuario"><?php echo $_COOKIE['nome_usuario']; ?></span>
				</a>
			</li>
		</ul>
    </div>
</header>
<!--*************************************************************************-->

<!-- #NAVIGATION -->
<aside id="left-panel">
    <nav>
        <ul>
            <li>
                <a href="index.php?/inicio/home">
                    <i class="fa fa-lg fa-fw fa-home"></i>
                    <span>Início</span>
                </a>
            </li>
            <li>
                <a href="index.php?/locacao_externa">
                    <i class="fa fa-lg fa-fw fa-code-fork"></i> 
                    <span>Locações Externas</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-lg fa-fw fa-home"></i> 
                    <span>Locação de Barracas</span>
                </a>
            </li>
            <li>
                <a href="index.php?/materiais_esportivos">
                    <i class="fa fa-lg fa-fw fa-dribbble"></i> 
                    <span>Materiais Esportivos</span>
                </a>
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
                                <a href="index.php?/opcoes/cadastros/barracas">
                                    <i class="fa fa-lg fa-fw fa-home"></i> Barracas 
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-lg fa-fw fa-money"></i> Valores
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-lg fa-fw fa-dribbble"></i> Mat. Esportivos
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-lg fa-fw fa-user"></i> Usuários
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-lg fa-fw fa-users"></i> Grupos de Usuários
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-lg fa-fw fa-envelope"></i> Envio de E-mail
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
    
    <!-- Tela de bloqueio -->
    <div id="tela-bloqueio"></div>
    <!--*********************************************************************-->

</div>
<!-- END #MAIN PANEL -->