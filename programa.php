<?php
if (isset($_POST["Prosseguir"]) && isset($_POST["radio"])) {
    $radio = $_POST["radio"];
    if($radio == "radio1"){
        include 'CadastrarFuncionario.php';
        echo"<br><br><form action='programa.php'>
     <input name='Voltar' type='submit' value='Voltar'/>
        </form>
        <br>
        <br>";
    }else if($radio == "radio2"){
        include 'ConsultarFuncionario.php';
        echo"<br><br><form action='programa.php' >
     <input name='Voltar' type='submit' value='Voltar' />
        </form>
        <br>
        <br>";
    }
}else{
    echo '<script>
              alert("Selecione uma opção!");
              window.location.href="index.php";
              </script>';
}

