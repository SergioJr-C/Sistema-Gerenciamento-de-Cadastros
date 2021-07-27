    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<style>
		body {
			background-image: url(background-cinza.png);
            
		}
	</style>
<link rel="stylesheet" type="text/css" href="css/style.css">
<?php

function conectar($banco){
    return new PDO("mysql:host=localhost; 
                dbname=$banco;", "root", "");
}

function inserir($nome, $email, $cargo){
    $con = conectar("agenda");
    $inserir = $con->prepare("insert into 
        Funcionario (nome, email, cargo) values
        (:nome, :email, :cargo)");    
    $inserir->bindValue(":nome", $nome);
    $inserir->bindValue(":email", $email);
    $inserir->bindValue(":cargo", $cargo);
    $inserir->execute();
}



function listarFuncionariosNoCombo(){
    echo '<form name="e" action="Alterar_Dados.php" method="post">
          <select name="combo">          
              <option value="0"> Primeira Opção </option>';    
    $con = conectar("agenda");
    $select = $con->prepare("select nome from Funcionario");
    $select->execute();
    $nomes = $select->fetchAll();
    foreach($nomes as $elemento){
        echo '<option value="'.$elemento["nome"].'">
                '.$elemento["nome"].'</option>';
    }
    echo '</select><br><br>
          <input type="submit" value="Consultar" class="btn btn-outline-success me-2">
        </form>';    
}

function consultarFormulario($nome){
    $con = conectar("agenda");
    $select = $con->prepare("select * from Funcionario where nome = :nome");
    $select->bindValue(":nome", $nome);
    $select->execute();
    $dados = $select->fetch();
    ?>
    <h1>Alterar Cadastro de Funcionário</h1>
    <form name="e" action="Alterar_Dados.php" method="post">
    ID: 
    <input type="text" name="id" value="<?php echo $dados["id"]?>" readonly="readonly"> 
    <br> Nome: 
    <input type="text" name="nome" value="<?php echo $dados["nome"]?>"> 
    <br> E-mail: 
    <input type="text" name="email" value="<?php echo $dados["email"]?>"> 
    <br> Cargo:
    <input type="text" name="cargo" value="<?php echo $dados["cargo"]?>"> 
    <br> <br>   
    

    <input type="submit" value="Alterar" name="alterar" class="btn btn-outline-success me-2"> 
    <input type="submit" value="Excluir" name="excluir"class="btn btn-outline-success me-2"> 
    </div">  
    </form>   
    <?php     
}

function excluir($id){
    $con = conectar("agenda");
    $delete = $con->prepare("DELETE from Funcionario where id = :id");
    $delete->bindValue(":id", $id);
    if($delete->execute()){
        echo "<h1>Registro Excluído com Sucesso!</h1>";
    }
}

function alterar($id, $nome, $email, $cargo){
    $con = conectar("agenda");
    $update = $con->prepare("UPDATE Funcionario SET nome = :nome,
 email = :email, cargo = :cargo WHERE id = :id");
    $update->bindValue(":id", $id);
    $update->bindValue(":nome", $nome);
    $update->bindValue(":email", $email);
    $update->bindValue(":cargo", $cargo);    
    if($update->execute()){
        echo "<h1>Registro Alterado com Sucesso!</h1>";
    }
}



function consultar($nome){
    $con = conectar("agenda");
    $select = $con->prepare("select * from Funcionario where nome = :nome");
    $select->bindValue(":nome", $nome);
    $select->execute();
    $dados = $select->fetch();
    echo "ID: " . $dados["id"] . "<br>";
    echo "Nome: " . $dados["nome"] . "<br>";
    echo "E-mail: " . $dados["email"] . "<br>";
    echo "Cargo: " . $dados["cargo"] . "<br>";
}

function listarTodos(){
    $con = conectar("agenda");
    $select = $con->prepare("select * from 
            funcionario");
    $select->execute();
    $funcionarios = $select->fetchAll();
    foreach ($funcionarios as $linha){
    echo "ID: " . $linha["id"] . "<br>";
    echo "Nome: " . $linha["nome"] . "<br>";
    echo "E-mail: " . $linha["email"] . "<br>";
    echo "Cargo: " . $linha["cargo"] . "<br><br>";    
    }    
}


if(isset($_POST["combo"])){
    echo '<div class="container-fluid">
    <div>
        <nav class="navbar navbar-expand-lg -dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" mx-auto href="index.php">Trabalho Banco de Dados e PHP</a>
                <a class="navbar-brand" mx-auto>Alterando e Deletando no Banco de Dados com PHP</a>
            </div>
    </div>';
    $nome = $_POST["combo"];
    consultarFormulario($nome);
    echo'<a href="index.php"<button class="btn btn-outline-success me-2" type="submit" href="programa.php">Voltar</button></a>';
}else{
    if(isset($_POST["alterar"])){
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cargo = $_POST["cargo"];
        alterar($id, $nome, $email, $cargo);
        echo'<a href="index2.php"<button class="btn btn-outline-success me-2" type="submit" href="programa.php">Voltar</button></a>';

    }else{
        if(isset($_POST["excluir"])){
            $id = $_POST["id"];
            excluir($id);
            echo'<a href="index.php"<button class="btn btn-outline-success me-2" type="submit" href="programa.php">Voltar</button></a>';
        }
    }
}



