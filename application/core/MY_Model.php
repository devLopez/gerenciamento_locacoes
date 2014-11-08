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
	 * @version    v1.0.0
	 * @since      05/11/2014
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
            parent::_construct();
            
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
    }
    /** End of File MY_Model.php **/
    /** Location ./application/core/MY_Model.php **/