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
     * @version     v1.3.0
     * @since       17/11/2014
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
            
            // Carrega o model necessário para as transações com o BD
            $this->load->model('locacao_externa_model', 'locacao_externa');
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
            $this->load->view('paginas/ajax/locacoes_externas');
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
            
            echo $this->locacao_externa->salvar($locacao);
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
            $this->dados['locacoes']    = $this->locacao_externa->buscar($limite, $offset);
            if (!$this->dados['locacoes'] && $offset > 0) {
                $offset = $offset - $limite;
                $this->dados['locacoes']    = $this->locacao_externa->buscar($limite, $offset);
            }
            
            //Configurações da paginação
            $config['base_url']     = app_baseurl().'locacao_externa/buscar';
            $config['per_page']     = $limite;
            $config['total_rows']   = $this->locacao_externa->contar();
            
            //Inicializa a paginação e cria os links
            $this->pagination->initialize($config);
            $this->dados['paginacao']   = $this->pagination->create_links();
            $this->dados['verificador'] = $offset;
            
            //Chama a view
            $this->load->view('paginas/ajax/buscas/locacao_externa', $this->dados);
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
                    echo $this->locacao_externa->apagar($id);
                    break;
                case 'editar':
                    $this->dados['locacao'] = $this->locacao_externa->buscar(1, 0, $id);
                    $this->load->view('paginas/ajax/editar/locacao_externa', $this->dados);
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
            echo $this->locacao_externa->atualizar($id, $locacao);
        }
    }
    /** End of File locacao_externa.php **/
    /** Location ./application/controllers/locacao_externa.php **/