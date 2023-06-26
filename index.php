<?php
    include_once("includes/conexao.php");
    include_once("includes/header.php");
?>
<fieldset>
        <div class="col s12 m6 push-m3">
            <h3 class="light"> Listagem das cidades </h3>
                <table class="striped">
                    <thead>
                            <tr>
                                <th>Código: 
                                </th>
                                <th>Nome: </th>
                                <th>Ações: </th>
                            </tr>
                    </thead>
                    <tbody>
                    <?php
                        $pge = "SELECT * FROM MERCADO.tbcidade ORDER BY cidnome ASC";
                        $resultado = pg_query($oConexao, $pge);
                        while ($dados=pg_fetch_array($resultado)){
                    ?>
                            <tr>
                                <td><?php echo $dados['cidcodigo'] ?></td>
                                <td><?php echo $dados['cidnome'] ?></td>
                                <td>                    <a onclick="return confirm('Deseja exluir?')" href="includes/delete.php?codigo=<?php echo $dados['cidcodigo'];
                                ?>&tabela=tb.cidade"class="btn red">deletar</a></td>
                            </tr>
                            <?php };?>
                        </tbody>
                </table>
            </div>
    </fieldset>
<form action="includes/create.php" method="post">
        <fieldset><legend> CADASTRO CIDADE </legend>
            <label>
                Nome do município:
                <input type="text" name="cidnome">
            </label><br><br>
            <button class="btn blue" name="btn-cadastrar" value="btn-cadastrar">CADASTRAR</button>
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