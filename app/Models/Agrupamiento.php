<?php namespace App\Models;
use CodeIgniter\Model;
class Agrupamiento extends Model {
    public function Listar(){
        $DbAgrupamiento = $this->db->query("select * from tb_Agrupamientos");
         return $DbAgrupamiento->getResult();
    }
    public function insertar($datos){
        $DbAgrupamiento = $this->db->table('tb_Agrupamientos');
        $DbAgrupamiento->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $DbAgrupamiento =  $this->db->table('tb_Agrupamientos');
        $DbAgrupamiento->where($data);
        return $DbAgrupamiento->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $DbAgrupamiento = $this->db->table('tb_Agrupamientos');
        $DbAgrupamiento->set($data);
        $DbAgrupamiento->where('idAgrupamiento', $id);
        return $DbAgrupamiento->update();
    }
    
}

?>