<?
var_dump($_REQUEST["acao"]=="excluir");
var_dump(isset($_REQUEST["id"]));
var_dump(count($_REQUEST)>0);
if(isset($_REQUEST["acao"])){
    if ($_REQUEST["acao"]=="inserir"){
        inserirPessoa();
    }
    if ($_REQUEST["acao"]=="alterar"){
        alterarPessoa();
    }
    if($_REQUEST["acao"]=="excluir"){
        var_dump($_REQUEST["acao"]=="excluir");
        excluirPessoa();
    }

}

function abrirBanco() {
    $conexao = new mysqli("localhost", "root", "root", "crud");
    return $conexao;
}
    function inserirPessoa() { 
        $banco = abrirBanco();
        $sql = "INSERT INTO pessoa (id ,nome, sexo, criadoem, atualizadoem) 
        VALUES (rand() * 3333 ,'{$_REQUEST["nome"]}','{$_REQUEST["sexo"]}',sysdate(),sysdate())";
        $banco->query($sql) === TRUE;
        $banco->close();
        voltarIndex(); 
    }

    function alterarPessoa() {
        $banco = abrirBanco();
        $sql = "UPDATE pessoa SET nome='{$_REQUEST["nome"]}',sexo='{$_REQUEST["sexo"]}',atualizadoem=sysdate() WHERE id='{$_REQUEST["id"]}'";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function excluirPessoa() {
        $banco = abrirBanco();
        $sql = "DELETE FROM pessoa WHERE id='{$_REQUEST["id"]}'";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function selectAllPessoa() {
        $banco = abrirBanco();
        $sql = "SELECT * FROM pessoa ORDER BY nome";
        $resultado = $banco->query($sql);
        $banco->close();
        while($row = mysqli_fetch_array($resultado)) {
            $grupo[] = $row;
        }
        return $grupo;
    }

    function selectIdPessoa($id) {
        $banco = abrirBanco();
        $sql = "SELECT * FROM pessoa WHERE id=".$id;
        $resultado = $banco->query($sql);
        $banco->close();
        $pessoa = mysqli_fetch_assoc($resultado);
        return $pessoa;
    }

    function voltarIndex(){
        header("Location:index.php");
    }

?>