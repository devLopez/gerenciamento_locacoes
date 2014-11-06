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
    $.blockUI({
        css: {
            border: '3px solid #fff',
            padding: '15px',
            backgroundColor: '#000',
            'border-radius': '10px',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        },
        message: 'Processando Pedido...'
    });
});

$(document).ajaxComplete(function() {
    $.unblockUI();
});

$.ajaxSetup({
    error: function(xhr) {
        if (xhr.status === 0) {
            msg_erro('Não há conexão. verifique sua conexão');
        } else if (xhr.status == 404) {
            msg_erro('Error 404 (Not Found)');
        } else if (xhr.status == 500) {
            msg_erro('Error 500 (Internal error server).');
        }
    }
});
//******************************************************************************