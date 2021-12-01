<?php namespace App\Controllers;
 use App\Models\Leyes;
 use App\Models\AgrupMenu;
 use App\Models\Libro;
 use App\Models\ArticulosModel;
 use App\Models\DisposicionModel;
 use App\Models\ReformatoriasModel;

 
class LeyesController extends BaseController{
    public function index(){
        $Leyes = new Leyes();
        $datos=$Leyes->Listar();
        $tb_agrup_menu = new AgrupMenu();
        $Agrup_Menu=$tb_agrup_menu->Listar();
        $data =[
            "datos" => $datos,
            "datosAgrup" =>$Agrup_Menu,
        ];
         return view('Administrador/Leyes/index',$data);
    }
    
    public function insertar(){
       
        $datos =[
            "NombreLey"        => $_POST['NombreLey'],
            "Cons_Prea_Intr"     => $_POST['Cons_Prea_Intr'],
            "nombre_doc"     => $_POST['nombre_doc'],
            "Considerando"     => $_POST['Considerando'],
            "idAgrupMenu"       => $_POST['idAgrupMenu'],
            "ano"       => $_POST['ano'],
            "Listo"      => 1,
            "idUsuarioCreo"          => 1,
            "idUsuarioMod"          =>1,
           
        ];
        $Leyes = new Leyes();
        $respuesta= $Leyes->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Leyes');

        }else{
            return redirect()->to(base_url().'/Leyes');

        }
        
    }
    public function editar($id){
        //$id= IdLey
        $data = ["idLey" => $id];
		$Leyes = new Leyes();
        $tb_agrup_menu = new AgrupMenu();
        $Libro = new Libro();
        $Dispo = new DisposicionModel();
        $Refo = new ReformatoriasModel();
        $Agrup_Menu=$tb_agrup_menu->Listar();
        $datosrefo=$Refo->ListarbyId($id);
		$respuesta = $Leyes->ObtenerbyId($data);
        $datosLibro=$Libro->ListarbyId($id);
        $dato_dispo=$Dispo->ListarById($id);
		$datos = ["datos" => $respuesta,
                  "datosLibro" => $datosLibro,
                  "datosdispo"=> $dato_dispo,
                  "dtrefo"=> $datosrefo,
                                        ];

		return view('Administrador/Leyes/editar', $datos);
    }
    public function actualizar(){
		$datos = [
            "NombreLey"        => $_POST['NombreLey'],
            "Cons_Prea_Intr"     => $_POST['Cons_Prea_Intr'],
            "nombre_doc"     => $_POST['nombre_doc'],
            "Considerando"     => $_POST['Considerando'],
            "idAgrupMenu"       => $_POST['idAgrupMenu'],
            "Listo"      => 1,
            "ano"       => $_POST['ano'],
            "idUsuarioCreo"          => 1,
            "idUsuarioMod"          =>1,
				];
		$id = $_POST['idLey'];

		$Leyes = new Leyes();

		$respuesta = $Leyes->actualizar($datos, $id);

		if ($respuesta) {
			return redirect()->to(base_url().'/Leyes');
		} else {
			return redirect()->to(base_url().'/Leyes');
		}
	}

    // controladores de CLientes solo  clientes 
    public function indexClieLeye($idAgrupMenu){
        
        
        

        $Leyes = new Leyes();
        $where=["idAgrupMenu"=>$idAgrupMenu];
        $datos=$Leyes->ObtenerbyId($where);
/*
        $Libros = new Libro();
        $DbLibro = $Libros->ListarbyId($datos[0]["idLey"]);*/

        $ArticulosModel = new ArticulosModel();
        $dbArticulosModel=$ArticulosModel->MostrarLey($datos[0]["idLey"]);
        
        $data =[
            "Ley" => $datos,
            "Libro"=>$dbArticulosModel,
            
        ];
         return view('Clientes/Leyes/index',$data);
    }
    public function indexClieLey($idAgrupMenu){
            
        $Leyes = new Leyes();
        $where=["idAgrupMenu"=>$idAgrupMenu];
        $datos=$Leyes->ListarbyMenu($idAgrupMenu);
        
        $data =[
            "Ley" => $datos,
           
            
        ];
         return view('Clientes/Leyes/Listar',$data);
    }
    /// mostrar  cliente

	public function obtener_campos_ley($idAgrupMenu){
            
        $Leyes = new Leyes();
        $where=["idAgrupMenu"=>$idAgrupMenu];
        $datos=$Leyes->ListarbyMenu($idAgrupMenu);
        $Articulos = new ArticulosModel();
        $art = $Articulos->MostrarLey($idAgrupMenu);
        $data =[
            "Ley" => $datos,
           
            "Articulo"=>$art
        ];
         return view('Clientes/Leyes/Listar',$data);
    }
    public function LeyMOstrar($idLey){
            
        $Leyes = new Leyes();
        $where=["idLey"=>$idLey];
        $datos=$Leyes->ObtenerbyId($where);
        $Articulos = new ArticulosModel();
        
        $art = $Articulos->MostrarLey($idLey);

        $dis= new DisposicionModel();
        $dbDis=$dis->ListarByIdd($idLey);

        $data =[
            "dbd" => $dbDis,
            "Ley" => $datos,
           
            "Articulo"=>$art
        ];
         return view('Clientes/Leyes/Mostrar',$data);
    }
	
   

}

?>