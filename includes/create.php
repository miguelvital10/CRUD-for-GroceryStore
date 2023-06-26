<?php
    include("conexao.php");
    if(isset($_POST['btn-cadastrar'])){
        $municipio =  pg_escape_string($oConexao, $_POST['cidnome']);
        /*$departamento = $_POST['departamento'];

        $pge = "INSERT INTO MERCADO.TBDEPARTAMENTO(DPTCODIGO, DPTDESCRICAO )
                VALUES (DEFAULT, '$departamento')";*/
        $pge = "INSERT INTO MERCADO.TBCIDADE(CIDNOME)
                VALUES ('$municipio');";        
        try {
            pg_query($oConexao, $pge);
            echo "Cadastrado com sucesso!";
            header('Location: ../index.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
            header('Location: ../index.php');
        }
        pg_close($oConexao);
    }
?>

<?php
/*$departamento = $_POST['departamento'];

        $pge = "INSERT INTO MERCADO.TBDEPARTAMENTO(DPTCODIGO, DPTDESCRICAO )
                VALUES (DEFAULT, '$departamento')";*/
/*include("conexao.php");
    $acao = $_GET['acao'];
    if($acao == "insert"){
        $municipio = $_POST['cidnome'];
        
        $pge = "INSERT INTO MERCADO.TBCIDADE(CIDNOME)
                VALUES ('$municipio')";
        header("location:../index.php");
        try{pg_query($oConexao, $pge);}
        catch(Exception $erro){
            echo $erro->getMessage();
        }
        
        pg_close($oConexao);
    */
?>
