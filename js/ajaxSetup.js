/* 
 * ajaxSetup.js
 * 
 * Arquivo desenvolvido para abrigar as funções de exibição de mensagens nas 
 * requisições ajax
 * 
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version     v1.0.0
 */
/** Configurações utilizadas no ajax **/
$(document).ajaxStart(function() {
	show_loading();
});

$(document).ajaxComplete(function() {
    hide_loading();
});

$.ajaxSetup({
    error: function() {
        msg_erro('Ocorreu um erro. Tente novamente');
    }
});
//******************************************************************************

/**
 * show_loading()
 * 
 * Função desenvolvida para exibir o elemento Loading
 * 
 * @author	:	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 */
function show_loading()
{
    $('.carregando, .carregando-backdrop').fadeIn('fast');
}
//******************************************************************************

/**
 * hide_loading()
 * 
 * Função desenvolvida para esconder o elemento Loading
 * 
 * @author	:	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 */
function hide_loading()
{
    $('.carregando, .carregando-backdrop').fadeOut('slow');
}
//******************************************************************************