<?php

namespace App\Models;

use CodeIgniter\Model;

class DiccionarioModel extends Model
{

    public function listar()
    {
        $diccionario = $this->db->query("SELECT * FROM tb_diccionario");
        return $diccionario->getresult();
    }

    public function insertar($datos)
    {
        $diccionario = $this->db->table('tb_diccionario');
        $diccionario->insert($datos);
        return $this->db->insertID();
    }

    public function obtener($data)
    {
        $diccionario = $this->db->table('tb_diccionario');
        $diccionario->where($data);
        return $diccionario->get()->getResultArray();
    }

    public function actualizar($data, $idDiccionario)
    {
        $diccionario = $this->db->table('tb_diccionario');
        $diccionario->set($data);
        $diccionario->where('idpalabra', $idDiccionario);
        return $diccionario->update();
    }

    public function eliminar($data)
    {
        $diccionario = $this->db->table('tb_diccionario');
        $diccionario->where($data);
        return $diccionario->delete();
    }
}
