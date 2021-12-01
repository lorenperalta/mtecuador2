<?php namespace App\Models;
use CodeIgniter\Model;
class Usuario extends Model {
    public function Listar(){
        $DbUsuarios = $this->db->query("select * from Usuarios");
         return $DbUsuarios->getResult();
    }
    public function insertar($datos){
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
    }
    
    public function login($data) {
        $DbUsuarios =  $this->db->table('Usuarios');
        $DbUsuarios->where($data);
        return $DbUsuarios->get()->getResultArray();
    }
}

?>