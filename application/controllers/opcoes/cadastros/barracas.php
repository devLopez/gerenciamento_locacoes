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
     * Barracas
     * 
     * Classe desenvolvida para gerenciar as barracas disponíveis no sistema para
     * locação
     * 
     * @package     Controllers
     * @subpackage  Opcoes
     * @subpackage  Cadastros
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.1.0
     * @since       16/12/2014
     */
    class Barracas extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.1.0 - 05/12/2014
         */
        function __construct()
        {
            parent::__construct(TRUE);
            
            // Define as permissões para esta classe
            $this->_permissao = 'administradores';
            
            // Carrega o model necesário para os operações
            $this->load->model('opcoes/cadastros/barracas_model', 'm_barracas');
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
         * @since       v1.0.0 - 03/12/2014
         */
        function index()
        {
            $this->load->view('paginas/ajax/opcoes/cadastros/barracas');
        }
        //**********************************************************************
        
        /**
         * buscar_barracas()
         * 
         * Função desenvolvida para buscar as barracas cadastradas
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 03/12/2014
         */
        function buscar_barracas()
        {
            // Recebe os dados do BD
            $this->dados['barracas'] = $this->m_barracas->buscar();
            
            //Carrega a view
            $this->load->view('paginas/ajax/buscas/opcoes/cadastros/barracas', $this->dados);
        }
        //**********************************************************************
        
        /**
         * preenche_combo()
         * 
         * Função desenvolvida para preencher o combo de valores para cadastro
         * ou edição de barracas cadastradas
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.1.0 - 05/12/2014
         * @return      String Retorna uma string que preenche o combobox de 
         *              valores
         */
        function preenche_combo()
        {
            $valores = $this->m_valores->buscar();
            
            if(!$valores)
            {
                echo "<option>Não exitem valores cadastrados</option>";
            }
            else
            {
                echo "<option>Selecione uma opção...</option>";
                
                foreach ($valores as $row)
                {
                    echo "<option value='$row->id'>Valor da diária: R$$row->valor_diaria</option>";
                }
            }
        }
        //**********************************************************************
        
        /**
         * salvar_barraca()
         * 
         * Função desenvolvida para salvar uma nova barraca no sistema
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.1.0 - 05/12/2014
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar_barraca()
        {
            $barraca = array(
                'nome_barraca'  => mysql_real_escape_string($this->input->post('nome_barraca')),
                'id_valor'      => mysql_real_escape_string($this->input->post('id_valor'))
            );
            
            echo $this->m_barracas->salvar($barraca);
        }
        //**********************************************************************
        
        /**
         * excluir_barraca()
         * 
         * Função desenvolvida para excluir as barracas cadastradas no sistema
         * 
         * @author      Matheus Lopes Santos
         * @access      Public
         * @since       v1.1.0 - 16/12/2014
         * @return      bool Retorna TRUE se excluir e FALSE se não excluir
         */
        function excluir_barracas()
        {
            $id = $this->input->post('id');
            
            $dados = array('status' => 0);
                       
            echo $this->m_barracas->update($id, $dados);
        }
    }
    /** End of File barracas.php **/
    /** Location ./application/controllers/opcoes/cadastros/barracas.php **/