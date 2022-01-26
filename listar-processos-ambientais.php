<?php 
$autentica_tipo_usuario = ['Analista', 'Supervisor', 'Gestor'];
require 'header.php'; 
require_once __DIR__ . '/src/funcoes-processo-ambiental.php';

$processos = select(); 

?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Listar Processos Ambientais</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="painel.php">Início</a></li>
        <li class="breadcrumb-item"><a href="modulo-meio-ambiente.php">Módulo Meio Ambiente</a></li>
        <li class="breadcrumb-item active">Listar Processos</li>
    </ol>
    <hr>
     
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Lista de Processos Ambientais
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="stripe">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Órgão</th>
                            <th>Status</th> 
                            <th>Data Início</th>
                            <th>Data Validade</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Órgão</th>
                            <th>Status</th>
                            <th>Data Início</th>
                            <th>Data Validade</th>
                            <th>Valor</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($processos as $item): ?>
                        
                        <tr>
                            <td><?php echo $item['id'] ?></td>
                            <td><?php echo $item['nome'] ?></td>
                            <td><?php echo $item['orgao'] ?></td>
                            <td><?php echo $item['status'] ?></td> 
                            <td><?php echo date("d/m/Y", strtotime($item['dataInicio'])) ?></td>
                            <td><?php echo date("d/m/Y", strtotime($item['dataValidade'])) ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="cadastrar-processo-ambiental.php?id=<?php echo $item['id'] ?>">
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