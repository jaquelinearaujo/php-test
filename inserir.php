<?php

include("cb.php");

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta charset="UTF-8">
<div class="container">
    <form  action="cb.php" method="post">
        <table>
            <tbody>
            <?if($_POST["id"] != null ){?>
                <?$pessoa = selectIdPessoa($_POST["id"]);?>
            <?}?>
                <tr>
                    <td>Nome: </td>
                    <?if($_POST["id"] != null ){?>
                        <td><input type="text" name="nome" value="<?=$pessoa["nome"]?>" size="20"></td>
                    <?}else{?>
                        <td><input type="text" name="nome" value=""></td>
                    <?}?>
                </tr>
                <tr>
                    <td>Sexo: </td>
                    <?if($_POST["id"] != null ){?>
                        <td><input type="text" name="sexo" value="<?=$pessoa["sexo"]?>" size="20"></td>
                    <?}else{?>
                        <td><input type="text" name="sexo" value=""></td>
                    <?}?>
                </tr>
                <tr>
                    <?if($_POST["id"] != null ){?>
                        <td><input type="hidden" name="acao" value="alterar">
                    <?}else{?>
                        <td><input type="hidden" name="acao" value="inserir">
                    <?}?>
                <input type="hidden" name="id" value="<?=$pessoa["id"]?>"></td>
                <td><input type="submit" name="Enviar" value="Enviar"></td>
                </tr>
            </tbody>
        </table> 
    </form>
</div>