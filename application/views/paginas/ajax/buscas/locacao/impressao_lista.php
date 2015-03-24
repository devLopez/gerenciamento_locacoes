<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>Impressão de Locação de espaço</title>
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/font-awesome.min.css">
        
        <!-- FAVICONS -->
        <link rel="shortcut icon" href="<?php echo base_url()?>img/favicon/icon.png" type="image/png">
        <link rel="icon" href="<?php echo base_url()?>img/favicon/icon.png" type="image/png">
        <style>td {padding-right: 20px;}</style>
    </head>
    <body>
        <table width="100%" style="vertical-align: bottom;">
		    <tr>
			    <td><img src="<?php echo base_url()?>img/reservado/logo_relatorios.png"></td>
	        </tr>
		</table>
        
        <br>
        <div class="main">
            <!-- Dados do Evento -->
            <section class="evento">
                <h4>Detalhes do Evento</h4>
                <?php if (!$evento) :?>
                    <div class="alert alert-block alert-danger">
                        <h4><b>:(</b></h4>
                        <p>Não foi possível resgatar os dados</p>
                    </div>
                <?php  else : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Instituição</th>
                                <th>Responsável</th>
                                <th>Data</th>
                                <th>Espaço Necessário</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($evento as $row) :?>
                                <tr>
                                    <td><?php echo $row->instituicao?></td>
                                    <td><?php echo $row->responsavel?></td>
                                    <td><?php echo date('d/m/Y', strtotime($row->data))?></td>
                                    <td><?php echo $row->espaco_necessario?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif;?>
            </section>
                
            <br><br>
                
            <section class="evento">
                <h4>Convidados</h4>
                <?php if (!$convidados) : ?>
                    <div class="alert alert-block alert-danger">
                        <h4><b>:(</b></h4>
                        <p>Não foi possível resgatar os dados</p>
                    </div>
                <?php else :?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome do Convidado</th>
                                <th>CPF</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($convidados as $row) : ?>
                                <tr>
                                    <td><?php echo $row->nome_convidado?></td>
                                    <td><?php echo $row->cpf?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </section>
        </div>
    </body>
</html>