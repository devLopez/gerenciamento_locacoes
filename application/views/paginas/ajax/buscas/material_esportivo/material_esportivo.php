<?php
    if(!$emprestimos)
    {
        ?>
        <div class="alert alert-block alert-warning">
            <h4><b>:(</b></h4>
            <p>
                Não foram encontrados registros
            </p>
        </div>
        <?php
    }
    else
    {
        ?>
        <div class="jarviswidget">
            <header>
                <span class="widget-icon"><i class="fa fa-dribbble"></i></span>
                <h2>Espréstimos realizados</h2>
            </header>
            <div>
                <div class="widget-body no-padding">
                    <table class="table table-bordered table-hover table-responsive table-condensed" id="table-emprestimos-cadastrados">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Localização</th>
                                <th>Data Empréstimo</th>
                                <th>Material</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($emprestimos as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $row->nome_tomador?></td>
                                        <td><?php echo $row->localizacao_tomador?></td>
                                        <td><?php echo date('d/m/Y H:i:s', strtotime($row->data_emprestimo))?></td>
                                        <td><?php echo $row->item?></td>
                                        <td>
                                            <?php echo ($row->status == 1) ? "<span class='label label-warning'>Emprestado</span>" : "<span class='label label-primary'>Devolvido</span>"; ?>
                                        </td>
                                        <td align="center">
                                            <?php
                                                if($row->status == 1)
                                                {
                                                    ?>
                                                    <a class="editar" href="#" rel="tooltip" title="Editar" data-acao="editar" data-id="<?php echo $row->id?>" data-href="<?php echo app_baseurl().'materiais_esportivos/processar_comando'?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="devolver" href="#" rel="tooltip" title="Devolver" data-acao="devolver" data-id="<?php echo $row->id?>" data-href="<?php echo app_baseurl().'materiais_esportivos/processar_comando'?>">
                                                        <i class="fa fa-level-down"></i>
                                                    </a>
                                                    <?php
                                                }
                                            ?>
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

<div class="modal fade" id="ed_emprestimo" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <img src="./img/reservado/logo.png" width="150" alt="Clube Campestre Pentáurea">
                </h4>
            </div>
            <div class="modal-body no-padding">
                <form id="salvar_ed_emprestimo" class="smart-form">
                    <fieldset id="campos"></fieldset>
                    <footer>
                        <button class="btn btn-primary" type="submit">
                            Atualizar dados
                        </button>
                        <a class="btn btn-default" onclick="limpar_campos($('#ed_emprestimo'))" data-dismiss="modal">
                            Fechar esta janela
                        </a>
                    </footer>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Definições para inicialização do dataTables
    var pagefunction = function () {
        $('#table-emprestimos-cadastrados').dataTable({
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
    
    // Funçao desenvolvida para devolver um material emprestado
    $('.devolver').click(function(e) {
        e.preventDefault();
        
        acao    = $(this).data('acao');
        id      = $(this).data('id');
        href    = $(this).data('href');
        
        if(confirm('Confirma devolução?'))
        {
            $.post(href, {acao: acao, id: id}, function(e) {
                if(e == 1)
                {
                    msg_sucesso('O material foi devolvido');
                    buscar();
                }
                else
                {
                    msg_erro('Não foi possível devolver o material');
                }
            });
        }
    });
    
    /**
     * Função desenvolvida para editar uma locação
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     */
    $('.editar').click(function(e) {
        e.preventDefault();
        
        acao    = $(this).data('acao');
        id      = $(this).data('id');
        href    = $(this).data('href');
        
        $.post(href, {acao: acao, id: id}, function(e) {
            $('#campos').html(e);
        });
        
        $('#ed_emprestimo').modal('show');
    });

    /**
     * Função desenvolvida para salvar a edição
     *
     * @author  :   Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     */
    $('#salvar_ed_emprestimo').submit(function(e) {
        e.preventDefault();

        dados = $(this).serialize();

        $.ajax({
            url: '<?php echo app_baseurl().'materiais_esportivos/salvar_edicao'?>',
            type: 'POST',
            data: dados,
            daType: 'html',
            success: function(e) {
                if(e == 1)
                {
                    msg_sucesso('Dados Atualizados');
                    buscar();
                    $('#ed_emprestimo').modal('hide');
                }
                else
                {
                    msg_erro('Não foi possível atualizar');
                }
            }
        });
    });
</script>