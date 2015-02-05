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
     * Combo
     * 
     * Classe desenvolvida para geração de dados para povoar selectboxes diversas
     * dentro do sistema
     * 
     * @package     Controllers
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       03/02/2015
     */
    class Combo extends MY_Controller
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
            parent::__construct(TRUE);
        }
        //**********************************************************************
        
        /**
         * anos()
         * 
         * Função desenvolvida para formatar os anos disponíveis para buscar os
         * aluguéis de barracas por período
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 03/02/2015
         * @return      array Retorna um array contendo os anos a partir do ano
         *              de build
         */
        function anos()
        {
            $ano_build  = 2014;
            $ano_atual  = date('Y');
        
            $diferenca  = $ano_atual - $ano_build;
            $i          = 0;
            
            do {
                $anos[$i] = array(
                    'value' => $ano_build + $i,
                    'text'  => $ano_build + $i
                );
                
                $i++;
            } while ($i == 1);
            
            
            echo json_encode($anos);
        }
        //**********************************************************************
        
        /**
         * meses()
         * 
         * Realiza a construção de objeto contendo os meses do ano
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.0.0 - 03/02/2015
         * @return      array Retorna um array contendo os meses do ano
         */
        function meses()
        {
            for($i = 0; $i < 12; $i++) {
                
                $nome_mes = nome_mes($i + 1);
                
                $mes[$i] = array(
                    'value' => $nome_mes,
                    'text'  => $nome_mes
                );
            }
            
            echo json_encode($mes);
        }
        //**********************************************************************
    }
    /** End of File combo.php **/
    /** Location ./application/controllers/combo.php **/