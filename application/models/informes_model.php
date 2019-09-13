<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class informes_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function seleccionarCorredor() {
		$sql = "SELECT c.id_corredor as id_corredor, i.numero_atleta as numero, i.fecha_participacion as fecha_participacion, Nombre,Rama, TIMESTAMPDIFF(YEAR,Fecha_nacimiento,CURDATE()) AS edad,
						Email, p.nombre_pais pais
						FROM 	corredor c
						JOIN inscripcion i on i.corredor_id_corredor = c.id_corredor
    					JOIN municipio m on c.municipio_id_municipio = m.id_municipio
						JOIN departamento d on m.departamento_id_departamento = d.id_departamento
    					JOIN pais p on d.pais_id_pais = p.id_pais
						WHERE fecha_participacion = ?
						ORDER BY numero ASC
						LIMIT 	6000";

		$año = date ("Y");
		$dbres = $this->db->query($sql, array($año));

		$rows = $dbres->result_array();

		return $rows;
	}


	function seleccionarCorredorDepto(){
		$sql = "SELECT d.nombre_depto departamento, COUNT(1) AS total
						FROM corredor c
						JOIN municipio m on c.municipio_id_municipio = m.id_municipio
						JOIN departamento d on d.id_departamento = m.departamento_id_departamento
						JOIN pais p on p.id_pais = d.pais_id_pais
						where p.id_pais = 1
						GROUP BY d.id_departamento
						";

			$dbres = $this->db->query($sql);

			$rows = $dbres->result_array();

			return $rows;
	}

	
	function seleccionarCorredorMunicipio(){
		$sql = "SELECT m.nombre_municipio municipio, COUNT(1) AS total
						FROM corredor c
						JOIN municipio m on c.municipio_id_municipio = m.id_municipio
                        JOIN departamento d on d.id_departamento = m.departamento_id_departamento
						where d.id_departamento = 1
						GROUP BY m.id_municipio
						";

			$dbres = $this->db->query($sql);

			$rows = $dbres->result_array();

			return $rows;
	}


	function seleccionarCorredorCategoria($categotia){
		$sql = "SELECT c.id_corredor as id_corredor, i.numero_atleta as numero, i.fecha_participacion as fecha_participacion, Nombre,Rama, TIMESTAMPDIFF(YEAR,Fecha_nacimiento,CURDATE()) AS edad,
						Email, p.nombre_pais pais
						FROM 	corredor c
						JOIN inscripcion i on i.corredor_id_corredor = c.id_corredor
    				JOIN municipio m on c.municipio_id_municipio = m.id_municipio
						JOIN departamento d on m.departamento_id_departamento = d.id_departamento
    				JOIN pais p on d.pais_id_pais = p.id_pais
						WHERE Rama = ? and fecha_participacion = ?
						ORDER BY numero ASC
						LIMIT 	3000";

			$año = date ("Y");
			$dbres = $this->db->query($sql, array($categotia, $año));

			$rows = $dbres->result_array();

			return $rows;
	}
	function seleccionarCorredorRama(){
		$sql = "SELECT Rama
						FROM 	corredor
						LIMIT 	5000";

			$dbres = $this->db->query($sql);

			$rows = $dbres->result_array();

			return $rows;
	}

	function seleccionarNoCorredores() {
			$sql = "CALL no_atletas";

			$dbres = $this->db->query($sql);

			$rows = $dbres->result_array();

			return $rows;
		}




}
