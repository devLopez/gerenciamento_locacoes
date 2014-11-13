/**
 * A tela de bloqueio é responsável por exibir um formulário para que o usuário
 * possa fazer o login sem que saia do sistema
 */

$('#tela-bloqueio').fadeIn().show().html(
	'<link rel="stylesheet" type="text/javascript" href="./css/lockscreen.min.css">'+
	'<div id="main" role="main">'+
		'<form class="lockscreen animated flipInY" id="form-blockscreen">'+
			'<div class="logo">'+
				'<h1 class="semi-bold">Sistema de Gerência de Locações</h1>'+
			'</div>'+
			'<div>'+
				'<img src="./img/avatar/user.gif" alt="" width="120" height="120" />'+
				'<div>'+
					'<h1>'+
						'<i class="fa fa-user fa-3x text-muted air air-top-right hidden-mobile"></i>'+$('#nome_usuario').text()+ 
						'<small><i class="fa fa-lock text-muted"></i> &nbsp;Bloqueado</small>'+
					'</h1>'+
					'<p class="text-muted">'+
						'&nbsp'+
					'</p>'+
					'<div class="input-group">'+
						'<input class="form-control" type="password" placeholder="Senha" id="senha">'+
						'<div class="input-group-btn">'+
							'<button class="btn btn-primary" type="submit">'+
								'<i class="fa fa-key"></i>'+
							'</button>'+
						'</div>'+
					'</div>'+
					'<p class="no-margin margin-top-5">'+
						'Fazer logoff? <a href="index.php?/login/logoff"> Clique aqui</a>'+
					'</p>'+
				'</div>'+
			'</div>'+
			'<p class="font-xs margin-top-5">'+
				'Núcleo de Tecnologia do Pentáurea Clube.'+
			'</p>'+
		'</form>'+
	'</div>'
);

/**
 * Envia os dados do usuário ajax, para verificar se a senha é igual a salva
 * nos cookies de seção
 */
$('#form-blockscreen').submit(function(e){
	e.preventDefault();
	
	senha = $('#senha').val();
	
	$.ajax({
		url: 'index.php?/login/verifica_senha',
		type: 'POST',
		data: {senha: senha},
		dataType: 'html',
		success: function(e){
			if(e == true)
			{
				msg_sucesso('Desbloqueando....');
				$('#tela-bloqueio').fadeOut('slow').html('').hide();
				loadAjax(url_global, container_global);
			}
			else
			{
				msg_erro('Senha inválida');
			}
		}
	});
});
