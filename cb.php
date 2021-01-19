<?



    if(isset($_REQUEST['acao'])){

        if ($_REQUEST['acao']=="inserir"){
            inserirPessoa();
        }
        if ($_REQUEST['acao']=="alterar"){
            alterarPessoa();
            var_dump("aki");
        }
        if($_REQUEST['acao']=="excluir"){
            excluirPessoa();
        }
    }

    

    function abrirBanco() {
    $conexao = new mysqli("localhost", "root", "root", "crud");
    return $conexao;
    }
    function inserirPessoa() { 
        $banco = abrirBanco();
        $sql = "INSERT INTO pessoa ( nome, sexo, criadoem, atualizadoem,idempresa)
        VALUES ('{$_REQUEST["nome"]}','{$_REQUEST["sexo"]}',sysdate(),sysdate(),'{$_REQUEST["idempresa"]}')";
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
        $sql = "SELECT p.id,p.nome,DATE_FORMAT(p.criadoem,'%d/%m/%Y %H:%i:%s') as criadoem,DATE_FORMAT(p.criadoem,'%d/%m/%Y %H:%i:%s') as atualizadoem,p.sexo,e.empresa FROM pessoa p JOIN empresa e on (p.idempresa = e.idempresa) ORDER BY p.nome";
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