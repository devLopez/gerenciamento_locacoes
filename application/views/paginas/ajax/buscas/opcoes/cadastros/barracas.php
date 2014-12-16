<?php
    if(!$barracas)
    {
        ?>
        <div class="alert alert-block alert-info">
            <h4>:(</h4>
            <p>Nao ha barracas cadastradas</p>
        </div>
        <?php
    }
    else
    {
        ?>
        <table class="table table-bordered table-condensed table-responsive table-striped" id="barracas_cadastradas">
            <thead>
                <tr>
                    <th>Nome da Barraca</th>
                    <th>Valor da diária</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($barracas as $row)
                    {
                        ?>
                        <tr>
                            <td><?php echo $row->nome_barraca?></td>
                            <td><?php echo $row->valor_diaria?></td>
                            <td align="center">
                                <a href="#" class="acao" rel="tooltip" title="Excluir" data-id="<?php echo $row->id?>" data-acao="excluir">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                <a href="#" class="acao" rel="tooltip" title="Alterar" data-id="<?php echo $row->id?>" data-acao="alterar">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        <?php
    }
?>

<script>
    // Inicia o Plugin DataTable
    $('#barracas_cadastradas').dataTable({
        "language": {
            url: "./js/plugin/dataTables/pt-br.json"
        }
    });
    
    /**
     * Função desenvolvida para alterar ou excluir uma barraca
     */
    $('.acao').click(function(e) {
        e.preventDefault();
        
        var acao    = $(this).data('acao');
        var id      = $(this).data('id');
        
        if(acao == 'excluir')
        {
            if(confirm('Deseja realmente excluir?'))
            {
                $.ajax({
                    url: '<?php echo app_baseurl().'opcoes/cadastros/barracas/excluir_barracas'?>',
                    type: 'POST',
                    data: {id: id},
                    dataType: 'html',
                    success: function(e) {
                        if(e == 1)
                        {
                            msg_sucesso('Barraca excluida');
                            buscar();
                        }
                        else
                        {
                            msg_erro('Não foi possível excluir a barraca');
                        }
                    }
                });
            }
        }
    });
</script>