<?= $this->extend('Layout/Clientedash');
$cont = 1;
?>
<?= $this->section('contenido') ?>

<?php
    function word_limiter($str, $limit = 100, $end_char = '&#8230;')
	{
		if (trim($str) == '')
		{
			return $str;
		}

		preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

		if (strlen($str) == strlen($matches[0]))
		{
			$end_char = '';
		}

		return rtrim($matches[0]).$end_char;
	}
  function a_romano($integer, $upcase = true) 
  {
      $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 
                     'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9,   
                     'V'=>5, 'IV'=>4, 'I'=>1);
      $return = '';
      while($integer > 0) 
      {
          foreach($table as $rom=>$arb) 
          {
              if($integer >= $arb)
              {
                  $integer -= $arb;
                  $return .= $rom;
                  break;
              }
          }
      }
      return $return;
  }
  function to_ordinal_M($numero)
	{
		$unidades = array(1 => 'Primero', 2 => 'Segundo', 3 => 'Tercero', 4 => 'Cuarto', 5 => 'Quinto', 6 => 'Sexto', 7 => 'Séptimo', 8 => 'Octavo', 9 => 'Noveno');
		$decenas = array(1 => 'Décimo', 2 => 'Vigésimo', 3 => 'Trigésimo', 4 => 'Cuadragésimo', 5 => 'Quincuagésimo', 6 => 'Sexagésimo', 7 => 'Septuagésimo', 8 => 'Octogésimo', 9 => 'Nonagésimo');
		
		if ($numero < 1 || $numero > 99) $result = $numero;
		else
		{
			switch (strlen($numero))
			{
				case 1:
					$result = $unidades[$numero]; 
					break;
				case 2:
					if ($numero[1] == 0) $result = $decenas[$numero[0]];
					else $result = $decenas[$numero[0]].$unidades[$numero[1]];
					break;
			}
		}
		return $result;
	}
    function to_ordinal_F($numero)
	{
		$unidades = array(1 => 'Primera', 2 => 'Segunda', 3 => 'Tercera', 4 => 'Cuarta', 5 => 'Quinta', 6 => 'Sexta', 7 => 'Séptima', 8 => 'Octava', 9 => 'Novena');
		$decenas = array(1 => 'Décima', 2 => 'Vigésima', 3 => 'Trigésima', 4 => 'Cuadragésima', 5 => 'Quincuagésima', 6 => 'Sexagésima', 7 => 'Septuagésima', 8 => 'Octogésima', 9 => 'Nonagésima');
		
		if ($numero < 1 || $numero > 99) $result = $numero;
		else
		{
			switch (strlen($numero))
			{
				case 1:
					$result = $unidades[$numero]; 
					break;
				case 2:
					if ($numero[1] == 0) $result = $decenas[$numero[0]];
					else $result = $decenas[$numero[0]].$unidades[$numero[1]];
					break;
			}
		}
		return $result;
	}
use App\Models\Capitulo;

$Libro = "";
$Titu = "";
$Cap = "";
$Sec = "";
$Par = "";
$ar = "";

?>

