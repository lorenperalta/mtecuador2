<?php

namespace App\Controllers;

use App\Models\DetalleClienteModel;
use App\Libraries\Hash;

class DetalleClienteController extends BaseController
{

    public function index()
    {
        $detallecliente = new DetalleClienteModel();
        $datos = $detallecliente->listar();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('Administrador/DetalleCliente/index', $data);
    }

    public function crear()
    {
        $datos = [
            "id_cliente" => $_POST['id_cliente'],
            "nombre" => $_POST['nombre'],
            "apellido" => $_POST['apellido'],
            "dni" => $_POST['dni'],
            "usuario" => $_POST['usuario'],
            "contraseña" => Hash::make($_POST['contraseña']),
            "estado" => $_POST['estado'],
        ];

        $detallecliente = new DetalleClienteModel();
        $respuesta = $detallecliente->insertar($datos);

        if ($respuesta > 0) {
            return redirect()->to(base_url() . '/DetalleCliente')->with('mensaje', '1');
        } else {
            return redirect()->to(base_url() . '/DetalleCliente')->with('mensaje', '0');
        }
    }
    

    public function actualizar()
    {

        $datos = [
            "id_cliente" => $_POST['id_cliente'],
            "nombre" => $_POST['nombre'],
            "apellido" => $_POST['apellido'],
            "dni" => $_POST['dni'],
            "usuario" => $_POST['usuario'],
            "contraseña" => Hash::make($_POST['contraseña']),
            "estado" => $_POST['estado'],
        ];

        $detallecliente = new DetalleClienteModel();
        $idDetalleCli = $_POST['id_detalleCliente'];
        $respuesta = $detallecliente->actualizar($datos, $idDetalleCli);

        if ($respuesta) {
            return redirect()->to(base_url() . '/DetalleCliente')->with('mensaje', '2');
        } else {
            return redirect()->to(base_url() . '/DetalleCliente')->with('mensaje', '3');
        }
    }

    public function obtener($idDetalleCli)
    {
        $data = ["id_detalleCliente" => $idDetalleCli];
        $detallecliente = new DetalleClienteModel();
        $respuesta = $detallecliente->obtenerDatos($data);

        $datos = ["datos" => $respuesta];

        return view('Administrador/DetalleCliente/actualizar', $datos);
    }

    public function eliminar($idDetalleCli)
    {
        $detallecliente = new DetalleClienteModel();
        $data = ["id_detalleCliente" => $idDetalleCli];

        $respuesta = $detallecliente->eliminar($data);

        if ($respuesta) {
            return redirect()->to(base_url() . '/DetalleCliente')->with('mensaje', '4');
        } else {
            return redirect()->to(base_url() . '/DetalleCliente')->with('mensaje', '5');
        }
    }
    public function indexPersonal()
    {
        $detallecliente = new DetalleClienteModel();
        $datos = $detallecliente->listar();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('Clientes/Personal/index', $data);
    }
}
