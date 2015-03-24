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
     * Relatorios
     * 
     * Classe desenvolvida para geração de relatórios em PDF
     * 
     * @package     Libraries
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       09/03/2015
     */
    class Relatorios extends CI_Controller
    {
        
        public function __construct($dados)
        {
            parent::__construct();
            
            $this->new_mpdf($dados['view'], $dados['titulo']);
        }
        
        /**
         * new_mpdf()
         * 
         * Função desenvolvida para instanciar a classe mPDF
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Private
         * @since       v1.0.0 - 09/03/2015
         */
        private function new_mpdf($view, $titulo)
        {
            require_once APPPATH.'/third_party/mpdf/mpdf/mpdf.php';
            
            $mpdf = new mPDF('', 'a4');
            
            $mpdf->SetHeader($titulo);
            $mpdf->SetFooter('
                <table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
			        <tr>
				        <td width="50%" class="text-left">Relatório Gerado em '.date('d/m/Y H:i:s').'</td>
				        <td width="50%" class="text-right "style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>
			        </tr>
		        </table>'
            );
            
            $css = file_get_contents('css/bootstrap.css');
            
            $mpdf->WriteHTML($css, 1);
            $mpdf->WriteHTML($view);
            $mpdf->Output();
        }
        //**********************************************************************
    }
    /** End of File Relatorios.php **/
    /** Location ./application/libraries/Relatorios.php **/