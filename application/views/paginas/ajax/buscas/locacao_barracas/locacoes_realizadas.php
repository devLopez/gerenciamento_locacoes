<?php
    if(!$locacoes) {
        ?>
        <div class="alert alert-block alert-warning">
            <h4><b>:(</b></h4>
            <p>
                Não foram encontrados registros para este mês
            </p>
        </div>
        <?php
    } else {
        ?>
        <div class="jarviswidget jarviswidget-color-darken">
            <header>
                <span class="widget-icon"><i class="fa fa-calendar"></i></span>
                <h2>Períodos Cadastrados</h2>
            </header>
            <div>
                <div class="widget-body no-padding">
                    <table class="table table-striped table-hover table-responsive table-bordered table-condensed" id="table-periodos-cadastrados">
                        <thead>
                        <tr>
                            <th>Mês de Referência</th>
                            <th>Período</th>
                            <th>Diretor da Semana</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($locacoes as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row->mes_locacao?></td>
                                        <td><?php echo $row->periodo_locacao.' - '.$row->mes_locacao.' / '.$row->ano_locacao?></td>
                                        <td><?php echo $row->diretor_semana?></td>
                                        <td align="center">
                                            <a href="#locacao_barracas/detalhes/<?php echo $row->id?>" rel="tooltip" title="Detalhes">
                                                <i class="fam-world-go"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
    }
?>

<script>
    // Definições para inicialização do dataTables
    var pagefunction = function () {
        $('#table-periodos-cadastrados').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-6 col-sm-6'f><'col-sm-6 col-xs-6'l>r>" +
            "t" +
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
            "responsive": true,
            "language": {
                url: "./js/plugin/dataTables/pt-br.json"
            }
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
</script>