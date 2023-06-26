<?php
    include_once("includes/conexao.php");
    include_once("includes/header.php");
?>
<fieldset>
        <div class="row">
            <div class="col s12 m6 push-m3">
                <h3 class="light"> Departamentos </h3>                 
                    <table class="striped">
                        <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                $pge = "SELECT * FROM MERCADO.TBDEPARTAMENTO";
                                $resultado = pg_query($oConexao, $pge);
                                
                                while($dados = pg_fetch_array($resultado)){
                            
                            ?>
                            <tr>
                                <td><?php echo $dados ['dptcodigo']?></td>
                                <td><?php echo $dados ['dptdescricao']?></td>
                                <td><a onclick="return confirm('Deseja exluir?')" href="includes/delete.php?codigo=<?php echo $dados['dptcodigo'];
                                ?>&tabela=tb.departamento" class="btn red">deletar</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table> 
        </fieldset>
</fieldset>
<form action="includes/createdepartamento.php" method="POST">
    <fieldset><h3 class="float-text">CADASTRO DE DEPARTAMENTOS</h3>
        <div class="input-field col s12">
                    <input type="text" name="nome" id="nome">
                    <label for="nome">Nome: </label>
        </div>        
        <button type="submit" name="btn-cadastrardepartamento" class="btn blue">Cadastrar</button>
</form>
<!--<form action="includes/create.php?acao=insert" method="post">
    <fieldset><legend>Cadastro de cidade: </legend>
        <label>
            Nome do município:
        <input type="text" name="cidnome">
        </label><br><br>
        <button type="submit" name="btn-cadastrar" class="btn blue">CADASTRAR</button>
    </fieldset>
</form>-->
<?php
include_once('includes/footer.php');
?>