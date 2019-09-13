<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inicio extends CI_Controller {
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
		$this->load->view('formulario', $data);
	}

	public function log() {
		$this->restringirAcceso();

		$data['base_url'] = $this->config->item('base_url');
		$busqueda = $this->input->post('busqueda');
		if ($busqueda) {
			$data['arr'] = $this->operaciones_model->seleccionarLogOper($busqueda);
		} else {
			$data['arr'] = $this->operaciones_model->seleccionarLog();
		}

		$this->load->view('log', $data);

	}

	public function acercaDe() {
		// Esta opción es accesible con o sin sesión iniciada
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('about', $data);
	}

}
