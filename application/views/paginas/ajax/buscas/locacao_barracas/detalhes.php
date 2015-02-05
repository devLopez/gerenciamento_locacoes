<div class="row">
    <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa-fw fa fa-calendar"></i> Detalhes do Período de Aluguel
        </h1>
    </div>
</div>

<div class="row">
    <div class="col col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <?php
            if(!$locacoes) {
                ?>
                <div class="alert alert-block alert-warning">
                    <h4><b>:(</b></h4>
                    <p>Não foi possível recuperar os dados do período selecionado</p>
                </div>
                <?php
            } else {
                foreach ($locacoes as $row) {
                    $id_periodo = $row->id;
                    $periodo    = $row->periodo_locacao;
                    $mes        = $row->mes_locacao;
                    $ano        = $row->ano_locacao;
                    $diretor    = $row->diretor_semana;
                }
                ?>
                <div class="jarviswidget jarviswidget-color-darken">
                    <header>
                        <span class="widget-icon"><i class="fam-date"></i></span>
                        <h2>Período de locações</h2>
                    </header>
                    <div>
                        <div class="widget-body no-padding">
                            <table class="table table-bordered table-condensed table-hover table-responsive" id="table-periodo-locacao">
                                <tr>
                                    <th>Mês de Referência</th>
                                    <td><?php echo $mes?></td>
                                </tr>
                                <tr>
                                    <th>Ano de Referência</th>
                                    <td><?php echo $ano?></td>
                                </tr>
                                <tr>
                                    <th>Período de Locação</th>
                                    <td><?php echo $periodo.' - '.$mes.' / '.$ano?></td>
                                </tr>
                                <tr>
                                    <th>Diretor da Semana</th>
                                    <td>
                                        <a href="javascript:void(0)" id="diretor_semana" data-type="text" data-name="diretor_semana" data-pk="<?php echo $id_periodo?>">
                                            <?php echo $diretor?>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
    
    <div class="col col-lg-8 col-md-8 col-sm-12 col-xs-12">
    	<div class="jarviswidget jarviswidget-color-darken">
    		<header>
    			<span class="widget-icon"><i class="fam-house"></i></span>
                <h2>Barracas Disponíveis</h2>
    		</header>
    		<div>
    			<div class="widget-body no-padding">
    			
    			</div>
    		</div>
    	</div>
    </div>
</div>
<script>
    // Carrega o plugin do xeditable
    loadScript('./js/plugin/xeditable/js/bootstrap-editable.min.js', function() {
        editar_diretor();
    });
    
    // Instancia o plugin do xeditable para edição de diretor da semana
    function editar_diretor() {
        $('#diretor_semana').editable();
    }
</script>