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
        <?php
            if(!$locacoes) {
                ?>
                <div class="alert alert-block alert-warning">
                    <h4><b>:(</b></h4>
                    <p>Não foi possível recuperar os dados do período selecionado</p>
                </div>
                <?php
            } else {
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
                                    <td><?php echo $mes?></td>
                                </tr>
                                <tr>
                                    <th>Ano de Referência</th>
                                    <td><?php echo $ano?></td>
                                </tr>
                                <tr>
                                    <th>Período de Locação</th>
                                    <td><?php echo $periodo.' - '.$mes.' / '.$ano?></td>
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
        
        <?php
            if(!$desistencias) {
                ?>
                <div class="alert alert-block alert-warning">
                    <h4><b>:(</b></h4>
                    <p>Nenhuma desistência registrada</p>
                </div>
                <?php
            } else {
                ?>
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
                <?php
            }
        ?>
    </div>
    
    <div class="col col-lg-9 col-md-9 col-sm-12 col-xs-12">
    	<div class="jarviswidget">
            <header>
                <span class="widget-icon"><i class="fam-house"></i></span>
                <h2><b>Barracas Disponíveis</b></h2>
            </header>
            <div>
                <div class="widget-body no-padding">
                    <table class="table table-hover table-responsive table-bordered" id="table-alugueis">
                        <thead>
                            <tr>
                                <th>Barraca</th>
                                <th>Associado</th>
                                <th>Período</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($alugueis as $row) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row->nome_barraca?>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="<?php echo ($row->status == 0) ? "" : 'edit_aluguel'?>" data-name="nome_associado" data-pk="<?php echo $row->id?>" data-type="text">
                                                <?php echo $row->nome_associado?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="<?php echo ($row->status == 0) ? "" : 'edit_aluguel'?>" data-name="periodo_estadia" data-pk="<?php echo $row->id?>" data-type="text">
                                                <?php echo $row->periodo_estadia?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="<?php echo ($row->status == 0) ? "" : 'edit_aluguel'?>" data-name="telefone_associado" data-pk="<?php echo $row->id?>" data-type="text" data-mask="(99)9999-9999">
                                                <?php echo $row->telefone_associado?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="<?php echo ($row->status == 0) ? "" : 'edit_aluguel'?>" data-name="cpf_associado" data-pk="<?php echo $row->id?>" data-type="text" data-mask="999.999.999-99">
                                                <?php echo $row->cpf_associado?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php if($row->status == 1):?>
                                            <label class="label label-primary">Disponível</label>
                                            <?php else:?>
                                            <label class="label label-warning">Indisponível</label>
                                            <?php endif;?>
                                        </td>
                                        <td>
                                            <?php if($row->status == 1):?>
                                                <a href="javascript:void(0)" rel="tooltip" title="Separar" class="status" data-mensagem="Deseja realmente separar esta barraca?" data-id='<?php echo $row->id?>' data-status='0'>
                                                    <i class="fam-house-go"></i>
                                                </a>
                                            <?php else:?>
                                                <a href="javascript:void(0)" rel="tooltip" title="Disponibilizar" class="status" data-mensagem="Deseja realmente disponibilizar esta barraca?" data-id='<?php echo $row->id?>' data-status='1'>
                                                    <i class="fam-tick"></i>
                                                </a>
                                            <?php endif;?>
                                            <a href="javascript:void(0)" rel="tooltip" title="Cancelar reserva" class="cancelar" data-placement="left" data-nome="<?php echo $row->nome_associado?>" data-id="<?php echo $row->id?>" data-id-periodo-aluguel="<?php echo $row->id_periodo_aluguel?>" data-cpf="<?php echo $row->cpf_associado?>">
                                                <i class="fam-cross"></i>
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
    </div>
</div>
<div class="modal fade" id="modal-cancelar-reserva" data-keyboard="false" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <img src="./img/reservado/logo.png" width="150" alt="Clube Campestre Pentáurea">
                </h4>
            </div>
            <div class="modal-body no-padding">
                <form class="smart-form" id="cancelar_reserva">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="id_periodo_locacao" id="id_periodo_locacao">
                    <fieldset>
                        <div class="row">
                            <section class="col col-6">
                                <div class="form-group">
                                    <label class="label">
                                        <strong>Nome do associado</strong>
                                    </label>
                                    <label class="input">
                                        <input class="form-control" name="nome_socio" id="nome_socio" maxlength="100" required>
                                    </label>
                                </div>
                            </section>
                            <section class="col col-6">
                                <div class="form-group">
                                    <label class="label">
                                        <strong>Valor do crédito</strong>
                                    </label>
                                    <label class="input">
                                        <input class="form-control" name="valor_credito" id="valor_credito" required>
                                    </label>
                                </div>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-6">
                                <div class="form-group">
                                    <label class="label">
                                        <strong>CPF</strong>
                                    </label>
                                    <label class="input">
                                        <input class="form-control" name="cpf_associado" id="cpf_associado" required data-mask="999.999.999-99">
                                    </label>
                                </div>
                            </section>
                            <section class="col col-6">
                                <div class="form-group">
                                    <label class="label">
                                        <strong>Observações</strong>
                                    </label>
                                    <label class="textarea">
                                        <textarea name="observacoes" maxlength="250"></textarea>
                                    </label>
                                </div>
                            </section>
                        </div>
                    </fieldset>
                    <footer>
                        <button type="submit" class="btn btn-primary">
                            Cancelar reserva
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="limpar_campos($('#cancelar_reserva'));">
                            Fechar
                        </button>
                    </footer>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#link-locacao-barracas').addClass('active');
    drawBreadCrumb(["Detalhes", "<?php echo $periodo.' - '.$mes.' - '.$ano?>"]);
    
    runAllForms();
    
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

    function editar_alugel() {
        $('.edit_aluguel').editable({
            url: 'locacao_barracas/editar_alugueis',
            emptytext: 'Vazio',
            validate: function (value) {
                if ($.trim(value) == '') {
                    return 'Valor Inválido';
                }
            }
        }).on('shown', function(e, editable) {
            if($(this).data('mask')) {
                editable.input.$input.mask($(this).data('mask'), {placeholder: '*'});
            }
        });
    }

    // Habilita ou desabilita uma barraca para disponibilização
    $('.status').click(function(e) {
        var dados = {};

        dados['pk']     = $(this).data('id');
        dados['name']   = 'status';
        dados['value']  = $(this).data('status');

        $.SmartMessageBox({
            title: 'Atenção',
            content: $(this).data('mensagem'),
            buttons: '[Sim][Não]'
        }, function(b) {
			if(b == 'Não') {
				return false;
			} else {
				$.ajax({
					url: 'locacao_barracas/editar_alugueis',
					type: 'POST',
					data: dados,
					dataType: 'html',
					success: function(e) {
						if(e == 1) {
							msg_sucesso('Status da barraca modificado');
							checkURL();
						} else {
							msg_erro('Não foi possível modificar o status');
							return false;
						}
					}
				});
			}
		});
    });

    // Função que busca o Script de máscara monetária
    loadScript('js/plugin/maskMoney/jquery.maskMoney.min.js', function() {
    	$("#valor_credito").maskMoney({
            showSymbol: true,
            allowZero: true,
            symbol: "R$",
            decimal: ".",
            precision: 2
        });
	});

	// Coloca o foco no campo de nome dajanela modal
    $('#modal-cancelar-reserva').on('shown.bs.modal', function(){
        $('#valor_credito').focus();
    });

    $('.cancelar').click(function() {
        id                  = $('#id');
        id_periodo_locacao  = $('#id_periodo_locacao');
        nome_socio          = $('#nome_socio');
        cpf_associado       = $('#cpf_associado');

        if($(this).data('nome') == "" && $(this).data('cpf') == "") {
            alert('É necessário que a locação esteja preenchida');
            return false;
        } else {
        	nome_socio.val($(this).data('nome'));
            id.val($(this).data('id'));
            id_periodo_locacao.val($(this).data('id-periodo-aluguel'));
            cpf_associado.val($(this).data('cpf'));
            
            $('#modal-cancelar-reserva').modal('show');
        }
    });

    $('#cancelar_reserva').submit(function(e) {
		e.preventDefault();

		var cancelar = $(this).serialize();

		$.ajax({
			url: 'locacao_barracas/cancelar_locacao',
			type: 'POST',
		    data: cancelar,
			dataType: 'json',
			success: function(s) {
				if(s == false) {
					msg_erro('Não foi possível cancelar o aluguel');
					return false;
				} else {
					msg_sucesso('Locação cancelada');
					$('#modal-cancelar-reserva').modal('hide');
					limpar_campos($('#cancelar_reserva'));
					checkURL();
				}
			}
		});
	});
</script>