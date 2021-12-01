<?php namespace App\Models;
use CodeIgniter\Model;
class Categoria extends Model {
    public function Listar(){
        $DbCategorias = $this->db->query("select * from tb_Categorias");
         return $DbCategorias->getResult();
    }
    public function insertar($datos){
        $DbCategorias = $this->db->table('tb_Categorias');
        $DbCategorias->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $DbCategorias =  $this->db->table('tb_Categorias');
        $DbCategorias->where($data);
        return $DbCategorias->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $DbCategorias = $this->db->table('tb_Categorias');
        $DbCategorias->set($data);
        $DbCategorias->where('idCategoria', $id);
        return $DbCategorias->update();
    }
    
    
}

?>