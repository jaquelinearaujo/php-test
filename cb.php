<?

    if(isset($_REQUEST['acao'])){

        if ($_REQUEST['acao']=="inserir"){
            $acao="INSERT INTO";
            inserirPessoa();
        }
        if ($_REQUEST['acao']=="alterar"){
            $acao="UPDATE";
            alterarPessoa();
        }
        if($_REQUEST['acao']=="excluir"){
            $acao="DELETE FROM";
            excluirPessoa();
        }
    }

    function abrirBanco() {
    $conexao = new mysqli("localhost", "root", "root", "crud");
    return $conexao;
    }
    function inserirPessoa() { 
        $banco = abrirBanco();
        if($_REQUEST['acao']=="inserir" && $_REQUEST['nome']) {
            global $acao;
            $tabela="pessoa";
            $sql = $acao." $tabela ( nome, sexo, criadoem, atualizadoem,idempresa)
            VALUES ('{$_REQUEST["nome"]}','{$_REQUEST["sexo"]}',sysdate(),sysdate(),'{$_REQUEST["empresa"]}')";
        }else{
            global $acao;
            $tabela="empresa";
            $sql = $acao." $tabela (empresa) 
            VALUES ('{$_REQUEST["empresa"]}')";
        }

        $banco->query($sql) === TRUE;
        $banco->close();
        voltarIndex(); 
    }

    function alterarPessoa() {
        global $acao;
        $tabela="pessoa";
        $banco = abrirBanco();
        $sql = $acao." $tabela SET nome='{$_REQUEST["nome"]}',sexo='{$_REQUEST["sexo"]}',atualizadoem=now() WHERE id='{$_REQUEST["id"]}'";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function excluirPessoa() {
        global $acao;
        global $tabela;
        $banco = abrirBanco();
        $sql = "DELETE  FROM pessoa WHERE id='{$_REQUEST["id"]}'";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function selectAllPessoa() {
        $banco = abrirBanco();
        $sql = "SELECT p.id,p.nome,DATE_FORMAT(p.criadoem,'%d/%m/%Y %H:%i:%s') as criadoem,DATE_FORMAT(p.atualizadoem,'%d/%m/%Y %H:%i:%s') as atualizadoem,p.sexo,e.empresa FROM pessoa p JOIN empresa e on (p.idempresa = e.idempresa) ORDER BY p.nome";
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