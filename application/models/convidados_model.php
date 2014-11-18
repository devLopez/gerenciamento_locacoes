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
     * Convidados_model
     * 
     * Classe desenvolvida para gerenciar as operações com a tabela convidados
     * 
     * @package     Models
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       18/11/2014
     */
    class Convidados_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * Realiza a construção de classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 18/11/2014
         */
        public function __construct()
        {
            parent::__construct();
            
            // Indica a tabela que será usada
            $this->_tabela = 'convidados';
        }
        //**********************************************************************
        
        /**
         * get()
         * 
         * Função desenvolvida para buscar os convidados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 18/11/2014
         * @param       int $id Recebe o ID da locação
         * @return      mixed Retorna um array de convidados ou NULL se não 
         *              houver convidados
         */
        function get($id)
        {
            $this->BD->where('id_locacao_externa', $id);
            
            return parent::get();
        }
        //**********************************************************************
        
        /**
         * insert()
         * 
         * Função desenvolvida para inserir convidados na base de dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 18/11/2014
         * @param       array $convidados Recebe os dados dos convidados a serem
         *              inseridos
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function insert($convidados)
        {
            return $this->BD->insert_batch($this->_tabela, $convidados);
        }
        //**********************************************************************
    }
    /** End of File convidados_model.php **/
    /** Location ./application/models/convidados_model.php **/