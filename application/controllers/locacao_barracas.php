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
     * @version     v0.2.1.0
     * @since       03/02/2015
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
            
            // Carrega o model necessário
            $this->load->model('periodo_locacao_model', 'locacao');
            
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
         * salvar_periodo()
         * 
         * Salva um novo período de locação de barracas no banco de dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.2.1.0 - 03/02/2015
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar_periodo()
        {            
            $periodo = array(
                'periodo_locacao'   => $this->input->post('periodo_locacao', TRUE),
                'diretor_semana'    => $this->input->post('diretor_semana', TRUE),
                'mes_locacao'       => nome_mes(),
                'ano_locacao'       => date('Y')
            );
            
            $resposta = $this->locacao->salvar_periodo($periodo);
            
            echo json_encode($resposta);
        }
        //**********************************************************************
        
        /**
         * buscar_periodos_cadastrados()
         * 
         * Função desenvolvida para buscar os períodos cadastrados no sistema
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.2.1.0 - 03/02/2015
         */
        function buscar_periodos_cadastrados($mes = NULL, $ano = NULL)
        {
            if (!$mes) {
                $mes = nome_mes();
            } elseif ($ano == NULL) {
                $ano = date('Y');
            }
            
            $this->dados['locacoes'] = $this->locacao->get($mes, $ano);
            $this->load->view('paginas/ajax/buscas/locacao_barracas/locacoes_realizadas', $this->dados);
        }
        //**********************************************************************

        /**
         * detalhes()
         *
         * Realiza a busca dos detalhes de um período de locações cadastrados
         *
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v2.1.0 - 03/02/2015
         * @param       int $id Recebe o ID da locação de barracas
         */
        function detalhes($id)
        {
            $this->dados['locacoes'] = $this->locacao->get(NULL, NULL, $id);

            $this->load->view('paginas/ajax/buscas/locacao_barracas/detalhes', $this->dados);
        }
        //**********************************************************************
    }
    /** End of File locacao_barracas.php **/
    /** Location ./application/controllers/locacao_barracas.php **/