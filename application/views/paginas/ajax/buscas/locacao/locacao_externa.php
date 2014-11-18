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
                    <th>CPF/ CNPJ</th>
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
                            <td><?php echo $row->cpf_cnpj?></td>
                            <td><?php echo $row->telefone?></td>
                            <td><?php echo $row->email?></td>
                            <td><?php echo date('d/m/Y', strtotime($row->data))?></td>
                            <td><?php echo $row->espaco_necessario?></td>
                            <td align="center">
                                <a class="visualizar" href="<?php echo app_baseurl().'locacao_externa/detalhes_locacao/'.$row->id?>" rel="tooltip" title="Visualizar">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="excluir" href="#" rel="tooltip" title="Excluir" data-acao="excluir" data-id="<?php echo $row->id ?>">
                                    <i class="fa fa-times"></i>
                                </a>
                                <a class="editar" href="#" rel="tooltip" title="Editar" data-acao="editar" data-id="<?php echo $row->id ?>">
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

<!-- Modal para Edição de uma nova locação de espaço -->
<div class="modal fade" id="edit_aluguel" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <img src="./img/reservado/logo.png" width="150" alt="Clube Campestre Pentáurea">
                </h4>
            </div>
            <div class="modal-body no-padding" id="formulario_edicao">
            </div>
        </div>
    </div>
</div>
<!-- Fim do Modal -->

<script type="text/javascript">
    //Recebe o valor do offset que será usado na paginação
    offset = '<?php echo $verificador?>';

    // Realiza a exclusão de um registro
    $('.excluir').click(function(e){
        e.preventDefault();

        var acao    = $(this).data('acao');
        var id      = $(this).data('id');

        if(confirm('Deseja realmente excluir?'))
        {
            $.ajax({
               url: '<?php echo app_baseurl().'locacao_externa/operacoes'?>',
               type: 'POST',
               data: {acao: acao, id: id},
               dataType: 'html',
               success: function(e)
               {
                   if(e == 1)
                   {
                       msg_sucesso('Excluido com sucesso');
                       buscar();
                   }
                   else
                   {
                       msg_erro('Não foi possível realizar a ação');
                       return false;
                   }
               } 
            });
        }
    });

    // Chama o formulário para edição do registro
    $('.editar').click(function(e){
        e.preventDefault();

        var acao    = $(this).data('acao');
        var id      = $(this).data('id');

        $.post('<?php echo app_baseurl().'locacao_externa/operacoes'?>', {acao: acao, id: id}, function(e){
            $('#edit_aluguel').modal('show');
            $('#formulario_edicao').html(e);
        });
    });

    /**
     * Realiza a chamada para a página que visualiza as informações da locação
     * além de possibilitar a inserção dos convidados para a locação selecionada
     */
    $('.visualizar').click(function(e){
        e.preventDefault();

        href = $(this).attr('href');

        get_data(href);
    });
</script>