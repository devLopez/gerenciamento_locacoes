<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
     * Itens_esportivos_model
     * 
     * Classe desenvolvida para gerenciar os itens esportivos do sistema
     * 
     * @package     Models
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       27/11/2014
     */
    class Itens_esportivos_model extends MY_Model {
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
            parent::__construct();
            
            // Seleciona a tabela
            $this->_tabela = 'itens_esportivos';
        }
        //**********************************************************************
        
        /**
         * buscar()
         * 
         * Função desenvolvida para buscar os itens esportivos cadastrados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @return      array Retorna um array com os itens cadastrados
         */
        function buscar()
        {
            return parent::get();
        }
        //**********************************************************************
    }
    /** End of File itens_esportivos_model.php **/
    /** Location ./application/models/itens_esportivos_model.php **/