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
     * Login_library.php
     * 
     * Classe desenvolvida para realização do login
     * 
     * @package     Libraries
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access      Public
     * @version     v1.0.0
     * @since       06/11/2014
     */
    class Login_library extends CI_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        public function __construct()
        {
            parent::__construct();
        }
        //**********************************************************************
        
        /**
         * logar()
         * 
         * Função desenvolvida para realização do login
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @param       array $dados Contém os dados de Login e senha
         * @return      mixed Retorna TRUE se o login for feito e mensagens de
         *              erro no caso do login incorreto
         */
        function logar($dados)
        {
            $this->load->model('usuarios_model', 'usuarios');
            
            $usuarios = $this->usuarios->usuarios_login($dados);
            
            if($usuarios)
            {
                foreach ($usuarios as $row)
                {
                    $senha_salva    = $row->senha;
                    $nome_usuario   = $row->nome_completo;
                }
                
                if(password_verify($dados['senha'], $senha_salva))
                {
                    setcookie('nome_usuario', $nome_usuario);
                    setcookie('user_pass', $senha_salva);
                    setcookie('login', TRUE, (time() + 3600));
                    
                    $resposta['sucesso']    = TRUE;
                    $resposta['erro']       = '';
                }
                else
                {
                    $resposta['erro'] = 'Senha Incorreta';
                }
            }
            else
            {
                $resposta['erro'] = 'Não foi encontrado usuário com este nome';
            }
            
            return $resposta;
        }
        //**********************************************************************
    }
    /** End of File login_library.php **/
    /** Location ./application/libraries/login_library.php **/