<?php
include_once("conexao.php");
    
        $tabela = pg_escape_string($oConexao, $_GET['tabela']);
        $codigo = pg_escape_string($oConexao, $_GET['codigo']);
        if($tabela == 'tb.cidade'){
            $pge = "DELETE FROM MERCADO.tbcidade WHERE cidcodigo = '$codigo'";
            
            if(pg_query($oConexao, $pge)){
                echo "Deletado com sucesso!";
                header('Location: ../index.php');
            }else{
            echo "Não foi possível excluir! Tente novamente.";
                header('Location: ../index.php');
            }
        }else if($tabela == 'tb.cliente'){
            $pge = "DELETE FROM MERCADO.tbcliente WHERE clicodigo = '$codigo'";
            
            if(pg_query($oConexao, $pge)){
                echo "Deletado com sucesso!";
                header('Location: ../indexcliente.php');
            }else{
            echo "Não foi possível excluir! Tente novamente.";
                header('Location: ../indexcliente.php');
            }
        }else if($tabela == 'tb.categoria'){
            $pge = "DELETE FROM MERCADO.tbcategoria WHERE catcodigo = '$codigo'";
            
            if(pg_query($oConexao, $pge)){
                echo "Deletado com sucesso!";
                header('Location: ../indexcategoria.php');
            }else{
            echo "Não foi possível excluir! Tente novamente.";
                header('Location: ../indexcategoria.php');
            }
        }else if($tabela == 'tb.funcionario'){
            $pge = "DELETE FROM MERCADO.tbfuncionario WHERE fcncodigo = '$codigo'";
            
            if(pg_query($oConexao, $pge)){
                echo "Deletado com sucesso!";
                header('Location: ../indexfuncionario.php');
            }else{
            echo "Não foi possível excluir! Tente novamente.";
                header('Location: ../indexfuncionario.php');
            }
        }else if($tabela == 'tb.produto'){
            $pge = "DELETE FROM MERCADO.tbproduto WHERE procodigo = '$codigo'";
            
            if(pg_query($oConexao, $pge)){
                echo "Deletado com sucesso!";
                header('Location: ../indexproduto.php');
            }else{
            echo "Não foi possível excluir! Tente novamente.";
                header('Location: ../indexproduto.php');
            }
        }else if($tabela == 'tb.departamento'){
            $pge = "DELETE FROM MERCADO.tbdepartamento WHERE dptcodigo = '$codigo'";
            
            if(pg_query($oConexao, $pge)){
                echo "Deletado com sucesso!";
                header('Location: ../indexdepartamento.php');
            }else{
            echo "Não foi possível excluir! Tente novamente.";
                header('Location: ../indexdepartamento.php');
            }
        }else if($tabela == 'tb.fornecedor'){
            $pge = "DELETE FROM MERCADO.tbfornecedor WHERE forcodigo = '$codigo'";
            
            if(pg_query($oConexao, $pge)){
                echo "Deletado com sucesso!";
                header('Location: ../indexfornecedor.php');
            }else{
            echo "Não foi possível excluir! Tente novamente.";
                header('Location: ../indexfornecedor.php');
            }
        }

        /*try{pg_query($oConexao, $pge);}
        catch(Exception $erro){
            echo $erro->getMessage();
        }
        pg_close($oConexao)*/

?>