<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**
     * Sistema de Gerenciamento de Locações
     * 
     * Sistema desenvolvido para facilitar as locações de barracas, espaços e
     * materiais do Pentáurea Clube
     *  
     * @package    SGL
     * @author     Masterkey Informática
     * @copyright  Copyright (c) 2010 - 2014, Masterkey Informática LTDA
     */

    /**
     * Valores_model
     * 
     * Classe desenvolvida para gerenciar os valores de barracas cadastradas no
     * sistema
     * 
     * @package     Models
     * @subpackage  Opcoes
     * @subpackage  Cadastros
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v0.1.0.0
     * @since       05/12/2014
     */
    class Valores_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.1.0.0 - 05/12/2014
         */
        public function __construct()
        {
            parent::__construct();
            
            // Seleciona a tabela que será trabalhada nesta classe
            $this->_tabela = 'valores';
        }
        //**********************************************************************
        
        /**
         * buscar()
         * 
         * Função desenvolvida para buscar todos os valores cadastrados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.1.0.0 - 05/12/2014
         */
        function buscar()
        {
            return parent::get();
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * Função desenvolvida para salvar novos valores no Banco de dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v0.1.0.0 - 05/12/2014
         * @param       array $valor Recebe o valor que será salvo
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar($valor)
        {
            $this->_data = $valor;
            
            return parent::salvar();
        }
        //**********************************************************************
    }
    /** End of File valores_model.php **/
    /** Location ./application/models/opcoes/cadastro/valores_model.php **/