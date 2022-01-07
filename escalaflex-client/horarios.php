<?php include "header.php"; ?>
<?php require_once "../trabalho/header.php"; ?>

    <main class="container">
         

        <!-- Tabs Para cadastrar nova unidade -->
        <ul class="nav nav-tabs my-2" role="tablist">
            <li class="nav-item">
                <a class="nav-link text-secondary tab-escala bg-gray active" id="lista-unidades-tab" href="#lista-unidades" data-toggle="tab" role="tab" aria-controls="lista-unidades" aria-selected="true">Lista de Horarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary tab-escala bg-gray" id="cadastrar-unidade-tab" href="#cadastrar-unidade" data-toggle="tab" role="tab" aria-controls="cadastrar-unidade" aria-selected="false">Cadastrar Horarios</a>
            </li>
        </ul>
        <div class="tab-content">
            <section class="tab-pane fade show active" id="lista-unidades" role="tabpanel" aria-labelledby="lista-unidades-tab">
                
           
            <div id="tabela"></div>
            
            </section>
            <section class="tab-pane fade" id="cadastrar-unidade" role="tabpanel" aria-labelledby="cadastrar-unidade-tab">
               
                <form id="formulario" action="#" name="cadastro-unidade" method="POST">
                <input type="hidden" id="txtid">

                     <div class="row justify-content-between pb-4">
                        <fieldset class="col-12 col-md-4 campo-horario">
                            <legend>Horário Semanal</legend>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="abertura-semanal">Abertura</label>
                                    <input type="time" id="abertura-semanal" name="abertura-semanal" class="form-control" required>
                                    
                                    
                                </div>
        
                                <div class="form-group col-6">
                                    <label for="fechamento-semanal">Fechamento</label>
                                    <input type="time" id="fechamento-semanal" name="fechamento-semanal" class="form-control" required>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset class="col-12 col-md-4 campo-horario">
                            <legend id="cod" value="1">Horário aos Sábados</legend>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="abertura-sabados">Abertura</label>
                                    <input type="time" id="abertura-sabados" name="abertura-sabados" class="form-control">
                                </div>
        
                                <div class="form-group col-6">
                                    <label for="fechamento-sabados">Fechamento</label>
                                    <input type="time" id="fechamento-sabados" name="fechamento-sabados" class="form-control">
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset class="col-12 col-md-4 campo-horario">
                            <legend>Horário aos Domingos</legend>
        
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="abertura-domingos">Abertura</label>
                                    <input type="time" id="abertura-domingos" name="fechamento-domingos" class="form-control">
                                </div>
        
                                <div class="form-group col-6">
                                    <label for="fechamento-domingos">Fechamento</label>
                                    <input type="time" id="fechamento-domingos" name="fechamento-domingos" class="form-control">
                                </div>
                            </div>
                        </fieldset>
                        <select name="unidade" id="unidade" class="custom-select" required>
                                <option selected disabled>Selecione...</option>
                                    <?php
                                        $pdo     = PDOFactory::getConexao();
                                        $query = "SELECT idUnidade, nome FROM unidades";
                                        $comando = $pdo->prepare($query);
                                        $comando->execute();
                                        while($result = $comando->fetch(PDO::FETCH_OBJ)) { ?>

                                            <option name="unidade" value="<?php echo $result->idUnidade;?>"><?php echo $result->nome;  ?></option><?php
                                        }             
                                    ?>
                        </select>

                    </div> 
                    
                    <button class="btn btn-primary btn-block mx-auto col-4 my-5" type="submit">Enviar</button>
                </form>

            </section>
        </div>
    </main>
<?php include "footer.php"; ?>
<script src="resources/js/horarios.js"></script>
