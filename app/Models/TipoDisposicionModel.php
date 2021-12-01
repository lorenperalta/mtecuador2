<?php namespace App\Models;

    use CodeIgniter\Model;

    class TipoDisposicionModel extends Model {
        
        public function listar(){
            $tipodispo = $this->db->query("SELECT * FROM tb_TipoDisposicion");
            return $tipodispo->getresult();
        }

        public function insertar($datos){
            $tipodispo = $this->db->table('tb_TipoDisposicion');
            $tipodispo->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerDatos($data) {
			$DbtipoD = $this->db->table('tb_TipoDisposicion');
			$DbtipoD->where($data);
			return $DbtipoD->get()->getResultArray();
		}

        public function actualizar($data, $idTD) {
			$tipodispo = $this->db->table('tb_TipoDisposicion');
			$tipodispo->set($data);
			$tipodispo->where('idTipoDisposicion', $idTD);
			return $tipodispo->update();
		}
        
        public function eliminar($data) {
			$tipodispo = $this->db->table('tb_TipoDisposicion');
			$tipodispo->where($data);
			return $tipodispo->delete();
		}

    }

?>