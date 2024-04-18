<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krugy's Planner</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito" rel="stylesheet">
    <link rel="icon" href="../../Public/images/planner.png" type="image/png" sizes="16x16">
    <link rel="icon" href="../../Public/images/planner.png" type="image/png" sizes="32x32">
    <link rel="stylesheet" href="../../Public/estilos.css">
</head>

<div class="container">
    <div class="areaTitulo">
        <a href="./PaginaListarCompromisso.php">
            <div class="sair"></div>
        </a>
        <h3 class="tituloContainer">Área de edição.</h3>
    </div>
    <form id="formComp" action="../../App/controller/ProcessarCompromisso.php" method="post">
        <div class="areaTabela">
            <table class='table table-hover table-striped table-bordered'>
                <tr>
                    <th>#</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Descrição</th>
                    <th>Usuário</th>
                    <th>Ação</th>
                </tr>
                <?php
                include("../controller/CompromissoController.php");
                $res = CompromissoController::resgataPorID($_REQUEST["idCompromisso"]);
                if ($res) {
                    $row = $res;
                ?>
                    <tr>
                        <td><?= $res->idCompromisso ?></td>
                        <td><input type="text" name="dataComp" value="<?= $row->dataComp ?>"></td>
                        <td><input type="text" name="hora" value="<?= $row->hora ?>"></td>
                        <td><input type="text" name="descricao" value="<?= $row->descricao ?>"></td>
                        <td><?= $_SESSION['usuario_id'] ?></td>
                        <td>
                            <input type="hidden" name="idCompromisso" value="<?= $row->idCompromisso ?>">
                            <input type="hidden" name="oc" value="alterarCompromisso">
                            <input type="submit" value="EDITAR">
                        </td>
                    </tr>
                <?php
                } else {
                    echo "<tr><td colspan='6'>Nenhum compromisso encontrado.</td></tr>";
                }
                ?>
            </table>
        </div>
    </form>
</div>
<script src="../../Public/js/scripts.js"></script>
</body>

</html>