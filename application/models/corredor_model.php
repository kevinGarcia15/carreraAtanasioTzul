<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class corredor_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

function seleccionarPais() {
	$sql = "SELECT id_pais, nombre_pais
			FROM 	pais
			order by id_pais ASC
			LIMIT 	1000";

	$dbres = $this->db->query($sql);

	$rows = $dbres->result_array();

	return $rows;
}

function seleccionardepartamento($id) {
	$sql = "SELECT id_departamento, nombre_depto
			FROM 	departamento
			where pais_id_pais = ?
			order by nombre_depto ASC
			LIMIT 	100";

	$dbres = $this->db->query($sql, $id);

	$rows = $dbres->result_array();

	return $rows;
}

function seleccionarMunicipio($id) {
	$sql = "SELECT id_municipio, nombre_municipio, departamento_id_departamento
			FROM 	municipio
			where departamento_id_departamento = ?
			order by nombre_municipio ASC
			LIMIT 	500";

	$dbres = $this->db->query($sql, $id);

	$rows = $dbres->result_array();

	return $rows;
}

	function seleccionarBusqueda($busqueda) {
		$sql = "SELECT c.id_corredor, c.Nombre, i.numero_atleta as Numero,m.nombre_municipio municipio, d.nombre_depto departamento, p.nombre_pais pais, c.Rama rama, TIMESTAMPDIFF(YEAR,Fecha_nacimiento,CURDATE()) AS edad
				FROM 	corredor c
				join inscripcion i on c.id_corredor = i.corredor_id_corredor
				join municipio m on id_municipio = municipio_id_municipio
				join departamento d on id_departamento = departamento_id_departamento
				join pais p on id_pais = pais_id_pais
	
				where i.numero_atleta = ?
				LIMIT 	1";

		$dbres = $this->db->query($sql, $busqueda);

		$rows = $dbres->result_array();

		return $rows;
	}

	function seleccionarDetalle($id) {
		$sql = "SELECT c.id_corredor id_corredor, c.Nombre nombre, i.numero_atleta numero, TIMESTAMPDIFF(YEAR,Fecha_nacimiento,CURDATE()) AS edad
						,m.nombre_municipio municipio, d.nombre_depto departamento, p.nombre_pais pais, c.Email email, c.Rama rama, c.Telefono telefono
						,f.Nombre familiar, f.Telefono telefono_familiar
				FROM 	corredor c
				join inscripcion i on c.id_corredor= i.corredor_id_corredor
				join municipio m on id_municipio = municipio_id_municipio
				join departamento d on id_departamento = departamento_id_departamento
				join pais p on id_pais = pais_id_pais
				join familiar f on c.id_corredor = f.Corredor_id_corredor
				where id_corredor = ?
				LIMIT 	1";

		$dbres = $this->db->query($sql, $id);

		$rows = $dbres->result_array();

		return $rows;
	}

	function seleccionarCorredor($CUI, $Numero) {
		$sql = "SELECT 	c.CUI, i.numero_atleta
						FROM 	corredor c
						join inscripcion i on i.Corredor_id_corredor = c.id_corredor
						WHERE 	i.fecha_participacion = ? AND (c.CUI = ? OR i.numero_atleta = ?)
						LIMIT 1 ;";
		$año = date ("Y");
		$dbres = $this->db->query($sql, array($año, $CUI, $Numero));

		$rows = $dbres->result_array();

		if (count($rows) == 0){
			return 0;
		}else{
			return 1;
		}

	}

	function seleccionarCorredorNumero($Numero) {
		$sql = "SELECT 	i.numero_atleta
						FROM 	inscripcion i
						WHERE 	i.fecha_participacion = ? AND i.numero_atleta = ?
						LIMIT 1 ;";
		$año = date ("Y");
		$dbres = $this->db->query($sql, array($año, $Numero));

		$rows = $dbres->result_array();

		if (count($rows) == 0){
			return 0;
		}else{
			return 1;
		}

	}

	function seleccionar_id_corredor($CUI) {

		$sql = "SELECT 	id_corredor
						FROM 	corredor
						WHERE 	CUI = ?
						";

		$dbres = $this->db->query($sql, array($CUI));

		$rows = $dbres->result_array();

		return $rows[0]['id_corredor'];

	}
		function crear_familiar($id_corredor, $nombre_familiar, $telefono_familiar) {
			$sql = "INSERT INTO familiar(Nombre, Telefono, Corredor_id_corredor)
					VALUES (?, ?, ?)";

			$valores = array($nombre_familiar, $telefono_familiar,$id_corredor);

			$dbres = $this->db->query($sql, $valores);

			return $dbres;
		}

		function crear_inscripcion($id_corredor, $numero) {
			$sql = "INSERT INTO inscripcion(numero_atleta, fecha_participacion, corredor_id_corredor)
					VALUES (?, ?, ?)";

			$año = date ("Y");
			$valores = array($numero, $año, $id_corredor);

			$dbres = $this->db->query($sql, $valores);

			return $dbres;
		}

	function crear_corredor($nombre, $fecha_nacimiento, $CUI ,$email, $telefono,
													$rama, $usuario_id_usuario, $municipio_id_municipio) {
		$sql = "INSERT INTO corredor(Nombre, Fecha_nacimiento, CUI, Email,Telefono,
												Rama,Usuario_id_usuario,municipio_id_municipio)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		
			$valores = array($nombre, $fecha_nacimiento, $CUI ,$email, $telefono,
											$rama, $usuario_id_usuario, $municipio_id_municipio);
				

		$dbres = $this->db->query($sql, $valores);

		return $dbres;
	}

	function seleccionarCorredorEditar($id){
		$sql = "SELECT c.id_corredor id_corredor, c.CUI cui, c.Nombre nombre, i.numero_atleta numero, c.Fecha_nacimiento nacimiento
						,c.Email email, c.Telefono telefono
						,f.Nombre familiar, f.Telefono telefono_familiar
				FROM 	corredor c
				join inscripcion i on c.id_corredor= i.corredor_id_corredor
				join familiar f on id_corredor = f.Corredor_id_corredor
				where id_corredor = ? and fecha_participacion = ?
				LIMIT 	1";
		$año = date("Y");
		$dbres = $this->db->query($sql,array($id,$año));

		$rows = $dbres->result_array();

		return $rows;
	}

	function actualizar_corredor($id, $nombre, $fecha_nacimiento, $CUI ,$email, $telefono,
													$rama, $municipio_id_municipio) {
		$sql = "UPDATE corredor
						SET Nombre = '$nombre', Fecha_nacimiento = '$fecha_nacimiento', CUI= '$CUI', Email= '$email', Telefono = '$telefono',
						Rama = '$rama', municipio_id_municipio = '$municipio_id_municipio' WHERE id_corredor = '$id' ";


		$dbres = $this->db->query($sql);

		return $dbres;
	}

	function actualizar_familiar($id, $nombre, $telefono) {
		$sql = "UPDATE familiar
						SET Nombre = '$nombre',Telefono = '$telefono'
						WHERE Corredor_id_corredor = '$id'";

		$dbres = $this->db->query($sql);

		return $dbres;
	}

	function actualizar_inscripcion($id, $numero) {
		$año = date('Y');
		$sql = "UPDATE inscripcion
						SET numero_atleta = '$numero'
						WHERE Corredor_id_corredor = '$id' and fecha_participacion = '$año'";

		$dbres = $this->db->query($sql);

		return $dbres;
	}



}
