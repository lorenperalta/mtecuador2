<?php namespace App\Models;

    use CodeIgniter\Model;

    class LeyesAgrupamientoModel extends Model {
        
        public function listar(){
            $paragrafos = $this->db->query("SELECT * FROM tb_Leyes_Agrupamiento");
            return $paragrafos->getresult();
        }

        public function insertar($datos){
            $paragrafos = $this->db->table('tb_Leyes_Agrupamiento');
            $paragrafos->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerDatos($data) {
			$DbParagrafos = $this->db->table('tb_Leyes_Agrupamiento');
			$DbParagrafos->where($data);
			return $DbParagrafos->get()->getResultArray();
		}

        public function actualizar($data, $idParagrafo) {
			$paragrafos = $this->db->table('tb_Leyes_Agrupamiento');
			$paragrafos->set($data);
			$paragrafos->where('idLeyGrupo', $idParagrafo);
			return $paragrafos->update();
		}
        
        public function eliminar($data) {
			$paragrafos = $this->db->table('tb_Leyes_Agrupamiento');
			$paragrafos->where($data);
			return $paragrafos->delete();
		}

    }

?>