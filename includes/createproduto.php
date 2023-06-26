<?php
include("conexao.php");
    if(isset($_POST['btn-cadastrarproduto'])){
        $nome =  pg_escape_string($oConexao, $_POST['nome']);
        $descricao =  pg_escape_string($oConexao, $_POST['descricao']);
        $valor =  pg_escape_string($oConexao, $_POST['valor']);
        $estoque =  pg_escape_string($oConexao, $_POST['estoque']);

        $catcodigo =  pg_escape_string($oConexao, $_POST['categoria']);
        $forcodigo =  pg_escape_string($oConexao, $_POST['fornecedor']);
        /*$departamento = $_POST['departamento'];

        $pge = "INSERT INTO MERCADO.TBDEPARTAMENTO(DPTCODIGO, DPTDESCRICAO )
                VALUES (DEFAULT, '$departamento')";*/
        $pge = "INSERT INTO MERCADO.TBPRODUTO   (PRONOME, PRODESCRICAO, PROVALOR, PROESTOQUE, CATCODIGO, FORCODIGO)
                VALUES ('$nome', '$descricao', '$valor', '$estoque', '$catcodigo', '$forcodigo');";        
        try {
            pg_query($oConexao, $pge);
            echo "Cadastrado com sucesso!";
            header('Location: ../indexproduto.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
            header('Location: ../indexproduto.php');
        }
        pg_close($oConexao);
    }


?>