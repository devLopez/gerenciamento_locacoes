<!-- Header da página -->
<div class="row">
    <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa-fw fa fa-dribbble"></i> Material Esportivo
        </h1>
    </div>
</div>
<!-- Fim do Header da página -->

<!-- Define o Row para inserção e pesquisa -->
<div class="row">
    <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <form class="form-inline" id="data-pesquisa" role="form">
            <div class="form-group">
                <div class="input-group">
                    <label for="exampleInputEmail2">Data Inicial</label>
                    <input type="text" class="form-control" id="data_inicial" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label for="exampleInputEmail2">Data Final</label>
                    <input type="text" class="form-control" id="data_final" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label>&nbsp;</label>
                    <button type="submit" class="btn btn-default form-control">
                        <i class="fa fa-search"></i> Buscar
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <a class="btn btn-primary pull-right" href="#cad_emprestimo" data-toggle="modal">
            <i class="fa fa-plus"></i> Registrar retirada
        </a>
    </div>
</div>
<!-- Fim da pesquisa -->

<br>
<!-- Div onde serão inseridas as locações das datas -->
<div class="row">
    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="emprestimos_materiais_feitos"></div>
</div>
<!-- fim da listagem -->

<!-- Modal onde serão inseridos os novos impréstimos -->
<div class="modal fade" id="cad_emprestimo" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <img src="./img/reservado/logo.png" width="150" alt="Clube Campestre Pentáurea">
                </h4>
            </div>
            <div class="modal-body no-padding">
                <form id="salvar_emprestimo" class="smart-form">
                    <fieldset>
                        <div class="row">
                            <section class="col col-6">
                                <div class="form-group">
                                    <label class="label">
                                        <strong>Nome do Tomador</strong>
                                    </label>
                                    <label class="input">
                                        <input class="form-control" name="nome_tomador" maxlength="100" required>
                                    </label>
                                </div>
                            </section>
                            <section class="col col-6">
                                <div class="form-group">
                                    <label class="label">
                                        <strong>Localização do Tomador</strong>
                                    </label>
                                    <label class="input">
                                        <input class="form-control" name="localizacao_tomador" maxlength="70" required>
                                    </label>
                                </div>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="label">
                                        <strong>Material</strong>
                                    </label>
                                    <label class="select">
                                        <select class="form-control" name="id_item_esportivo" id="id_item_esportivo" required></select>
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
<!--Fim da modal-->

<script type="text/javascript">
    // Variável que será utilizada na busca, principalmente na paginação
    var offset = 0;
    
    //Carrega o Script responsável pela calendário em português
    loadScript('./js/libs/jquery.ui.datepicker-pt-BR.js');

    // Insere a data de hoje nas caixas de textos
    setar_data();

    // Chama a busca dos dados
    buscar();
    
    // Chama a função que busca os materiais cadastrados
    buscar_materiais();

    // Insere o datepicker nas textboxes selecionadas 
    $('#data_inicial').datepicker({
        showAnim: 'slideDown',
        dateFormat: 'yy-mm-dd',
        prevText: '<i class="fa fa-chevron-left"></i>',
        nextText: '<i class="fa fa-chevron-right"></i>',
        changeMonth: true,
        changeYear: true,
        onClose: function(data) {
        	$('#data_final').datepicker( "option", "minDate", data );
        }
    });

    $('#data_final').datepicker({
        showAnim: 'slideDown',
        dateFormat: 'yy-mm-dd',
        prevText: '<i class="fa fa-chevron-left"></i>',
        nextText: '<i class="fa fa-chevron-right"></i>',
        changeMonth: true,
        changeYear: true
    });

    // Recebe o submit do formulário e chama a função de pesquisa
    $('#data-pesquisa').submit(function(e) {
        e.preventDefault();

        buscar();
    });

    /**
     * setar_data()
     * 
     * Função desenvolvida para adicionar a data atual nos campos de data
     * 
     * @author :    Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     */
    function setar_data()
    {
    	data   = new Date();
    	ano    = data.getFullYear();
    	mes    = data.getMonth() + 1;
    	dia    = data.getDate();
    	
    	$('#data_inicial, #data_final').val(ano+'-'+mes+'-'+dia);
    }

    /**
     * buscar()
     * 
     * Função desenvolvida para buscar o material esportivo
     * 
     * @author  :   Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     */
    function buscar()
    {
        data_inicial    = $('#data_inicial').val();
        data_final      = $('#data_final').val();

        url = '<?php echo app_baseurl().'materiais_esportivos/buscar/'?>'+ offset + '/' + data_inicial + '/' + data_final;

        get_data(url, $('#emprestimos_materiais_feitos'));
    }
    
    /**
     * buscar_materiais()
     * 
     * Função desenvolvida para buscar os materiais cadastrados
     * 
     * @author  :   Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     */
    function buscar_materiais() {
        $.get('<?php echo app_baseurl().'materiais_esportivos/combo_materiais_esportivos'?>', function(e) {
            if(e)
            {
                $('#id_item_esportivo').html(e);
            }
        });
    }
    
    /**
     * Salva um novo empréstimo
     * 
     * @author  :Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     */
    $('#salvar_emprestimo').submit(function(e) {
        e.preventDefault();
        
        dados = $(this).serialize();
        
        $.ajax({
            url: '<?php echo app_baseurl().'materiais_esportivos/salvar_emprestimo' ?>',
            type: 'POST',
            data: dados,
            dataType: 'html',
            success: function(e) {
                e == 0 ? 
                    msg_erro('Não foi possível salvar. Tente Novamente') : 
                        msg_sucesso('Salvo com sucesso'), 
                        setar_data(), 
                        buscar(), 
                        $('#cad_emprestimo').modal('hide'), 
                        limpar_campos($('#salvar_emprestimo'));
            }
        });
    });
</script>