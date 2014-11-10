<!-- Header da página -->
<div class="row">
    <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa-fw fa fa-code-fork"></i> Locações Externas
        </h1>
    </div>
    <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <a data-toggle="modal" href="#cad_aluguel" class="btn btn-primary pull-right">
            <i class="fa fa-plus"></i> Adicionar locação de espaço
        </a>
    </div>
</div>
<!-- Fim do Header da página -->

<!-- Div onde as solicitações cadastradas aparecerão -->
<div class="row">
    <div id="locacoes_cadastradas" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
</div>
<!-- ./ div -->

<!-- Modal para cadastro de uma nova locação de espaço -->
<div class="modal fade" id="cad_aluguel" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <img src="./img/reservado/logo.png" width="150" alt="Clube Campestre Pentáurea">
                </h4>
            </div>
            <div class="modal-body no-padding">
                <form id="salvar_aviso" class="smart-form">
                    <fieldset>
                        <div class="row">
                            <section class="col col-6">
                                <div class="form-group">
                                    <label class="label">
                                        <strong>Instituição</strong>
                                    </label>
                                    <label class="input">
                                        <input class="form-control" name="instituicao" id="instituicao" type="text" maxlength="150" required>
                                    </label>
                                </div>
                            </section>
                            <section class="col col-6">
                                <div class="form-group">
                                    <label class="label">
                                        <strong>Nome do Responsável</strong>
                                    </label>
                                    <label class="input">
                                        <input class="form-control" name="responsavel" id="responsavel" type="text" maxlength="150" required>
                                    </label>
                                </div>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-6">
                                <div class="form-group">
                                    <label class="label">
                                        <strong>Telefone</strong>
                                    </label>
                                    <label class="input">
                                        <input class="form-control" name="telefone" id="telefone" type="text" maxlength="150" required>
                                    </label>
                                </div>
                            </section>
                            <section class="col col-6">
                                <div class="form-group">
                                    <label class="label">
                                        <strong>Email</strong>
                                    </label>
                                    <label class="input">
                                        <input class="form-control" name="email" id="email" type="email" maxlength="150" required>
                                    </label>
                                </div>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-6">
                                <div class="form-group">
                                    <label class="label">
                                        <strong>Data da Visita</strong>
                                    </label>
                                    <div class="input-group">
                                        <label class="input">
                                            <input class="form-control" name="data" id="data" type="text" placeholder="Data da visita" required>
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
                                <label class="label"><strong>Aviso:</strong></label>
                                <label class="textarea"> 
                                    <textarea name="espaco_necessario" id="espaco_necessario" maxlength="150"></textarea>
                                </label>
                            </section>
                        </div>

                    </fieldset>
                    
                    <footer>
                        <button type="submit" class="btn btn-primary">
                            Adicionar aviso
                        </button>
                        <button id="atualizar_depois" type="button" class="btn btn-default" data-dismiss="modal">
                            Cancelar
                        </button>
                    </footer>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fim do Modal -->

<script type="text/javascript">
    // Carrega o Script responsável pela calendário em português
    loadScript('./js/libs/jquery.ui.datepicker-pt-BR.js');
    
    // Atribuição do valor da variável que será utilizada na Paginação
    offset = 0;

    // Chama a função que realiza a busca das locações cadastradas
    //buscar();

    // Inicializa o calendário
    $('#data').datepicker({
        dateFormat: 'yy-mm-dd',
        prevText: '<i class="fa fa-chevron-left"></i>',
        nextText: '<i class="fa fa-chevron-right"></i>',
        minDate: 0
    });
</script>