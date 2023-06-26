<?php
    $sHost = '127.0.0.1';
    $sPort = '5432';
    $sDbName = 'treinamento.conexao';
    $sUser = 'postgres';
    $sPassword = 'postgresql';
    
    $sConexao = 
    "host = $sHost
     port = $sPort
     dbname = $sDbName
     user=$sUser
     password=$sPassword";

    $oConexao = pg_connect($sConexao);
    // var_dump($oConexao);
     if(!$oConexao){
        die("Falha na conexão: ".mysqli_connect_error());//pg_last_error
     }else{
        echo"";
     }
    /* EXEMPLO PRA VERIFICAR SE JA POSSUI UM CPF CADASTRADO

     $cpf = $_POST['cpf'];
     $cpf = pg_escape_string($oConexao, $cpf);
     
     $pge = "SELECT cpf FROM schema.tabela
              WHERE cpf = '$cpf'";
     $retorno = pg_query($oConexao, $pge);
     if(pg_num_rows($retorno) > 0){
        echo "NÃO FOI POSSIVEL, CPF JA CADASTRADO!<br>";
     }else{
        $cpf = $_POST['cpf'];
        $idade = $_POST['idade'];
        $pge = "INSERT INTO schema.tabela(cpf, idade)
                VALUES ('$cpf', '$idade')";
        $resultado = pg_query($oConexao, $pge);
        echo">>USUARIO CADASTRADO COM SUCESSO";
     }
     
     */

?>