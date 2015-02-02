<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**
     * Sistema de Gerenciamento de Locações
     * 
     * Sistema desenvolvido para facilitar as locações de barracas, espaços e
     * materiais do Pentáurea Clube
     *  
     *  @package    SGL
     *  @author     Masterkey Informática
     *  @copyright	Copyright (c) 2010 - 2014, Masterkey Informática LTDA
     */
    
    if(!function_exists('app_baseurl'))
    {
        /**
         * app_baseurl()
         * 
         * Função desenvolvida para retornar para o usuário a url do projeto
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @return      string Retorna a url do projeto
         */
        function app_baseurl()
        {
            return base_url();//.'index.php?/';
        }
    }
    /** End of File appbaseurl_helper.php **/
    /** Location ./application/helpers/appbaseurl_helper.php **/