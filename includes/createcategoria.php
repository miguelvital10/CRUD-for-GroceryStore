<?php
    include("conexao.php");
        if(isset($_POST['btn-cadastrarcategoria'])){
            $nome =  pg_escape_string($oConexao, $_POST['nome']);
            
            $pge = "INSERT INTO MERCADO.TBCATEGORIA     (CATDESCRICAO)
                    VALUES ('$nome');";        
            try {
                pg_query($oConexao, $pge);
                echo "Cadastrado com sucesso!";
                header('Location: ../indexcategoria.php');
            } catch (Exception $erro) {
                echo $erro->getMessage();
                header('Location: ../indexcategoria.php');
            }
            pg_close($oConexao);
        }
        /*$departamento = $_POST['departamento'];

            $pge = "INSERT INTO MERCADO.TBDEPARTAMENTO(DPTCODIGO, DPTDESCRICAO )
                    VALUES (DEFAULT, '$departamento')";*/
?>