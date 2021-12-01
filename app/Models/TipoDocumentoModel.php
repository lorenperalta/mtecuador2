<?php namespace App\Models;

    use CodeIgniter\Model;

    class TipoDocumentoModel extends Model {
        
        public function listar(){
            $paragrafos = $this->db->query("SELECT * FROM tb_TipoDocumentos");
            return $paragrafos->getresult();
        }

        public function insertar($datos){
            $paragrafos = $this->db->table('tb_TipoDocumentos');
            $paragrafos->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerDatos($data) {
			$DbParagrafos = $this->db->table('tb_TipoDocumentos');
			$DbParagrafos->where($data);
			return $DbParagrafos->get()->getResultArray();
		}

        public function actualizar($data, $idParagrafo) {
			$paragrafos = $this->db->table('tb_TipoDocumentos');
			$paragrafos->set($data);
			$paragrafos->where('idTipoDoc', $idParagrafo);
			return $paragrafos->update();
		}
        
        public function eliminar($data) {
			$paragrafos = $this->db->table('tb_TipoDocumentos');
			$paragrafos->where($data);
			return $paragrafos->delete();
		}

    }

?>