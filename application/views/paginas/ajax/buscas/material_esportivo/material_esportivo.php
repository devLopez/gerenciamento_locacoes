<?php
    if(!$emprestimos)
    {
        ?>
        <div class="alert alert-block alert-warning">
            <h4><b>:(</b></h4>
            <p>
                Não foram encontrados registros
            </p>
        </div>
        <?php
    }
    else
    {
        ?>
        <table class="table table-bordered table-hover table-responsive table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Localização</th>
                    <th>Data Empréstimo</th>
                    <th>Material</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($emprestimos as $row)
                    {
                        ?>
                        <tr>
                            <td><?php echo $row->nome_tomador?></td>
                            <td><?php echo $row->localizacao_tomador?></td>
                            <td><?php echo date('d/m/Y h:m:s', strtotime($row->data_emprestimo))?></td>
                            <td><?php echo $row->item?></td>
                            <td align="center">
                                <a class="editar" href="#" rel="tooltip" title="Editar" data-acao="editar" data-id="<?php echo $row->id?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="excluir" href="#" rel="tooltip" title="Excluir" data-acao="excluir" data-id="<?php echo $row->id?>">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        <?php
    }