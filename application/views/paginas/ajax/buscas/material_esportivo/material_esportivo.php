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
        <table class="table table-bordered table-hover table-responsive table-condensed">
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
                                <a class="editar" href="#" rel="tooltip" title="Editar" data-acao="editar" data-id="<?php echo $row->id?>" data-href="<?php echo app_baseurl().'materiais_esportivos/processar_comando'?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <?php
                                    if($row->status == 1)
                                    {
                                        ?>
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
        <?php
    }
?>

<script>
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
                    setar_data();
                    buscar();
                }
                else
                {
                    msg_erro('Não foi possível devolver o material');
                }
            });
        }
    });
</script>