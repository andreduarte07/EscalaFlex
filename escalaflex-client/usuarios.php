<?php include "header.php"; ?>
<?php require_once "../trabalho/header.php"; ?>

    <main class="container">
         

        <!-- Tabs Para cadastrar nova unidade -->
        <ul class="nav nav-tabs my-2" role="tablist">
            <li class="nav-item">
                <a class="nav-link text-secondary tab-escala bg-gray active" id="lista-unidades-tab" href="#lista-unidades" data-toggle="tab" role="tab" aria-controls="lista-unidades" aria-selected="true">Lista de Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary tab-escala bg-gray" id="cadastrar-unidade-tab" href="#cadastrar-unidade" data-toggle="tab" role="tab" aria-controls="cadastrar-unidade" aria-selected="false">Cadastrar Usuario</a>
            </li>
        </ul>
        <div class="tab-content">
            <section class="tab-pane fade show active" id="lista-unidades" role="tabpanel" aria-labelledby="lista-unidades-tab">
                <!-- Botões para ordenar o conteúdo -->

            
            <div id="tabela">aqui</div>
            
            </section>
            <section class="tab-pane fade" id="cadastrar-unidade" role="tabpanel" aria-labelledby="cadastrar-unidade-tab">
               
                <form id="formulario" action="#" name="cadastro-unidade" method="POST">
                <input type="hidden" id="txtid">

                    <br>
                    <fieldset>
                        <legend>Dados da Unidade</legend>
             
                       
                            <div class="form-group col-12 col-md-8">
                                <label for="nome">Nome</label>
                                <input type="text" id="nome" name="nome" class="form-control" required>
                            </div>
        
                            <div class="form-group col-12 col-md-8">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
        
                            <div class="form-group col-6 col-md-8">
                                <label for="senha">Senha</label>
                                <input type="text" id="senha" name="senha" class="form-control" required>
                            </div>
        
                            <div class="form-group col-6 col-md-4">
                                <label for="status">Status</label>
                                <input type="text" id="status" name="status" class="form-control" required>
                            </div>

                            <div class="form-group col-12 col-md-4">
                                <label for="matricula">Matricula</label>
                                <input type="tel" id="matricula" name="matricula" class="form-control" required >
                            </div>
        
                    </fieldset>
                    <button class="btn btn-primary btn-block mx-auto col-4 my-5" type="submit">Enviar</button>
                </form>

            </section>
        </div>
    </main>
<?php include "footer.php"; ?>
<script src="resources/js/usuarios.js"></script>
