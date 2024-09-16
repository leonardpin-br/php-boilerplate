<?php

/**
 * A forma como Session funciona é a seguinte:
 * Armazena o id do admin na $_SESSION e, a cada 
 * page load subsequente, é verificado se o usuário 
 * está logado.
 *
 * @author leonardo
 * @link https://stackoverflow.com/questions/6706051/what-is-the-correct-way-to-write-phpdocs-for-constants What is the correct way to write PHPDocs for constants?
 * @link https://stackoverflow.com/questions/3892063/phpdoc-class-constants-documentation/3892270 phpDoc class constants documentation
 */
class Session {
  
    /**
     * Variável que armazena a id do admin. 
     * Ela recebe o mesmo valor da $_SESSION['admin_id'].
     * 
     * @var int ID do admin.
     */
    private $admin_id;
    public $username;
    private $last_login;

    // public const MAX_LOGIN_AGE = 60 * 60 * 24; // 1 day
    /**
     * Define que o máximo de tempo que um admin pode estar logado é 1 dia.
     */
    const MAX_LOGIN_AGE = 60 * 60 * 24; // 1 day

    public function __construct() {
        session_start(); 
        $this->check_stored_login();
    }
    
    /**
     * 
     * @param Admin $admin Admin object.
     * @return boolean True ou False.
     */
    public function login( $admin ) {
        if($admin) {
            
            // prevent session fixation attacks
            session_regenerate_id();
            
            /* Acontece o armazenamento da id em dois lugares:
             * 1- dentro da $_SESSION
             * 2- dentro da propriedade do objeto criado a partir desta classe. */
            $this->admin_id     = $_SESSION['admin_id']     = $admin->id;            
            $this->username     = $_SESSION['username']     = $admin->username;
            $this->last_login   = $_SESSION['last_login']   = time();
            
        }
        return TRUE;
    }
    
    /**
     * Verifica se o usuário está logado, verificando se a propriedade 
     * $this->admin_id recebeu algum valor.
     * 
     * @return boolean True ou False.
     */
    public function is_logged_in() {
        // return isset($this->admin_id);
        return isset($this->admin_id) && $this->last_login_is_recent();
    }
    
    /**
     * Destroi as variáveis $_SESSION['admin_id'] e $this->admin_id.
     * 
     * @return boolean True.
     */
    public function logout() {
        unset( $_SESSION['admin_id'] );
        unset( $_SESSION['username'] );
        unset( $_SESSION['last_login'] );
        unset( $this->admin_id );
        unset( $this->username );
        unset( $this->last_login );
        
        return TRUE;
    }

    /**
     * Nos page loads subsequentes ao login, é necessário verificar se o admin 
     * se logou previamente.
     */
    private function check_stored_login() {
        if( isset( $_SESSION['admin_id'] ) ) {
            $this->admin_id     = $_SESSION['admin_id'];
            $this->username     = $_SESSION['username'];
            $this->last_login   = $_SESSION['last_login'];
        }
    }
    
    /**
     * Verifica se o último login é recente.
     * 
     * @return boolean
     */
    private function last_login_is_recent() {
        if( !isset( $this->last_login ) ) {
            return FALSE;
        } elseif( ($this->last_login + self::MAX_LOGIN_AGE) < time() ) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function message( $msg="") {
        if( !empty($msg) ) {
            // Then this is a "set" message
            $_SESSION['message'] = $msg;
            return TRUE;
        } else {
            // Then this is a "get" message
            return $_SESSION['message'] ?? '';
        }
    }
    
    public function clear_message() {
        unset( $_SESSION['message'] );
    }
    
}

?>