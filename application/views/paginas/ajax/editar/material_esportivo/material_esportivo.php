<?php
    if (!$emprestimo)
    {
        ?>
        <div class="alert alert-block alert-danger">
            <h4><i class="fa fa-times"></i></h4>
            <p>
                Ocorreu um erro na busca dos dados
            </p>
        </div>
        <?php
    }
    else
    {
        foreach ($emprestimo as $row)
        {
            $id                     = $row->id;
            $nome_tomador           = $row->nome_tomador;
            $localizacao_tomador    = $row->localizacao_tomador;
            $id_item_esportivo      = $row->id_item_esportivo;
        }
    }
?>
<input type="hidden" name="id" value="<?php echo $id;?>">
<div class="row">
    <section class="col col-6">
        <div class="form-group">
            <label class="label">
                <strong>Nome do Tomador</strong>
            </label>
            <label class="input">
                <input class="form-control" name="e_nome_tomador" maxlength="100" required value="<?php echo $nome_tomador; ?>">
            </label>
        </div>
    </section>
    <section class="col col-6">
        <div class="form-group">
            <label class="label">
                <strong>Localização do Tomador</strong>
            </label>
            <label class="input">
                <input class="form-control" name="e_localizacao_tomador" maxlength="70" required value="<?php echo $localizacao_tomador; ?>">
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
                <select class="form-control" name="e_id_item_esportivo" id="id_item_esportivo" required></select>
            </label>
        </div>
    </section>
</div>
<script type="text/javascript">
    /**
     * Função desenvolvida para buscar o combo e marcar a seleção que o usuário
     * fez previamente
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     */
    $.get('<?php echo app_baseurl().'materiais_esportivos/combo_materiais_esportivos'?>', function(e){
        $('#id_item_esportivo').html(e);
    }).done(function() {
        $('#id_item_esportivo').find('option').each(function() {
            if($(this).val() == '<?php echo $id_item_esportivo;?>')
            {
                $(this).prop('selected', true);
            }
        });
    });
</script>