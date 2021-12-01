<?php namespace App\Models;
use CodeIgniter\Model;

class Leyes extends Model {
    public function Listar(){
        $DbLeyess = $this->db->query("select * from tb_Leyes");
         return $DbLeyess->getResult();
    }

    public function ListarbyMenu($idAgrupMenu){
        $DbLeyess = $this->db->query("select * from tb_Leyes where idAgrupMenu=$idAgrupMenu");
         return $DbLeyess->getResult();
    }
    
    public function insertar($datos){
        $DbLeyess = $this->db->table('tb_Leyes');
        $DbLeyess->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $DbLeyess =  $this->db->table('tb_Leyes');
        $DbLeyess->where($data);
        return $DbLeyess->get()->getResultArray();
    }
   
    
    public function actualizar($data, $id) {
        $DbLeyess = $this->db->table('tb_Leyes');
        $DbLeyess->set($data);
        $DbLeyess->where('idLey', $id);
        return $DbLeyess->update();
    }

    function obtener_campos_ley($id_ley)
	{
		$array_where = array('tb_Libros.idLey' => $id_ley);
		$rs_articulos = $this->articulos_model->listar($array_where);
		
		if ($rs_articulos == FALSE) $result = FALSE;   		// No existen Articulos para esa Ley, está incompleta
		else 	
		{
			$i_art = 1;
			$i_rom = 1;
			$i_par = 1;
			$i_sec = 1;
			$i_cap = 1;
			$i_tit = 1;
			$i_lib = 1;
			
			foreach ($rs_articulos as $row):
			
				$articulo['idArticulo'] = $row['idArticulo'];
				$articulo['NoArticulo'] = $row['NoArticulo'];
				$articulo['ContenidoArticulo'] = $row['ContenidoArticulo'];
				$articulo['idRomano'] = $row['idRomano'];
				
				$list_articulos[$i_art] = $articulo;
				$i_art = $i_art + 1;
								
				if (   (! isset($list_romanos[$i_rom - 1]) )   or   ($list_romanos[$i_rom - 1]['idRomano'] != $row['idRomano'])   )
				{
					$romano['idRomano'] = $row['idRomano'];
					$romano['NoRomano'] = $row['NoRomano'];
					$romano['mostrar_NoRomano'] = $row['mostrar_NoRomano'];
					$romano['NombreRomano'] = $row['NombreRomano'];
					$romano['mostrar_NombreRomano'] = $row['mostrar_NombreRomano'];
					$romano['idParagrafo'] = $row['idParagrafo'];
					$list_romanos[$i_rom] = $romano;
					$i_rom = $i_rom + 1;
				}
				
				if (   (! isset($list_paragrafos[$i_par - 1]) )   or   ($list_paragrafos[$i_par - 1]['idParagrafo'] != $row['idParagrafo'])   )
				{
					$paragrafo['idParagrafo'] = $row['idParagrafo'];
					$paragrafo['NoParagrafo'] = $row['NoParagrafo'];
					$paragrafo['mostrar_NoParagrafo'] = $row['mostrar_NoParagrafo'];
					$paragrafo['NombreParagrafo'] = $row['NombreParagrafo'];
					$paragrafo['mostrar_NombreParagrafo'] = $row['mostrar_NombreParagrafo'];
					$paragrafo['idSeccion'] = $row['idSeccion'];
					$list_paragrafos[$i_par] = $paragrafo;
					$i_par = $i_par + 1;
				}
				
				if (   (! isset($list_secciones[$i_sec - 1]) )   or   ($list_secciones[$i_sec - 1]['idSeccion'] != $row['idSeccion'])   )
				{
					$seccion['idSeccion'] = $row['idSeccion'];
					$seccion['NoSeccion'] = $row['NoSeccion'];
					$seccion['mostrar_NoSeccion'] = $row['mostrar_NoSeccion'];
					$seccion['NoOrdSeccion'] = $this->numeros_model->to_ordinal_F($row['NoSeccion']);
					$seccion['NombreSeccion'] = $row['NombreSeccion'];
					$seccion['mostrar_NombreSeccion'] = $row['mostrar_NombreSeccion'];
					$seccion['idCapitulo'] = $row['idCapitulo'];
					$list_secciones[$i_sec] = $seccion;
					$i_sec = $i_sec + 1;
				}
				
				if (   (! isset($list_capitulos[$i_cap - 1]) )   or   ($list_capitulos[$i_cap - 1]['idCapitulo'] != $row['idCapitulo'])   )
				{
					$capitulo['idCapitulo'] = $row['idCapitulo'];
					$capitulo['NoCapitulo'] = $row['NoCapitulo'];
					$capitulo['mostrar_NoCapitulo'] = $row['mostrar_NoCapitulo'];
					$capitulo['NoOrdCapitulo'] = $this->numeros_model->to_ordinal_M($row['NoCapitulo']);
					$capitulo['NombreCapitulo'] = $row['NombreCapitulo'];
					$capitulo['mostrar_NombreCapitulo'] = $row['mostrar_NombreCapitulo'];
					$capitulo['idTitulo'] = $row['idTitulo'];
					$list_capitulos[$i_cap] = $capitulo;
					$i_cap = $i_cap + 1;
				}
				
				if (   (! isset($list_titulos[$i_tit - 1]) )   or   ($list_titulos[$i_tit - 1]['idTitulo'] != $row['idTitulo'])   )
				{
					$titulo['idTitulo'] = $row['idTitulo'];
					$titulo['NoTitulo'] = $row['NoTitulo'];
					$titulo['mostrar_NoTitulo'] = $row['mostrar_NoTitulo'];
					$titulo['NoRomTitulo'] = $this->numeros_model->to_roman($row['NoTitulo']);
					$titulo['NombreTitulo'] = $row['NombreTitulo'];
					$titulo['mostrar_NombreTitulo'] = $row['mostrar_NombreTitulo'];
					$titulo['idLibro'] = $row['idLibro'];
					$list_titulos[$i_tit] = $titulo;
					$i_tit = $i_tit + 1;
				}
				
				if (   (! isset($list_libros[$i_lib - 1]) )   or   ($list_libros[$i_lib - 1]['idLibro'] != $row['idLibro'])   )
				{
					$libro['idLibro'] = $row['idLibro'];
					$libro['NoLibro'] = $row['NoLibro'];
					$libro['mostrar_NoLibro'] = $row['mostrar_NoLibro'];
					$libro['NombreLibro'] = $row['NombreLibro'];
					$libro['mostrar_NombreLibro'] = $row['mostrar_NombreLibro'];
					$list_libros[$i_lib] = $libro;
					$i_lib = $i_lib + 1;
				}
			endforeach;
			
			$result['list_articulos'] = $list_articulos;
			$result['list_romanos'] = $list_romanos;
			$result['list_paragrafos'] = $list_paragrafos;
			$result['list_secciones'] = $list_secciones;
			$result['list_capitulos'] = $list_capitulos;
			$result['list_titulos'] = $list_titulos;
			$result['list_libros'] = $list_libros;	 
		}
		return $result;    // Devuelve FALSE o Arreglo con Informacion de la Ley [idLey, NombreLey, Considerando, Articulos]
	}
    
}

?>