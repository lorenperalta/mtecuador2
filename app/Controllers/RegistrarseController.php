<?php

namespace App\Controllers;

use App\Models\RegistrarseModel;
use App\Models\ClienteModel;
use App\Models\DetalleClienteModel;

use App\Libraries\Hash;

class RegistrarseController extends BaseController
{

    public function index()
    {
        $mensaje = session('mensaje');

        $data = [
            "mensaje" => $mensaje
        ];
        return view('Registrarse/index', $data);
    }

    public function crear()
    {
        $datos = [
            "razon_social" => $_POST['razon_social'],
            "abreviatura" => $_POST['abreviatura'],
            "RUC_cliente" => $_POST['RUC_cliente'],
            "celular_cliente" => $_POST['celular_cliente'],
            "telefono_cliente" => $_POST['telefono_cliente'],
            "localizacion" => $_POST['localizacion'],
            "email_cliente" => $_POST['email_cliente'],
            "fecha" => $_POST['fecha'],
            "numero_clientes" => 1,
            "estado" => 1
        ];

        $data = ["RUC_cliente" =>  $_POST['RUC_cliente']];
		$Crud = new ClienteModel();
		$respuestas = $Crud->obtenerCliente($data);
        //$ruc=$respuestas[0]["RUC_cliente"];
        if(count($respuestas)>0){
            echo "usuario ya existe";
        }else{
            $Crud->insertar($datos);
            $rpt=$Crud->ListarClientesid();
             foreach($rpt as $key):
                $id_cliente=$key->id_cliente;
                
             endforeach;
             $datos = [
                "id_cliente" => $id_cliente,
                "nombre" => $_POST['razon_social'],
                "apellido" => $_POST['abreviatura'],
                "dni" => $_POST['RUC_cliente'],
                "usuario" => $_POST['usuario'],
                "contraseña" => Hash::make($_POST['contraseña']),
                "estado" => 1,
            ];
            $detallecliente = new DetalleClienteModel();
            $respuestaf = $detallecliente->insertar($datos);
            if ($respuestaf > 0) {
                return redirect()->to(base_url() . '/DetalleCliente')->with('mensaje', '1');
            } else {
                return redirect()->to(base_url() . '/DetalleCliente')->with('mensaje', '0');
            }
        }

        /*if ($respuesta > 0) {
            return redirect()->to(base_url() . '/Registrarse')->with('mensaje', '1');
        } else {
            return redirect()->to(base_url() . '/Registrarse')->with('mensaje', '0');
        }*/
    }
}
