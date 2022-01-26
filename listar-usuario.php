<?php 

$autentica_tipo_usuario = ['Administrador'];

require 'header.php'; 
require_once __DIR__ . '/src/funcoes-administrador.php';

$processos = select(); 

?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Listar Usuário</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="painel.php">Início</a></li>
        <li class="breadcrumb-item"><a href="modulo-administrador.php">Módulo Administrador</a></li>
        <li class="breadcrumb-item active">Listar Usuário</li>
    </ol>
    <hr>
     
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Lista de Usuários
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="stripe">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Tipo</th> 
                            <th>Status</th>  
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Tipo</th> 
                            <th>Status</th> 
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($processos as $item): ?>
                        
                        <tr>
                            <td><?php echo $item['id'] ?></td>
                            <td><?php echo $item['nome'] ?></td>
                            <td><?php echo $item['email'] ?></td>
                            <td><?php echo $item['tipo'] ?></td>
                            <td><?php echo $item['status'] ?></td>  
                            <td>
                                <a class="btn btn-primary btn-sm" href="cadastrar-usuario.php?id=<?php echo $item['id'] ?>">
                            <i class="fa fa-edit"></i> Editar</a>
                            </td>
                        </tr>

                        <?php endforeach; ?>                                          
                       
                    </tbody>
                </table>
            </div>
        </div>
</div>   

<?php require 'footer.php';?>