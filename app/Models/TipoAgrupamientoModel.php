<?php namespace App\Models;

    use CodeIgniter\Model;

    class TipoAgrupamientoModel extends Model {
        
        public function listar(){
            $tap = $this->db->query("SELECT * FROM tb_TipoAgrupamiento");
            return $tap->getresult();
        }

        public function insertar($datos){
            $tap = $this->db->table('tb_TipoAgrupamiento');
            $tap->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerDatos($data) {
			$Dbtap = $this->db->table('tb_TipoAgrupamiento');
			$Dbtap->where($data);
			return $Dbtap->get()->getResultArray();
		}

        public function actualizar($data, $idTAP) {
			$tap = $this->db->table('tb_TipoAgrupamiento');
			$tap->set($data);
			$tap->where('idTipoAgrupamiento', $idTAP);
			return $tap->update();
		}
        
        public function eliminar($data) {
			$tap = $this->db->table('tb_TipoAgrupamiento');
			$tap->where($data);
			return $tap->delete();
		}

    }

?>