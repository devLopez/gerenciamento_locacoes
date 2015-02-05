<?php if(!defined('BASEPATH')) exit ('O Acesso direto ao script não é permitido');
    /**
     * Sistema de Gerenciamento de Locações
     *
     * Sistema desenvolvido para facilitar as locações de barracas, espaços e
     * materiais do Pentáurea Clube
     *
     *  @package    SGL
     *  @author     Masterkey Informática
     *  @copyright  Copyright (c) 2010 - 2014, Masterkey Informática LTDA
     */

    /**
     * Erros
     * 
     * Classe desenvolvida para exibição de erros do sistema
     * 
     * @package     Controllers
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       04/02/2015
     */
    class Erros extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 15/01/2015
         */
        public function __construct()
        {
            parent::__construct(FALSE);
        }
        //**********************************************************************
        
        /**
         * erro_404
         * 
         * Exibe para o usuário o erro 404
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 15/01/2015
         */
        function erro_404()
        {
            $this->load->view('paginas/erros/erro_404');
        }
        //**********************************************************************
        
        /**
         * erro_500()
         * 
         * Exibe para o usuário o erro 500
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v2.0.0 - 01/02/2015
         */
        function erro_500()
        {
            $this->load->view('paginas/erros/erro_500');
        }
        //**********************************************************************
    }
    /** End of File erros.php **/
    /** Location ./application/controllers/erros.php **/