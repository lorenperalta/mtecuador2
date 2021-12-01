<?php namespace App\Models;
use CodeIgniter\Model;
class Seccion extends Model {
    public function Listar($idCapitulo){
        $DbSeccions = $this->db->query("select * from tb_Secciones where idCapitulo=$idCapitulo");
         return $DbSeccions->getResult();
    }
    public function insertar($datos){
        $DbSeccions = $this->db->table('tb_Secciones');
        $DbSeccions->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $DbSeccions =  $this->db->table('tb_Secciones');
        $DbSeccions->where($data);
        return $DbSeccions->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $DbSeccions = $this->db->table('tb_Secciones');
        $DbSeccions->set($data);
        $DbSeccions->where('idSeccion', $id);
        return $DbSeccions->update();
    }
    
    
}

?>