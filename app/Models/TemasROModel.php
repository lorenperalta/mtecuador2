<?php namespace App\Models;

    use CodeIgniter\Model;

    class TemasROModel extends Model {
        
        public function listar(){
            $ro = $this->db->query("SELECT * FROM tb_Temas_RO");
            return $ro->getresult();
        }

        public function insertar($datos){
            $ro = $this->db->table('tb_Temas_RO');
            $ro->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerDatos($data) {
			$DbTemaRO = $this->db->table('tb_Temas_RO');
			$DbTemaRO->where($data);
			return $DbTemaRO->get()->getResultArray();
		}

        public function actualizar($data, $idTemasRO) {
			$ro = $this->db->table('tb_Temas_RO');
			$ro->set($data);
			$ro->where('idTema', $idTemasRO);
			return $ro->update();
		}
        
        public function eliminar($data) {
			$ro = $this->db->table('tb_Temas_RO');
			$ro->where($data);
			return $ro->delete();
		}

    }

?>