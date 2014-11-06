<div class="well no-padding">
    <form id="login" class="smart-form client-form">
        <header class="text-center">
            Sistema de Gerenciamento de Locações &nbsp; Login
        </header>
        <fieldset>
            <section>
                <label class="label">Nome de usuário</label>
                <label class="input">
                    <i class="icon-append fa fa-user"></i>
                    <input type="text" id="usuario" name="usuario" required autofocus>
                    <b class="tooltip tooltip-top-right">
                        <i class="fa fa-user txt-color-teal"></i> 
                        Entre com seu nome de usuário
                    </b>
                </label>
            </section>
            <section>
                <label class="label">Senha</label>
                <label class="input">
                    <i class="icon-append fa fa-lock"></i>
                    <input type="password" id="senha" name="senha" maxlength="20" required />
                    <b class="tooltip tooltip-top-right">
                        <i class="fa fa-lock txt-color-teal"></i>
                        Entre com a sua Senha
                    </b>
                </label>
                <div class="note">
                    <a href="<?php echo app_baseurl().'recuperar_senha'; ?>">Esqueceu sua senha?</a>
                </div>
            </section>
        </fieldset>
        <footer>
            <button id="entrar" type="submit" class="btn btn-primary" data-loading-text="Acessando o sistema...">
                Fazer login
            </button>
        </footer>
    </form>
</div>