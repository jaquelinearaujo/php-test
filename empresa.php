<?
    
    if(isset($_REQUEST['acao'])){
        if ($_REQUEST['acao']=="inserir"){
            inserirEmpresa();
        }
        if ($_REQUEST['acao']=="alterar"){
            alterarEmpresa();
        }
    }
    function abriroBanco() {
        $conexao = new mysqli("localhost", "root", "root", "crud");
        return $conexao;
        }
    
    function inserirEmpresa() { 
        $banco = abriroBanco();
        $sql = "INSERT INTO empresa (empresa) 
        VALUES ('{$_REQUEST["empresa"]}')";
        $banco->query($sql) === TRUE;
        $banco->close();
        voltaIndex();
    }

    function alterarEmpresa() {
        $banco = abriroBanco();
        $sql = "UPDATE empresa SET nome='{$_REQUEST["nome"]}',sexo='{$_REQUEST["sexo"]}',atualizadoem=sysdate() WHERE id='{$_REQUEST["id"]}'";
        $banco->query($sql);
        $banco->close();
        voltaIndex();
    }

    function excluirEmpresa() {
        $banco = abriroBanco();
        $sql = "DELETE FROM empresa WHERE idEmpresa='{$_REQUEST["id"]}'";
        $banco->query($sql);
        $banco->close();
        voltaIndex();
    }

    function selectAllEmpresa() {
        $banco = abriroBanco();
        $sql = "SELECT * FROM empresa ORDER BY empresa";
        $resultado = $banco->query($sql);
        $banco->close();
        while($row = mysqli_fetch_array($resultado)) {
            $grupo[] = $row;
        }
        return $grupo;
    }

    function selectIdEmpresa($id) {
        $banco = abriroBanco();
        $sql = "SELECT * FROM empresa WHERE id=".$id;
        $resultado = $banco->query($sql);
        $banco->close();
        $pessoa = mysqli_fetch_assoc($resultado);
        return $pessoa;
    }

    function voltaIndex(){
        header("Location:index.php");
    }

?>