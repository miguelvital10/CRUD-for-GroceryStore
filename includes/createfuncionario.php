<?php
include("conexao.php");
    if(isset($_POST['btn-cadastrarfuncionario'])){
        $nome =  pg_escape_string($oConexao, $_POST['nome']);
        $dptcodigo =  pg_escape_string($oConexao, $_POST['departamento']);
        /*$departamento = $_POST['departamento'];

        $pge = "INSERT INTO MERCADO.TBDEPARTAMENTO(DPTCODIGO, DPTDESCRICAO )
                VALUES (DEFAULT, '$departamento')";*/
        $pge = "INSERT INTO MERCADO.TBFUNCIONARIO   (FCNNOME, DPTCODIGO)
                VALUES ('$nome', '$dptcodigo');";        
        try {
            pg_query($oConexao, $pge);
            echo "Cadastrado com sucesso!";
            header('Location: ../indexfuncionario.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
            header('Location: ../indexfuncionario.php');
        }
        pg_close($oConexao);
    }


?>