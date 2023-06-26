<?php
include("conexao.php");
    if(isset($_POST['btn-cadastrarfornecedor'])){
        $nome =  pg_escape_string($oConexao, $_POST['nome']);
        $cnpj =  pg_escape_string($oConexao, $_POST['cnpj']);
        $cidade =  pg_escape_string($oConexao, $_POST['cidade']);
        /*$departamento = $_POST['departamento'];

        $pge = "INSERT INTO MERCADO.TBDEPARTAMENTO(DPTCODIGO, DPTDESCRICAO )
                VALUES (DEFAULT, '$departamento')";*/
        $pge = "INSERT INTO MERCADO.TBFORNECEDOR(FORNOME, FORCNPJ, CIDCODIGO)
                VALUES ('$nome', '$cnpj', '$cidade');";        
        try {
            pg_query($oConexao, $pge);
            echo "Cadastrado com sucesso!";
            header('Location: ../indexfornecedor.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
            header('Location: ../indexfornecedor.php');
        }
        pg_close($oConexao);
    }


?>