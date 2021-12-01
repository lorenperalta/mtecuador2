<?php namespace App\Models;

    use CodeIgniter\Model;

    class JuriprudenciaModel extends Model {
        
        public function listar(){
            $juriprudencia = $this->db->query("SELECT * FROM tb_Jurisprudencias");
            return $juriprudencia->getresult();
        }

        public function ListarById($idLey){
            $juriprudencia = $this->db->query("SELECT * FROM tb_Jurisprudencias WHERE idLey = $idLey" );
            return $juriprudencia->getresult();
        }

        public function insertar($datos){
            $juriprudencia = $this->db->table('tb_Jurisprudencias');
            $juriprudencia->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerDatos($data) {
			$juriprudencia = $this->db->table('tb_Jurisprudencias');
			$juriprudencia->where($data);
			return $juriprudencia->get()->getResultArray();
		}

        public function actualizar($data, $idJuri) {
			$juriprudencia = $this->db->table('tb_Jurisprudencias');
			$juriprudencia->set($data);
			$juriprudencia->where('idJurisprudencia', $idJuri);
			return $juriprudencia->update();
		}
        
        public function eliminar($data) {
			$juriprudencia = $this->db->table('tb_Jurisprudencias');
			$juriprudencia->where($data);
			return $juriprudencia->delete();
		}

    }

?>