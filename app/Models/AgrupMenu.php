<?php namespace App\Models;
use CodeIgniter\Model;
class AgrupMenu extends Model {
    public function Listar(){
        $DbAgrupMenus = $this->db->query("select * from tb_AgrupMenu");
         return $DbAgrupMenus->getResult();
    }
    public function insertar($datos){
        $DbAgrupMenus = $this->db->table('tb_AgrupMenu');
        $DbAgrupMenus->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $DbAgrupMenus =  $this->db->table('tb_Agrupmenu');
        $DbAgrupMenus->where($data);
        return $DbAgrupMenus->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $DbAgrupMenus = $this->db->table('tb_AgrupMenu');
        $DbAgrupMenus->set($data);
        $DbAgrupMenus->where('idAgrupMenu', $id);
        return $DbAgrupMenus->update();
    }
    
    
}

?>