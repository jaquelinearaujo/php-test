<?

    if(!empty($_POST['acao_pessoa'])){
        $acaos = 'acao_pessoa';
        $o = explode("_", $acaos);
        $o[0] ;
        $ob = $o[1]  ;
        if ($_REQUEST['acao_pessoa']=="inserir"){
            $obj = "(nome, sexo, criadoem, atualizadoem,idempresa)";
            $acao="INSERT INTO ";
            inserirPessoa($ob);
        }
        if ($_REQUEST['acao_pessoa']=="alterar"){
            $acao="UPDATE ";
            alterarPessoa($ob);
        }
        if($_REQUEST['acao_pessoa']=="excluir"){
            $acao="DELETE FROM ";
            excluirPessoa($ob);
        }
    }if(isset($_REQUEST['acao_empresa'])){
        if ($_REQUEST['acao_empresa']=="inserir"){
            $acao="INSERT INTO ";
            inserirPessoa($ob);
        }
    }

    function abrirBanco() {
    $conexao = new mysqli("localhost", "root", "root", "crud");
    return $conexao;
    }
    function inserirPessoa($ob) { 
        $banco = abrirBanco();
        if($_REQUEST['acao_pessoa']=="inserir" && $_REQUEST['nome']) {
            global $acao;
            global $obj;
            $sql = $acao. $ob. $obj. " VALUES ('{$_REQUEST["nome"]}','{$_REQUEST["sexo"]}',sysdate(),sysdate(),'{$_REQUEST["empresa"]}')";
        }else{
            global $acao;
            $tabela="empresa";
            $sql = $acao." $tabela (empresa) 
            VALUES ('{$_REQUEST["empresa"]}')";
        }

        $banco->query($sql) or die ('erro no sql :'.mysqli_error($banco));
        $banco->close();
        voltarIndex(); 
    }

    function alterarPessoa($ob) {
        global $acao;
        $tabela="pessoa";
        $banco = abrirBanco();
        $sql = $acao." $tabela SET nome='{$_REQUEST["nome"]}',sexo='{$_REQUEST["sexo"]}',atualizadoem=now() WHERE id='{$_REQUEST["id"]}'";
        $banco->query($sql) or die ('erro no sql :'.mysqli_error($banco));
        $banco->close();
        voltarIndex();
    }

    function excluirPessoa($ob) {
        global $acao;
        $banco = abrirBanco();
        $sql = $acao. $ob." WHERE id='{$_REQUEST["id"]}'";
        $banco->query($sql) or die ('erro no sql :'.mysqli_error($banco));
        $banco->close();
        voltarIndex();
    }

    function selectAllPessoa() {
        $banco = abrirBanco();
        $sql = "SELECT p.id,p.nome,DATE_FORMAT(p.criadoem,'%d/%m/%Y %H:%i:%s') as criadoem,DATE_FORMAT(p.atualizadoem,'%d/%m/%Y %H:%i:%s') as atualizadoem,p.sexo,e.empresa FROM pessoa p JOIN empresa e on (p.idempresa = e.idempresa) ORDER BY p.nome";
        $resultado = $banco->query($sql) or die ('erro no sql :'.mysqli_error($banco));
        $banco->close();
        while($row = mysqli_fetch_array($resultado)) {
            $grupo[] = $row;
        }
        return $grupo;
    }

    function selectIdPessoa($id) {
        $banco = abrirBanco();
        $sql = "SELECT * FROM pessoa WHERE id=".$id;
        $resultado = $banco->query($sql) or die ('erro no sql :'.mysqli_error($banco));
        $banco->close();
        $pessoa = mysqli_fetch_assoc($resultado);
        return $pessoa;
    }

    function voltarIndex(){
        header("Location:index.php");
    }

?>