<?php namespace App\Models;
use CodeIgniter\Model;
class Libro extends Model {
    public function ListarbyId($idLey){
        $DbLibros = $this->db->query("select * from tb_Libros where idLey=$idLey");
         return $DbLibros->getResult();
    }
    public function ListarbyIdAgrup($idAgrupMenu){
        $DbLibros = $this->db->query("select * from tb_Libros where idAgrupMenu=$idAgrupMenu");
         return $DbLibros->getResult();
    }
    public function insertar($datos){
        $DbLibros = $this->db->table('tb_Libros');
        $DbLibros->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $DbLibros =  $this->db->table('tb_Libros');
        $DbLibros->where($data);
        return $DbLibros->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $DbLibros = $this->db->table('tb_Libros');
        $DbLibros->set($data);
        $DbLibros->where('idLibro', $id);
        return $DbLibros->update();
    }
    
    
}

?>