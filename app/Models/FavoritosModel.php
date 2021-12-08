<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoritosModel extends Model
{

    public function listar()
    {
        $diccionario = $this->db->query("SELECT * FROM tb_Favoritos");
        return $diccionario->getresult();
    }

    public function eliminar($data)
    {
        $diccionario = $this->db->table('tb_Favoritos');
        $diccionario->where($data);
        return $diccionario->delete();
    }

    // public function insertar($datos)
    // {
    //     $diccionario = $this->db->table('tb_Favoritos');
    //     $diccionario->insert($datos);
    //     return $this->db->insertID();
    // }

    // public function obtener($data)
    // {
    //     $diccionario = $this->db->table('tb_Favoritos');
    //     $diccionario->where($data);
    //     return $diccionario->get()->getResultArray();
    // }

    // public function actualizar($data, $idDiccionario)
    // {
    //     $diccionario = $this->db->table('tb_Favoritos');
    //     $diccionario->set($data);
    //     $diccionario->where('idpalabra', $idDiccionario);
    //     return $diccionario->update();
    // }
   
}
