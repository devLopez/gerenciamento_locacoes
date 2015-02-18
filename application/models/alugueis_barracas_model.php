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
     * Alugueis_barracas_model
     * 
     * Classe desenvolvida para gerenciar as barracas para um determinado período
     * de aluguel
     * 
     * @package     Models
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       18/02/2015
     */
    class Alugueis_barracas_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @version     v1.0.0 - 18/02/2015
         */
        public function __construct()
        {
            parent::__construct();
            
            $this->_tabela = 'alugueis_barracas';
        }
        //**********************************************************************
        
        /**
         * insert()
         * 
         * Insere um set de barracas para disponibilização  para locação em um 
         * período
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 18/02/2015
         * @param       array $barracas Recebe as barracas a serem inseridas
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function insert($barracas)
        {
            return $this->BD->insert_batch($this->_tabela, $barracas);
        }
        //**********************************************************************
    }
    /** End of File alugueis_model.php **/
    /** Location ./application/models/alugueis_model.php **/