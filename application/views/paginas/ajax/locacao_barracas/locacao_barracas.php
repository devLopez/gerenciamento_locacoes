<!-- Header da página -->
<div class="row">
    <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa-fw fa fa-home"></i> Cadastro de Locação de Barracas
        </h1>
    </div>
    <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <a href="#cad_periodo_locacao" class="btn btn-primary pull-right" data-toggle="modal">Nova Locação</a>
    </div>
</div>
<!--*************************************************************************-->

<!-- Recebe o ano e o mês -->
<div class="row">
    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <form class="form-inline" id="data-pesquisa" role="form">
            <div class="form-group">
                <label class="select">
                    <select name="mes_busca" id="mes_busca" class="form-control">
                        <option value="Janeiro">Janeiro</option>
                        <option value="Fevereiro">Fevereiro</option>
                        <option value="Março">Março</option>
                        <option value="Abril">Abril</option>
                        <option value="Maio">Maio</option>
                        <option value="Junho">Junho</option>
                        <option value="Julho">Julho</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Setembro">Setembro</option>
                        <option value="Outubro">Outubro</option>
                        <option value="Novembro">Novembro</option>
                        <option value="Dezembro">Dezembro</option>
                    </select>
                </label>
            </div>
            <div class="form-group">
                <label class="select">
                    <select name="ano_busca" id="ano_busca" class="form-control"></select>
                </label>
            </div>
            <button type="submit" class="btn btn-default" style="margin-top: -5px;">
                <i class="fa fa-search"></i> Buscar
            </button>
        </form>
    </div>
</div>
<!--*************************************************************************-->

<!-- Div onde serão inseridas os dados das barracas -->
<div class="row" id=""></div>
<!--*************************************************************************-->

<!-- Modal onde será inserido um novo período de locação -->
<div class="modal fade" id="cad_periodo_locacao" data-backdrop="true" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <img src="./img/reservado/logo.png" width="150" alt="Clube Campestre Pentáurea">
                </h4>
            </div>
            <div class="modal-body no-padding">
                <form id="salvar_periodo_emprestimo" class="smart-form">
                    <fieldset>
                        <div class="row">
                            <section class="col col-6">
                                <div class="form-group">
                                    <label class="label">
                                        <strong>Período de empréstimo</strong>
                                    </label>
                                    <label class="input">
                                        <input class="form-control" name="periodo_locacao" maxlength="30" required>
                                    </label>
                                </div>
                            </section>
                            <section class="col col-6">
                                <div class="form-group">
                                    <label class="label">
                                        <strong>Diretor da semana</strong>
                                    </label>
                                    <label class="input">
                                        <input class="form-control" name="diretor_semana" maxlength="70" required>
                                    </label>
                                </div>
                            </section>
                        </div>
                    </fieldset>
                    <footer>
                        <button class="btn btn-primary" type="submit">
                            Emprestar
                        </button>
                        <a class="btn btn-default" onclick="limpar_campos($('#salvar_emprestimo'))" data-dismiss="modal">
                            Fechar esta janela
                        </a>
                    </footer>
                </form>
            </div>
        </div>
    </div>
</div>
<!--*************************************************************************-->

<script type="text/javascript">
    // Chama a função que busca os anos para realização da busca
    buscar_ano();

    // Realiza a busca dos anos
    function buscar_ano() {
        // Recebe o objeto jquery do combo
        combo_ano = $('#ano_busca');

        // Variável que receberá o ano atual
        ano_atual = '';

        // Realiza a limpeza do combo
        combo_ano.html('');
        
		$.getJSON('locacao_barracas/combo_ano', function(e) {
			ano_atual = e.ano_atual;

			for(i = 0; i < e.anos.length; i++)
			{
				combo_ano.append('<option value="'+e.anos[i]+'">'+e.anos[i]+'</option>');
			}
		}).done(function() {
			combo_ano.find('option').each(function() {
				if($(this).val() == ano_atual)
					$(this).prop('selected', true);
			});
		});
	}

	// Envia o formulário via ajax
	$('#salvar_periodo_emprestimo').submit(function(e) {
		e.preventDefault();

		periodo = $(this).serialize();

		$.ajax({
			url: 'locacao_barracas/salvar_periodo',
			type: 'POST',
			data: periodo,
			dataType: 'POST',
			success: function(e) {
				if(e == 1) {
					msg_sucesso('Período de locação cadastrado com sucesso');
					limpar_campos($('#salvar_periodo_emprestimo'));
					$('#cad_periodo_locacao').modal('hide');
				} else {
					msg_erro('Não foi possível salvar o período');
					return false;
				}
			}
		});
	})
</script>