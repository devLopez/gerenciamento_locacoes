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
     * Barracas_model
     * 
     * Classe desenvolvida para gerenciar as barracas do sistema
     * 
     * @package     Models
     * @subpackage  Opcoes
     * @subpackage  Cadastros
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.2.1
     * @since       17/12/2014
     */
    class Barracas_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 03/12/2014
         */
        public function __construct()
        {
            parent::__construct();
            
            // Define a tabela que será trabalhada
            $this->_tabela = 'barracas';
        }
        //**********************************************************************
        
        /**
         * buscar()
         * 
         * Função desenvolvida para buscar as barracas cadastradas no sistema
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.2.1 - 17/12/2014
         * @return      array Retorna as barracas cadastradas no sistema
         */
        function buscar($id = NULL)
        {
            if($id != NULL)
            {
                $where = ('barracas.id = '.$id.' and barracas.id_valor = valores.id AND status = 1');
            }
            else
            {
                $where = ('barracas.id_valor = valores.id AND status = 1');
            }
            
            $this->BD->select('barracas.id, nome_barraca, valores.valor_diaria, valores.id as id_valores');
            $this->BD->from('barracas, valores');
            $this->BD->order_by('nome_barraca');

            $this->BD->where($where);
            
            return $this->BD->get()->result();
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * Função desenvolvida para cadastrar uma nova barraca no sistema
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.1.0 - 05/12/2014
         * @param       array $barraca Recebe a barraca a ser salva
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar($barraca)
        {
            $this->_data = $barraca;
            
            return parent::salvar();
        }
        //**********************************************************************
        
        /**
         * update()
         * 
         * Função desenvolvida para realizar atualizações no banco de dados
         * 
         * @author      Matheus Lopes Santos
         * @access      Public
         * @since       v1.2.0
         * @param       int     $id     Recebe o ID do registro a ser atualizado
         * @param       array   $dados  Recebe os dados a serem atualizados
         * @return      bool Retorna TRUE se atualizar e FALSE se não atualizar
         */
        function update($id, $dados)
        {
            $this->_data = $dados;
            
            $this->BD->where('id', $id);
            
            return parent::update();
        }
        //**********************************************************************
    }
    /** End of File barracas_model.php **/
    /** Location ./application/models/opcoes/cadastros/barracas_model.php **/