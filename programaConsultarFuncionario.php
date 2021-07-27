    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <div class="container-fluid">
            <div>
                <nav class="navbar navbar-expand-lg -dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" mx-auto href="index.php"> Trabalho Banco de Dados e PHP</a>
                        <a class="navbar-brand" mx-auto>Consulta de Funcionários</a>
                    </div>
            </div>
            <br><br>
            <script type="text/javascript" src="../js/verificacao.js"></script>
            <?php

            function conectar($banco)
            {
                return new PDO("mysql:host=localhost;dbname=$banco", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            }

            function formulario()
            {
                echo "<form action='programaConsultarFuncionario.php' method='post'>";
                echo "<select name='comboNome' id='cn' onClick='limparCargo(); return false;'> <option value='0'> Consultar por nome</option>";
                $con = conectar("agenda");
                $select = $con->prepare("SELECT  nome FROM funcionario");
                $select->execute();
                $cadastro = $select->fetchAll();

                foreach ($cadastro as $elemento) {
                    echo '<option value="' . $elemento["nome"] . '">' . $elemento["nome"] . '</option>';
                }

                echo '</select>';

                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo '<script>
    function limparCargo(){        
        document.getElementById("cc").getElementsByTagName("option")[0].selected = "selected";
    }
    function limparNome(){        
        document.getElementById("cn").getElementsByTagName("option")[0].selected = "selected";
    }
    </script>';
                echo "<select name='comboCargo' id='cc' onClick='limparNome(); return false;'> <option value='0'> Consultar por cargo</option>";
                $con = conectar("agenda");
                $select = $con->prepare("SELECT  cargo FROM funcionario");
                $select->execute();
                $cadastro = $select->fetchAll();

                foreach ($cadastro as $elemento) {

                    echo '<option value="' . $elemento["cargo"] . '">' . $elemento["cargo"] . '</option>';
                }

                echo '</select>';

                echo '<br>';
                echo "<br>";
                echo '<button class="btn btn-outline-success me-2" type="submit" name="botao" value="Consultar">Consultar</button>
       </form>';
            }

            function ConsultarNome($nome)
            {
                $con = conectar("agenda");
                $select = $con->prepare("SELECT * FROM funcionario where nome = :nome");
                $select->bindvalue(":nome", $nome);
                $select->execute();
                $elemento = $select->fetch();

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
                echo '<br><br>';
                echo "<table border=1px align='center'>
        
    <tr>
    <td><b>Id</td>
    <td><b>Nome</td>
    <td><b>Email</td>
    <td><b>Cargo</td>
    </tr>
    ";

                echo "<tr>";
                echo "<td><b>id</b>: " . $elemento["id"] . "</td>";
                echo "<td><b>Nome</b>: " . $elemento["nome"] . "</td>";
                echo "<td><b>E-mail</b>: " . $elemento["email"] . "</td>";
                echo "<td><b>Cargo</b>: " . $elemento["cargo"] . "</td>";
                echo "</tr>";


                echo '<a href="index.php"<button class="btn btn-outline-success me-2" type="submit" href="programa.php">Voltar</button></a>';
            }


            function ConsultarCargo($cargo)
            {
                $con = conectar("agenda");
                $select = $con->prepare("SELECT * FROM funcionario where cargo = :cargo");
                $select->bindvalue(":cargo", $cargo);
                $select->execute();
                $elemento = $select->fetchAll();



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
                foreach ($elemento as $linha) {
                    echo "<tr>";
                    echo "<td>" . $linha["id"] . "</td>";
                    echo "<td>" . $linha["nome"] . "</td>";
                    echo "<td>" . $linha["email"] . "</td>";
                    echo "<td>" . $linha["cargo"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            if (isset($_POST["botao"])) {
                $nome = $_POST["comboNome"];
                $cargo = $_POST["comboCargo"];



                if (($nome != '0') && isset($_POST["comboNome"])) {
                    echo '<script>
              alert("Campo Nome Selecionado!");
              </script>';
                    ConsultarNome($nome);
                } elseif (($cargo != '0') && isset($_POST["comboCargo"])) {
                    ConsultarCargo($cargo);
                    echo '<script>
              alert("Campo Cargo Selecionado!");
              </script>';
                }

                if (($cargo == '0') && ($nome == '0')) {
                    echo '
        <script>
        alert("Selecione o tipo da Consulta!");
        window.location.href="ConsultarFuncionario.php";
        </script>
        ';
                }
            }
