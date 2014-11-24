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
     * @version     v1.1.0
     * @since       19/11/2014
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
        function get($id_locacao = NULL, $id_convidado = NULL)
        {
            if($id_locacao)
            {
                $this->BD->where('id_locacao_externa', $id_locacao);
            }
            if($id_convidado)
            {
                $this->BD->where('id', $id_convidado);
            }
            
            $this->BD->where('status', 1);
            $this->BD->order_by('nome_convidado');
            
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
        
        /**
         * delete()
         * 
         * Função desenvolvida para apagar o registro de um convidado
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.1.0 - 19/11/2014
         * @param       int $id Recebe o ID do registro a ser excluido
         * @return      bool Retorna TRUE se apagar e FALSE se não apagar
         */
        function delete($id)
        {
            $this->_data = array('status' => 0);
            
            $this->BD->where('id', $id);
            
            $resposta = parent::update();
            
            if ($resposta)
            {
                $logs = array(
                    'usuario'   => $_COOKIE['nome_usuario'],
                    'operacao'  => 'exclusão [TABELA: ('.$this->_tabela.')][ID REGISTRO: ('.$id.')'
                );
                
                parent::salvar_log($logs);
                
                return TRUE;
            } else {
                return FALSE;
            }
        }
        //**********************************************************************
        
        /**
         * update()
         * 
         * Realiza atualização nos registros
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.1.0 - 19/11/2014
         * @param       int     $id     Recebe o ID do registro a ser alterado
         * @param       array   $dados  Recebe os dados a serem atualizados
         */
        function update($id, $dados)
        {
            $this->_data = $dados;
            
            $this->BD->where('id', $id);
            
            $resposta = parent::update();
            
            if($resposta)
            {
                $logs = array(
                    'usuario'   => $_COOKIE['nome_usuario'],
                    'operacao'  => 'Update [TABELA: ('.$this->_tabela.')][ID REGISTRO: ('.$id.')'
                );
                
                parent::salvar_log($logs);
                
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
    }
    /** End of File convidados_model.php **/
    /** Location ./application/models/convidados_model.php **/