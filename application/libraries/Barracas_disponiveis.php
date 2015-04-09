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
    class Barracas_disponiveis //extends CI_Controller
    {
        /**
         * Variável que recebe o super objeto do CodeIgniter
         * 
         * @var mixed
         */
        protected $CI;
        
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
            $this->CI =& get_instance();
            
            // Carrega os models necessários
            $this->CI->load->model('alugueis_barracas_model', 'alugueis');
            $this->CI->load->model('opcoes/cadastros/barracas_model', 'barracas');
            $this->CI->load->model('periodo_locacao_model', 'periodo');
        }
        //**********************************************************************/
        
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
            return $this->CI->barracas->buscar();
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
         * @param       int $id_periodo Recebe o ID do período a ser gravado
         * @return      bool Retorna TRUE se inserir e FALSE se não salvar
         */
        function montar_periodo($id_periodo)
        {
            $barracas   = $this->barracas();
            
            $i = 0;
            foreach ($barracas as $row) {
                $aluguel[$i] = array(
                    'id_periodo_aluguel'    => $id_periodo,
                    'id_barraca'            => $row->id
                );
                
                $i++;
            }

            return $this->CI->alugueis->insert($aluguel);
        }
        //**********************************************************************
    }
    /** End of File locacao_barracas_library.php **/
    /** Location ./application/libraries/locacao_barracas_library.php **/