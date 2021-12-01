<?php namespace App\Controllers;

use App\Models\ClienteModel;

class ClienteController extends BaseController {
    
    public function index(){
        $cliente = new ClienteModel();
        $datos = $cliente->ListarClientes();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('Administrador/Cliente/index', $data);
    }
    
    public function crear(){
        $datos = [
            "razon_social" => $_POST['razon_social'],
            "abreviatura" => $_POST['abreviatura'],
            "RUC_cliente" => $_POST['RUC_cliente'],
            "celular_cliente" => $_POST['celular_cliente'],
            "telefono_cliente" => $_POST['telefono_cliente'],
            "localizacion" => $_POST['localizacion'],
            "email_cliente" => $_POST['email_cliente'],
            "fecha" => $_POST['fecha'],
            "numero_clientes" => $_POST['numero_clientes'],
            "estado" => $_POST['estado']
        ];

        $cliente = new ClienteModel();
        $respuesta = $cliente->insertar($datos);

        if ($respuesta > 0) {
			return redirect()->to(base_url().'/Cliente')->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/Cliente')->with('mensaje','0');
		}
    }

    public function actualizar(){

        $datos = [
            "razon_social" => $_POST['razon_social'],
            "abreviatura" => $_POST['abreviatura'],
            "RUC_cliente" => $_POST['RUC_cliente'],
            "celular_cliente" => $_POST['celular_cliente'],
            "telefono_cliente" => $_POST['telefono_cliente'],
            "localizacion" => $_POST['localizacion'],
            "email_cliente" => $_POST['email_cliente'],
            "fecha" => $_POST['fecha'],
            "numero_clientes" => $_POST['numero_clientes'],
            "estado" => $_POST['estado']
        ];
        
        $Crud = new ClienteModel();
        $idCliente = $_POST['id_cliente'];
        $respuesta = $Crud->actualizar($datos, $idCliente);

        if ($respuesta) {
            return redirect()->to(base_url().'/Cliente')->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/Cliente')->with('mensaje','3');
        }
    }

    public function obtenerCliente($id_cliente){
        $data = ["id_cliente" => $id_cliente];
		$Crud = new ClienteModel();
		$respuesta = $Crud->obtenerCliente($data);

		$datos = ["datos" => $respuesta];

		return view('Cliente/actualizar', $datos);
    }

    public function eliminar($id_cliente){
        $cliente = new ClienteModel();
		$data = ["id_cliente" => $id_cliente];

		$respuesta = $cliente->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/Cliente')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/Cliente')->with('mensaje','5');
		}
    }
    
}
