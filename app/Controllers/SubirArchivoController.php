<?php namespace App\Controllers;

class SubirArchivoController extends BaseController {

    public
    function index() {
        $mensaje = session('mensaje');
        $data = [
            "mensaje" => $mensaje
        ];
        return view('/Administrador/SubirArchivo/index', $data);
    }

    function cargar_archivos() {
        $file = $this -> request ->getFile('archivo');

        if ($file->isValid()) {
            $file-> move('uploads');
            return redirect()->to(base_url().'/Administrador/SubirArchivo')->with('mensaje','1');
		} else {
            return redirect()->to(base_url().'/Administrador/SubirArchivo')->with('mensaje','0');
		}
    }
}

?>