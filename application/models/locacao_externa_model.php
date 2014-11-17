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
     * @version     v1.2.0
     * @since       17/11/2014
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
            
            $resposta = parent::salvar();
            
            if($resposta)
            {
                // Cria um novo log do sistema
                $logs = array(
                    'usuario'   => $_COOKIE['nome_usuario'],
                    'operacao'  => 'inserção (locação externa)-> '.$dados['instituicao'].' - '.$dados['responsavel'].' - '.date('d/m/Y', strtotime($dados['data'])).''
                );
                parent::salvar_log($logs);
                
                return TRUE;
            }
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
         * @param       int $id     Contém o ID de um registro a ser buscado
         * @return      array Retorna um array com os registros do BD
         */
        function buscar($limite, $offset, $id = NULL)
        {
            if($id)
            {
                $this->BD->where('id', $id);
            }
            
            $this->BD->limit($limite, $offset);
            $this->BD->where('status', 1);
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
        
        /**
         * apagar()
         * 
         * Função desenvolvida para apagar uma locação
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @param       int $id Contém o ID do registro a ser atualizado
         * @return      bool Retorna TRUE se atualizar e FALSE se não atualizar
         */
        function apagar($id)
        {
            $this->_data = array('status' => 0);
            
            $this->BD->where('id', $id);
            
            $resposta = parent::update();
            
            if($resposta)
            {
                // Cria um novo log do sistema
                $logs = array(
                    'usuario'   => $_COOKIE['nome_usuario'],
                    'operacao'  => 'exclusão (locação externa)-> ID REGISTRO -> '.$id.''
                );
                parent::salvar_log($logs);
                
                return TRUE;
            }
        }
        
        /**
         * atualizar()
         * 
         * Função desenvolvida para atualizar os dados de uma locação
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.2.0 - 17/11/2014
         * @param       int     $id     Contém o ID do registro a ser alterado
         * @param       array   $dados  Contém os dados que serão atualizados
         * @return      bool Retorna TRUE se atualizar e FALSE se não atualizar
         */
        function atualizar($id, $dados) {
            $this->_data = $dados;
            
            $this->BD->where('id', $id);
            
            $resposta = parent::update();
            
            if ($resposta) {
                // Cria um novo Log no sistema
                $log = array(
                    'usuario'   => $_COOKIE['nome_usuario'],
                    'operacao'  => 'alteração (locação externa) -> ID REGISTRO -> '.$id
                );
                parent::salvar_log($log);
                
                return TRUE;
                
            } else {
                return FALSE;
            }
        }
        //**********************************************************************
    }
    /** End of File locacao_externa_model.php **/
    /** Location ./application/models/locacao_externa_model.php **/