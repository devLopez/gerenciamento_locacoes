<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>Impressão de Locação de espaço</title>
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">
        
        <!-- FAVICONS -->
        <link rel="shortcut icon" href="./img/favicon/icon.png" type="image/png">
        <link rel="icon" href="./img/favicon/icon.png" type="image/png">
        
        <style type="text/css">
            header {padding: 20px 0 20px 0;}
            header img {width: 159px; height: 41px;}
            header h1 {font-family: arial; font-size: 18px;}
            .titulo {text-align: center;}
            .evento {margin: 20px 0 20px 0;}
            .evento h4 {margin-left: 5px;}
            table {width: 100%; border-collapse: collapse; border: 1px solid #ccc;}
            footer {position: relative; bottom: 0; text-align: center}
        </style>
    </head>
    <body>
        <div class="main">
            <div class="container">
                <div class="row">
                    <header class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <img class="img-responsive" src="./img/reservado/logo.png">
                        </div>
                        <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h1 class="titulo">Gerenciamento de Locações</h1>
                        </div>
                    </header>
                </div>
                
                <!-- Dados do Evento -->
                <div class="row">
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <section class="evento">
                            <h4>Detalhes do Evento</h4>
                            <?php
                                if (!$evento)
                                {
                                    ?>
                                    <div class="alert alert-block alert-danger">
                                        <h4><b>:(</b></h4>
                                        <p>Não foi possível resgatar os dados</p>
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <table class="table table-striped table-bordered" border="1">
                                        <thead>
                                            <tr>
                                                <th>Instituição</th>
                                                <th>Responsável</th>
                                                <th>CPF/ CNPJ</th>
                                                <th>Telefone</th>
                                                <th>Data</th>
                                                <th>Espaço Necessário</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach ($evento as $row)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row->instituicao?></td>
                                                    <td><?php echo $row->responsavel?></td>
                                                    <td><?php echo $row->cpf_cnpj?></td>
                                                    <td><?php echo $row->telefone?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($row->data))?></td>
                                                    <td><?php echo $row->espaco_necessario?></td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }
                            ?>
                        </section>
                    </div>
                </div>
                <!-- Fim dos dados do evento -->
                
                <!-- Convidados -->
                <div class="row">
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <section class="evento">
                            <h4>Convidados</h4>
                            <?php
                                if (!$convidados)
                                {
                                    ?>
                                    <div class="alert alert-block alert-danger">
                                        <h4><b>:(</b></h4>
                                        <p>Não foi possível resgatar os dados</p>
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <table class="table table-striped table-bordered" border="1">
                                        <thead>
                                            <tr>
                                                <th>Nome do Convidado</th>
                                                <th>CPF</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach ($convidados as $row)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row->nome_convidado?></td>
                                                    <td><?php echo $row->cpf?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }
                            ?>
                        </section>
                    </div>
                </div>
                <!-- Fim dos dados dos convidados -->
            </div>
            <!-- Fim do container -->
            
            <!-- Footer -->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p class="text-center">
                                Relatório Gerado pelo SGL em <strong><?php echo date('d/m/Y h:m', time()); ?></strong>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Fim do footer -->
            
        </div>
    </body>
</html>