<div class="well no-padding">
    <form class="smart-form client-form" id="login" type="POST">
        <header class="text-center">
            Sistema de Gerenciamento de Locações &nbsp; Login
        </header>
        <fieldset>
            <section>
                <label class="label">Nome de usuário</label>
                <label class="input">
                    <i class="icon-append fa fa-user"></i>
                    <input type="text" id="usuario" required autofocus>
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
                    <input type="password" id="senha" required />
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
<script type="text/javascript">
    $(document).ready(function(){
    	
        /** Realiza a busca das informações de login **/
    	$('#login').submit(function(e){
        	e.preventDefault();

        	$('#entrar').button('loading');

        	//Recebe os dados para enviar para o processamento
        	dados   = 'usuario='+$('#usuario').val()+'&senha='+$('#senha').val();
            
            $.ajax({
                url: '<?php echo app_baseurl().'login/fazer_login'?>',
                type: 'POST',
                data: dados,
                dataType: 'json',
                success: function(e)
                {
                    if(e.sucesso == 1 && e.erro == '')
                    {
                        location.href = '<?php echo app_baseurl().'inicio'?>';
                    }
                    
                    if(e.erro)
                    {
                    	$('#entrar').button('reset');
                        msg_erro(e.erro);
                        return false;
                    }
                }
            });
        });
    });
</script>