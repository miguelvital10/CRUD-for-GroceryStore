<?php
    include_once("includes/conexao.php");
    include_once("includes/header.php");
?>
<fieldset>
        <div class="row">
            <div class="col s12 m6 push-m3">
                <h3 class="light"> Fornecedores </h3>                 
                    <table class="striped">
                        <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Cpf</th>
                                    <th>Cidade Codigo</th>
                                    <th>Cidade Nome</th>
                                    <th>Ações </th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                $pge = "SELECT * FROM MERCADO.TBFORNECEDOR LEFT JOIN MERCADO.TBCIDADE ON (tbfornecedor.cidcodigo = tbcidade.cidcodigo)";
                                $resultado = pg_query($oConexao, $pge);
                                
                                while($dados = pg_fetch_array($resultado)){
                            
                            ?>
                            <tr>
                                <td><?php echo $dados ['forcodigo']?></td>
                                <td><?php echo $dados ['fornome']?></td>
                                <td><?php echo $dados ['forcnpj']?></td>
                                <td><?php echo $dados ['cidcodigo']?></td>
                                <td><?php echo $dados ['cidnome']?></td>
                                <td><a onclick="return confirm('Deseja exluir?')" href="includes/delete.php?codigo=<?php echo $dados['forcodigo'];
                                ?>&tabela=tb.fornecedor" class="btn red">deletar</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table> 
 
</fieldset>
<form action="includes/createfornecedor.php" method="POST">
    <fieldset><h3 class="float-text">CADASTRO DE FORNECEDORES</h3>
        <div class="input-field col s12">
                    <input type="text" name="nome" id="nome">
                    <label for="nome">Nome</label>
        </div>       
        <div class="input-field col s12">
                    <input type="text" name="cnpj" id="cnpj">
                    <label for="cnpj">Cnpj </label>
        </div> 
        <div class="input-field col s12">
                    <select name="cidade" id="cidade">
                        <?php
                            $pge = "SELECT * FROM MERCADO.tbcidade";
                            $resultado = pg_query($oConexao, $pge);
                            while ($dados=pg_fetch_array($resultado)){
                        ?>
                        <option value="<?php echo $dados['cidcodigo'];?>"><?php echo $dados ['cidnome'];?></option>
                    <?php }; ?>
                    </select>

                    
        </div>   
        <button type="submit" name="btn-cadastrarfornecedor" class="btn blue">Cadastrar</button>
    </fieldset>
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