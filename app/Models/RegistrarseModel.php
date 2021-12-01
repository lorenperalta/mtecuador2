<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrarseModel extends Model
{
    public function insertar2($datos)
    {
        $registro1 = $this->db->table('detalle_clientes');
        $registro2 = $this->db->table('clientes');
        $registro1->insert($datos);
        $registro2->insert($datos);
    }

    public function insertar($datos)
    {
        $razon_social = $datos[0]['razon_social'];
        $abreviatura = $datos[0]['abreviatura'];
        $RUC_cliente = $datos[0]['RUC_cliente'];
        $celular_cliente = $datos[0]['celular_cliente'];
        $telefono_cliente = $datos[0]['telefono_cliente'];
        $localizacion = $datos[0]['localizacion'];
        $email_cliente = $datos[0]['email_cliente'];
        $fecha = $datos[0]['fecha'];
        $numero_clientes = $datos[0]['numero_clientes'];
        $usuario = $datos[0]['usuario'];
        $contraseña = $datos[0]['contraseña'];

        
    }
}
