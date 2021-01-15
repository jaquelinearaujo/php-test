<!DOCTYPE html>

<? include("cb.php");

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
  
<script>

$(document).ready(function(){
    $(".delete").click(function(){debugger;
        var id=$(this).attr("data-id");
        var acao=$(this).attr("acao")
            $.ajax({
            url: 'cb.php',
            type: 'POST',
            data:{ id: $("#id_d").val() ,acao:$("#acao_a").val(),
            },
            success: function(r) {
                location.reload();
            },
            error: function(r){
                alert('deu erro');
            }
        });
        });
    });
    
</script>
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
             <?
                foreach($grupo as $pessoa) { ?>
                   <tr>
                      <td><?=$pessoa["nome"]?></td>
                      <td><?=$pessoa["sexo"]?></td>
                      <td><?=$pessoa["criadoem"]?></td>
                      <td><?=$pessoa["atualizadoem"]?></td>
                      <td>
                         <!---  name="alterar" action="inserir.php" method="post" data-id="<?php echo $pessoa["id"];?>" name="excluir" action="cb.php" method="post"            href="inserir.php?id=<?=$pessoa["id"]?>&acao=excluir" ---->
                         <a class="color-black btn fundo-amarelo" href="inserir.php?id=<?=$pessoa["id"]?>">
                             <b>Editar</b>
                         </a>
                      </td>
                        <td>
                            <a class="btn fundo-vermelho delete" data-id="<?php echo $pessoa["id"];?>" acao="excluir"  >
                                <b>Excluir</b>
                            </a>
                        </td>
                  </tr>
                <?}?>
          </tbody>
     </table>
      <div class="text-center">
            <button type="button" class="btn btn-primary">
               <a href="inserir.php">Adicionar</a>
            </button>
      </div>
      <div style="display: flex; justify-content: center;">
      <img src="img/pato.gif" style="width: 130px;" />
      </div>
       <?
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
