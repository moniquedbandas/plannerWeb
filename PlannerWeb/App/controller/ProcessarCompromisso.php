<?php session_start(); ?>
<!-- starta a sessao para conseguir pegar o id do usuario que esta logado. COLOQUEI NO INICIO DO CODIGO PRA FUNCIONAR EM TODAS AS FUNÇÕES. -->
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
    <?php
    switch ($_REQUEST['oc']) {
        case "cadastrarCompromisso":
            cadastrar();
            break;
        case "listarTela":
            listarTela();
            break;
        case "telaAlterarCompromisso":
            telaAlterar();
            break;
        case "alterarCompromisso":
            alterar();
            break;
        case "deletarCompromisso":
            deletar();
            break;
        default:
            echo "Erro no processamento das requisições de compromisso..";
    }

    function cadastrar()
    {
        $compromissos = json_decode($_POST['compromissos'], true);
        foreach ($compromissos as $compromisso) {
            $dataComp = $compromisso['dataComp'];
            $hora = $compromisso['hora'];
            $descricao = $compromisso['descricao'];
            $idUsuario = $_SESSION['usuario_id'];
            include_once 'CompromissoController.php';
            $contr = new CompromissoController();
            $contr->cadastrarCompromisso($dataComp, $hora, $descricao, $idUsuario);
            echo "<script>location.href='../view/PaginaAtividades.php';</script>";
        }
    }

    function listarTela()
    {
        echo "<script>location.href='../view/PaginaListarCompromisso.php';</script>";
    }
    function telaAlterar()
    {
        echo "<script>location.href='../view/PaginaAlterarCompromisso.php';</script>";
    }
    function alterar()
    {
        if (isset($_REQUEST["idCompromisso"])) {
            $idCompromisso = $_REQUEST['idCompromisso'];
            $dataComp = $_POST['dataComp'];
            $hora = $_POST['hora'];
            $descricao = $_POST['descricao'];
            $idUsuario = $_SESSION['usuario_id'];
            include_once 'CompromissoController.php';
            $contr = new CompromissoController();
            $contr->alterarCompromisso($idCompromisso, $dataComp, $hora, $descricao, $idUsuario);
            echo 'Compromisso alterado com sucesso.';
        } else {
            echo 'Erro: ID do compromisso não fornecido.';
        }
    }

    function deletar()
    {
        if (isset($_GET['idCompromisso'])) {
            $idCompromisso = $_GET['idCompromisso'];
            include_once 'CompromissoController.php';
            $controller = new CompromissoController();
            $controller->excluirCompromisso($idCompromisso);
            echo "<script>location.href='../view/PaginaListarCompromisso.php';</script>";
        } else {
            echo 'Erro: ID do compromisso não fornecido.';
        }
    }
    ?>

</body>

</html>