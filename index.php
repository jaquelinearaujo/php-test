<!DOCTYPE html>

<? 
    include("cb.php");
    
    $grupo = selectAllPessoa();
    
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>CRUD PHP</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>


        <body>
        <div class="container">
            <div class="posicionarCabecalho">
                <h1>Crud-PHP </h1>
            </div>
            <table border="1" class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>Empresa</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?foreach($grupo as $pessoa ) { ?>
                    <tr>
                        <td><?=$pessoa["nome"]?></td>
                        <td><?=$pessoa["sexo"]?></td>
                        <td><?=$pessoa["empresa"]?></td>
                        <td><?=$pessoa["criadoem"]?></td>
                        <td><?=$pessoa["atualizadoem"]?></td>
                        <td>
                            <!---  name="alterar" action="inserir.php" method="post" data-id="<?php echo $pessoa["id"];?>" name="excluir" action="cb.php" method="post"            href="inserir.php?id=<?=$pessoa["id"]?>&acao=excluir" ---->
                            <a class="color-black btn fundo-amarelo" href="inserir.php?id=<?=$pessoa["id"]?>&acao=editar">
                                <b>Editar</b>
                            </a>
                        </td>
                            <td>
                                <button class="btn fundo-vermelho delete" id="<?php echo $pessoa["id"];?>">
                                    <b>Excluir</b>
                                </button>
                            </td>
                    </tr><?}?>
                </tbody>
            </table>
            <div class="text-center">
                <button type="button" class="btn btn-primary">
                <a href="inserir.php">Adicionar</a>
                </button> 
            </div>
            <br>
            <div class="text-center">
                <button type="button" class="btn btn-primary">
                <a href="novaEmpresa.php">Adicionar Empresa</a>
                </button>
            </div>
            <div style="display: flex; justify-content: center;">
                <img src="img/pato.gif" style="width: 100px;" />
                <img src="img/sapo.gif" style="width: 100px; height:100px;" />
            </div>
            <?
                // Função para formatar a data
                function formatoData($data) {
                    $array = explode("-", $data);
                    $novaData = $array[2]."/".$array[1]."/".$array[0];
                    return $novaData;
                }
            ?>
            </div>
            <script>
        $(document).ready(function(){
            $(".delete").click(function(){debugger;
            var id=$(this).attr("id");
                $.ajax({
                    url: 'cb.php',
                    cache : false,
                    type: 'GET',
                    dataType :'text',
                    data:{ id,acao: "excluir"},
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
        </body>

    
</html>
