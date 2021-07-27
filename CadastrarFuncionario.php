<!DOCTYPE html>
<html>
<style>
    body {
        background-image: url(background-cinza.png);
    }
</style>

<head>
    <meta charset="utf-8">
    <title>PHP E Banco de Dados</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<div>
    <nav class="navbar navbar-expand-lg -dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" mx-auto href="index.php">Trabalho Banco de Dados e PHP</a>
            <a class="navbar-brand" mx-auto>Cadastro de Funcionário</a>
        </div>
</div>

<body>
    <br><br><form name="entrada" method="post" action="programaCadastrarFuncionario.php">

        Nome: <input type="text" Placeholder="* campo obrigatório" name="nome">
        &nbsp;&nbsp;&nbsp;&nbsp;

        E-mail: <input type="text" Placeholder="* campo obrigatório" name="email">

        &nbsp;&nbsp;&nbsp;&nbsp;
        Cargo: <input type="text" Placeholder="* campo obrigatório" name="cargo">

        <br>
        <br>
        <button class="btn btn-outline-success me-2" type="submit" name="botao" value="Inserir">Prosseguir</button>

    </form>


</body>

</html>