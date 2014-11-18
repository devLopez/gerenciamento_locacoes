<?php
    if (!$convidados)
    {
        ?>
        <div class="alert alert-block alert-warning">
            <h4 class=""alert-heading><b>:(</b></h4>
            <p>
                Não foram encontrados convidados para este evento
            </p>
        </div>
        <?php
    }
    else
    {
        ?>
        <table class="table table-responsive table-hover table-condensed">
            <thead>
                <tr>
                    <th>Nome Completo</th>
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