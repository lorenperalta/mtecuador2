<?php namespace App\Models;

    use CodeIgniter\Model;

    class ParagrafosModel extends Model {
        
        public function listar($idSeccion){
            $paragrafos = $this->db->query("SELECT * FROM tb_Paragrafos where idSeccion=$idSeccion");
            return $paragrafos->getresult();
        }

        public function insertar($datos){
            $paragrafos = $this->db->table('tb_Paragrafos');
            $paragrafos->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerDatos($data) {
			$DbParagrafos = $this->db->table('tb_Paragrafos');
			$DbParagrafos->where($data);
			return $DbParagrafos->get()->getResultArray();
		}

        public function actualizar($data, $idParagrafo) {
			$paragrafos = $this->db->table('tb_Paragrafos');
			$paragrafos->set($data);
			$paragrafos->where('idParagrafo', $idParagrafo);
			return $paragrafos->update();
		}
        
        public function eliminar($data) {
			$paragrafos = $this->db->table('tb_Paragrafos');
			$paragrafos->where($data);
			return $paragrafos->delete();
		}

    }

?>