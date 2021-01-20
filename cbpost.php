<?

if(isset($_REQUEST['acao'])){
 if($_REQUEST['pesso'] = "pessoa"){
$tabela="pessoa";
 }
    if ($_REQUEST['acao']=="_I_"){
        $acao="INSERT INTO";
        i();
        
    }
    if ($_REQUEST['acao']=="_U_"){
        $acao="UPDATE";
        u();
    }
    if ($_REQUEST['acao']=="_D_"){
        $acao="DELETE FROM";
        d();
    }
}
function abrirBanco() {
    $conexao = new mysqli("localhost", "root", "root", "crud");
    return $conexao;
    }


    function i() { 
        global $acao;
        global $tabela;
        $banco = abrirBanco();
        $sql =  $acao."$tabela ( nome, sexo, criadoem, atualizadoem,idempresa)
        VALUES ('{$_REQUEST["nome"]}','{$_REQUEST["sexo"]}',sysdate(),sysdate(),'{$_REQUEST["empresa"]}')";
        $banco->query($sql) === TRUE;
        $banco->close();
        voltarIndex(); 
    }

    function u() {
        global $acao;
        global $tabela;
        $banco = abrirBanco();
        $sql = $acao." pessoa SET nome='{$_REQUEST["nome"]}',sexo='{$_REQUEST["sexo"]}',atualizadoem=now() WHERE id='{$_REQUEST["id"]}'";
        die($sql); $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function d() {
        global $acao;
        global $tabela;
        $banco = abrirBanco();
        $sql = $acao."$tabela WHERE id='{$_REQUEST["id"]}'";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function selectAll() {
        $banco = abrirBanco();
        $sql = "SELECT p.id,p.nome,DATE_FORMAT(p.criadoem,'%d/%m/%Y %H:%i:%s') as criadoem,DATE_FORMAT(p.atualizadoem,'%d/%m/%Y %H:%i:%s') as atualizadoem,p.sexo,e.empresa FROM pessoa p JOIN empresa e on (p.idempresa = e.idempresa) ORDER BY p.nome";
        $resultado = $banco->query($sql);
        $banco->close();
        while($row = mysqli_fetch_array($resultado)) {
            $grupo[] = $row;
        }
        return $grupo;
    }

    function selectId($id) {
        $banco = abrirBanco();
        $sql = "SELECT * FROM$tabela WHERE id=".$id;
        $resultado = $banco->query($sql);
        $banco->close();
        $pessoa = mysqli_fetch_assoc($resultado);
        return $pessoa;
    }

    function voltarIndex(){
        header("Location:index.php");
    }
?>