<?php 

$autentica_tipo_usuario = ['Analista', 'Supervisor', 'Gestor'];
require 'header.php'; 

?>


    <div class="container-fluid px-4">
        <h1 class="mt-4">Módulo Meio Ambiente</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="painel.php">Início</a></li>
            <li class="breadcrumb-item active">Módulo Meio Ambiente</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Listar Processos Ambientais</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="listar-processos-ambientais.php">Acessar</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Cadastrar Processo Ambiental</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="cadastrar-processo-ambiental.php">Acessar</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
<?php require 'footer.php';?>