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
                                <a href="#" rel="tooltip" title="Excluir" data-id="<?php $row->id ?>"><i class="fa fa-trash-o"></i></a>
                                <a href="#" rel="tooltip" title="Alterar" data-id="<?php $row->id?>"><i class="fa fa-pencil"></i></a>
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
    $('#barracas_cadastradas').dataTable({
        "language": {
            url: "./js/plugin/dataTables/pt-br.json"
        }
    });
</script>