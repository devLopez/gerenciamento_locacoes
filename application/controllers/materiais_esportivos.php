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
     * Materiais_esportivos
     * 
     * Classe desenvolvida para gerenciar os empréstimos de materiais esportivos
     * do clube
     * 
     * @package     Controllers
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.1.0
     * @since       27/11/2014
     */
    class Materiais_esportivos extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 25/11/2014 
         */
        public function __construct()
        {
            parent::__construct();
            
            // Carrega o model responsável pelas transações
            $this->load->model('materiais_esportivos_model', 'm_materiais_esportivos');
            $this->load->model('itens_esportivos_model', 'm_itens_esportivos');
            
            // Define as permissões de acesso à este controller
            $this->_permissao = array('administradores', 'esportivo');
            
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
         * Função inicial da classe, desenvolvida para a visão inicial da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        function index()
        {
            $this->load->view('paginas/ajax/material_esportivo/material_esportivo');
        }
        //**********************************************************************
        
        /**
         * buscar()
         * 
         * Função desenvolvida para buscar os espréstimos feitos em uma data
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 25/11/2014
         * @param       int     $offset         Recebe o offset que será usado 
         *              nas consultas sql
         * @param       string  $data_inicial   Contém a data inicial da pesquisa
         * @param       string  $data_final     Contém a data final da pesquisa
         */
        function buscar($offset, $data_inicial, $data_final)
        {
            // Recebe o limite da consulta
            $limite = 10;
            
            // Recebe os dados
            $this->dados['emprestimos'] = $this->m_materiais_esportivos->buscar($limite, $offset, $data_inicial, $data_final);
            
            if(!$this->dados['emprestimos'] && $offset > 0)
            {
                $offset = $offset - $limite;
                $this->dados['emprestimos'] = $this->m_materiais_esportivos->buscar($limite, $offset, $data_inicial, $data_final);
            }
            
            // Configuração da paginação
            $config['base_url']     = app_baseurl().'materiais_esportivos/buscar';
            $config['per_page']     = $limite;
            $config['total_rows']   = $this->m_materiais_esportivos->contar();
            
            // Inicialização da paginação e criação dos links
            $this->pagination->initialize($config);
            $this->dados['paginacao']   = $this->pagination->create_links();
            $this->dados['verificador'] = $offset;
            
            // Carrega a visão
            $this->load->view('paginas/ajax/buscas/material_esportivo/material_esportivo', $this->dados);
        }
        //**********************************************************************
        
        /**
         * combo_materiais_esportivos()
         * 
         * Função desenvolvida para buscar os materiais esportivos cadastrados
         * para preencher uma combobox
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.1.0 - 27/11/2014
         */
        function combo_materiais_esportivos()
        {
            $itens_esportivos = $this->m_itens_esportivos->buscar();
            
            if($itens_esportivos)
            {
                echo "<option>Selecione uma opção</option>";
                
                foreach ($itens_esportivos as $row)
                {
                    echo "<option value='$row->id'>$row->item</option>";
                }
            }
            else
            {
                echo "Não há itens cadastrados";
            }
        }
        //**********************************************************************
        
        /**
         * salvar_emprestimo()
         * 
         * Função desenvolvida para salvar um novo empréstimo de material
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.1.0 - 27/11/2014
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar_emprestimo()
        {
            $dados = array(
                'nome_tomador'          => mysql_real_escape_string($this->input->post('nome_tomador')),
                'localizacao_tomador'   => mysql_real_escape_string($this->input->post('localizacao_tomador')),
                'id_item_esportivo'     => mysql_real_escape_string($this->input->post('id_item_esportivo')),
                'status'                => 1
            );
            
            echo $this->m_materiais_esportivos->salvar($dados);
        }
        //**********************************************************************
        
        /**
         * processar_comando()
         * 
         * Função desenvolvida para processar diversos comandos solicitados pelo
         * usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.1.0 - 27/11/2014
         * @return      mixed Retorna um tipo diferente, dependendo da ação do 
         *              usuário
         */
        function processar_comando()
        {
            $acao   = $this->input->post('acao');
            $id     = $this->input->post('id');
            
            switch ($acao)
            {
                case 'devolver':
                    $dados = array('status' => 0);
                    echo $this->m_materiais_esportivos->update($id, $dados);
                    break;
                default :
                    echo "Não implementado";
                    break;
            }
        }
        //**********************************************************************
    }
    /** End of File materiais_esportivos.php **/
    /** Location ./application/controllers/materiais_esportivos.php **/