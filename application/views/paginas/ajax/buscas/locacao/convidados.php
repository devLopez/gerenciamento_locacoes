<?php
    if (!$convidados)
    {
        ?>
        <div class="alert alert-block alert-warning">
            <h4 class=""alert-heading><b>:(</b></h4>
            <p>
                Não foram encontrados convidados para este evento
            </p>
        </div>
        <script>$('#imprimir').prop('disabled', true).addClass('disabled');</script>
        <?php
    }
    else
    {
        ?>
        <table class="table table-responsive table-hover table-condensed">
            <thead>
                <tr>
                    <th>Nome Completo</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($convidados as $row)
                    {
                        ?>
                        <tr>
                            <td><?php echo $row->nome_convidado?></td>
                            <td><?php echo $row->cpf?></td>
                            <td align="center">
                                <a href="#" class="editar" data-acao="editar" data-id="<?php echo $row->id?>" rel="tooltip" title="Editar">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#" class="excluir" data-acao="excluir" data-id="<?php echo $row->id?>" rel="tooltip" title="Excluir">
                                    <i class="fa fa-times"></i>
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

<!-- Modal que será inserido o formuláro de cadastro  -->
<div class="modal fade" id="edit_convidado" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <img src="./img/reservado/logo.png" width="150" alt="Clube Campestre Pentáurea">
                </h4>
            </div>
            <div class="modal-body no-padding">
                <form id="salvar_edicao_convidado" class="smart-form">
                    <fieldset id="form-edicao">
                    </fieldset>
                    <footer>
                        <button type="submit" class="btn btn-primary">
                            Salvar alteração
                        </button>
                        <button id="atualizar_depois" type="button" class="btn btn-default" data-dismiss="modal" onclick="limpar_campos($('#salvar_aviso'));">
                            Cancelar
                        </button>
                    </footer>
                </form>
            </div>
        </div>
    </div>
</div>
<!--*****************************************************************-->

<script type="text/javascript">
    //Exclui um convidado da lista
    $('.excluir').click(function(e) {
        e.preventDefault();

        var acao    = $(this).data('acao');
        var id      = $(this).data('id');
        var url     = '<?php echo app_baseurl().'locacao_externa/acoes_convidados'?>';

        $.SmartMessageBox({
            title: "Atenção",
            content: 'Deseja realmente excluir?',
            buttons: '[Ok][Cancelar]'
        }, function(e) {
            if (e == 'Ok')
            {
            	$.ajax({
                	url: url,
                	type: 'POST',
                	data: {acao: acao, id: id},
                	dataType: 'html',
                	success: function(sucesso) {
                    	if(sucesso == 1)
                    	{
                        	msg_sucesso('Convidado excluído');
                        	buscar();
                        }
                    	else
                    	{
                        	msg_erro('Não foi possível excluir o registro');
                        	return false
                        }
                    }
                });
            }
            else
            {
                return false;
            }
        });
    });

    // Função desenvolvida para edição de um convidado
    $('.editar').click(function(e){
        e.preventDefault();

        var acao    = $(this).data('acao');
        var id      = $(this).data('id');
        var url     = '<?php echo app_baseurl().'locacao_externa/acoes_convidados'?>';

        $.post(url, {acao: acao, id: id}, function(e){
            $('#edit_convidado').modal('show');
            $('#form-edicao').html(e);
        });
    });

    // Atualiza os dados de um convidado
    $('#salvar_edicao_convidado').submit(function(e) {
        e.preventDefault();

        dados = $(this).serialize();

        $.post('<?php echo app_baseurl().'locacao_externa/atualizar_convidado'?>', dados, function(e){
            if(e == 1)
            {
                msg_sucesso('Dados atualizados');
                $('#edit_convidado').modal('hide');
                buscar();
            }
            else
            {
                msg_erro('Não foi possível atualizar');
                return false;
            }
        });
    });
</script>