<!-- Header da página -->
<div class="row">
    <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h1 class="page-title txt-color-white">
            <i class="fa-fw fa fa-home"></i> Cadastro de Barracas
        </h1>
    </div>
    <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <a href="#new_barraca" class="btn btn-default pull-right" data-toggle="modal">Nova Barraca</a>
    </div>
</div>
<!--*************************************************************************-->

<!-- Local onde as barracas cadastradas serão mostradas -->
<div class="row">
    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="show_barracas">
        
    </div>
</div>
<!--*************************************************************************-->

<!-- Modal onde a barraca será inserida -->
<div class="modal fade" id="new_barraca" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <img src="./img/reservado/logo.png" width="150" alt="Clube Campestre Pentáurea">
                </h4>
            </div>
            <div class="modal-body no-padding">
                <form id="cad_barraca" class="smart-form">
                    <fieldset>
                        <div class="row">
                            <section class="col col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label class="label">
                                    <strong>Nome da Barraca</strong>
                                </label>
                                <label class="input">
                                    <input class="form-control" name="nome_barraca" id="nome_barraca" maxlength="200" required>
                                </label>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label class="label">
                                    <strong>Valor da Barraca:</strong>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <a href="#new_valor" data-toggle="modal" data-backdrop="false" rel="tooltip" title="Adicionar Valor">
                                            <i class="fa fa-money"></i>
					</a>
                                    </span>
                                    <select class="form-control" name="id_valor" id="id_valor" required></select>
                                    <i></i>
                                </div>
                                <p class="note">
                                    <strong>Nota:</strong>
                                    Se você não encontrar o valor desejado, você pode cadastrar um valor,
                                    clicando no ícone da nota acima
            			</p>
                            </section>
                        </div>
                    </fieldset>
                    <footer>
                        <button class="btn btn-primary" type="submit">Salvar barraca</button>
                        <a class="btn btn-default" data-dismiss="modal" onclick="limpar_campos($('#cad_barraca'))">Fechar esta Janela</a>
                    </footer>
                </form>
            </div>
        </div>
    </div>
</div>
<!--*************************************************************************-->

<!-- Modal onde poderá ser salvo um novo valor para barracas -->
<div class="modal fade" id="new_valor" data-backdrop="true" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <img src="./img/reservado/logo.png" width="150" alt="Clube Campestre Pentáurea">
                </h4>
            </div>
            <div class="modal-body no-padding">
                <form class="smart-form" id="cad_valor">
                    <fieldset>
                        <div class="row">
                            <section class="col col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label class="label">
                                    <strong>Digite o novo valor</strong>
                                </label>
                                <label class="input">
                                    <input class="form-control" name="valor_diaria" id="valor_diaria" required>
                                </label>
                            </section>
                        </div>
                    </fieldset>
                    <footer>
                        <button class="btn btn-primary" type="submit">Salvar valor</button>
                        <a class="btn btn-default" data-dismiss="modal" onclick="limpar_campos($('#cad_valor'))">Fechar esta Janela</a>
                    </footer>
                </form>
            </div>
        </div>
    </div>
</div>
<!--*************************************************************************-->
<script type="text/javascript" src="./js/plugins_sgl/jquery.combo.js"></script>
<script>
    // Coloca o foco no primeiro campo ao abrir a janela modal
    $('#new_valor').on('shown.bs.modal', function() {
        $('#valor_diaria').focus();
    });
    $('#new_barraca').on('shown.bs.modal', function() {
        $('#nome_barraca').focus();
    });
    
    // Função que busca o Script de máscara monetária
    loadScript('js/plugin/maskMoney/jquery.maskMoney.min.js', mascarar_valor);
    
    // Chama a função que busca as barracas cadastradas
    buscar();
    
    // Função que busca os valores cadastrados
    buscar_combo();

    /**
     * Função para buscar as barracas cadastradas
     */
    function buscar() {
        url = 'opcoes/cadastros/barracas/buscar_barracas';
        
        loadURL(url, $('#show_barracas'));
    }
    
    /**
     * buscar_combo()
     * 
     * Função desenvolvida para buscar os valores cadastrados
     * 
     * @var {string} option Recebe opções para ações adicionais na busca dos valores
     */
    function buscar_combo(option) {
        url = 'combo/valores';
        
        if(option == undefined) {
            $('#id_valor').combo(url);
        } else if(option == 'editar') {
            $('#id_valor').combo(url, {selecionar: $(this).data('id_valor')});
        }
    }
    
    /**
     * Função desenvolvida para salvar a nova barraca
     */
    $('#cad_barraca').submit(function(e) {
        e.preventDefault();
        
        barraca = $(this).serialize();
        
        $.ajax({
            url: '<?php echo app_baseurl().'opcoes/cadastros/barracas/salvar_barraca'?>',
            type: 'POST',
            data: barraca,
            dataType: 'html',
            success: function (e) {
                if(e == 1) {
                    msg_sucesso('Barraca Cadastrada');
                    limpar_campos($('#cad_barraca'));
                    $('#new_barraca').modal('hide');
                    buscar();
                } else {
                    msg_erro('Não foi possível salvar a barraca');
                }
            }
        });
    });
    
    /**
     * Função desenvolvida para salvar um novo valor
     */
    $('#cad_valor').submit(function(e) {
        e.preventDefault();
        
        valor = $(this).serialize();
        
        $.ajax({
            url: 'opcoes/cadastros/valores/salvar',
            type: 'POST',
            data: valor,
            dataType: 'html',
            success: function (e) {
                if(e == 1) {
                    msg_sucesso('Novo valor cadastrado');
                    limpar_campos($('#cad_valor'));
                    $('#new_valor').modal('hide');
                    buscar_combo();
                } else {
                    msg_erro('Não foi possível salvar o valor');
                }
            }
        });
    });
    
    /**
     * mascarar_valor
     * 
     * Função desenvolvida para adicionar a mascara no campo de novo valor
     */
    function mascarar_valor() {
        $("#valor_diaria").maskMoney({
            showSymbol: true,
            allowZero: true,
            symbol: "R$",
            decimal: ".",
            precision: 2
	});
    }
</script>