<?php
    include("conexao.php");
        if(isset($_POST['btn-cadastrardepartamento'])){
            $nome =  pg_escape_string($oConexao, $_POST['nome']);
            
            $pge = "INSERT INTO MERCADO.TBDEPARTAMENTO  (DPTDESCRICAO)
                    VALUES ('$nome');";        
            try {
                pg_query($oConexao, $pge);
                echo "Cadastrado com sucesso!";
                header('Location: ../indexdepartamento.php');
            } catch (Exception $erro) {
                echo $erro->getMessage();
                header('Location: ../indexdepartamento.php');
            }
            pg_close($oConexao);
        }
        /*$departamento = $_POST['departamento'];

            $pge = "INSERT INTO MERCADO.TBDEPARTAMENTO(DPTCODIGO, DPTDESCRICAO )
                    VALUES (DEFAULT, '$departamento')";*/
?>