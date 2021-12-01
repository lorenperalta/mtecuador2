<?php

namespace App\Models;

use CodeIgniter\Model;

class NosotrosModel extends Model
{

    public function listar()
    {
        $nosotros = $this->db->query("SELECT * FROM tb_Nosotros");
        return $nosotros->getresult();
    }

    public function insertar($datos)
    {
        $nosotros = $this->db->table('tb_Nosotros');
        $nosotros->insert($datos);
        return $this->db->insertID();
    }

    public function obtener($data)
    {
        $nosotros = $this->db->table('tb_Nosotros');
        $nosotros->where($data);
        return $nosotros->get()->getResultArray();
    }

    public function actualizar($data, $idNosotros)
    {
        $nosotros = $this->db->table('tb_Nosotros');
        $nosotros->set($data);
        $nosotros->where('idNosotros', $idNosotros);
        return $nosotros->update();
    }
}
