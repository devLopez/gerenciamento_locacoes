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
        message: 'Processando pedido...',
        css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px',
            'border-radius': '10px',
            opacity: .5, 
            color: '#fff' 
        }
    });
});

$(document).ajaxComplete(function() {
    $.unblockUI();
});

$.ajaxSetup({
    error: function(xhr, textStatus) {
        if(xhr.status == 404) {
            msg_erro(textStatus);
        } else if(xhr.status == 500){
            msg_erro(textStatus);
        }
    }
});
//******************************************************************************