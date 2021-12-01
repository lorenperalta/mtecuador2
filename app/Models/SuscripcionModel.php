<?php namespace App\Models;

    use CodeIgniter\Model;

    class SuscripcionModel extends Model {
        
        public function listar(){
            $cli = $this->db->query("SELECT * FROM suscripciones");
            return $cli->getresult();
        }

        public function insertar($datos){
            $cli = $this->db->table('suscripciones');
            $cli->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerDatos($data) {
			$DbCliente = $this->db->table('suscripciones');
			$DbCliente->where($data);
			return $DbCliente->get()->getResultArray();
		}

        public function actualizar($data, $idCliente) {
			$cli = $this->db->table('suscripciones');
			$cli->set($data);
			$cli->where('id', $idCliente);
			return $cli->update();
		}
        
        public function eliminar($data) {
			$cliente = $this->db->table('suscripciones');
			$cliente->where($data);
			return $cliente->delete();
		}

    }

?>