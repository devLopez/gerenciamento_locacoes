<!-- Header da página -->
<div class="row">
    <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h1 class="page-title txt-color-white">
            <i class="fa-fw fa fa-clipboard"></i> Detalhes da Locação
        </h1>
    </div>
    <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="btn-group pull-right">
            <a id="voltar" href="#locacao_externa" class="btn btn-default btn-small" title="Voltar" rel="tooltip">
                <i class="fa fa-reply"></i>
            </a>
            <a href="javascript:void(0)" class="btn btn-default btn-small" id="add" onclick="form_convidados();" title="Adicionar Convidados" rel="tooltip">
                <i class="fa fa-plus"></i>
            </a>
            <a href="#" target="_blank" class="btn btn-default btn-small" rel="tooltip" title="Imprimir Lista" data-placement="left" id="imprimir">
                <i class="fa fa-print"></i>
            </a>
        </div>
    </div>
</div>
<!-- Fim do Header da página -->

<?php if (!$locacao) { ?>
    <div class="alert alert-block alert-warning">
        <h4 class="alert-heading"><b>:(</b></h4>
        <p>
            Ocorreu um erro na busca dos dados. Volte e tente novamente
        </p>
    </div>
    <script>$('#add, #imprimir').prop('disabled', true).addClass('disabled');</script>
<?php
    } else {
        foreach ($locacao as $row) {
            $dados = array(
                'id' => $row->id,
                'instituicao'       => $row->instituicao,
                'responsavel'       => $row->responsavel,
                'cpf_cnpj'          => $row->cpf_cnpj,
                'telefone'          => $row->telefone,
                'email'             => $row->email,
                'data'              => $row->data,
                'espaco_necessario' => $row->espaco_necessario
            );
        }
    ?>
        <div class="row">
            <!-- Barra lateral onde será exibida os detalhes da locação-->
            <section class="col col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="jarviswidget">
                    <header>
                        <span class="widget-icon">
                            <i class="fa fa-clipboard"></i>
                        </span>
                        <h2>Detalhes da Locação</h2>
                    </header>
                    <div>
                        <div class="widget-body no-padding">
                            <table class="table table-responsive table-hover table-condensed table-bordered">
                                <tr>
                                    <th>Instituicao</th><td><?php echo $dados['instituicao'] ?></td>
                                </tr>
                                <tr>
                                    <th>Responsável</th><td><?php echo $dados['responsavel'] ?></td>
                                </tr>
                                <tr>
                                    <th>CPF/ CNPJ</th><td><?php echo $dados['cpf_cnpj'] ?></td>
                                </tr>
                                <tr>
                                    <th>Telefone</th><td><?php echo $dados['telefone'] ?></td>
                                </tr>
                                <tr>
                                    <th>E-mail</th><td><?php echo $dados['email'] ?></td>
                                </tr>
                                <tr>
                                    <th>Data do evento</th><td><?php echo date("d/m/Y", strtotime($dados['data'])) ?></td>
                                </tr>
                                <tr>
                                    <th>Espaço Necessário</th><td><?php echo $dados['espaco_necessario'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!--*********************************************************************-->

            <!-- Local onde irão aparecer os convidados -->
            <section class="col col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="jarviswidget">
                    <header>
                        <span class="widget-icon">
                            <i class="fa fa-users"></i>
                        </span>
                        <h2>Convidados</h2>
                    </header>
                    <div>
                        <div class="widget-body no-padding" id="convidados_cadastrados"></div>
                    </div>
                </div>
            </section>
            <!--*************************************************************-->
        </div>

        <!-- Modal que será inserido o formuláro de cadastro  -->
        <div class="modal fade" id="cad_convidado" data-backdrop="false" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <img src="./img/reservado/logo.png" width="150" alt="Clube Campestre Pentáurea">
                        </h4>
                    </div>
                    <div class="modal-body no-padding">
                        <form id="salvar_convidado" class="smart-form">
                            <fieldset id="form"></fieldset>
                            <input type="hidden" value="<?php echo $dados['id'] ?>" name="id_locacao_externa" >
                            <footer>
                                <button type="submit" class="btn btn-primary">
                                    Adicionar convidados
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
            // Adiciona a classe active ao link correspondente
            $('#link-locacao-externa').addClass('active');

            // Desenha o breadcrumb
            drawBreadCrumb(["Detalhes da locação"]);
            
            //Chama a função que realiza a busca dos dados
            buscar();

            /** Realiza a busca dos usuários cadastrados **/
            function buscar() {
                url = '<?php echo app_baseurl() . 'locacao_externa/buscar_convidados/' . $dados['id'] ?>';
                container = $('#convidados_cadastrados');

                loadURL(url, container);
            }

            /**
             * Função desenvolvida para montar o formulário para montar o 
             * formulário de inclusão de convidados
             */
            function form_convidados() {
                /**
                 * As variáveis qeu serão usadas são b(para o botão pressionado)
                 * e v(para o valor digitado no checkbox)
                 */
                $.SmartMessageBox({
                    title: 'Atenção',
                    content: 'Informe o número de convidados',
                    buttons: '[ok][Cancelar]',
                    input: 'text',
                    inputValue: ""
                }, function (b, v) {
                    if (b == 'Cancelar') {
                        return false;
                    } else {
                        // Verifica se algo foi digitado
                        if (v == 0 || v == undefined || v == "") {
                            form_convidados();
                        } else {
                            $('#form').empty();
                            var i = "";
                            for (i = 0; i < v; i++)
                            {
                                $('#form').append(
                                    '<div class="row">' +
                                    '<section class="col col-6">' +
                                    '<div class="form-group">' +
                                    '<label class="label">' +
                                    '<strong>Nome</strong>' +
                                    '</label>' +
                                    '<label class="input">' +
                                    '<input class="form-control" name="nome_convidado[]" type="text" maxlength="150" required>' +
                                    '</label>' +
                                    '</div>' +
                                    '</section>' +
                                    '<section class="col col-6">' +
                                    '<div class="form-group">' +
                                    '<label class="label">' +
                                    '<strong>CPF</strong>' +
                                    '</label>' +
                                    '<label class="input">' +
                                    '<input class="form-control" name="cpf[]" type="text" maxlength="150" required data-mask="999.999.999-99">' +
                                    '</label>' +
                                    '</div>' +
                                    '</section>' +
                                    '</div>'
                                    );
                            }

                            runAllForms();
                            $('#cad_convidado').modal('show');
                        }
                    }
                });
            }

            // Função desenvolvida para salvar os convidados via ajax
            $('#salvar_convidado').submit(function (e) {
                e.preventDefault();

                dados = $(this).serialize();

                $.ajax({
                    url: '<?php echo app_baseurl() . 'locacao_externa/salvar_convidados' ?>',
                    type: 'POST',
                    data: dados,
                    dataType: 'html',
                    success: function (e) {
                        if (e == 1) {
                            msg_sucesso('Convidados Cadastrados');
                            $('#cad_convidado').modal('hide');
                            $('#add, #imprimir').prop('disabled', false).removeClass('disabled');
                            buscar();
                        } else {
                            msg_erro('Não foi possível salvar. Tente novamente');
                            return false;
                        }
                    }
                });
            });

            //Adiciona o atributo de href no link de impressão da lista
            $('#imprimir').attr('href', '<?php echo app_baseurl() . 'locacao_externa/impressao_lista/' . $dados['id']; ?>');
        </script>
        <?php
    }
?>