<div class="card">
                <div class="card-header  bg-primary">
                    <h3 class="card-title text-white">
                    <i class="fas fa-chart-pie mr-1"></i>
                    <?php echo "ley inotganica" ;?>
                    </h3>
                    <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart" data-toggle="tab">Considerando</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#List-Libros" data-toggle="tab">Contenido</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#List-Disposiciones" data-toggle="tab">Disposiciones</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#List-Reformatorias" data-toggle="tab">Reformatorias</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#list-Juriprudencias" data-toggle="tab">Juriprudencias</a>
                        </li>
                        
                    </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart"
                        style="position: relative; height: 300px;">
                        <?php 
                        echo $Ley[0]['Considerando'];
                        ?>
                    </div>
                    <div class="chart tab-pane" id="List-Libros" style="position: relative; height: 300px;">
                    <?php foreach ($Articulo as $key) : ?>
    <?php
    $i_art = 1;
    $i_rom = 1;
    $i_par = 1;
    $i_sec = 1;
    $i_cap = 1;
    $i_tit = 1;
    $i_lib = 1;


    if ($Libro != $key->NombreLibro) {
        echo "libro ";
        $key->idLibro;
        echo $key->NoLibro;
        $key->mostrar_NoLibro;
        echo $key->NombreLibro;
        $key->mostrar_NombreLibro;
        $Libro = $key->NombreLibro;
        $i_lib = $i_lib + 1;
    }
    echo '<ul>';
    if ($Titu != $key->NombreTitulo and $key->mostrar_NoTitulo == 1) {
        echo '<li>';

        echo "Titulo ";
        $key->idTitulo;
        echo a_romano($key->NoTitulo);
        echo ": ";
        $key->mostrar_NoTitulo;
        echo $key->NombreTitulo;
        $key->mostrar_NombreTitulo;
        $Titu = $key->NombreTitulo;
        $i_lib = $i_lib + 1;

        echo '</li>';
    }

    if ($Cap != $key->NombreCapitulo and $key->mostrar_NoCapitulo == 1) {

        echo '<ul>';
        echo '<li>';
        echo "Capitulo ";
        $key->idCapitulo;
        echo to_ordinal_M($key->NoCapitulo);
        echo ": ";
        $key->mostrar_NoCapitulo;
        echo $key->NombreCapitulo;
        $key->mostrar_NombreCapitulo;
        $Cap = $key->NombreCapitulo;
        $i_lib = $i_lib + 1;
        echo '</li>';
        echo '</ul>';
    }


    if ($Sec != $key->NombreSeccion and $key->mostrar_NombreSeccion == 1) {

        echo "Seccion ";
        $key->idSeccion;
        echo to_ordinal_F($key->NoSeccion);
        echo ": ";
        $key->mostrar_NoSeccion;
        echo $key->NombreSeccion;
        $key->mostrar_NombreSeccion;
        $Sec = $key->NombreSeccion;
        $i_lib = $i_lib + 1;
    }
    if ($Par != $key->NombreParagrafo and $key->mostrar_NombreParagrafo == 1) {


        echo "Paragrafo ";
        $key->idParagrafo;
        echo $key->NoParagrafo;
        $key->mostrar_NoParagrafo;
        echo $key->NombreParagrafo;
        $key->mostrar_NombreParagrafo;
        $Par = $key->NombreParagrafo;
        $i_lib = $i_lib + 1;
    }
    if ($ar != $key->ContenidoArticulo) {

        echo '<ul>';
        echo '<ul>';
        echo '<li>';
        echo '<a href="">';
        
        echo 'Art -  '.$key->noArticulo.': '.word_limiter(strip_tags($key->ContenidoArticulo),10);

        /*//$key->idArticulo;
        echo $key->noArticulo;
        //$key->mostrar_NoArticulo;
        echo  substr($key->ContenidoArticulo, 0, 150);
        echo '...';*/
        echo '</a>';
        //$key->mostrar_NombreArticulo;
        // $ar=$key->NombreArticulo;
        $i_lib = $i_lib + 1;
        echo '</li>';
        echo '</ul>';
        echo '</ul>';
    }
    echo '</ul>';

    ?>
                
     

     
                
                
<?php endforeach; ?>
                    </div>
                    <div class="chart tab-pane" id="List-Disposiciones" style="position: relative; height: 300px;">
                    <?php foreach ($dbd as $key) : ?>
                        <h1><?php echo $key->TipoDisposicion ?><br></h1>
                         <?php echo $key->ContenidoDisposicion ?>
                       
                    <?php endforeach; ?>
                    </div>
                    <div class="chart tab-pane" id="List-Reformatorias" style="position: relative; height: 300px;">
                    reformatorias
                    </div>
                    <div class="chart tab-pane" id="List-Juriprudencias" style="position: relative; height: 300px;">
                    juriprudencias
                    </div>
                    </div>
                </div><!-- /.card-body -->
            
                    </div>
<?= $this->endSection() ?>