<?php
if(isset($_POST["acao"])){
    if ($_POST["acao"]=="inserir"){
        inserirPessoa();
    }
    if ($_POST["acao"]=="alterar"){
        alterarPessoa();
    }
    if($_POST["acao"]=="excluir"){
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
        VALUES (rand() * 3333 ,'{$_POST["nome"]}','{$_POST["sexo"]}',sysdate(),sysdate())";
        $banco->query($sql) === TRUE;
        $banco->close();
        voltarIndex(); 
    }

    function alterarPessoa() {
        $banco = abrirBanco();
        $sql = "UPDATE pessoa SET nome='{$_POST["nome"]}',sexo='{$_POST["sexo"]}',atualizadoem=sysdate() WHERE id='{$_POST["id"]}'";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function excluirPessoa() {
        $banco = abrirBanco();
        $sql = "DELETE FROM pessoa WHERE id='{$_POST["id"]}'";
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