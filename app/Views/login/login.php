        <section class="h-100 my-login-page">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title">Login</h4>
                                <form method="POST" action="<?=URL?>login/authenticate">
                                
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input id="email" type="email" class="form-control" name="email" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Senha</label>
                                        <input id="password" type="password" class="form-control" name="password" required>
                                    </div>

                                    <div class="form-group no-margin">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Entrar
                                        </button>
                                    </div>
                                    <div class="margin-top20 text-center">
                                        Não tem uma conta? <a href="<?=URL?>login/register">Registre-se</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="footer">
                            MVC User Application - Iago Queiroz
                        </div>
                    </div>
                </div>
            </div>
        </section>