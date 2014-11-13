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
     * Login
     * 
     * Classe desenvolvida para realização do login
     * 
     * @package     Controllers
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       06/11/2014
     */
    class Login extends MY_Controller
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
            parent::__construct(FALSE);
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * Função padrão da classe, responsável pela view inicial
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        function index()
        {
            $this->view     = 'login';
            $this->titulo   = '.::SGL - Login::.';
            $this->template = 'template/login';
            
            $this->LoadView();
        }
        //**********************************************************************
        
        /**
         * fazer_login()
         * 
         * Função desenvolvida para fazer login no sistema
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        function fazer_login()
        {
            $dados['login']  = $this->input->post('usuario');
            $dados['senha']  = $this->input->post('senha');
            
            // Realiza o Load da library necessária para o login
            $this->load->library('login_library');
            
            echo json_encode($this->login_library->logar($dados));
        }
        //**********************************************************************
        
        /**
         * logoff
         * 
         * Função desenvolvida para realizar o logoff do sistema
         * 
         * @author      Matheus Lopes Santos
         * @access      Public
         */
        function logoff()
        {
            setcookie('nome_usuario');
            setcookie('user_pass');
            setcookie('login');
            
            redirect(app_baseurl().'login');
        }
        //**********************************************************************       
        
        /**
         * verifica_senha()
         * 
         * Verifica a senha do usuário, caso a seção seja morta, para que a mesma
         * seja renovada
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @return      bool Retorna TRUE se a senha for correta e FALSE se o
         *              usuário errar a senha
         */
        function verifica_senha()
        {
            $senha          = $this->input->post('senha');
            $senha_salva    = $_COOKIE['user_pass'];
            
            if(password_verify($senha, $senha_salva))
            {
                echo TRUE;
                setcookie('login', TRUE, time()+3600);
            }
            else
            {
                echo FALSE;
            }
        }
        //**********************************************************************
    }
    /** End of File login.php **/
    /** Location ./application/controllers/login.php **/