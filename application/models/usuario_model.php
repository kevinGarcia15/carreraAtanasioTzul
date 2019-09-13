<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuario_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	
	function crearUsuario($nombre, $usuario, $CUI, $telefono, $email, $rol, $clave) {
		$sql = "INSERT INTO usuario(Nombre,Usuario, CUI, Telefono, Email, hash_clave, salt, estado, Rol)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$salt = rand(0,999999); //calcular un número aleatorio
		$hash_clave = hash('sha256', $clave.$salt); //calcular el hash de clave + salt
		$estado = "A";

		$valores = array($nombre,$usuario,$CUI,$telefono, $email, $hash_clave, $salt, $estado, $rol);

		$dbres = $this->db->query($sql, $valores);

		return $dbres;
	}

	function darBaja($id_vendedor) {
		is_numeric($id_vendedor) or exit("Number expected!");

		$sql = "UPDATE 	vendedor
				SET 	estado = ?
				WHERE 	id_vendedor = ?
				LIMIT 	1;";

		$valores = array('B', $id_vendedor);

		$dbres = $this->db->query($sql, $valores);

		return $dbres;
	}

	function autenticarUsuario($txtUsuario, $txtClave) {
		$sql = "SELECT 	id_usuario, Usuario, hash_clave, salt, Rol
				FROM 	usuario
				WHERE 	Usuario = ? AND estado = 'A'
				LIMIT 	1;";

		$dbres = $this->db->query($sql, array($txtUsuario));
		$rows = $dbres->result_array();

		if (count($rows) < 1) // El usuario no existe o no está activo
			return 0;

		$id = $rows[0]['id_usuario'];
		$salt = $rows[0]['salt'];
		$hashClave = hash('sha256', $txtClave.$salt); // Calcular sha512 de clave + salt

		$sql = "SELECT 	id_usuario, Usuario, hash_clave, salt, Rol
		FROM 	usuario
		WHERE 	id_usuario = ? AND hash_clave = ?
		LIMIT 	1;";

		$dbres = $this->db->query($sql, array($id, $hashClave));
		$rows = $dbres->result_array();

		if (count($rows) > 0) {
			return $rows; // El usuario existe y cumple con la clave
		}

		return 0; // El usuario existe pero no cumple la clave
	}
}
