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
     * Locacao_externa
     * 
     * Classe desenvolvida para gerenciar as locações externas do clube
     * 
     * @package     Controllers
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.5.0
     * @since       19/11/2014
     */
    class Locacao_externa extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos
         * @access      Public
         */
        public function __construct()
        {
            parent::__construct(TRUE);
            
            // Define as permissões de acesso desta classe
            $this->_permissao = array('administradores', 'atendimento');
            
            // Carrega o model necessário para as transações com o BD
            $this->load->model('locacao_externa_model', 'm_locacao_externa');
            $this->load->model('convidados_model', 'convidados');
            
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
         * Função principal da classe, responsável pela visualização das 
         * locações cadastradas
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        function index()
        {
            $this->load->view('paginas/ajax/locacao/locacoes_externas');
        }
        //**********************************************************************
        
        /**
         * salvar_locacao()
         * 
         * Função desenvolvida para salvar uma locação no banco de dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar_locacao()
        {
            $locacao = array(
                'instituicao'       => mysql_real_escape_string($this->input->post('instituicao')),
                'responsavel'       => mysql_real_escape_string($this->input->post('responsavel')),
                'cpf_cnpj'          => mysql_real_escape_string($this->input->post('cpf_cnpj')),
                'telefone'          => mysql_real_escape_string($this->input->post('telefone')),
                'email'             => mysql_real_escape_string($this->input->post('email')),
                'data'              => mysql_real_escape_string($this->input->post('data')),
                'espaco_necessario' => mysql_real_escape_string($this->input->post('espaco_necessario'))
            );
            
            echo $this->m_locacao_externa->salvar($locacao);
        }
        //**********************************************************************
        
        /**
         * buscar()
         * 
         * Função desenvolvida para buscar os aluguéis cadastrados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @param       int $offset Define o offset da consulta sql
         */
        function buscar($offset = 0)
        {
            //Define o limite da busca sql
            $limite = 10;
            
            //Recebe os dados do Banco de dados
            $this->dados['locacoes']    = $this->m_locacao_externa->buscar($limite, $offset);
            if (!$this->dados['locacoes'] && $offset > 0) {
                $offset = $offset - $limite;
                $this->dados['locacoes']    = $this->m_locacao_externa->buscar($limite, $offset);
            }
            
            //Configurações da paginação
            $config['base_url']     = app_baseurl().'locacao_externa/buscar';
            $config['per_page']     = $limite;
            $config['total_rows']   = $this->m_locacao_externa->contar();
            
            //Inicializa a paginação e cria os links
            $this->pagination->initialize($config);
            $this->dados['paginacao']   = $this->pagination->create_links();
            $this->dados['verificador'] = $offset;
            
            //Chama a view
            $this->load->view('paginas/ajax/buscas/locacao/locacao_externa', $this->dados);
        }
        //**********************************************************************
        
        /**
         * operacoes()
         * 
         * Função desenvolvida para alterar ou excluir um registro
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        function operacoes()
        {
            $acao   = $this->input->post('acao');
            $id     = $this->input->post('id');
            
            switch ($acao)
            {
                case 'excluir':
                    echo $this->m_locacao_externa->apagar($id);
                    break;
                case 'editar':
                    $this->dados['locacao'] = $this->m_locacao_externa->buscar(1, 0, $id);
                    $this->load->view('paginas/ajax/editar/locacao/locacao_externa', $this->dados);
                    break;
                default:
                    echo 'Nenhuma ação foi passada';
            }
        }
        //**********************************************************************
        
        /**
         * atualizar_locacao()
         * 
         * Função desenvolvida para atualizar os dados de uma locação
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.3.0 - 17/11/2014
         * @return      bool Retorna TRUE se atualizar e FALSE se não atualizar
         */
        function atualizar_locacao() {
            // Recebe o ID do registro
            $id = $this->input->post('id');
            
            // Recebe os outros dados do registro
            $locacao = array(
                'instituicao'       => mysql_real_escape_string($this->input->post('e_instituicao')),
                'responsavel'       => mysql_real_escape_string($this->input->post('e_responsavel')),
                'cpf_cnpj'          => mysql_real_escape_string($this->input->post('e_cpf_cnpj')),
                'telefone'          => mysql_real_escape_string($this->input->post('e_telefone')),
                'email'             => mysql_real_escape_string($this->input->post('e_email')),
                'data'              => mysql_real_escape_string($this->input->post('e_data')),
                'espaco_necessario' => mysql_real_escape_string($this->input->post('e_espaco_necessario'))
            );
            
            // Executa a ação
            echo $this->m_locacao_externa->atualizar($id, $locacao);
        }
        //**********************************************************************
        
        /**
         * detalhes_locacao()
         * 
         * Função desenvolvida para exibição dos detalhes da locação. Neste
         * espaço, poderão ser inseridos os nomes dos convidados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.4.0 - 17/11/2014
         * @param       int $id     Contém o ID do registro a ser buscado
         */
        function detalhes_locacao($id)
        {
            $this->dados['locacao'] = $this->m_locacao_externa->buscar(1, 0, $id);
            
            $this->load->view('paginas/ajax/locacao/detalhes_locacao', $this->dados);
        }
        //**********************************************************************
        
        /**
         * buscar_convidados()
         * 
         * Função desenvolvida para buscar os convidados de um evento
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.4.0 - 17/11/2014
         * @param       int $id Recebe o id do evento
         */
        function buscar_convidados($id)
        {
            // Recebe os dados do BD
            $this->dados['convidados'] = $this->convidados->get($id);
            
            // Chama a visão
            $this->load->view('paginas/ajax/buscas/locacao/convidados', $this->dados);
        }
        //**********************************************************************
        
        /**
         * salvar_convidados()
         * 
         * Função desenvolvida para salvar convidados de um evento na base de
         * dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.4.0 - 17/11/2014
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar_convidados()
        {
            $id_locacao_externa = $this->input->post('id_locacao_externa');
            $nome_convidado     = $this->input->post('nome_convidado');
            $cpf                = $this->input->post('cpf');
            
            if(is_array($nome_convidado) && is_array($cpf))
            {
                for ($i = 0; $i < count($nome_convidado); $i++)
                {
                    $dados[$i]['id_locacao_externa']    = $id_locacao_externa; 
                    $dados[$i]['nome_convidado']        = $nome_convidado[$i];
                    $dados[$i]['cpf']                   = $cpf[$i];
                }
                
                echo $this->convidados->insert($dados);
            }
        }
        //**********************************************************************
        
        /**
         * acoes_convidados()
         * 
         * Função desenvolvida para executar ações sobre os convidados de um 
         * evento
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.4.1 - 19/11/2014
         * @return      bool Retorna TRUE se executar corretamente e FALSE se
         *              falhar
         */
        function acoes_convidados()
        {
            //Recebe os dados passados via post
            $id     = $this->input->post('id');
            $acao   = $this->input->post('acao');
            
            switch ($acao)
            {
                case 'excluir':
                    echo $this->convidados->delete($id);
                    break;
                case 'editar':
                    $this->dados['convidado'] = $this->convidados->get(NULL, $id);
                    $this->load->view('paginas/ajax/editar/locacao/convidados', $this->dados);
                    break;
                default:
                    echo 'Ação Não suportada';
                    break;
            }
        }
        //**********************************************************************
        
        /**
         * atualizar_convidado()
         * 
         * Função desenvolvida para atualizar os dados de um convidado
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.4.1 - 19/11/2014
         * @return      bool Retorna TRUE se atualizar e FALSE se não atualizar
         */
        function atualizar_convidado()
        {
            $id = $this->input->post('id');
            $dados = array(
                'nome_convidado'    => mysql_real_escape_string($this->input->post('e_nome_convidado')),
                'cpf'               => $this->input->post('e_cpf')
            );
            
            echo $this->convidados->update($id, $dados);
        }
        //**********************************************************************
        
        /**
         * impressao_lista()
         * 
         * Função desenvolvida para imprimir a lista de convidados de um evento
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.5.0 - 21/11/2014
         * @param       int $id_evento Recebe o ID do evento a ser buscado
         */
        function impressao_lista($id_evento)
        {
            $this->dados['evento']      = $this->m_locacao_externa->buscar(1, 0, $id_evento);
            $this->dados['convidados']  = $this->convidados->get($id_evento);
            
            $this->load->view('paginas/ajax/buscas/locacao/impressao_lista', $this->dados);
        }
        //**********************************************************************
    }
    /** End of File locacao_externa.php **/
    /** Location ./application/controllers/locacao_externa.php **/