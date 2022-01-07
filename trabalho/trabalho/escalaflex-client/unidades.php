<?php include "header.php"; ?>
<?php require_once "../trabalho/header.php"; ?>

    <main class="container">
         

        <!-- Tabs Para cadastrar nova unidade -->
        <ul class="nav nav-tabs my-2" role="tablist">
            <li class="nav-item">
                <a class="nav-link text-secondary tab-escala bg-gray active" id="lista-unidades-tab" href="#lista-unidades" data-toggle="tab" role="tab" aria-controls="lista-unidades" aria-selected="true">Lista de Unidades</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary tab-escala bg-gray" id="cadastrar-unidade-tab" href="#cadastrar-unidade" data-toggle="tab" role="tab" aria-controls="cadastrar-unidade" aria-selected="false">Cadastrar Unidade</a>
            </li>
        </ul>
        <div class="tab-content">
            <section class="tab-pane fade show active" id="lista-unidades" role="tabpanel" aria-labelledby="lista-unidades-tab">
                <!-- Botões para ordenar o conteúdo -->
                <div class="btn-group btn-group-sm my-3 float-right" role="group" data-toggle="buttons">
                    <button type="button" class="btn btn-orange btn-sm filter-button active" onclick="sortTableByName('categoria-coluna')">Categoria</button>
                    <button type="button" class="btn btn-light btn-sm filter-button" onclick="sortTableByName('unidade-coluna')">Unidade</button>
                    <button type="button" class="btn btn-light btn-sm filter-button" onclick="sortTableByName('endereco-coluna')">Endereço</button>
                </div>
                

                <!-- Tabela de Unidades 
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Unidade</th>
                            <th>Endereço</th>
                            <th>Semana</th>
                            <th>Sábado</th>
                            <th>Domingo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="categoria-coluna">Centro</td>
                            <td class="unidade-coluna">Rui Barbosa</td>
                            <td class="endereco-coluna">Rua Voluntários da Pátria, 282</td>
                            <td>07:30 - 20:30</td>
                            <td>07:30 - 20:00</td>
                            <td>Não abre</td>
                        </tr>
                        
                        <tr>
                            <td class="categoria-coluna">Centro</td>
                            <td class="unidade-coluna">Montaury</td>
                            <td class="endereco-coluna">Rua Dr José Montaury, 115</td>
                            <td>07:30 - 20:30</td>
                            <td>07:30 - 20:00</td>
                            <td>Não abre</td>
                        </tr>
                        
                        <tr>
                            <td class="categoria-coluna">Centro</td>
                            <td class="unidade-coluna">Praça Montevidéo</td>
                            <td class="endereco-coluna">Praça Montevidéo, 11</td>
                            <td>07:30 - 20:00</td>
                            <td>08:00 - 19:00</td>
                            <td>Não abre</td>
                        </tr>
                        
                        <tr>
                            <td class="categoria-coluna">Centro</td>
                            <td class="unidade-coluna">General Câmara</td>
                            <td class="endereco-coluna">Rua General Câmara, 102</td>
                            <td>07:30 - 20:00</td>
                            <td>07:30 - 18:30</td>
                            <td>Não abre</td>
                        </tr>
                        
                        <tr>
                            <td class="categoria-coluna">Centro</td>
                            <td class="unidade-coluna">Praça Parobé</td>
                            <td class="endereco-coluna">Rua Voluntários da Pátria, 50</td>
                            <td>07:30 - 20:30</td>
                            <td>07:30 - 20:30</td>
                            <td>Não abre</td>
                        </tr>
                        
                        <tr>
                            <td class="categoria-coluna">Centro</td>
                            <td class="unidade-coluna">Alberto Bins</td>
                            <td class="endereco-coluna">Av. Alberto Bins, 632</td>
                            <td>07:30 - 20:30</td>
                            <td>07:30 - 20:00</td>
                            <td>Não abre</td>
                        </tr>
                        
                        <tr>
                            <td class="categoria-coluna">Centro</td>
                            <td class="unidade-coluna">Andradas</td>
                            <td class="endereco-coluna">Rua dos Andradas, 1625</td>
                            <td>07:30 - 20:30</td>
                            <td>08:00 - 19:30</td>
                            <td>Não abre</td>
                        </tr>
                        
                        <tr>
                            <td class="categoria-coluna">Bairro</td>
                            <td class="unidade-coluna">Venâncio Aires</td>
                            <td class="endereco-coluna">Av. Venâncio Aires, 1211</td>
                            <td>07:30 - 20:30</td>
                            <td>08:00 - 19:30</td>
                            <td>Não abre</td>
                        </tr>
                        
                        <tr>
                            <td class="categoria-coluna">Bairro</td>
                            <td class="unidade-coluna">Cidade Baixa</td>
                            <td class="endereco-coluna">Av. Venâncio Aires, 179</td>
                            <td>08:00 - 20:30</td>
                            <td>09:00 - 20:00</td>
                            <td>09:00 - 20:00</td>
                        </tr>
                    </tbody>
                </table>
            -->
           
            <div id="tabela"> </div>
            
            </section>
            <section class="tab-pane fade" id="cadastrar-unidade" role="tabpanel" aria-labelledby="cadastrar-unidade-tab">
               
                <form id="formulario" action="#" name="cadastro-unidade" method="POST">
                    
                    <br>
                    <fieldset>
                        <legend>Dados da Unidade</legend>
             
                        <input type="hidden" id="txtid">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="categoria">Categoria da unidade</label>
                                <select name="categoria" id="categoria" class="custom-select" required>
                                    <option selected disabled>Selecione...</option>
                                    <?php
                                        $pdo     = PDOFactory::getConexao();
                                        $query = "SELECT id, descricao FROM categoria";
                                        $comando = $pdo->prepare($query);
                                        $comando->execute();
                                        while($result = $comando->fetch(PDO::FETCH_OBJ)) { ?>

                                            <option value="<?php echo $result->id;?>"><?php echo $result->descricao;  ?></option><?php

                                        }
                                    
                                    ?>
                                </select>
                            </div>
        
                            <div class="form-group col-12 col-md-8">
                                <label for="unidade">Nome da unidade</label>
                                <input type="text" id="unidade" name="unidade" class="form-control" required>
                            </div>
        
                            <div class="form-group col-6 col-md-8">
                                <label for="endereco">Endereço</label>
                                <input type="text" id="endereco" name="endereco" class="form-control" required>
                            </div>
        
                            <div class="form-group col-6 col-md-4">
                                <label for="cep">Cep</label>
                                <input type="text" id="cep" name="cep" class="form-control" required>
                            </div>
        
                            <div class="form-group col-6 col-md-8">
                                <label for="cidade">Cidade</label>
                                <input type="text" id="cidade" name="cidade" class="form-control" required>
                            </div>
                            
                            <div class="form-group col-6 col-md-4">
                                <label for="estado">Estado</label>
                                <select id="estado" name="estado" class="custom-select" required>
                                    <option value="" selected disabled>Selecione...</option>
                                    <option value="RS">Rio Grande do Sul</option>
                       
                                    <optgroup label="Outro">
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                        <option value="EX">Estrangeiro</option>
                                    </optgroup>
                                </select>
                            </div>       
                            
                            <div class="form-group col-12 col-md-8">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
        
                            <div class="form-group col-12 col-md-4">
                                <label for="telefone">Telefone</label>
                                <input type="tel" id="telefone" name="telefone" class="form-control" required placeholder="(xx) xxxx-xxxx">
                            </div>
        
        
                            <div class="form-group col-12">
                                <label for="responsavel">Responsável</label>
                                <input type="text" id="responsavel" name="responsavel" class="form-control" required>
                            </div>
                        </div>
        
                    </fieldset>
                   
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
                    </div> 
                   
                    <button class="btn btn-primary btn-block mx-auto col-4 my-5" type="submit">Enviar</button>
                </form>

            </section>
        </div>
    </main>

<?php include "footer.php"; ?>
<script src="resources/js/unidades.js"></script>
