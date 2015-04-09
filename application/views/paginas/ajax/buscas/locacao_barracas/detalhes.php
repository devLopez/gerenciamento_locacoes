<div class="row">
    <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h1 class="page-title txt-color-white">
            <i class="fa-fw fa fa-calendar"></i> Detalhes do Período de Aluguel
        </h1>
    </div>
    <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="pull-right">
            <a href="#locacao_barracas" class="btn btn-default">
                Voltar
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <?php if(!$locacoes) { ?>
            <div class="alert alert-block alert-warning">
                <h4><b>:(</b></h4>
                <p>Não foi possível recuperar os dados do período selecionado</p>
            </div>
        <?php } else {
                foreach ($locacoes as $row) {
                    $id_periodo = $row->id;
                    $periodo    = $row->periodo_locacao;
                    $mes        = $row->mes_locacao;
                    $ano        = $row->ano_locacao;
                    $diretor    = $row->diretor_semana;
                }
                ?>
                <div class="jarviswidget">
                    <header>
                        <span class="widget-icon"><i class="fam-date"></i></span>
                        <h2><b>Período de locações</b></h2>
                    </header>
                    <div>
                        <div class="widget-body no-padding">
                            <table class="table table-bordered table-condensed table-hover table-responsive" id="table-periodo-locacao">
                                <tr>
                                    <th>Mês de Referência</th>
                                    <td><?php echo nome_mes($mes)?></td>
                                </tr>
                                <tr>
                                    <th>Ano de Referência</th>
                                    <td><?php echo $ano?></td>
                                </tr>
                                <tr>
                                    <th>Período de Locação</th>
                                    <td><?php echo $periodo.' - '.nome_mes($mes).' / '.$ano?></td>
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
        
        <?php if(!$desistencias) { ?>
            <div class="alert alert-block alert-warning">
                <h4><b>:(</b></h4>
                <p>Nenhuma desistência registrada</p>
            </div>
        <?php } else { ?>
            <div class="jarviswidget">
                <header>
                    <span class="widget-icon"><i class="fam-user-delete"></i></span>
                    <h2><b>Desistências</b></h2>
                </header>
                <div>
                    <div class="widget-body no-padding">
                        <table class="table table-bordered table-condensed table-hover table-responsive" id="table-desistencias">
                            <thead>
                                <tr>
                                    <td>Nome</td>
                                    <td>Crédito</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($desistencias as $row):?>
                                    <tr>
                                        <td><?php echo $row->nome_socio?></td>
                                        <td>R$ <?php echo number_format($row->valor_credito, 2, ',', '.')?></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    
    <!-- exibe as barracas para este periodo -->
    <div class="col col-lg-9 col-md-9 col-sm-12 col-xs-12" id="exibe_barracas"></div>
    
</div>

<script>
    // Desenha o BreadCrumb
    $('#link-locacao-barracas').addClass('active');
    drawBreadCrumb(["Detalhes", "<?php echo $periodo.' - '.nome_mes($mes).' - '.$ano?>"]);

    // Roda as funções do SmartAdmin
    runAllForms();

    // Recebe o ID do perido visualizado
    var idPeriodo = '<?php echo $id_periodo?>';

    // Chama a função de busca da barracas
    buscar_barracas();
    
    //Definições para inicialização do dataTables
    var pagefunction = function () {
        $('#table-alugueis').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-6 col-sm-6'f><'col-sm-6 col-xs-6'l>r>" +
            "t" +
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
            "responsive": true,
            "language": {
                url: "./js/plugin/dataTables/pt-br.json"
            },
            paging: false
        });

        $('#table-desistencias').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-12'f>>" +
            "t" +
            "<'dt-toolbar-footer'<'col-sm-12 col-xs-12 hidden-xs'i>>",
            "autoWidth": true,
            "responsive": true,
            "language": {
                url: "./js/plugin/dataTables/pt-br.json"
            },
            paging: false
        });
    };
    
    // Carregamento dos plugins necessários
    loadScript("./js/plugin/dataTables/jquery.dataTables.min.js", function () {
        loadScript("./js/plugin/dataTables/tableTools/js/dataTables.tableTools.min.js", function () {
            loadScript("./js/plugin/dataTables/dataTables.bootstrap.js", function () {
                loadScript("./js/plugin/dataTables/responsive/dataTables.responsive.js", pagefunction)
            });
        });
    });
    
    // Carrega o plugin do xeditable
    loadScript('./js/plugin/xeditable/js/bootstrap-editable.min.js', function() {
        editar_diretor();
        editar_alugel();
    });
    
    // Instancia o plugin do xeditable para edição de diretor da semana
    function editar_diretor() {
        $('#diretor_semana').editable({
            url: 'locacao_barracas/editar_diretor',
            validate: function (value) {
                if ($.trim(value) == '') {
                    return 'Valor Inválido';
                }
            }
        });
    }

    // Função desenvolvida para buscar as barracas cadastradas para este período
    function buscar_barracas() {
        loadURL('locacao_barracas/get_barracas_periodo/'+idPeriodo, $('#exibe_barracas'));
    }
</script>