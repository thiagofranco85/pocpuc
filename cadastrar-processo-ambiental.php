<?php 
$autentica_tipo_usuario = ['Analista', 'Supervisor', 'Gestor'];
require 'header.php'; 
require_once __DIR__ . '/src/funcoes-processo-ambiental.php';
 
$erro_cadastrar_processo_ambiental = isset($_SESSION['erro_cadastrar_processo_ambiental']) ? $_SESSION['erro_cadastrar_processo_ambiental'] : '';

$arrStatus = ['Ativo', 'Inativo', 'Aguardando Liberação', 'Concluído'];
$arrOrgao = ['Municipal', 'Estadual', 'Federal'];

$id_get = isset($_GET['id']) ? $_GET['id'] : null;

if( $id_get ){
    $processos = select( $id_get ); 
    $processo = $processos[0];
}


$id = isset($processo['id']) ? $processo['id'] : '';
$nome = isset($processo['nome']) ? $processo['nome'] : '';
$status = isset($processo['status']) ? $processo['status'] : '';
$dataInicio = isset($processo['dataInicio']) ? $processo['dataInicio'] : '';
$dataValidade = isset($processo['dataValidade']) ? $processo['dataValidade'] : '';
$valor = isset($processo['valor']) ? $processo['valor'] : '';
$obs = isset($processo['obs']) ? $processo['obs'] : '';
$orgao = isset($processo['orgao']) ? $processo['orgao'] : '';

?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Cadastrar Processo Ambiental</h1>
    
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="painel.php">Início</a></li>
        <li class="breadcrumb-item"><a href="modulo-meio-ambiente.php">Módulo Meio Ambiente</a></li>
        <li class="breadcrumb-item"><a href="listar-processos-ambientais.php">Listar Processos</a></li>
        <li class="breadcrumb-item active">Cadastrar Processo</li>
    </ol>
    <hr>
    
    <div class="col-lg-6">
        <small>* Campos Obrigatórios</small>
        
        <?php if( $erro_cadastrar_processo_ambiental ): ?>
            <div class="alert alert-danger">
                <?php echo $erro_cadastrar_processo_ambiental; ?>    
            </div>
        <?php endif; ?>

        <form method="POST" action="src/funcoes-processo-ambiental.php">
            <input type="hidden" name="acao" value="salvar">
            <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
            <div class="form-group">
                <label for="nome">Nome *</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome;?>">
            </div>
            <div class="form-group">
                <label for="status">Órgão *</label>
                <select class="form-control" id="orgao" name="orgao">
                <option>Selecione o tipo de órgão</option>
                <?php 
                foreach( $arrOrgao as $item ): 
                    $selected = $item == $orgao ? 'selected' : '';
                ?>
                <option <?php echo $selected;?> value="<?php echo $item;?>"><?php echo $item;?></option>
                <?php endforeach; ?> 
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status *</label>
                <select class="form-control" id="status" name="status">
                <option>Selecione o status</option>
                <?php 
                foreach( $arrStatus as $item ): 
                    $selected = $item == $status ? 'selected' : '';
                ?>
                <option <?php echo $selected;?> value="<?php echo $item;?>"><?php echo $item;?></option>
                <?php endforeach; ?> 
                </select>
            </div>
            <div class="form-group">
                <label for="dataInicio">Data Início *</label>
                <input type="date" class="form-control" id="dataInicio" name="dataInicio" value="<?php echo $dataInicio;?>">
            </div>

            <div class="form-group">
                <label for="dataValidade">Data Validade</label>
                <input type="date" class="form-control" id="dataValidade" name="dataValidade" value="<?php echo $dataValidade;?>">
            </div>

            <div class="form-group">
                <label for="valor">Valor *</label>
                <input type="number" class="form-control" id="valor" name="valor" value="<?php echo $valor;?>">
            </div>

            <div class="form-group">
                <label for="obs">Observação</label>
                <textarea class="form-control" id="obs" rows="3" name="obs"><?php echo $obs;?></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
            <?php if( $id ): ?>       
            <button type="button" onclick="excluir()" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</button>
            <?php endif; ?> 
        </form>
    </div>
</div>   


<script>
    function excluir(){
        let id = document.getElementById('id').value;

        if ( confirm('Deseja realmente excluir este registro?') ) {
            var ajax = new XMLHttpRequest(); 
            ajax.open("POST", "src/funcoes-processo-ambiental.php", true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
            ajax.send("id="+id+"&acao=excluir"); 
            ajax.onreadystatechange = function() { 
                if (ajax.readyState == 4 && ajax.status == 200) {
                    var data = ajax.responseText; 
                    if( data == 1 ){
                        location.href = "listar-processos-ambientais.php";
                    }
                }
            }
        }    
    }
</script>

<?php require 'footer.php';?>