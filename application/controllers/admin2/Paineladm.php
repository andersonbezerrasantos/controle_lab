<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paineladm extends CI_Controller {
    /**
     * Home Area Administrativa
     *
     * @package     CodeIgniter
     * @subpackage  Controllers
     * @category    Area Administrativa
     * @author      Escritório Escola Dev Team
     * @link        http://www.semanatrans.esy.es
     * 
     * Este Controller foi projetado para ser a Home da Area Administrativa!
     */
    
  public function __construct(){
    parent::__construct();
    /* Esta condição verifica se algum
     * Usuario está logado
     * Caso não esteja logado é carregada a view de login
     * Caso o tipo não seja igual ao local da area admim
     * o usuario e redirecionado
     */
    $local = 2;
    $tipo = $_SESSION['tipo'];           
    if(!isset($_SESSION['logado'])){            
      redirect(base_url());            
    }elseif($tipo != $local){            
      redirect(base_url());            
    }      
  }

    public function index() {
      $id = $this->session->userdata('id');
      $this->load->model('reserva');        
      $dados['reservado'] = $this->reserva->list_reserva($id);
      $this->load->view('admin2/paineladm',$dados);
      /*echo $this->router->class.'<br><br>';
      echo $_SERVER['SCRIPT_NAME'].'<br><br>';        
      echo $_SERVER['REQUEST_URI'].'<br><br>';        
      echo dirname($_SERVER['REQUEST_URI']).'<br><br>';
      echo site_url().'<br><br>';        
      $local = substr(dirname($_SERVER['REQUEST_URI']), -1);
      $tiiipo = $_SESSION['tipo'];
      if ($local == $tiiipo) {echo "Funciona";}*/        
    }

    public function apaga($id){
        /* Carrega o modelo */
        $this->load->model('reserva');            

        /* Chama a função inserir do modelo */
        if ($this->reserva->apaga($id)) {
            redirect(base_url('admin2/paineladm'));
        } else {
            echo "error";
        }
    }
}