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
     * Materiais_esportivos_model
     * 
     * Classe desenvolvida para gerenciar a locação dos materiais esportivos
     * 
     * @package     Models
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       26/11/2014
     */
    class Materiais_esportivos_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * Realiza a construção do sistema
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 16/11/2014
         */
        public function __construct()
        {
            parent::__construct();
            
            // Indica o nome da tabela
            $this->_tabela = 'emprestimos';
        }
        //**********************************************************************
        
        /**
         * buscar()
         * 
         * Função desenvolvida para buscar os empréstimos realizados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 16/11/2014
         * @param       int     $limite         Recebe o limite da consulta
         * @param       int     $offset         Recebe o offset da consulta
         * @param       string  $data_inicio    Contém a data Inicial da consulta
         * @param       string  $data_final     Contém a data Final da consulta
         * @return      array Retorna um array de registros do BD
         */
        function buscar($limite, $offset, $data_inicio, $data_final)
        {
            $this->BD->limit($limite, $offset);
            $this->BD->select('emprestimos.id, nome_tomador, localizacao_tomador, data_emprestimo, status, item');
            $this->BD->from('emprestimos, itens_esportivos');
            
            $where = "emprestimos.id_item_esportivo = itens_esportivos.id AND data_emprestimo >= '$data_inicio 00:00:00' AND data_emprestimo <= '$data_final 23:59:59' AND status = 1";
            $this->BD->where($where);
            
            return $this->BD->get()->result();
        }
        //**********************************************************************
        
        /**
         * contar()
         * 
         * Função desenvolvida para contar registros na tabela
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 16/11/2014
         * @return      int Retorna a quantidade de registros no banco
         */
        function contar()
        {
            $this->BD->where('status', 1);
            
            return parent::contar();
        }
        //**********************************************************************
    }
    /** End of File materiais_esportivos_model.php **/
    /** Location ./application/models/materiais_esportivos_model.php **/