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
     * @version     v1.2.0
     * @since       28/11/2014
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
            
            $where = "emprestimos.id_item_esportivo = itens_esportivos.id AND data_emprestimo >= '$data_inicio 00:00:00' AND data_emprestimo <= '$data_final 23:59:59'";
            $this->BD->where($where);
            $this->BD->order_by('data_emprestimo');
            
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
            return parent::contar();
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * Função desenvolvida para salvar um novo empréstimo no banco de dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.1.0 - 27/11/2014
         * @param       array   $dados Recebe os dados para o novo empréstimo
         * @return      bool    Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar($dados)
        {
            $this->_data = $dados;
            return parent::salvar();
        }
        //**********************************************************************
        
        /**
         * update()
         * 
         * Função desenvolvida para realizar alterações nos empréstimos realizados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.1.0 - 27/11/2014
         * @param       int     $id     Recebe o ID do registro a ser alterado
         * @param       array   $dados  Recebe os dados que serão atualizados
         * @return      bool    Retorna TRUE se alterar e FALSE se não alterar
         */
        function update($id, $dados)
        {
            $this->_data        = $dados;
            $this->BD->where('id', $id);
            
            $resposta = parent::update();
            
            if ($resposta)
            {
                $logs = array(
                    'usuario'   => $_COOKIE['nome_usuario'],
                    'operacao'  => 'alteração [TABELA: ('.$this->_tabela.')][ID REGISTRO: ('.$id.')'
                );
                
                parent::salvar_log($logs);
                
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        //**********************************************************************
        
        /**
         * buscar_by_id()
         * 
         * Função desenvolvida para buscar os dados de um empréstimos pelo id
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.2.0 - 28/11/2014
         * @param       int     $id Recebe o ID do registro a ser buscado
         * @return      array   retorna um array com os dados do registro
         */
        function buscar_by_id($id)
        {
            $this->BD->where('id', $id);
            return parent::get();
        }
        //**********************************************************************
    }
    /** End of File materiais_esportivos_model.php **/
    /** Location ./application/models/materiais_esportivos_model.php **/