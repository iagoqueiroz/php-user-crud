        <section class="container user-info">
            <div class="card">
                <div class="card-header d-flex justify-content-between aligm-items-center">
                    <h4>Informação do usuário [ <?=$user->nome?> ]</h4>
                    <a href="<?=URL?>users" class="btn btn-sm btn-light float-right">Voltar</a>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="staticNome" class="col-2 col-form-label"><strong>Nome</strong></label>
                            <div class="col-10">
                                <input type="text" class="form-control-plaintext" readonly id="staticNome" value="<?=$user->nome?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-2 col-form-label"><strong>Email</strong></label>
                            <div class="col-10">
                                <input type="text" class="form-control-plaintext" readonly id="staticEmail" value="<?=$user->email?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticSenha" class="col-2 col-form-label"><strong>Senha</strong></label>
                            <div class="col-10">
                                <input type="text" class="form-control-plaintext" readonly id="staticSenha" value="********">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticNascimento" class="col-2 col-form-label"><strong>Data de Nascimento</strong></label>
                            <div class="col-10">
                                <input type="text" class="form-control-plaintext" readonly id="staticNascimento" value="<?=$user->data_nascimento?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmissao" class="col-2 col-form-label"><strong>Emissão</strong></label>
                            <div class="col-10">
                                <input type="text" class="form-control-plaintext" readonly id="staticEmissao" value="<?=$user->emissao?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticDataEmissao" class="col-2 col-form-label"><strong>Data de Emissão</strong></label>
                            <div class="col-10">
                                <input type="text" class="form-control-plaintext" readonly id="staticDataEmissao" value="<?=$user->data_emissao?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>