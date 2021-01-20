<?

include("cb.php");
include("empresa.php");
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta charset="UTF-8">
<div class="container">
   
    <form  action="cb.php" method="get" >
        <table>
            <tbody>
            <?if (isset($_GET["id"]) != null ){?>
                <?$pessoa = selectIdPessoa($_GET["id"]);?>
            <?}?>
                <tr>
                    <td>Nome: </td>
                    <?if(isset($_GET["id"]) != null ){?>
                        <td><input id="nome" type="text" name="nome" value="<?=$pessoa["nome"]?>" size="20"></td>
                    <?}else{?>
                        <td><input type="text" name="nome" value=""></td>
                    <?}?>
                </tr>
                <tr>
                    <td>Sexo: </td>
                    <?if(isset($_GET["id"]) != null ){?>
                        <td><select name="sexo" value="">
                            <option value="Maxoxo">Maxoxo</option>
                            <option value="Femiamia">Femiamia</option>
                        </select>
                        </td>
                    <?}else{?>
                        <td><select name="sexo" value="">
                            <option value="Maxoxo">Maxoxo</option>
                            <option value="Femiamia">Femiamia</option>
                        </select>
                        </td>
                    <?}?>
                </tr>
                <tr>
                <?if(isset($_GET["id"]) != null ){?>
   
                    <?}else{?>
                        <td >Empresa: </td>
                       <td><select name="empresa" value="">
                            <option value="6800">Laudo</option>
                            <option value="6801">Rubio</option>
                            <option value="6802">Inata</option>
                            <option value="6803">Netflix</option>
                            <option value="6804">nova2</option>
                        </select>
                        </td>
                    <?}?>
                </tr>

                    <?if(isset($_GET["id"]) != null ){?>
                        <td><input type="hidden" name="acao" value="alterar" tabela="pessoa">
                    <?}else{?>
                        <td><input type="hidden" name="acao" value="inserir" tabela="pessoa" >
                    <?}?>
                <input type="hidden" name="id" value="<?=$pessoa["id"]?> " tabela="pessoa"></td>
                <td><input class="enviar" type="submit" name="Enviar" value="Enviar" ></td>
                </tr>
            </tbody>
        </table> 
    </form>
</div>
