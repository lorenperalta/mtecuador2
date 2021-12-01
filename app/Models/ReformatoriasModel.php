<?php namespace App\Models;

    use CodeIgniter\Model;

    class ReformatoriasModel extends Model {
        
        public function listar(){
            $reformatoria = $this->db->query("SELECT * FROM tb_Reformatorias");
            return $reformatoria->getresult();
        }

        public function ListarById($idLey){
            $reformatoria = $this->db->query("SELECT * FROM tb_Reformatorias WHERE idLey = $idLey" );
            return $reformatoria->getresult();
        }

        public function insertar($datos){
            $reformatoria = $this->db->table('tb_Reformatorias');
            $reformatoria->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerDatos($data) {
			$reformatoria = $this->db->table('tb_Reformatorias');
			$reformatoria->where($data);
			return $reformatoria->get()->getResultArray();
		}

        public function actualizar($data, $idReformatoria) {
			$reformatoria = $this->db->table('tb_Reformatorias');
			$reformatoria->set($data);
			$reformatoria->where('idReformatoria', $idReformatoria);
			return $reformatoria->update();
		}
        
        public function eliminar($data) {
			$reformatoria = $this->db->table('tb_Reformatorias');
			$reformatoria->where($data);
			return $reformatoria->delete();
		}

    }

?>