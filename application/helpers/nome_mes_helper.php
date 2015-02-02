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

    if(!function_exists('nome_mes'))
    {
        /**
         * nome_mes()
         * 
         * Função desenvolvida para retornar o nome do mês
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @return      string Retorna o nome do Mês em questão
         */
        function nome_mes()
        {
            $mes = date('m');
            
            if ($mes == 01) {
                return 'Janeiro';
            } elseif ($mes == 02) {
                return 'Fevereiro';
            } elseif ($mes == 03) {
                return 'Março';
            } elseif ($mes == 04) {
                return 'Abril';
            } elseif ($mes == 05) {
                return 'Maio';
            } elseif ($mes == 06) {
                return 'Junho';
            } elseif ($mes == 07) {
                return 'Julho';
            } elseif ($mes == 08) {
                return 'Agosto';
            } elseif ($mes == 09) {
                return 'Setembro';
            } elseif ($mes == 10) {
                return 'Outubro';
            } elseif ($mes == 11) {
                return 'Novembro';
            } elseif ($mes == 12) {
                return 'Dezembro';
            }
        }
        //**********************************************************************
    }
    /** End of File nome_mes_helper.php **/
    /** Location ./application/helpers/nome_mes_helper.php **/