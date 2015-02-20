/**
 * PENTAUREA.JS
 * 
 * Scripts desenvolvidos para auxiliar em diversas operações no sistema
 */

/** Define o endereço global de uma url requisitada **/
var url_global          = '';
var container_global	= '';

//Variáveis que serão utilizadadas no decorrer do sistema
$.imagens 		= window.location.protocol+'//'+window.location.hostname + '/img/';
$.sound_path	= window.location.protocol+'//'+window.location.hostname + '/sound/';

/**
 * get_data()
 * 
 * Função desenvolvida para buscar dados ou views, como por exemplo, buscas em
 * bancos de dados, para que não interfira na função loadAjax()
 * 
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @param       {string} url Contém a URL que será carregada
 * @param       {string} container Contém o elemento que receberá a resposta ajax
 */
function get_data(url, container)
{
    url_global 		= url;
    container_global	= container;
    
    if(logado() == true) {
    	if(container == undefined) {
    		container = $("#content:not(.container)");
    	}
	
    	$.get(url, function(e) {
    		container.css({opacity: "0.0"}).html(e).delay(50).animate({opacity: "1.0"}, 300);
    		drawBreadCrumb();
    	}).fail(function() {
    		container.html('<h4 class="ajax-loading-error"><i class="fa fa-warning txt-color-orangeDark"></i> Erro 404! Página ou recurso não encontrado.</h4>');
    	});
    }
}
//******************************************************************************

/**
 * msg_sucesso()
 * 
 * Função desenvolvida para exibir mensagens de sucesso no sistema
 * 
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @param       {string} msg Contém a mensagem que será exibida
 */
function msg_sucesso(msg) {
	$.mpSmallBox({
    	img: $.imagens+'osx/Finder.png',
		title: "Sucesso!",
		content: msg,
		buttons: undefined,
		closeonclick: false,
		timeout: 5000,
		notificationbar: false,
		animation: "fadeInDown fast"
	});
	
	play('sucesso');
}
//******************************************************************************

/**
 * msg_erro()
 * 
 * Função desenvolvida para exibir mensagens de erro no sistema
 * 
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @param       {string} msg Contém a mensagem que será exibida
 */
function msg_erro(msg) {
	$.mpSmallBox({
    	img: $.imagens+'osx/Public.png',
		title: "Atenção!",
		content: msg,
		buttons: undefined,
		closeonclick: false,
		timeout: 5000,
		notificationbar: false,
		animation: "fadeInDown fast"
	});
	
	play('erro');
}
//******************************************************************************

/**
 * limpar_campos()
 * 
 * Função desenvolvida para limpar campos de formulários
 * 
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @param       {string} form O nome do formulário que se deseja limpar
 */
function limpar_campos(form)
{
	form.find("input, textarea").val("").removeClass('invalid, valid');

    form.find('radio, checkbox').prop('checked', false).removeClass('invalid, valid');

    // Revove a classe 'state-error' dos campos que são obrigatórios
    form.find('label').removeClass('state-error');

    // Revove a classe 'state-success' dos campos que são obrigatórios
    form.find('label').removeClass('state-success');

    // Remove a mensagem de erro produzida pelo jQuery Validation
    form.find('em').text("");

    // Utilizado para limpar a checkbox
    select = form.find('select');
    select.find('option').each(function () {
        ($(this).val() == 0) ? $(this).prop('selected', true) : "";
    });
}
//******************************************************************************

/**
 * logoff()
 * 
 * Função desenvolvida para realizar o login
 * 
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @param       {string} url COntém a url para fazer o logoff
 */
function logoff(url)
{
	$.mpMessageBox({
		headertext: "SGL informa",
		width: "460px",
		title: "Deseja sair?",
		content: 'Você pode melhorar a segurança fechando esta aba após realizar o logoff',
		img: $.imagens + 'osx/Finder.png',
		timeout: undefined,
		draggable: false,
		buttons: "[Não][Sim]",
		animation: ""
	}, function(e) {
		if (e == "Sim") {
			$.root_.addClass('animated fadeOutUp');
            setTimeout(logout(url), 1000);
        } else {
            return false;
        }
	});
	
	play('sucesso');
}
//******************************************************************************

/**
 * logout()
 * 
 * Função desenvolvida para redirecionar para a função que faz logoff
 * 
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @param       {string} url Contém a url da função de logoff
 */
function logout(url) {
    location.href = url;
}
//******************************************************************************

/**
 * logado() 
 *
 * Função desenvolvida para verificar se o usuário está logado ou não
 *
 * @author	:	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @param	:	{string} url Contém a url que foi solicitada 
 */
function logado() {
	// Seta o nome do Cookie
	var nome_cookie = ' login=';
	
	// Recebe os cookies salvos
	var cookies	= document.cookie;
	
	// Remove a parte que não interessa dos cookies
	cookies = cookies.substr(cookies.indexOf(nome_cookie), cookies.length);
	
	// Obtém o valor do cookie até o ";"
	if (cookies.indexOf(';') != -1) {
        cookies = cookies.substr(0, cookies.indexOf(';'));
    }
	
	// Remove o nome do cookie e o sinal de =
	valor_cookie = cookies.split('=')[1];
	
	if(valor_cookie == 1)
	{
		$('#tela-bloqueio').html('').hide();
		return true;
	}
	else
	{
		loadScript('js/tela_bloqueio.js');
		return false;
	}
}
//******************************************************************************

/**
 * play()
 * 
 * Função desenvolvida para tocar um aviso sonoro durante exibição de avisos
 * 
 * @author 	Matheus Lopes Santos
 * @param	{string} som Define o arquivo de som que será tocado
 */
function play(som) {
	sound_file = (som == 'sucesso') ? 'sucesso' : 'erro';
	var d = document.createElement("audio");
    navigator.userAgent.match("Firefox/") ? d.setAttribute("src", $.sound_path +
        sound_file + ".ogg") : d.setAttribute("src", $.sound_path +
        sound_file + ".mp3"), $.get(), d.addEventListener("load",
        function() {
            d.play();
        }, !0), $.sound_on && (d.pause(), d.play());
}
//******************************************************************************

/**
 * Substitui o alert padrão do navegado pelo alertify
 */
window.alert = function (mensagem) {
    $.mpMessageBox({
		headertext: "Sistema Aliança informa",
		width: "460px",
		title: "Atenção",
		content: mensagem,
		img: $.imagens + 'osx/Finder.png',
		timeout: undefined,
		draggable: false,
		buttons: "[Ok]",
		animation: ""
	});
	
	play('erro');
};