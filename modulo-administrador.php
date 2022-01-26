<?php 

$autentica_tipo_usuario = ['Administrador'];

require 'header.php'; 

?>


    <div class="container-fluid px-4">
        <h1 class="mt-4">Módulo Administrador</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="painel.php">Início</a></li>
            <li class="breadcrumb-item active">Módulo Administrador</li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-black text-white mb-4">
                    <div class="card-body">Listar Usuários</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="listar-usuario.php">Acessar</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-black text-white mb-4">
                    <div class="card-body">Cadastrar Usuário</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="cadastrar-usuario.php">Acessar</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
<?php require 'footer.php';?>