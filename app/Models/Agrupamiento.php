<?php namespace App\Models;
use CodeIgniter\Model;
class Agrupamiento extends Model {
    public function Listar(){
        $DbAgrupamiento = $this->db->query("select * from Agrupamiento");
         return $DbAgrupamiento->getResult();
    }
    public function insertar($datos){
        $DbAgrupamiento = $this->db->table('Agrupamiento');
        $DbAgrupamiento->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $DbAgrupamiento =  $this->db->table('Agrupamiento');
        $DbAgrupamiento->where($data);
        return $DbAgrupamiento->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $DbAgrupamiento = $this->db->table('Agrupamiento');
        $DbAgrupamiento->set($data);
        $DbAgrupamiento->where('id', $id);
        return $DbAgrupamiento->update();
    }
    
}

?>