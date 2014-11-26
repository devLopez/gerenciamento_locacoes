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
        <a class="btn btn-primary pull-right">
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

<script type="text/javascript">
    // Variável que será utilizada na busca, principalmente na paginação
    var offset = 0;
    
    //Carrega o Script responsável pela calendário em português
    loadScript('./js/libs/jquery.ui.datepicker-pt-BR.js');

    // Insere a data de hoje nas caixas de textos
	setar_data();

	// Chama a busca dos dados
	buscar();

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
        changeYear: true,
        onClose: function(data) {
        	$('#data_inicial').datepicker( "option", "maxDate", data );
        }
    });

    // Recebe o submit do formulário e chama a função de pesquisa
    $('#data-pesquisa').submit(function(e) {
        e.preventDefault();

        buscar();
    });

    // Função desenvolvida para adicionar a data atual nos campos de data
    function setar_data()
    {
    	data   = new Date();
    	ano    = data.getFullYear();
    	mes    = data.getMonth() + 1;
    	dia    = data.getDate();
    	
    	$('#data_inicial, #data_final').val(ano+'-'+mes+'-'+dia);
    }

    // Função desenvolvida para buscar o material esportivo
    function buscar()
    {
        data_inicial    = $('#data_inicial').val();
        data_final      = $('#data_final').val();

         url = '<?php echo app_baseurl().'materiais_esportivos/buscar/'?>'+ offset + '/' + data_inicial + '/' + data_final;

         get_data(url, $('#emprestimos_materiais_feitos'));
    }
</script>