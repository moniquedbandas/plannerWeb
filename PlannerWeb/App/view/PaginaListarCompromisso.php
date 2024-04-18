<!-- paginaAtividades direciona para cá quando clicar no botão LISTAR! -->
<?php session_start();
?>
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

<body>
    <div class="container">
        <div class="areaTitulo">
            <a href="./PaginaAtividades.php">
                <div class="sair"></div>
            </a>
            <h3 class="tituloContainer">Área de Listagem</h3>
        </div>
        <form id="formComp" action="../../App/controller/ProcessarCompromisso.php" method="post">
            <div class="areaTabela">
                <table class='table table-hover table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Descrição</th>
                            <th>Usuário</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("../controller/CompromissoController.php");
                        $res = CompromissoController::listarCompromisso();
                        if ($res && $res->rowCount() > 0) {
                            while ($row = $res->fetch(PDO::FETCH_OBJ)) {
                        ?>
                                <tr>
                                    <td><?= $row->idCompromisso ?></td>
                                    <td><?= $row->dataComp ?></td>
                                    <td><?= $row->hora ?></td>
                                    <td><?= $row->descricao ?></td>
                                    <td><?= $_SESSION['usuario_id'] ?></td>
                                    <td>
                                        <button class="btListar"><a href="../view/PaginaAlterarCompromisso.php?idCompromisso=<?= $row->idCompromisso ?>">Editar</a></button>
                                        <button class="btListar"><a href="../controller/ProcessarCompromisso.php?oc=deletarCompromisso&idCompromisso=<?= $row->idCompromisso ?>">Excluir</a></button>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6">Nenhum compromisso encontrado.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
    </div>
    <script src="../../Public/js/scripts.js"></script>
</body>

</html>