<?php namespace App\Models;

    use CodeIgniter\Model;

    class DetalleClienteModel extends Model {
        
        public function listar(){
            $cli = $this->db->query("SELECT * FROM detalle_clientes");
            return $cli->getresult();
        }

        public function insertar($datos){
            $cli = $this->db->table('detalle_clientes');
            $cli->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerDatos($data) {
			$DbCliente = $this->db->table('detalle_clientes');
			$DbCliente->where($data);
			return $DbCliente->get()->getResultArray();
		}

        public function actualizar($data, $idCliente) {
			$cli = $this->db->table('detalle_clientes');
			$cli->set($data);
			$cli->where('id_detalleCliente', $idCliente);
			return $cli->update();
		}
        
        public function eliminar($data) {
			$cliente = $this->db->table('detalle_clientes');
			$cliente->where($data);
			return $cliente->delete();
		}

    }

?>