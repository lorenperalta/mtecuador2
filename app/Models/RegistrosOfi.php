<?php namespace App\Models;
use CodeIgniter\Model;
class RegistrosOfi extends Model {
    public function Listar(){
        $DbRegistrosOfi = $this->db->query("select * from tb_RegistrosOfi");
         return $DbRegistrosOfi->getResult();
    }
    /*public function insertar($datos){
        $DbUsuarios = $this->db->table('Usuarios');
        $DbUsuarios->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $DbUsuarios =  $this->db->table('Usuarios');
        $DbUsuarios->where($data);
        return $DbUsuarios->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $Nombres = $this->db->table('Usuarios');
        $Nombres->set($data);
        $Nombres->where('id', $id);
        return $Nombres->update();
    }*/
    
}

?>