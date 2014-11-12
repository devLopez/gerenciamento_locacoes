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
     * MY_Model
     * 
     * Subclasse modular padrão do sistema. Todas as variáveis protegidas que
	 * serão utilizadas pelos models são definidas aqui. Todos os models devem
	 * extender esta classe
	 * 
	 * @package    Core
	 * @author     Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access     Public
	 * @version    v1.3.0
	 * @since      12/11/2014
     */
    class MY_Model extends CI_Model
    {
        /**
         * Variável que recebe o banco de dados que será trabalhado
         *
         * @var	string
         */
        protected $BD;
        
        /**
         * Variável que recebe a tabela na qual irá trabalhar
         *
         * @var	string
         */
        protected $_tabela;
        
        /**
         * Variável que recebe a chave primária do registro que se será
         * trabalhando
         *
         * @var	int
         */
        protected $_primaria;
        
        /**
         * Variável que será usada principalmente para criar um array associativo
         * para inserir ou atualizar os dados de uma tabela
         *
         * @var array
         */
        protected $_data;
        
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        public function __construct()
        {
            //Realiza a construço da classe
            parent::__construct();
            
            //Realiza a seleção do Banco de dados
            if(ENVIRONMENT == 'development')
            {
                $this->BD = $this->load->database('default', TRUE);
            }
            else
            {
                $this->BD = $this->load->database('production', TRUE);
            }
        }
        //**********************************************************************
        
        /**
         * get()
         * 
         * Função desenvolvida para realizar buscas no banco de dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @return      mixed Retorna registros do banco de dados, geralmente
         *              array
         */
        public function get()
        {
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * Função desenvolvida para salvar um registro no banco de dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        public function salvar()
        {
            return $this->BD->insert($this->_tabela, $this->_data);
        }
        //**********************************************************************
        
        /**
         * contar()
         * 
         * Realiza a contagem dos registros de uma tabela
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @return      int Retorna a qtde de registros salvos
         */
        function contar()
        {
            return $this->BD->count_all_results($this->_tabela);
        }
        //**********************************************************************
        
        /**
         * salvar_log()
         * 
         * Função desenvolvida para criação de logs do sistema
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      public
         */
        function salvar_log($dados)
        {
            $this->BD->insert('logs', $dados);
        }
        //**********************************************************************
        
        /**
         * update()
         * 
         * Função desenvolvida para realizar um update em um determinado record
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @return      bool Retorna TRUE se atualizar e FALSE se não atualizar
         */
        function update()
        {
            return $this->BD->update($this->_tabela, $this->_data);
        }
        //**********************************************************************
    }
    /** End of File MY_Model.php **/
    /** Location ./application/core/MY_Model.php **/