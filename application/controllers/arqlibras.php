<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//Define que o arquivo n?o tem acesso direto via navegador

class Arqlibras extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');//Carrega o helper de url(link)
		$this->load->helper('form');//Carrega o helper de formul?rio
		$this->load->helper('array');//Carrega o helper array
		$this->load->helper('encode');
		
		$this->load->library('form_validation');//Carrega a biblioteca de valida??o de formul?rio
		$this->load->model('arqlibras_model');//Carrega o model		
		//Limpa o cache, não permitindo ao usuário visualizar nenhuma página logo depois de ter feito logout do sistema
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
	}
	
	public function index(){
		$this->load->view('index.php');
	}
	
	public function view_palavra($id_palavra){
		$dados['id_palavra'] = $id_palavra;
		//print_r($dados);exit;

		$this->load->view('view_palavra.php', $dados);
	}
	
	public function ajax_get_palavra(){
		$id_palavra = $this->input->get('id_palavra');

		$dados=$this->arqlibras_model->get_palavra($id_palavra);

		echo json_encode($dados,JSON_UNESCAPED_UNICODE);
	}
	
	public function ajax_get_listar_palavras(){

		$registros=$this->arqlibras_model->get_listar_palavras();

		echo json_encode($registros,JSON_UNESCAPED_UNICODE);
	}
	
	
}
