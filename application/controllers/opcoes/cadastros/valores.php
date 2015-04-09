<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**
     * Sistema de Gerenciamento de Locações
     * 
     * Sistema desenvolvido para facilitar as locações de barracas, espaços e
     * materiais do Pentáurea Clube
     *  
     * @package     SGL
     * @author      Masterkey Informática
     * @copyright   Copyright (c) 2010 - 2014, Masterkey Informática LTDA
     */

    /**
     * Valores
     * 
     * Classe desenvolvida para realizar a gerencia de valores que serão 
     * associados às barracas cadastradas no sistema
     * 
     * @package     Controllers
     * @subpackage  Opcoes
     * @subpackage  Cadastros
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v0.1.0.0
     * @since       05/12/2014
     */
    class Valores extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção do sistema
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.1.0.0 - 05/12/2014
         */
        public function __construct()
        {
            parent::__construct(TRUE);
            
            // Seta a permissão necessária
            $this->_permissao = 'administradores';
            
            // Carrega o model necessário para as operações
            $this->load->model('opcoes/cadastros/valores_model', 'm_valores');
            
            // Carrega library para verificar as permissões de usuário
            $this->load->library('login_library');
            
            // Verifica se o usuário possui a permissão
            if(!$this->login_library->verifica_permissao($this->_permissao))
            {
                $this->dados['erro'] = "Você não possui permissão para acessar este módulo";
                $this->load->view('paginas/erros/erro_permissao', $this->dados);
            }
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * Função principal da classe, responsável pela view inicial
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.1.0.0 - 05/12/2014
         * @todo        Desenvolver o restante da função
         */
        function index()
        {
            
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * Função desenvolvida para salvar novos valores no banco de dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.1.0.0 - 05/12/2014
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar()
        {
            $dados = array(
                'valor_diaria'  => $this->input->post('valor_diaria')
            );
            
            echo $this->m_valores->salvar($dados);
        }
        //**********************************************************************
    }
    /** End of File valores.php **/
    /** Location ./application/controllers/opcoes/cadastros/valores.php **/
