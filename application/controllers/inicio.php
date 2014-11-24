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
     * Início
     * 
     * Classe desenvolvida para visualizar a tela principal do sistema
     * 
     * @package     Controllers
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       11/11/2014
     */
    class Inicio extends MY_Controller
    {
        protected $_permissao = array('atendimento', 'esportivo');
        /**
         * __construct()
         * 
         * Realiza a construção
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        function __construct()
        {
            parent::__construct(TRUE);
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * Função inicial da classe, responsável pela view inicial do painel do 
         * sistema
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
         function index()
         {
             $this->view    = 'inicio';
             
             $this->LoadView();
         }
         //*********************************************************************
         
         /**
          * home()
          * 
          * Função desenvolvida para exibir a view home para o usuário
          * 
          * @author     Matheus Lopes Santos <fale_com_lopez@hotmail.com>
          * @access     Public
          */
         function home()
         {
             $this->load->view('paginas/ajax/home');
         }
         //*********************************************************************
    }
    /** End if File inicio.php **/
    /** Location ./application/controllers/inicio.php **/