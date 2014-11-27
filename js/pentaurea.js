/**
 * PENTAUREA.JS
 * 
 * Scripts desenvolvidos para auxiliar em diversas operações no sistema
 */

/** Define o endereço global de uma url requisitada **/
var url_global          = '';
var container_global	= '';

/**
 * Função que irá previnir que o menu use o elemento padrão, para que as urls 
 * do menu possam ser carregadas via ajax
 */
$('nav a[href!="#"]:not(#logoff)').click(function(e){
    e.preventDefault();
    
    href = $(this).attr('href');
    loadAjax(href);
});
//******************************************************************************

/** Função que recebe atributo href do primeiro link do menu **/
var inicio = $('nav > ul > li:first-child > a[href!="#"]').attr('href');
//******************************************************************************

/** Chamada da função loadAjax() **/
loadAjax(inicio);
//******************************************************************************

/**
 * load_ajax()
 * 
 * Função desenvolvida para buscar determinadas páginas requeridas via ajax.
 * 
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @param       {string} url Contém a URL que será carregada
 * @param       {string} container Contém o elemento que receberá a resposta ajax
 */
function loadAjax(url, container)
{
	url_global 		= url;
	container_global	= container;
	
	if (logado() == true)
	{
            /** Remove qualquer classe ativa no menu **/
	    $("nav li.active").removeClass("active");
	    
	    /**
	     * Procura no menu um elemento quee contenha a url que foi passada para setar
	     * o elemento como active, podendo assim, desenhar o breadCrumb
	     */
	    $('nav li:has(a[href="'+url+'"])').addClass("active");
            
            // Recebe o texto que está no menú
            titulo = $('nav li:has(a[href="'+url+'"])').text();
	    
	    if(container == undefined)
	    {
	        container = $("#content:not(.container)");
	    }

	    $.get(url, function(e) {
                /**
                 * Insere na barra de endereço a url que está sendo solicitada,
                 * além de inserir os dados no hitórico do browser.
                 * 
                 * @author  :   Matheus Lopes Santos <fale_com_lopez@hotmail.com>
                 * @see     :   http://www.igorescobar.com/blog/2012/05/05/mudando-a-barra-de-endereco-do-browser-sem-refresh/
                 */
                window.history.pushState('Object',titulo, url);
                
	        container.css({opacity: "0.0"}).html(e).delay(50).animate({opacity: "1.0"}, 300);
	        drawBreadCrumb();
	    }).fail(function() {
	        container.html('<h4 class="ajax-loading-error"><i class="fa fa-warning txt-color-orangeDark"></i> Erro 404! Página ou recurso não encontrado.</h4>');
	    });
	}
}
//******************************************************************************

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
    
    if(logado() == true)
    {
	if(container == undefined)
	{
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
function msg_sucesso(msg)
{
    $.smallBox({
        title: "<i class='fa fa-check'></i> Sucesso",
        content: "<strong>"+msg+"</strong>",
        iconSmall: "fa fa-thumbs-up bounce animated",
        color: "#3b5998",
        timeout: 5000
    });
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
function msg_erro(msg)
{
    $.smallBox({
        title: "<i class='fa fa-times'></i> Erro",
        content: "<strong>"+msg+"</strong>",
        iconSmall: "fa fa-thumbs-down bounce animated",
        color: "#FE1A00",
        timeout: 5000
    });
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
    form.find("input, textarea").val("");
    form.find('radio, checkbox').prop('checked', false);
    form.find('select').prop('selected', false);
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
    $.SmartMessageBox({
        title: "<i class='fa fa-sign-out txt-color-orangeDark'></i> Deseja sair <span class='txt-color-orangeDark'></span> ?",
        content: "Você pode melhorar a segurança fechando esta aba após realizar o logoff",
        buttons: '[Não][Sim]'
    }, function(e){
        if (e == "Sim") {
            $.root_.addClass('animated fadeOutUp');
            setTimeout(logout(url), 1000);
        }
        else
        {
            return false;
        }
    });
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
function logout(url)
{
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
function logado()
{
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