<?php
    if (! $locacao) {
        ?>
        <div class="alert alert-block alert-warning">
        	<h4 class="alert-heading">
        		<b>:(</b>
        	</h4>
        	<p>Não foi possível resgatar o registro</p>
        </div>
        <div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar esta janela</button>
        </footer>
    <?php
    } else {
        foreach ($locacao as $row)
        {
        ?>
        <form id="atualizar_locacao" class="smart-form">
        	<fieldset>
        		<div class="row">
        			<section class="col col-6">
        				<div class="form-group">
        					<label class="label"> <strong>Instituição</strong></label>
        					<label class="input">
        					   <input class="form-control" name="e_instituicao" id="e_instituicao" type="text" maxlength="150" required value="<?php echo $row->instituicao?>">
        					</label>
        				</div>
        			</section>
        			<section class="col col-6">
        				<div class="form-group">
        					<label class="label"> <strong>Nome do Responsável</strong></label>
        					<label class="input">
        					<input class="form-control" name="e_responsavel" id="e_responsavel" type="text" maxlength="150" required value="<?php echo $row->responsavel?>">
        					</label>
        				</div>
        			</section>
        		</div>
        		<div class="row">
        			<section class="col col-6">
        				<div class="form-group">
        					<label class="label"> <strong>CPF/ CNPJ</strong></label>
        					<span class="input-group">
        					   <label class="input">
        					       <input class="form-control" name="e_cpf_cnpj" id="e_cpf_cnpj" type="text" placeholder="CPF/ CNPJ" required data-mask="999.999.999-99" value="<?php echo $row->cpf_cnpj?>">
        					   </label>
        					   <span class="input-group-addon">
        					       <label class="toggle checkbox-toggle">
        					           <input type="checkbox" id="e_trocar_mascara" checked="checked">
        					           <i data-swchon-text="CPF" data-swchoff-text="CNPJ"></i>
        						  </label>
        					   </span>
        					</span>
        				</div>
        			</section>
        			<section class="col col-6">
        				<div class="form-group">
        					<label class="label"> <strong>Telefone</strong></label>
        					<label class="input">
        					  <input class="form-control" name="e_telefone" id="e_telefone" type="text" maxlength="13" data-mask="(99)9999-9999" required value="<?php echo $row->telefone?>">
        					</label>
        				</div>
        			</section>
        		</div>
        		<div class="row">
        			<section class="col col-6">
        				<div class="form-group">
        					<label class="label"> <strong>Email</strong></label>
        					<label class="input">
        					   <input class="form-control"name="e_email" id="e_email" type="email" maxlength="150" required value="<?php echo $row->email?>">
        					</label>
        				</div>
        			</section>
        			<section class="col col-6">
        				<div class="form-group">
        					<label class="label"> <strong>Data da Visita</strong></label>
        					<div class="input-group">
        					    <label class="input">
        						    <input class="form-control" name="e_data" id="e_data" type="text" placeholder="Data da visita" required value="<?php echo $row->data?>">
        						</label>
        						<span class="input-group-addon"> 
        						    <i class="fa fa-calendar"></i>
        						</span>
        					</div>
        				</div>
        			</section>
        		</div>
        
        		<div class="row">
        			<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
        				<label class="label"><strong>Observações:</strong></label>
        				<label class="textarea">
        				    <textarea name="e_espaco_necessario" id="e_espaco_necessario" maxlength="150"><?php echo $row->espaco_necessario?></textarea>
        				</label>
        			</section>
        		</div>
        		<input type="hidden" id="id" name="id" value="<?php echo $row->id?>">
        
        	</fieldset>
        
        	<footer>
        		<button type="submit" class="btn btn-primary">Atualizar Locação</button>
        		<button id="atualizar_depois" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        	</footer>
        </form>
        <?php
        }
    }
?>

<script type="text/javascript">
    //Chama função que habilita funções e eventos para formulário
    runAllForms();
    
    //Inicializa o calendário
    $('#e_data').datepicker({
        dateFormat: 'yy-mm-dd',
        prevText: '<i class="fa fa-chevron-left"></i>',
        nextText: '<i class="fa fa-chevron-right"></i>',
        minDate: 0
    });
    //**************************************************************************

    /** Função desenvolvida para mudar a máscara do cpf/cnpj **/
    $('#e_trocar_mascara').click(function() {
        if ($(this).prop('checked') == true) {
        	mascarar('999.999.999-99');
        } else {
        	mascarar('99.999.999/9999-99');
        }
    });
    //**************************************************************************

    // Função desenvolvida para inserir a mascara definida
    function mascarar(mascara)
    {
    	$('#e_cpf_cnpj').mask(mascara, {placeholder: '*'}).focus();
    }
    //**************************************************************************

    // Envia os dados via ajax
    $('#atualizar_locacao').submit(function(e) {
        e.preventDefault();

        var dados = $(this).serialize();

        $.ajax({
            url: '<?php echo app_baseurl().'locacao_externa/atualizar_locacao'?>',
            type: 'POST',
            data: dados,
            dataType: 'html',
            success: function(e) {
                if(e == 1) {
                    msg_sucesso('Atualizado com sucesso');
                    buscar();
                    $('#edit_aluguel').modal('hide');
                } else {
                    msg_erro('Não foi possível atualizar. Tente novamente');
                }
            }
        });
    });
</script>