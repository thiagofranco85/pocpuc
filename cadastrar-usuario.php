<?php 

$autentica_tipo_usuario = ['Administrador'];

require 'header.php'; 
require_once __DIR__ . '/src/funcoes-administrador.php';
 
$erro_cadastrar_usuario = isset($_SESSION['erro_cadastrar_usuario']) ? $_SESSION['erro_cadastrar_usuario'] : '';
 
$arrTipoUsuario = ['Analista', 'Supervisor', 'Gestor', 'Administrador'];
$arrStatus = ['Ativo', 'Inativo']; 

$id_get = isset($_GET['id']) ? $_GET['id'] : null;

if( $id_get ){
    $usuarios = select( $id_get ); 
    $usuario = $usuarios[0];
}


$id = isset($usuario['id']) ? $usuario['id'] : '';
$nome = isset($usuario['nome']) ? $usuario['nome'] : '';
$tipo = isset($usuario['tipo']) ? $usuario['tipo'] : '';
$email = isset($usuario['email']) ? $usuario['email'] : '';
$senha = isset($usuario['senha']) ? $usuario['senha'] : '';
$status = isset($usuario['status']) ? $usuario['status'] : '';

?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Cadastrar Usuário</h1>
    
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="painel.php">Início</a></li>
        <li class="breadcrumb-item"><a href="modulo-administrador.php">Módulo Administrador</a></li>
        <li class="breadcrumb-item active">Cadastrar Usuário</li>
    </ol>
    <hr>
    
    <div class="col-lg-6">
        <small>* Campos Obrigatórios</small>
        
        <?php if( $erro_cadastrar_usuario ): ?>
            <div class="alert alert-danger">
                <?php echo $erro_cadastrar_usuario; ?>    
            </div>
        <?php endif; ?>

        <form method="POST" action="src/funcoes-administrador.php">
            <input type="hidden" name="acao" value="salvar">
            <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
            <div class="form-group">
                <label for="nome">Nome *</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome;?>">
            </div>
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>">
            </div>
            <div class="form-group">
                <label for="senha">Senha *</label>
                <input type="password" class="form-control" id="senha" name="senha" value="">
            </div>
            <div class="form-group">
                <label for="confirmarSenha">Confirmar Senha *</label>
                <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha" value="">
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de Usuário *</label>
                <select class="form-control" id="tipo" name="tipo">
                <option>Selecione o tipo de usuário</option>
                <?php 
                foreach( $arrTipoUsuario as $item ): 
                    $selected = $item == $tipo ? 'selected' : '';
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
            ajax.open("POST", "src/funcoes-administrador.php", true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
            ajax.send("id="+id+"&acao=excluir"); 
            ajax.onreadystatechange = function() { 
                if (ajax.readyState == 4 && ajax.status == 200) {
                    var data = ajax.responseText; 
                    if( data == 1 ){
                        location.href = "listar-usuario.php";
                    }
                }
            }
        }    
    }
</script>

<?php require 'footer.php';?>