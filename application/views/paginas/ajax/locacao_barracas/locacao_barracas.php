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
                    <select name="mes_busca" id="mes_busca" class="form-control"></select>
                </label>
            </div>
            <div class="form-group">
                <label class="select">
                    <select name="ano_busca" id="ano_busca" class="form-control"></select>
                </label>
            </div>
            <button type="submit" class="btn btn-default" style="margin-top: -5px;" data-loading-text="Buscando..." id="buscar">
                <i class="fa fa-search"></i> Buscar
            </button>
        </form>
    </div>
</div>
<!--*************************************************************************-->

<!-- Div onde serão inseridas os dados das barracas -->
<div class="row padding-top-10">
    <div class="col col-lg-12 col-md-12 col-xs-12 col-sm-12" id="div-periodos-cadastrados"></div>
</div>
<!--*************************************************************************-->

<!-- Modal onde será inserido um novo período de locação -->
<div class="modal fade" id="cad_periodo_locacao" data-backdrop="static" data-keyboard="false">
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
                                        <input class="form-control" name="periodo_locacao" maxlength="5" required data-mask="99/99" id="periodo_locacao">
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
                            Gerar Semana
                        </button>
                        <a class="btn btn-default" onclick="limpar_campos($('#salvar_periodo_emprestimo'))" data-dismiss="modal">
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
    // Funções do SmartAdmin
    runAllForms();

    // Realiza a busca dos períodos cadastrados
    buscar_periodos();
    
    // carrega o plugin para busca de combobox
    loadScript('./js/plugins_sgl/jquery.combo.js', function() {
        buscar_ano();
    });

    // Realiza a busca dos anos
    function buscar_ano() {
        // Recebe o ano e o mês atual
        mes_atual  = '<?php echo nome_mes()?>';
        ano_atual  = '<?php echo date('Y')?>';
        
        $('#mes_busca').combo('combo/meses', {selecionar: mes_atual});
        $('#ano_busca').combo('combo/anos', {selecionar: ano_atual});
    }
    
    // Insere o foco no primeiro campo da janela modal
    $('#cad_periodo_locacao').on('shown.bs.modal', function() {
        $('#periodo_locacao').focus();
    });
    
    // Previne a ação padrão do formulário
    $('#salvar_periodo_emprestimo').submit(function (e) {
        e.preventDefault();
    });
    
    // Valida os dados do formulário de criação de semana de locação
    $('#salvar_periodo_emprestimo').validate({
        rules: {
            periodo_locacao: {required: true},
            diretor_semana: {required: true, minlength: 5}
        },
        messages: {
            periodo_locacao: {required: 'Insira um período de locação'},
            diretor_semana: {required: 'Insira o nome do diretor', minlength: 'Digite 5 caracteres'}
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element.parent());
        },
        submitHandler: function () {
            salvar_periodo();
        }
    });

    // Envia o formulário via ajax
    
	// Salva um novo período de locação no banco de dados
    function salvar_periodo() {

        periodo = $('#salvar_periodo_emprestimo').serialize();

        $.ajax({
            url: 'locacao_barracas/salvar_periodo',
            type: 'POST',
            data: periodo,
            dataType: 'json',
            success: function (e) {
                if (e == true) {
                    msg_sucesso('Período de locação cadastrado com sucesso');
                    limpar_campos($('#salvar_periodo_emprestimo'));
                    $('#cad_periodo_locacao').modal('hide');
                } else {
                    msg_erro('Não foi possível salvar o período');
                    return false;
                }
            }
        });
    }

    // Realiza a busca por períodos 
    function buscar_periodos() {
        mes = $('#mes_busca').val();
        ano = $('#ano_busca').val();

        url = (mes || ano) ? 'locacao_barracas/buscar_periodos_cadastrados/'+mes+'/'+ano : 'locacao_barracas/buscar_periodos_cadastrados';  
        
        $.get(url).done(function(e) {
            $('#div-periodos-cadastrados').html(e);
        });

        $('#buscar').button('reset');
    }

    // Realiza o recolhimento dos dados do formulário de busca e chama a função
    // de busca
    $('#data-pesquisa').submit(function(e) {
        $('#buscar').button('loading');
        
        e.preventDefault();
        
        buscar_periodos();
    });
</script>