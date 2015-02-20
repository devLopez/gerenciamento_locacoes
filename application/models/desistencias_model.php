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
     * Desistencias_model
     * 
     * Classe desenvolvida para gerenciar as desistências de barracas no sistema
     * 
     * @package     Models
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       20/02/2015
     */
    class Desistencias_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 20/02/2015
         */
        public function __construct()
        {
            parent::__construct();
            
            $this->_tabela = 'desistencias';
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * Função desenvolvida para salvar uma nova desistência no BD
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 20/02/2015
         * @param       array   $dados Recebe os dados a serem salvos
         * @return      bool    Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar($dados)
        {
            $this->_data = $dados;
            
            return parent::salvar();
        }
        //**********************************************************************
        
        /**
         * get()
         * 
         * Realiza a busca de desistências realizadas
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 20/02/2015
         * @param       int $id_periodo_locacao Recebe o período de locação a ser
         *              buscado (parâmetro opcional)
         * @return      array Retorna um array contendo as desistencias realizadas
         */
        function get($id_periodo_locacao = NULL)
        {
            if($id_periodo_locacao) {
                $this->BD->where('id_periodo_locacao', $id_periodo_locacao);
            }
            
            return parent::get();
        }
        //**********************************************************************
    }
    /** End of File desistencias_model.php **/
    /** Location ./application/models/desistencias_model.php **/