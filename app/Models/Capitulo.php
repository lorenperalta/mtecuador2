<?php namespace App\Models;
use CodeIgniter\Model;
class Capitulo extends Model {
    public function Listar($idTitulo){
        $DbCapitulos = $this->db->query("select * from tb_Capitulos where idTitulo=$idTitulo");
         return $DbCapitulos->getResult();
    }
    public function insertar($datos){
        $DbCapitulos = $this->db->table('tb_Capitulos');
        $DbCapitulos->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $DbCapitulos =  $this->db->table('tb_Capitulos');
        $DbCapitulos->where($data);
        return $DbCapitulos->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $DbCapitulos = $this->db->table('tb_Capitulos');
        $DbCapitulos->set($data);
        $DbCapitulos->where('idCapitulo', $id);
        return $DbCapitulos->update();
    }
    
    
}

?>