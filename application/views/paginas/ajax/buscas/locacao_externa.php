<?php
    if(!$locacoes)
    {
        ?>
        <div class="alert alert-block alert-info">
            <h4 class="alert-title"><strong>:)</strong></h4>
            <p>
                Não foram encontrados registros
            </p>
        </div>
        <?php
    }
    else
    {
        ?>
        <table class="table table-striped table-hover table-responsive table-condensed">
            <thead>
                <tr>
                    <th>Instituição</th>
                    <th>Responsável</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Data</th>
                    <th>Espaço Necessário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($locacoes as $row)
                    {
                        ?>
                        <tr>
                            <td><?php echo $row->instituicao?></td>
                            <td><?php echo $row->responsavel?></td>
                            <td><?php echo $row->telefone?></td>
                            <td><?php echo $row->email?></td>
                            <td><?php echo date('d/m/Y', strtotime($row->data))?></td>
                            <td><?php echo $row->espaco_necessario?></td>
                            <td align="center">
                                <a href="#" rel="tooltip" title="Excluir">
                                    <i class="fa fa-times"></i>
                                </a>
                                <a href="#" rel="tooltip" title="Editar">
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
    echo $paginacao;
?>
<script type="text/javascript">
    //Recebe o valor do offset que será usado na paginação
    offset = '<?php echo $verificador?>';
</script>