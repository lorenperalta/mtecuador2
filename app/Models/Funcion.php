<?php namespace App\Models;
use CodeIgniter\Model;
class Funcion extends Model {
    public function Listar(){
        $DbFuncions = $this->db->query("select * from tb_Funciones");
         return $DbFuncions->getResult();
    }
    public function insertar($datos){
        $DbFuncions = $this->db->table('tb_Funciones');
        $DbFuncions->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $DbFuncions =  $this->db->table('tb_Funciones');
        $DbFuncions->where($data);
        return $DbFuncions->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $DbFuncions = $this->db->table('tb_Funciones');
        $DbFuncions->set($data);
        $DbFuncions->where('idFuncion', $id);
        return $DbFuncions->update();
    }
    
    
}

?>