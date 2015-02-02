<?php
    if(!$barraca)
    {
        ?>
        <div class="alert alert-danger alert-block">
            <h4>:(</h4>
            <p>
                Não foi possível resgatar os dados da barraca
            </p>
        </div>
        <?php
    }
    else
    {
        foreach ($barraca as $row)
        {
            ?>
            <div class="row">
                <section class="col col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <label class="label">
                        <strong>Nome da Barraca</strong>
                    </label>
                    <label class="input">
                        <input class="form-control" name="ed_nome_barraca" maxlength="200" required value="<?php echo $row->nome_barraca?>">
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
                        <select class="form-control" name="ed_id_valor" id="ed_id_valor" required data-id_valor="<?php echo $row->id_valores?>"></select>
                        <i></i>
                    </div>
                    <p class="note">
                        <strong>Nota:</strong>
                        Se você não encontrar o valor desejado, você pode cadastrar um valor,
                        clicando no ícone da nota acima
                    </p>
                </section>
            </div>
            <?php
        }
    }
?>

<script>
    buscar_combo('editar');
</script>