<?


?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta charset="UTF-8">
<img src="img/pato.gif" style="width: 100px;" />
<div class="container">
    <form  action="cb.php" method="get" >
        <table>
            <tbody>
                <tr>
                    <td>Empresa: </td>          
                    <td><input type="text" name="empresa" value=""></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="acao_empresa" value="inserir" >
                <input type="hidden" name="idEmpresa" value="" ></td>
                <td><input type="submit" ></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>