<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
     * Locacao_barracas
     * 
     * Classe desenvolvida para gerenciar as locações de barracas realizadas no
     * sistema
     * 
     * @package     Controllers
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v0.2.0.0
     * @since       09/01/2015
     */
    class Locacao_barracas extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção do sistema
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.1.0.0 - 23/12/2014
         */
        public function __construct()
        {
            parent::__construct(TRUE);
            
            // Define as permissões de acesso
            $this->_permissao = array('administradores', 'atendimento');
            
            // Carrega a library para verificar as permissões do usuário
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
         * Função inicial da classe, responsável pela view inicial
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.1.0.0 - 23/12/2014
         */
        function index()
        {
            $this->load->view('paginas/ajax/locacao_barracas/locacao_barracas');
        }
        //**********************************************************************
        
        /**
         * combo_ano()
         * 
         * Função desenvolvida para formatar os anos disponíveis para buscar os
         * aluguéis de barracas por período
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.2.0.0 - 09/01/2015
         * @return      array Retorna um array contendo os anos a partir da 
         *              constante ANOBUILD 
         */
        function combo_ano()
        {
            $ano_build          = 2014;
            $anos['ano_atual']  = date('Y');
        
            $diferenca  = $anos['ano_atual'] - $ano_build;
            $i          = 0;
            
            do {
                $anos['anos'][$i] = $ano_build + $i;
                
                $i++;
            } while ($i == 1);
            
            
            echo json_encode($anos);
        }
        //**********************************************************************
        
        /**
         * salvar_periodo()
         * 
         * Salva um novo período de locação de barracas no banco de dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.2.0.0 - 09/01/2015
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar_pedido()
        {
            $dados['periodo_locacao'] = $this->post('periodo_locacao', TRUE);
        }
        //**********************************************************************
    }
    /** End of File locacao_barracas.php **/
    /** Location ./application/controllers/locacao_barracas.php **/