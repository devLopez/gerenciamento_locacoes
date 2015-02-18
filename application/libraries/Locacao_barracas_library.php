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
     * Locacao_barracas_library
     * 
     * Library desenvolvida para cadastrar as barracas para um determinado período
     * de locação
     * 
     * @package     Libraries
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       18/02/2015
     */
    class Locacao_barracas_library extends CI_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 18/02/2015
         */
        public function __construct()
        {
            parent::__construct();
            
            // Carrega os models necessários
            $this->load->model('alugueis_barracas_model', 'alugueis');
            //$this->load->model('opcoes/cadastros/barracas_model', 'barracas');
            //$this->load->model('periodo_locacao_model', 'periodo');
        }
        //**********************************************************************
        
        /**
         * get_id()
         * 
         * Retorna o último ID da inserção de novo período de locações
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Private
         * @since       v1.0.0 - 18/02/2015
         * @return      int Retorna o ID do registro inserido
         */
        private function get_id()
        {
            return $this->periodo->last_id();
        }
        //**********************************************************************
        
        /**
         * barracas()
         * 
         * Realiza a busca das barracas cadastradas no sistema
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Private
         * @since       v1.0.0 - 18/02/2015
         * @return      array Retorna um array com as barracas cadastradas
         */
        private function barracas()
        {
            return $this->barracas->buscar();
        }
        //**********************************************************************
        
        /**
         * montar_periodo()
         * 
         * Realiza a montagem das barracas para inserção em um determinado 
         * período de locação
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 18/02/2015
         * @return      bool Retorna TRUE se inserir e FALSE se não salvar
         */
        function montar_periodo()
        {
            $barracas   = $this->barracas();
            $id_periodo = $this->get_id();
            
            $i = 0;
            foreach ($barracas as $row) {
                $aluguel[$i] = array(
                    'id_periodo_aluguel'    => $id_periodo,
                    'id_barraca'            => $row->id
                );
                
                $i++;
            }
            
            return $this->alugel->insert($aluguel);
        }
        //**********************************************************************
        
        function teste() {
            echo 'Bosta';
        }
    }
    /** End of File locacao_barracas_library.php **/
    /** Location ./application/libraries/locacao_barracas_library.php **/