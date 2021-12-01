<?php namespace App\Models;

    use CodeIgniter\Model;

    class OrganismoModel extends Model {
        
        public function ListarTitulos(){
            $titulos = $this->db->query("SELECT * FROM tb_Organismos");
            return $titulos->getresult();
        }

        public function insertar($datos){
            $titulos = $this->db->table('tb_Organismos');
            $titulos->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerTitulos($data) {
			$DbTitulos = $this->db->table('tb_Organismos');
			$DbTitulos->where($data);
			return $DbTitulos->get()->getResultArray();
		}

        public function actualizar($data, $idTitulo) {
			$titulos = $this->db->table('tb_Organismos');
			$titulos->set($data);
			$titulos->where('idOrganismo', $idTitulo);
			return $titulos->update();
		}
        
        public function eliminar($data) {
			$titulos = $this->db->table('tb_Organismos');
			$titulos->where($data);
			return $titulos->delete();
		}

    }

?>