<?php namespace App\Models;
use CodeIgniter\Model;
class Romano extends Model {
    public function Listar(){
        $DbRomanos = $this->db->query("select * from tb_Romanos");
         return $DbRomanos->getResult();
    }
    public function insertar($datos){
        $DbRomanos = $this->db->table('tb_Romanos');
        $DbRomanos->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $DbRomanos =  $this->db->table('tb_Romanos');
        $DbRomanos->where($data);
        return $DbRomanos->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $DbRomanos = $this->db->table('tb_Romanos');
        $DbRomanos->set($data);
        $DbRomanos->where('idRomano', $id);
        return $DbRomanos->update();
    }
    
    
}

?>