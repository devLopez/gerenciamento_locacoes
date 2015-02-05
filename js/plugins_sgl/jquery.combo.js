/** 
 * jQuery Combo
 * 
 * Plugin desenvolvido para buscar dados em formato JSON e montá-los em uma
 * selectbox
 * 
 * @file    jquery.combo.js
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version v1.0.0
 */
(function ( $ ) {
    $.fn.combo = function(url, options) {
        // Opções padrão do plugin
        var defaults = {
            selecionar: ''
        };
        
        //extende o padrão ao que foi passado
        var settings = $.extend({}, defaults, options);
        
        // Recebe o elemento
        var combo = this;
        
        // Verifica se uma url foi passada como parâmetro para busca ajax
        if(!url) {
            console.error('Nenhuma url foi passada como parâmetro');
        } else {
            $.getJSON(url).done(function(e) {
                if(!e) {
                    option = '<option>Erro ao buscar os dados</option>';
                } else {
                    option = '<option value="0">Selecione...</option>';
                    
                    for(i = 0; i < e.length; i++) {
                        option += '<option value="' + e[i].value + '">' + e[i].text + '</option>';
                    }
                    
                    combo.html(option);
                    
                    /**
                     * Caso for passado algum parâmetro em selecionar, o plugin
                     * seleciona o valor desejado e coloca como selected
                     */
                    if(settings.selecionar !== '') {
                        combo.find('option').each(function() {
                            if($(this).val() === settings.selecionar) {
                                $(this).prop('selected', true);
                            }
                        });
                    }
                }
            });
        }
    };
} (jQuery));

