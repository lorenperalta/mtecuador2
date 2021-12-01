<?php namespace App\Models;

    use CodeIgniter\Model;

    class ArticulosModel extends Model {
        
        public function listar($idParagrafo){
            $articulos = $this->db->query("SELECT * FROM tb_Articulos where idParagrafo=$idParagrafo");
            return $articulos->getresult();
        }

        public function insertar($datos){
            $articulos = $this->db->table('tb_Articulos');
            $articulos->insert($datos);
            return $this->db->insertID(); 
        }

        public function obtenerDatos($data) {
			$DbArticulos = $this->db->table('tb_Articulos');
			$DbArticulos->where($data);
			return $DbArticulos->get()->getResultArray();
		}

        public function actualizar($data, $idArticulo) {
			$articulos = $this->db->table('tb_Articulos');
			$articulos->set($data);
			$articulos->where('idArticulo', $idArticulo);
			return $articulos->update();
		}
        
        public function eliminar($data) {
			$articulos = $this->db->table('tb_Articulos');
			$articulos->where($data);
			return $articulos->delete();
		}

        Public function MostrarLey($idLey){
            $articulos = $this->db->query(" select * from tb_Articulos inner join tb_Paragrafos on tb_Paragrafos.idParagrafo = tb_Articulos.idParagrafo inner JOIN tb_Secciones on tb_Secciones.idSeccion = tb_Paragrafos.idSeccion inner join tb_Capitulos on tb_Capitulos.idCapitulo = tb_Secciones.idCapitulo inner join tb_Titulos on tb_Titulos.idTitulo = tb_Capitulos.idTitulo INNER join tb_Libros on tb_Libros.idLibro = tb_Titulos.idLibro inner join tb_Leyes on tb_Leyes.idLey=tb_Libros.idLey WHERE tb_Libros.idLey=$idLey;");
            return $articulos->getresult();
           

        }
        
    }

?>