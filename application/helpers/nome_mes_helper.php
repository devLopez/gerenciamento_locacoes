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
         * @param		int $mes Recebe o número correspondente ao mês solicitado
         * @return      string Retorna o nome do Mês em questão
         */
        function nome_mes($mes = NULL)
        {
            if(!$mes) {
                $mes = date('n');
            }
            
            if ($mes == 1) {
                return 'Janeiro';
            } elseif ($mes == 2) {
                return 'Fevereiro';
            } elseif ($mes == 3) {
                return 'Março';
            } elseif ($mes == 4) {
                return 'Abril';
            } elseif ($mes == 5) {
                return 'Maio';
            } elseif ($mes == 6) {
                return 'Junho';
            } elseif ($mes == 7) {
                return 'Julho';
            } elseif ($mes == 8) {
                return 'Agosto';
            } elseif ($mes == 9) {
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