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
     * @version     v0.2.2.0
     * @since       27/03/2015
     */
    class Locacao_barracas extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.1.0.0 - 23/12/2014
         */
        public function __construct()
        {
            parent::__construct(TRUE);
            
            // Carrega o model necessário
            $this->load->model('alugueis_barracas_model', 'alugueis');
            $this->load->model('desistencias_model', 'desistencias');
            $this->load->model('periodo_locacao_model', 'locacao');
            $this->load->model('opcoes/cadastros/barracas_model', 'barracas');
            
            // Define as permissões de acesso
            $this->_permissao = array('administradores', 'atendimento');
            
            // Carrega a library para verificar as permissões do usuário
            $this->load->library('barracas_disponiveis');
            $this->load->library('login_library');
            
            // Verifica se o usuário possui a permissão
            if(!$this->login_library->verifica_permissao($this->_permissao)) {
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
                'mes_locacao'       => $this->input->post('mes_locacao', TRUE),
                'ano_locacao'       => $this->input->post('ano_locacao', TRUE)
            );
            
            $resposta = $this->locacao->salvar_periodo($periodo);
            
            if($resposta != FALSE) {
                $resposta = $this->barracas_disponiveis->montar_periodo($resposta);
            }
            
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
            if ($mes == NULL) {
                $mes = date('n');
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
         * @since       v0.2.1.0 - 03/02/2015
         * @param       int $id Recebe o ID da locação de barracas
         */
        function detalhes($id)
        {
            $this->dados['id'] = $id;
            $this->dados['locacoes']        = $this->locacao->get(NULL, NULL, $id);
            $this->dados['desistencias']    = $this->desistencias->get($id);

            $this->load->view('paginas/ajax/buscas/locacao_barracas/detalhes', $this->dados);
        }
        //**********************************************************************
        
        /**
         * editar_diretor()
         * 
         * Classe desenvolvida para editar o diretor da semana
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.2.1.0 - 03/02/2015
         */
        function editar_diretor()
        {
            $id_periodo = $this->input->post('pk', TRUE);
            
            $diretor = array(
                $this->input->post('name', TRUE)   => $this->input->post('value', TRUE)
            );
            
            echo $this->locacao->update($id_periodo, $diretor);
        }
        //**********************************************************************
        
        /**
         * editar_alugueis()
         * 
         * Função desenvolvida para edição dos dados do aluguel de um determinado
         * período
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.2.1.0 - 03/02/2015
         */
        function editar_alugueis()
        {
            $id_aluguel = $this->input->post('pk', TRUE);
            
            $aluguel = array(
                $this->input->post('name', TRUE)    => $this->input->post('value', TRUE)
            );
            
            echo $this->alugueis->update($id_aluguel, $aluguel); 
        }
        //**********************************************************************
        
        /**
         * cancelar_locacao()
         * 
         * Função desenvolvida para cancelar a locação de uma barraca
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.2.1.0 - 03/02/2015
         * @return      bool Retorna TRUE se atualizar e FALSE se não atualizar
         */
        function cancelar_locacao()
        {
            $id_aluguel = $this->input->post('id', TRUE);
            $id_periodo = $this->input->post('id_periodo_locacao');
            
            $cancelar = array(
                'id_periodo_locacao'    => $id_periodo,
                'id_usuario_logado'     => base64_decode($this->session->userdata('user_identifier')),
                'nome_socio'            => $this->input->post('nome_socio', TRUE),
                'cpf_associado'         => $this->input->post('cpf_associado', TRUE),
                'valor_credito'         => $this->input->post('valor_credito', TRUE),
                'observacoes'           => $this->input->post('observacoes', TRUE)
            );
            
            if($this->desistencias->salvar($cancelar)) {
                $aluguel = array(
                    'nome_associado'        => "",
                    'cpf_associado'         => "",
                    'telefone_associado'    => "",
                    'periodo_estadia'       => ""
                );
                
                $retorno = $this->alugueis->update($id_aluguel, $aluguel);
            } else {
                $retorno = FALSE;
            }
            
            echo json_encode($retorno);
        }
        //**********************************************************************
        
        /**
         * get_barracas_periodo()
         * 
         * Função desenvolvida para buscar as barracas cadastradas para um 
         * período
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.2.2.0 - 27/03/2015
         * @param       int $id_periodo Recebe o id do período a ser buscado
         */
        function get_barracas_periodo($id_periodo)
        {
            $this->dados['alugueis'] = $this->alugueis->get($id_periodo);
            
            $this->load->view('paginas/ajax/buscas/locacao_barracas/barracas_periodo', $this->dados);
        }
        //**********************************************************************
    }
    /** End of File locacao_barracas.php **/
    /** Location ./application/controllers/locacao_barracas.php **/