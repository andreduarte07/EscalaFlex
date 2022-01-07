<?php include "header.php"; ?>
<?php require_once "../trabalho/header.php"; ?>

    <main class="container">
         

        <!-- Tabs Para cadastrar nova unidade -->
        <ul class="nav nav-tabs my-2" role="tablist">
            <li class="nav-item">
                <a class="nav-link text-secondary tab-escala bg-gray active" id="lista-unidades-tab" href="#lista-unidades" data-toggle="tab" role="tab" aria-controls="lista-unidades" aria-selected="true">Lista de Posições</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary tab-escala bg-gray" id="cadastrar-unidade-tab" href="#cadastrar-unidade" data-toggle="tab" role="tab" aria-controls="cadastrar-unidade" aria-selected="false">Cadastrar Posicao</a>
            </li>
        </ul>
        <div class="tab-content">
            <section class="tab-pane fade show active" id="lista-unidades" role="tabpanel" aria-labelledby="lista-unidades-tab">
                <!-- Botões para ordenar o conteúdo -->
    

            <div id="tabela">aqui</div>
            </section>
            <section class="tab-pane fade" id="cadastrar-unidade" role="tabpanel" aria-labelledby="cadastrar-unidade-tab">           
                <form action="" method="post" id="form">
                <input type="hidden" id="txtid">
                    <fieldset>
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

                        <div class="form-group col-6 col-md-8">
                                <label for="posicao">Posição</label>
                                <input type="text" id="posicao" name="posicao" class="form-control" required>
                        </div>
                                <label><input type="submit" name="cadastrar" value="Cadastrar" /></label>
                    </fieldset>
           
            </section>
        </div>
    </main>

<script src="resources/js/posicoes.js"></script>

<?php include "footer.php"; ?>