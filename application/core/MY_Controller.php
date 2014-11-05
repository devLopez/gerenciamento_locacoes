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
     * MY_Controller
     * 
     * Subclasse padrão do sistema. Todas as variáveis protegidas que serão
     * utilizadas pelos controllers são definidas aqui, além de algumas funções
     * globais. Todas os controllers devem extender a esta classe
     * 
     * @package     Core
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       05/11/2014
     */
    class MY_Controller extends CI_Controller
    {
        /**
         * Variável que receberá o template que será exibido ao usuário final
         *
         * @var string
         */
        protected $template;
        
        /**
         * Variável que receberá os dados que serão exibidos aos usuário final
         *
         * @var	string
         */
        protected $dados;
        
        /**
         * Variável que recebe a visão que será inserida no template
         *
         * @var	string
         */
        protected $view;
        
        /**
         * Variável que recebe o título que a página requisitada receberá
         *
         * @var	string
         */
        protected $titulo;
        
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @param       bool    $requer_autenticacao    Variável que irá 
         *              controlar os recursos que necessitam ou não de que o
         *              usuário esteja logado no sistema
         */
        public function __construct()
        {
            parent::__construct();
            
            //Inicia a sessão nativa do PHP
            session_start();
            
            //Seta o Template e o título da página
            $this->template = 'template/default';
            $this->titulo   = '.::Sistema de Gerenciamento de Locações::.';
            
            //Chama a função para verificação se o usuário está logado
            $this->verifica_login($requer_autenticacao);
        }
        //**********************************************************************
        
        /**
         * LoadView()
         * 
         * Função responsável por unir o template que será usado juntamente com
         * os dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        public function LoadView()
        {
            //Recebe a view que será trabalhada, juntamente com o título da página
            $this->dados['view']    = $this->view;
            $this->dados['titulo']  = $this->titulo;
            
            //Carrega a visão pelo codeigniter
            $this->load->view($this->template, $this->dados);
        }
        //**********************************************************************
        
        /**
         * verifica_login()
         * 
         * Função desenvolvida para verificar se o usuário realizou o login no
         * sistema
         * 
         * @author      Matheus Lopes Santos
         * @access      Private
         * @param       bool $requer_autenticacao Contem a variável de controle
         *              para verificar se é necessário estar logado ou não
         */
        private function verifica_login($requer_autenticacao)
        {
            if($requer_autenticacao)
            {
                if(!isset($_SESSION['user']))
                {
                    redirect(base_url().'login');
                }
            }
        }
        //**********************************************************************
    }
    /** End of File MY_Controller.php **/
    /** Location ./application/core/MY_Controller.php **/