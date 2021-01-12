<!DOCTYPE html>

<?php include("cb.php");

    $grupo = selectAllPessoa();
    
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD com PHP e MYSQL - INSERT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<div class="container">
    <body>
     <div class="posicionarCabecalho">
          <h1>Crud-PHP </h1>
      </div>
      <table border="1" class="table">
          <thead class="thead-light">
              <tr>
                  <th>Nome</th>
                  <th>Sexo</th>
                  <th>Criado em</th>
                  <th>Atualizado em</th>
                  <th>Editar</th>
                  <th>Excluir</th>
              </tr>
          </thead>
          <tbody>
             <?php 
                foreach($grupo as $pessoa) { ?>
                   <tr>
                      <th><?=$pessoa["nome"]?></th>
                      <th><?=$pessoa["sexo"]?></th>
                      <th><?=$pessoa["criadoem"]?></th>
                      <th><?=$pessoa["atualizadoem"]?></th>
                      <th>
                          <form name="alterar" action="inserir.php" method="post">
                              <input type="hidden" name="id" value="<?=$pessoa["id"]?>">
                              <input class="btn_edit" type="submit" name="editar" value="Editar">
                          </form>
                      </th>
                      <th>
                          <form name="excluir" action="cb.php" method="post">
                              <input type="hidden" name="id" value="<?=$pessoa["id"]?>">
                              <input type="hidden" name="acao" value="excluir">
                              <input class="btn_excloi" type="submit" name="excluit" value="Excluir">
                          </form>
                      </th>
                  </tr>   
                <?php }
              ?>
          </tbody>
     </table>
      <div class="text-center">
           <button type="button" class="btn btn-primary"><a href="inserir.php">Adicionar</a></button>
      </div>
      <div style="display: flex; justify-content: center;">
      <img src="img/pato.gif" style="width: 130px;" />
      </div>
      
       <?php
            // Função para formatar a data
            function formatoData($data) {
                $array = explode("-", $data);
                $novaData = $array[2]."/".$array[1]."/".$array[0];
                return $novaData;
            }

        ?>
    </body>
</div>
</html>