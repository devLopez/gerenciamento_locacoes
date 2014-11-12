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
     * Locacao_externa_model
     * 
     * Modelo desenvolvido para gerenciar as transações envolvendo a tabela
     * `locacao_externa`
     * 
     * @package     Models
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.1.0
     * @since       12/11/2014
     */
    class Locacao_externa_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        function __construct()
        {
            parent::__construct();
            
            // Indica a tabela que iremos trabalhar
            $this->_tabela  = 'locacao_externa';
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * Função desenvolvida para salvar uma nova locação
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @param       array   $dados Contém os dados que serão salvos
         * @return      bool    Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar($dados)
        {
            $this->_data = $dados;
            return parent::salvar();
        }
        //**********************************************************************
        
        /**
         * buscar()
         * 
         * Função desenvolvida para realizar buscas no BD
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @param       int $limite Contém o limite da busca
         * @param       int $offset Contém o offset da busca
         * @return      array Retorna um array com os registros do BD
         */
        function buscar($limite, $offset)
        {
            $this->BD->limit($limite, $offset);
            $this->BD->order_by('data');
            
            return parent::get();
        }
        //**********************************************************************
        
        /**
         * contar()
         * 
         * Função desenvolvida para contar a quantidade de registros no BD
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @return      int Retorna a qtde de registros no BD
         */
        function contar()
        {
            return parent::contar();
        }
        //**********************************************************************
    }
    /** End of File locacao_externa_model.php **/
    /** Location ./application/models/locacao_externa_model.php **/