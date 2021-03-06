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
     * @version     v1.1.0
     * @since       24/11/2014
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
            $this->BD->where('usuario', $dados['login']);
            
            return parent::get();
        }
        //**********************************************************************
        
        /**
         * buscar_permissoes()
         * 
         * Função desenvolvida para buscar as permissões do usuário
         * 
         * 
         */
        function buscar_permissoes($id)
        {
            $query = $this->BD->query('
                SELECT nome_grupo FROM grupos_usuarios, permissoes WHERE
                permissoes.id_grupo = grupos_usuarios.id AND
                permissoes.id_usuario = '.$id.'
            ');
            
            if ($query)
            {
                return $query->result();
            }
        }
    }
    /** End of File login_model.php **/
    /** Location ./application/models/login_model.php **/