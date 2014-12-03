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
     * @version     v1.1.0
     * @since       24/11/2014
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
            
            // Carrega o model responsável
            $this->load->model('usuarios_model', 'usuarios');
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
            $usuarios = $this->usuarios->usuarios_login($dados);
            
            if($usuarios)
            {
                foreach ($usuarios as $row)
                {
                    $senha_salva    = $row->senha;
                    $nome_usuario   = $row->nome_completo;
                    $id_usuario     = $row->id;
                }
                
                if(password_verify($dados['senha'], $senha_salva))
                {
                    // Seta os Cookies com os dados do usuário
                    setcookie('nome_usuario', $nome_usuario);
                    setcookie('user_pass', $senha_salva);
                    setcookie('user_identifier', base64_encode($id_usuario));
                    setcookie('login', TRUE, (time() + 3600));
                    
                    // Seta a seção com as permissões do usuário
                    $_SESSION['permissoes'] = $this->buscar_permissao($id_usuario);
                    
                    // Seta as mensagens de erro ou sucesso
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
        
        /**
         * busca_permissoes()
         * 
         * Função desenvolvida para buscar as permissões cadastradas para um 
         * usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.1.0 - 24/11/2014
         * @param       int $id Recebe o ID do usuário logado
         * 
         */
        function buscar_permissao($id)
        {
            $permissoes =  $this->usuarios->buscar_permissoes($id);
            
            $i = 0;
            
            foreach ($permissoes as $row)
            {
                $permissao[$i] = $row->nome_grupo;
                $i++;
            }
            
            return $permissao;
        }
        //**********************************************************************
        
        /**
         * verifica_permissao()
         * 
         * Função desenvolvida para verificar as permissões de acesso do usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @since       v1.1.0 - 24/11/2014
         * @param       mixed $permissao_necessaria Contém o nível de permissão
         *              para o acesso
         * @return      Se encontrar a permissão, retorna TRUE, senão, retorna
         *              FALSE
         */
        function verifica_permissao($permissao_necessaria)
        {
            if(!is_array($permissao_necessaria))
            {
                return in_array($permissao_necessaria, $_SESSION['permissoes']);
            }
            else
            {
                $conta_permissoes = 0;
                
                foreach ($permissao_necessaria as $permissao)
                {
                    if(in_array($permissao, $_SESSION['permissoes']))
                    {
                        $conta_permissoes =+ 1;
                    }
                }
                
                if($conta_permissoes > 0)
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
            }
        }
        //********************************************************************** 
    }
    /** End of File login_library.php **/
    /** Location ./application/libraries/login_library.php **/