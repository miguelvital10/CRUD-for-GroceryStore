<?php
    include_once("includes/conexao.php");
    include_once("includes/header.php");
?>
        <fieldset><h3>LISTAGEM DE PRODUTOS</h3>
         <div class="row">
            <div class="col s12 m6 push-m3">                 
                    <table class="striped">
                        <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Descrição </th>
                                    <th>Valor</th>
                                    <th>Estoque </th>
                                    <th>Categoria</th>
                                    <th>Fornecedor</th>
                                    <th>Ações</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                $pge = "SELECT * FROM MERCADO.TBPRODUTO LEFT JOIN MERCADO.TBCATEGORIA ON (tbproduto.catcodigo = tbcategoria.catcodigo) LEFT JOIN MERCADO.TBFORNECEDOR ON (tbproduto.forcodigo = tbfornecedor.forcodigo)";
                                $resultado = pg_query($oConexao, $pge);
                                
                                while($dados = pg_fetch_array($resultado)){
                            
                            ?>
                            <tr>
                                <td><?php echo $dados ['procodigo']?></td>
                                <td><?php echo $dados ['pronome']?></td>
                                <td><?php echo $dados ['prodescricao']?></td>
                                <td><?php echo $dados ['provalor']?></td>
                                <td><?php echo $dados ['proestoque']?></td>
                                <td><?php echo $dados ['catdescricao']?></td>
                                <td><?php echo $dados ['fornome']?></td>
                                <td><a onclick="return confirm('Deseja exluir?')" href="includes/delete.php?codigo=<?php echo $dados['procodigo'];
                                ?>&tabela=tb.produto" class="btn red">deletar</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table> 
        </fieldset>
<form action="includes/createproduto.php" method="POST">
    <fieldset><h3 class="float-text">CADASTRO DE PRODUTOS</h3>
        <div class="input-field col s12">
        
                    <input type="text" name="nome" id="nome">
                    <label for="nome">Nome</label>
        </div> 
        <div class="input-field col s12">
                    <input type="text" name="descricao" id="descricao">
                    <label for="descricao">Descrição</label>
        </div>
        <div class="input-field col s12">
                    <input type="text" name="valor" id="valor">
                    <label for="valor">Valor</label>
        </div>
        <div class="input-field col s12">
                    <input type="text" name="estoque" id="estoque">
                    <label for="estoque">Estoque</label>
         </div>
        <div class="input-field col s12">
                    <select name="categoria" id="categoria">
                        <?php
                            $pge = "SELECT * FROM MERCADO.tbcategoria";
                            $resultado = pg_query($oConexao, $pge);
                            while ($dados=pg_fetch_array($resultado)){
                        ?>
                        <option value="<?php echo $dados['catcodigo'];?>"><?php echo $dados ['catdescricao'];?></option>
                    <?php }; ?>
                    </select>

                    
        </div>
        <div class="input-field col s12">
                    <select name="fornecedor" id="fornecedor">
                        <?php
                            $pge = "SELECT * FROM MERCADO.tbfornecedor";
                            $resultado = pg_query($oConexao, $pge);
                            while ($dados=pg_fetch_array($resultado)){
                        ?>
                        <option value="<?php echo $dados['forcodigo'];?>"><?php echo $dados ['fornome'];?></option>
                    <?php }; ?>
                    </select>

                    
        </div>                  
        <button type="submit" name="btn-cadastrarproduto" class="btn blue">Cadastrar</button>
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