<?php namespace App\Models;

    use CodeIgniter\Model;

    class TitulosModel extends Model {
        
        public function ListarTitulos($idLibro){
            $titulos = $this->db->query("select * from tb_Titulos where idLibro=$idLibro ");
            return $titulos->getresult();
        }

        public function insertar($datos){
            $titulos = $this->db->table('tb_Titulos');
            $titulos->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerDatos($data) {
			$DbTitulos = $this->db->table('tb_Titulos');
			$DbTitulos->where($data);
			return $DbTitulos->get()->getResultArray();
		}

        public function actualizar($data, $idTitulo) {
			$titulos = $this->db->table('tb_Titulos');
			$titulos->set($data);
			$titulos->where('idTitulo', $idTitulo);
			return $titulos->update();
		}
        
        public function eliminar($data) {
			$titulos = $this->db->table('tb_Titulos');
			$titulos->where($data);
			return $titulos->delete();
		}

    }

?>