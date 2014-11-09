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

    /**
     * Login_model
     * 
     * Classe desenvolvida para realização do Login
     * 
     * @package     Models
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       06/11/2014
     */
    class Usuarios_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        public function __construct()
        {
            parent::__construct();
            
            // Indica a tabela principal que será trabalhada neste model
            $this->_tabela  = 'usuarios';
        }
        //**********************************************************************
        
        /**
         * usuarios_login()
         * 
         * Função desenvolvida para buscar os dados para realizar o login
         * 
         * @author      Matheus Lopes Santos
         * @access      Public
         */
        function usuarios_login($dados)
        {
            $this->BD->where('usuario', $dados['usuario']);
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
    }
    /** End of File login_model.php **/
    /** Location ./application/models/login_model.php **/