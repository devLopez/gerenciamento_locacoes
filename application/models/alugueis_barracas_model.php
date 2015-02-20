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
     * Alugueis_barracas_model
     * 
     * Classe desenvolvida para gerenciar as barracas para um determinado período
     * de aluguel
     * 
     * @package     Models
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       18/02/2015
     */
    class Alugueis_barracas_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @version     v1.0.0 - 18/02/2015
         */
        public function __construct()
        {
            parent::__construct();
            
            $this->_tabela = 'alugueis_barracas';
        }
        //**********************************************************************
        
        /**
         * insert()
         * 
         * Insere um set de barracas para disponibilização  para locação em um 
         * período
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 18/02/2015
         * @param       array $barracas Recebe as barracas a serem inseridas
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function insert($barracas)
        {
            return $this->BD->insert_batch($this->_tabela, $barracas);
        }
        //**********************************************************************
        
        /**
         * get()
         * 
         * Realiza a busca de barracas para um período de locações
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 18/02/2015
         * @param       int $id_periodo_aluguel Recebe o ID do período a ser buscado
         * @return      array Retorna um array com as locações disponíveis
         */
        function get($id_periodo_aluguel)
        {
            $this->BD->select('
                alugueis_barracas.id, alugueis_barracas.id_periodo_aluguel,
                alugueis_barracas.nome_associado, alugueis_barracas.cpf_associado,
                alugueis_barracas.telefone_associado, alugueis_barracas.periodo_estadia,
                alugueis_barracas.status,
                barracas.nome_barraca
            ');
            $this->BD->join('barracas', 'alugueis_barracas.id_barraca = barracas.id');
            $this->BD->group_by('barracas.nome_barraca');
            $this->BD->where('id_periodo_aluguel', $id_periodo_aluguel);
            
            return parent::get();
        }
        //**********************************************************************
        
        /**
         * update()
         * 
         * Função desenvolvida para realizar alterações em registros dos aluguéis
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 18/02/2015
         * @param       int     $id_aluguel Recebe o ID do registro a ser alterado
         * @param       array   $aluguel    Recebe os dados a serem alterados
         * @return      bool Retorna TRUE se atualizar e FALSE se não atualizar
         */
        function update($id_aluguel, $aluguel)
        {
            $this->_data = $aluguel;
            $this->BD->where('id', $id_aluguel);
            
            if(parent::update()) {
                $logs = array(
                    'usuario'   => $this->session->userdata('nome_usuario'),
                    'operacao'  => 'alteração [TABELA: ('.$this->_tabela.')][ID REGISTRO: ('.$id_aluguel.')'
                );
                
                return TRUE;
            } else {
                return FALSE;
            }
        }
        //**********************************************************************
    }
    /** End of File alugueis_model.php **/
    /** Location ./application/models/alugueis_model.php **/