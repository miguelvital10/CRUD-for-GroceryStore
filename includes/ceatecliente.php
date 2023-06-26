<?php
include("conexao.php");
    if(isset($_POST['btn-cadastrarcliente'])){
        $nome =  pg_escape_string($oConexao, $_POST['nome']);
        $cpf =  pg_escape_string($oConexao, $_POST['cpf']);
        $cidade =  pg_escape_string($oConexao, $_POST['cidade']);
        /*$departamento = $_POST['departamento'];

        $pge = "INSERT INTO MERCADO.TBDEPARTAMENTO(DPTCODIGO, DPTDESCRICAO )
                VALUES (DEFAULT, '$departamento')";*/
        $pge = "INSERT INTO MERCADO.TBCLIENTE(CLINOME, CLICPF, CIDCODIGO)
                VALUES ('$nome', '$cpf', '$cidade');";        
        try {
            pg_query($oConexao, $pge);
            echo "Cadastrado com sucesso!";
            header('Location: ../indexcliente.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
            header('Location: ../indexcliente.php');
        }
        pg_close($oConexao);
    }


?>