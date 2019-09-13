<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('usuario_model');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("/inicio");
		}
	}

	public function index()
	{
		$this->restringirAcceso();
	}

	public function crear() {
	//	$this->restringirAcceso();

		$data['base_url'] = $this->config->item('base_url');

		$data['nombre'] = "";
		$data['usuario'] = "";
		$data['CUI'] = "";
		$data['telefono'] = "";
		$data['email'] = "";
		$data['rol'] = "";
		$data['clave'] = "";
		$data['clave2'] = "";
		$data['mensaje'] = "";

		if (isset($_POST['guardar'])) {
			$data['nombre'] = str_replace(["<",">"], "", $_POST['nombre']);
			$data['usuario'] = str_replace(["<",">"], "", $_POST['usuario']);
			$data['CUI'] = str_replace(["<",">"], "", $_POST['CUI']);
			$data['telefono'] = str_replace(["<",">"], "", $_POST['telefono']);
			$data['email'] = str_replace(["<",">"], "", $_POST['email']);
			$data['rol'] = str_replace(["<",">"], "", $_POST['rol']);
			$data['clave'] = $_POST['clave'];
			$data['clave2'] = $_POST['clave2'];

	//		$arr = $this->usuarios_model->seleccionarUsuarioNombre($data['nombre']);

			if ($data['clave'] != $data['clave2']) {
				$data['mensaje'] = "Las claves no coinciden.";
			} else if (strlen($data['clave']) < 8) {
				$data['mensaje'] = "La clave debe tener al menos 8 caracteres.";
			} else if (count($arr) > 0) {
				$data['mensaje'] = "El usuario ${data['nombre']} ya existe!";
			} else {
				//Todos los datos son correctos, guardar en la BD.
				$this->usuario_model->crearUsuario($data['nombre'], $data['usuario'], $data['CUI'],$data['telefono'],$data['email'],$data['rol'],$data['clave']);
				redirect("/inicio");
			}
		}

		$this->load->view('crear_usuario', $data);
	}

	public function baja($id = 0) {
		$this->restringirAcceso();

			if (isset($_POST['baja'])) {
				$data['mensaje'] = "Está seguro de dar de baja al usuario?.";
				$data['base_url'] = $this->config->item('base_url');
			}
		$this->vendedor_model->darBaja($id);

		redirect("/vendedor");
	}

	public function login() {
		$data['base_url'] = $this->config->item('base_url');

		if (isset($this->session->USUARIO)) {
			redirect('/inicio/'); // /controller/method
		}

		if ($this->input->post('login') == 'Login') {
			$usuario = $this->input->post('usuario');
			$clave = $this->input->post('clave');
			$id = $this->usuario_model->autenticarUsuario($usuario, $clave);
			if ($id > 0) {
				//Establecer variables de sesion
				$this->session->USUARIO = $usuario;
				$this->session->IDUSUARIO = $id[0]['id_usuario'];
				$this->session->ROL = $id[0]['Rol'];
				redirect("/corredor/crear/");
			} else {
				$data["mensaje"] = "Usuario o clave incorrectos!";
			}
		}

		$this->load->view('login', $data);
	}

	public function logout() {
		$this->session->sess_destroy(); // Destruir todas las variables de sesión
		redirect("/inicio");
	}

}
