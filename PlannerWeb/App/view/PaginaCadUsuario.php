<!-- se usuario nao tiver cadastro, sera direcionado para cá -->
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
        <div class="telaLogin">
            <h3 class="boas-vindas">Welcome</h3>
            <form action="../../App/controller/ProcessarUsuario.php" method="post">
                <label for="username">Usuário: </label>
                <br>
                <input type="text" id="username" name="cadUsername" autocomplete="off" placeholder="Informe um nome de usuário"><br><br>
                <label for="password">Senha: </label>
                <br>
                <input type="password" id="password" name="cadPassword" autocomplete="off" placeholder="Senha de 5 a 10 caracteres">
                <br>
                <div class="areaBotoes">
                    <input type="hidden" name="op" value="criarUsuario">
                    <input type="submit" name="create" value="CREATE">
                </div>
            </form>

        </div>
</body>

</html>