<?php
    if (! $convidado) {
        ?>
        <div class="alert alert-block alert-warning">
        	<h4 class="alert-heading">
        		<b>:(</b>
        	</h4>
        	<p>Erro ao resgatar os dados</p>
        </div>
    <?php
    } else {
        foreach ($convidado as $row)
        {
            $id             = $row->id;
            $nome_convidado = $row->nome_convidado;
            $cpf            = $row->cpf;
        }
        ?>
        <div class="row">
        	<section class="col col-6">
        		<div class="form-group">
        			<label class="label"><strong>Nome</strong></label>
        			<label class="input">
        			    <input class="form-control" name="e_nome_convidado" type="text" maxlength="150" required value="<?php echo $nome_convidado?>">
        			</label>
        		</div>
        	</section>
        	<section class="col col-6">
        		<div class="form-group">
        			<label class="label"><strong>CPF</strong></label>
        			<label class="input">
        			    <input class="form-control" name="e_cpf" type="text" maxlength="150" required="" data-mask="999.999.999-99" value="<?php echo $cpf;?>">
        			</label>
        		</div>
        	</section>
        </div>
        <input type="hidden" name="id" value="<?php echo $id?>">
        <?php
    }
?>
<script type="text/javascript">
    runAllForms();
</script>