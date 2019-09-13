<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('operaciones_model');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("vendedor/login");
		}
	}

	public function index()
	{
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('galeria', $data);
	}

	public function acercaDe() {
		// Esta opción es accesible con o sin sesión iniciada
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('about', $data);
	}

}
