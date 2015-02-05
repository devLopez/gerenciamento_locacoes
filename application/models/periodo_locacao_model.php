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
     * Periodo_locacao_model
     * 
     * Classe desenvolvida para gerenciar os períodos de locação de barracas
     * 
     * @package     Models
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       03/02/2015
     */
    class Periodo_locacao_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 03/02/2015
         */
        public function __construct()
        {
            parent::__construct();
            
            $this->_tabela = 'periodo_locacao';
        }
        //**********************************************************************
        
        /**
         * salvar_periodo()
         * 
         * Funçao desenvolvida para salvar um novo periodo de locaçoes no banco
         * de dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 03/02/2015
         * @param       array $periodo Recebe os dados que serao salvos
         * @return      bool Retorna TRUE se salvar e FALSE se nao salvar
         */
        function salvar_periodo($periodo)
        {
            $this->_data = $periodo;
            
            return parent::salvar();
        }
        //**********************************************************************
        
        /**
         * get()
         * 
         * Realiza buscas por períodos de locação
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 03/02/2015
         * @param       string  $mes Recebe o ano a ser buscado
         * @param       int     $ano Recebe o ano a ser buscado
         * @return      array Retorna um array com as locações no período selecionado
         */
        function get($mes = NULL, $ano = NULL, $id = NULL)
        {
            // Verifica se foi passado o mês e o ano
            if($mes && $ano) {
                $this->BD->where(array('mes_locacao' => $mes, 'ano_locacao' => $ano));
            }

            // Verifica se foi passado o ID do período
            if($id) {
                $this->BD->where('id', $id);
            }

            return parent::get();
        }
        //**********************************************************************
    }
    /** End of File periodo_locacao_model.php **/
    /** Location ./application/models/periodo_locacao_model.php **/