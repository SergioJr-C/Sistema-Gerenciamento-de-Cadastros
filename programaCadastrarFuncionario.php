 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<?php

function conectar($banco) {
    return new PDO("mysql:host=localhost;dbname=$banco","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}


function inserir($nome, $email, $cargo) {
    $con = conectar("agenda");
    $inserir = $con->prepare("insert into funcionario(nome, email, cargo)
        values(:nome,:email,:cargo)");
    
    $inserir->bindValue(":nome", $nome);
    $inserir->bindValue(":email", $email);
    $inserir->bindValue(":cargo", $cargo);
    $inserir->execute();
}
echo '<br>';
echo'<a href="index.php"<button class="btn btn-outline-success me-2" type="submit" href="programa.php">Voltar</button></a>';
echo '<br>';

function listarCadastro($nome, $email, $cargo) {
    $con = conectar("agenda");
    $select = $con->prepare("SELECT * from funcionario ORDER BY id DESC LIMIT 1");
    $select->execute();
    $dados = $select->fetch();
    
    echo '<br>';
    echo '<style>
    body{
    background-image: url(background-cinza.png);
text-align: center;
}
    table {
        
}
        
    table, td, th {
	text-align: center;
}';
    
    echo '</style>';
    
    echo "<table border=1px align='center'>
        
    <tr>
    <td><b>Id</td>
    <td><b>Nome</td>
    <td><b>Email</td>
    <td><b>Cargo</td>
    </tr>
    ";
    
    echo "<tr>";
    echo "<td><b>id</b>: ". $dados["id"] ."</td>";
    echo "<td><b>Nome</b>: ". $dados["nome"] ."</td>";
    echo "<td><b>E-mail</b>: ". $dados["email"] ."</td>";
    echo "<td><b>Cargo</b>: ". $dados["cargo"] ."</td>";
    echo "</tr>";   

    
}

if(isset($_POST["botao"])){
    if(!empty($_POST["nome"]) && !empty($_POST["email"])&&!empty($_POST["cargo"])){
        
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cargo = $_POST["cargo"];
        inserir($nome, $email, $cargo);
        listarCadastro($nome, $email, $cargo);
    }else{
        echo '<script>
              alert("Preencha todos os Campos!");
              window.location.href="CadastrarFuncionario.php";
              </script>';
    }
   
}


