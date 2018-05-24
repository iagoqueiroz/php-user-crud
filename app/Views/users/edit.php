<section class="container user-info">
            <div class="card">
                <div class="card-header d-flex justify-content-between aligm-items-center">
                    <h4>Edição do usuário [ <?=$user->nome?> ]</h4>
                    <a href="<?=URL?>users" class="btn btn-sm btn-light float-right">Voltar</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?=URL?>users/update/<?=$user->id?>">
                        <div class="form-group row">
                            <label for="nome" class="col-2 col-form-label"><strong>Nome</strong></label>
                            <div class="col-10">
                                <input type="text" name="nome" class="form-control" id="nome" value="<?=$user->nome?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-2 col-form-label"><strong>Email</strong></label>
                            <div class="col-10">
                                <input type="text" name="email" class="form-control" id="email" value="<?=$user->email?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="senha" class="col-2 col-form-label"><strong>Senha</strong></label>
                            <div class="col-10">
                                <input type="password" name="senha" class="form-control" id="senha" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nascimento" class="col-2 col-form-label"><strong>Data de Nascimento</strong></label>
                            <div class="col-10">
                                <input type="date" name="data_nascimento" class="form-control" id="nascimento" value="<?=$user->data_nascimento?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="emissao" class="col-2 col-form-label"><strong>Emissão</strong></label>
                            <div class="col-10">
                                <input type="text" name="emissao" class="form-control" id="emissao" value="<?=$user->emissao?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="data_emissao" class="col-2 col-form-label"><strong>Data de Emissão</strong></label>
                            <div class="col-10">
                                <input type="date" name="data_emissao" class="form-control" id="data_emissao" value="<?=$user->data_emissao?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-10 offset-2">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>