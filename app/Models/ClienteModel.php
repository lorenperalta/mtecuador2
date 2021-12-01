<?php namespace App\Models;

    use CodeIgniter\Model;

    class ClienteModel extends Model {
        
        public function ListarClientes(){
            $cli = $this->db->query("SELECT * FROM clientes");
            return $cli->getresult();
        }
        public function ListarClientesid(){
            $cli = $this->db->query("SELECT max(id_cliente) as id_cliente FROM clientes");
            return $cli->getresult();
        }

        public function insertar($datos){
            $cli = $this->db->table('clientes');
            $cli->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerCliente($data) {
			$DbCliente = $this->db->table('clientes');
			$DbCliente->where($data);
			return $DbCliente->get()->getResultArray();
		}
        public function obtenerruccliente($data) {
			$DbCliente = $this->db->table('clientes');
			$DbCliente->where($data);
			return $DbCliente->get()->getResultArray();
		}
        public function actualizar($data, $idCliente) {
			$cli = $this->db->table('clientes');
			$cli->set($data);
			$cli->where('id_cliente', $idCliente);
			return $cli->update();
		}
        
        public function eliminar($data) {
			$cliente = $this->db->table('clientes');
			$cliente->where($data);
			return $cliente->delete();
		}

    }

?>