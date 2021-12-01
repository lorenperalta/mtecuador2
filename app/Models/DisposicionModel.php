<?php namespace App\Models;

    use CodeIgniter\Model;

    class DisposicionModel extends Model {
        
        public function listar(){
            $cli = $this->db->query("SELECT * FROM tb_Disposiciones");
            return $cli->getresult();
        }

        public function ListarById($idLey){
            $cli = $this->db->query("SELECT * FROM tb_Disposiciones WHERE idLey=$idLey" );
            return $cli->getresult();
        }
        public function ListarByIdd($idLey){
            $cli = $this->db->query("SELECT * FROM tb_TipoDisposicion inner join tb_Disposiciones on tb_TipoDisposicion.idTipoDisposicion=tb_Disposiciones.idTipoDisposicion where tb_Disposiciones.idLey=$idLey");
            
            return $cli->getresult();
        }
        public function insertar($datos){
            $cli = $this->db->table('tb_Disposiciones');
            $cli->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerDatos($data) {
			$DbCliente = $this->db->table('tb_Disposiciones');
			$DbCliente->where($data);
			return $DbCliente->get()->getResultArray();
		}

        public function actualizar($data, $idCliente) {
			$cli = $this->db->table('tb_Disposiciones');
			$cli->set($data);
			$cli->where('idDisposicion', $idCliente);
			return $cli->update();
		}
        
        public function eliminar($data) {
			$cliente = $this->db->table('tb_Disposiciones');
			$cliente->where($data);
			return $cliente->delete();
		}

    }

?>