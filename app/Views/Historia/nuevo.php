<?

class Ros extends CI_Controller 
{

	function Ros()
	{
		parent::__construct();
		
		$this->load->model('actualeg_adm/ros_model');
		$this->load->model('actualeg_adm/tipo_doc_model');
		$this->load->model('actualeg_adm/tema_ro_model');
		$this->load->model('actualeg_adm/funciones_model');
		$this->load->model('actualeg_adm/organismos_model');
		$this->load->model('actualeg_adm/categorias_model');
		$this->load->library('pagination');
		
		//Variables de session
		$sess_id_usuario = $this->session->userdata('sess_id_usuario'); 
		$sess_id_roll = $this->session->userdata('sess_id_roll');
		$sess_sistema = $this->session->userdata('sess_sistema');
		
		//Validando que existe la session, de lo contrario redirecciono a la pagina de Login
		if (($sess_id_usuario == FALSE) OR ($sess_sistema != 'actualeg_adm') OR ($sess_id_roll > 2)) redirect('actualeg_adm/login/error_login');
	}
	
	function index()
	{
		$this->session->unset_userdata('sess_busqueda'); 		// Variables de Session que me permiten manipular los filtros del buscador, son borradas en el Inicio del controler
		$this->session->set_userdata('sess_busqueda', 0);		// No hay busqueda Establecida
		$this->session->set_userdata('sess_borrado', 0); 		// Selecionar No borrados
		$this->listar();	
	}
	
	function purgar()
	{
		$this->session->unset_userdata('sess_busqueda'); 		// Variables de Session que me permiten manipular los filtros del buscador, son borradas en el Inicio del controler
		$this->session->set_userdata('sess_busqueda', 0);		// No hay busqueda Establecida
		$this->session->set_userdata('sess_borrado', 1); 		// Selecionar borrados
		$this->listar();	
	}
	
	function listar()
	{
		$limite = 20;
		$funcion = $this->uri->segment(3, 0);

		if ($funcion == 'listar') $pag = $this->uri->segment(4, 0);
		else $pag = 0;
		
		$array_like = FALSE;
		$list_palabras = FALSE;
		$array_where = FALSE;
		
		$data['NombRO'] = '';
		$data['fecha'] = '';
		$data['NoRO'] = '';
		$data['TipoDoc'] = 0;
		
		if ($this->session->userdata('sess_borrado') == 0)
		{	
			$where['campo'] = 'tb_RegistrosOfi.Borrado';
			$where['valor'] = 0;
			$array_where[1] = $where;
		}
		else
		{
			$where['campo'] = 'tb_RegistrosOfi.Borrado';
			$where['valor'] = 1;
			$array_where[1] = $where;
		}
		
		if ($this->session->userdata('sess_busqueda') != 0)
		{
			$busqueda = $this->session->userdata('sess_busqueda');
			
			if ((isset($busqueda['NombRO'])) && ($busqueda['NombRO'] != ''))
			{
				$array_like = $busqueda['NombRO'];
				$list_palabras = split(" ",$array_like);
				
				$data['NombRO'] = $busqueda['NombRO'];
			}

			if ((isset($busqueda['fecha'])) && ($busqueda['fecha'] != ''))
			{
				$where['campo'] = 'tb_RegistrosOfi.Fecha';
				$where['valor'] = $busqueda['fecha'];
				$array_where[2] = $where;
				
				$data['fecha'] = $busqueda['fecha'];
			}
			
			if ((isset($busqueda['NoRO'])) && ($busqueda['NoRO'] != ''))
			{
				$where['campo'] = 'tb_RegistrosOfi.NoRO';
				$where['valor'] = $busqueda['NoRO'];
				$array_where[3] = $where;
				
				$data['NoRO'] = $busqueda['NoRO'];
			}

			if ((isset($busqueda['TipoDoc'])) && ($busqueda['TipoDoc'] != 0))
			{
				$where['campo'] = 'tb_RegistrosOfi.TipoDoc';
				$where['valor'] = $busqueda['TipoDoc'];
				$array_where[4] = $where;
				
				$data['TipoDoc'] = $busqueda['TipoDoc'];
			}
		}
		
		$rs_ros = $this->ros_model->listar($limite, $pag, $array_where, $array_like, $list_palabras);
		
		$data['rs_ros'] = $rs_ros;
		
		if ($rs_ros != FALSE) 
		{
			$Nro_Registros = $this->ros_model->total_registros($array_where, $array_like, $list_palabras);
			$config = $this->config_var_page($limite, $Nro_Registros);
			$data['config'] = $config;
		}
		
		$list_tipo_doc = $this->tipo_doc_model->list_tip_doc();
		$list_tipo_doc[0] = 'Todos';
		$data['list_tipo_doc'] = $list_tipo_doc; 
		
		if ($this->session->userdata('sess_borrado') == 0) $this->load->view('actualeg_adm/ros_views/ros_view', $data);
		else $this->load->view('actualeg_adm/ros_views/ros_bor_view', $data);
	}
	
	function config_var_page($limite, $Nro_Registros)
	{
		$config['first_link'] = ' Primeros ';				//El texto que le gustaría que se muestre en el "primer" enlace de la izquierda.
		$config['last_link'] = ' &Uacute;ltimos ';					//El texto que le gustaría que se muestre en el "último" enlace de la derecha.
		$config['next_link'] = ' Siguientes ';				//El texto que le gustaría que se muestre en el enlace de página "siguiente".
		$config['prev_link'] = ' Anteriores ';				//El texto que le gustaría que se muestre en el enlace de página "anterior".
		
		$config['base_url'] = base_url().'index.php/actualeg_adm/ros/listar/';
		$config['uri_segment'] = 4; 						// Define a partir de cual segemento URI se tendra ne Cuenta, por defecto 3, para esta aplicacion: 4
		$config['total_rows'] = $Nro_Registros;
		$config['per_page'] = $limite;

		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		
		return $config;
	}
	
	function buscar_nombre()
	{
		$this->form_validation->set_rules('NombRO', 'Nombre del Registro Oficial', 'trim|required|min_length[3]|max_length[60]|xss_clean');
		
		if ($this->form_validation->run() == FALSE) $this->index(); 		//  Validacion es False, se llama a la vista, con los mensages de errores
		else
		{
			$busqueda['NombRO'] = $this->input->post('NombRO', TRUE);
			$this->session->set_userdata('sess_busqueda', $busqueda);
			$this->listar();
		}	
	}
	
	function buscar_fecha()
	{
		$this->form_validation->set_rules('fecha', 'Fecha', 'trim|required|min_length[8]|max_length[10]|xss_clean');
		
		if ($this->form_validation->run() == FALSE) $this->index(); 		//  Validacion es False, se llama a la vista, con los mensages de errores
		else
		{
			$busqueda['fecha'] = $this->input->post('fecha', TRUE);
			$this->session->set_userdata('sess_busqueda', $busqueda);
			$this->listar();
		}	
	}
	
	function buscar_no()
	{
		$this->form_validation->set_rules('NoRO', 'N&uacute;mero del Registro Oficial', 'trim|required|numeric|max_length[5]|xss_clean');
		
		if ($this->form_validation->run() == FALSE) $this->index(); 		//  Validacion es False, se llama a la vista, con los mensages de errores
		else
		{
			$busqueda['NoRO'] = $this->input->post('NoRO', TRUE);
			$this->session->set_userdata('sess_busqueda', $busqueda);
			$this->listar();
		}	
	}
	
	function buscar_tipodoc()
	{
		$busqueda['TipoDoc'] = $this->input->post('tipo_doc');
		$this->session->set_userdata('sess_busqueda', $busqueda);
		$this->listar();
	}
		
	function fecha_valida()  // Chequea si la fecha introducida es Valida
	{
		$mes = $this->input->post('FechaMes');
		$dia = $this->input->post('FechaDia');
		$ano = $this->input->post('FechaAno');
		
		if (checkdate($mes, $dia, $ano) == FALSE) $result = FALSE;
		else $result = TRUE;
		
		if ($result == FALSE) $this->form_validation->set_message('fecha_valida', 'La Fecha introducida no es V&aacute;lida.'); 
		return $result;
	}
	
	function ro_valido()
	{
		$NombRO = $this->input->post('NombRO', TRUE);
		$Ano = $this->input->post('Ano', TRUE); 
		$idRO = $this->input->post('hf_idRO');
		
		$result = $this->ros_model->ro_valido($NombRO, $idRO, $Ano);
		
		if ($result == FALSE) $this->form_validation->set_message('ro_valido', 'Esa Documento ya existe en el Sistema.');
		return $result;
	}
	
	function validar_form()
	{
		$this->form_validation->set_rules('NombRO', 'Nombre de Registro Oficial', 'trim|required|max_length[60]|xss_clean|callback_ro_valido');
		$this->form_validation->set_rules('NoRO', 'No. de Registro Oficial', 'trim|required|numeric|max_length[5]|xss_clean');
		$this->form_validation->set_rules('Ano', 'A&ntilde;o de Registro Oficial', 'trim|required|numeric|max_length[2]|xss_clean');
		$this->form_validation->set_rules('FechaMes', '', 'callback_fecha_valida');
	}
	
	function mostrar($idRO)
	{
		$ro = $this->ros_model->detalles_ro($idRO);
		if ($ro == FALSE) $data['ro'] = FALSE; 						// No hay informacion del RO --- Error
		else 
		{
			$list_meses = $this->date_model->list_meses();						
			$ro['NombreFechaMes'] = $list_meses[$ro['FechaMes']]; 
 
			$list_tipo_doc = $this->tipo_doc_model->list_tip_doc();				
			$ro['NombreTipoDoc'] = $list_tipo_doc[$ro['TipoDoc']]; 				
			
			$data['ro'] = $ro;
			$data['tema'] = FALSE;
			$data['list_temas'] = $this->tema_ro_model->list_temas($idRO);
			$data['list_funciones'] = $this->funciones_model->array_funciones();
			$data['list_organismos'] = $this->organismos_model->array_organismos();
			$data['list_categorias'] = $this->categorias_model->array_categorias();
		}
		$this->load->view('actualeg_adm/ros_views/ro_view', $data);
	}
	
	function editar($idRO)
	{
		$ro = $this->ros_model->detalles_ro($idRO);
		if ($ro == FALSE) 	$data['ro'] = FALSE; 						
		else 
		{
			$data['list_dias'] = $this->date_model->list_dias(); 				
			$data['list_meses'] = $this->date_model->list_meses();				
			$data['list_anos'] = $this->date_model->list_anos_i(2000);			
			$data['list_tipo_doc'] = $this->tipo_doc_model->list_tip_doc();	
			$data['ro'] = $ro; 													
			$data['list_temas'] = $this->tema_ro_model->list_temas($idRO);	
		}
		$this->load->view('actualeg_adm/ros_views/ro_edit_view', $data);
	}
	
	function editar_do()
	{
		$this->validar_form();
		
		$ro['idRO'] = $this->input->post('hf_idRO');
		$ro['NombRO'] = $this->input->post('NombRO', TRUE);
		$ro['NoRO'] = $this->input->post('NoRO', TRUE);
		$ro['Ano'] = $this->input->post('Ano', TRUE);
		$ro['Fecha'] = $this->input->post('FechaDia').'/'.$this->input->post('FechaMes').'/'.$this->input->post('FechaAno');
		$ro['FechaDia'] = $this->input->post('FechaDia');
		$ro['FechaMes'] = $this->input->post('FechaMes');
		$ro['FechaAno'] = $this->input->post('FechaAno');
		$ro['TipoDoc'] = $this->input->post('TipoDoc');
		
		if ($this->input->post('listo') == 1) $ro['Listo'] = 1 ; // El checkbox pasa por el Formulario de la Vista al Controlador, si esta Checked
		else $ro['Listo'] = 0;
		
		if ($this->form_validation->run() == FALSE)
		{	
			$data['ro'] = $ro;
			
			$data['list_dias'] = $this->date_model->list_dias(); 				
			$data['list_meses'] = $this->date_model->list_meses();				
			$data['list_anos'] = $this->date_model->list_anos_i(2000);
			$data['list_tipo_doc'] = $this->tipo_doc_model->list_tip_doc();		
			$data['list_temas'] = $this->tema_ro_model->list_temas($ro['idRO']);	
			
			$this->load->view('actualeg_adm/ros_views/ro_edit_view', $data);	
		}
		else 		
		{	
			$list_meses = $this->date_model->list_meses();
			
			if ($ro['FechaMes'] < 10) 	$nomb_mes = '0'.$ro['FechaMes'].' '.$list_meses[$ro['FechaMes']];
			else 	$nomb_mes = $ro['FechaMes'].' '.$list_meses[$ro['FechaMes']];
				
			$path = $ro['FechaAno'].'/'.$nomb_mes.'/'.$ro['NombRO'];
								
			$ro['Path'] = $path;
			$ro['idUsuarioMod'] = $this->session->userdata('sess_id_usuario');
			
			$this->ros_model->editar($ro);
			$this->mostrar($ro['idRO']);
		}
	}
	
	function insertar()
	{
		$data['ro'] = FALSE;
		$data['list_dias'] = $this->date_model->list_dias(); 				
		$data['list_meses'] = $this->date_model->list_meses();				
		$data['list_anos'] = $this->date_model->list_anos_i(2000);			 
		$data['list_tipo_doc'] = $this->tipo_doc_model->list_tip_doc();	
		
		$this->load->view('actualeg_adm/ros_views/ro_add_view', $data);
	}
		
	function insertar_do()
	{
		$this->validar_form();
		
		$ro['NombRO'] = $this->input->post('NombRO', TRUE);
		$ro['NoRO'] = $this->input->post('NoRO', TRUE);
		$ro['Ano'] = $this->input->post('Ano', TRUE);
		$ro['Fecha'] = $this->input->post('FechaDia').'/'.$this->input->post('FechaMes').'/'.$this->input->post('FechaAno');
		$ro['FechaDia'] = $this->input->post('FechaDia');
		$ro['FechaMes'] = $this->input->post('FechaMes');
		$ro['FechaAno'] = $this->input->post('FechaAno');
		$ro['TipoDoc'] = $this->input->post('TipoDoc');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$data['ro'] = $ro;
			$data['list_dias'] = $this->date_model->list_dias(); 				
			$data['list_meses'] = $this->date_model->list_meses();				
			$data['list_anos'] = $this->date_model->list_anos_i(2000);			
			$data['list_tipo_doc'] = $this->tipo_doc_model->list_tip_doc();		
			
			$this->load->view('actualeg_adm/ros_views/ro_add_view', $data);	
		}
		else 
		{
			$list_meses = $this->date_model->list_meses();
				
			if ($ro['FechaMes'] < 10) 	$nomb_mes = '0'.$ro['FechaMes'].' '.$list_meses[$ro['FechaMes']];
			else 	$nomb_mes = $ro['FechaMes'].' '.$list_meses[$ro['FechaMes']];
				
			$path = $ro['FechaAno'].'/'.$nomb_mes.'/'.$ro['NombRO'];
								
			$ro['Path'] = $path;
			$ro['Listo'] = 0;
			$ro['idUsuarioCreo'] = $this->session->userdata('sess_id_usuario');
			$ro['idUsuarioMod'] = $this->session->userdata('sess_id_usuario');
			$ro['Borrado'] = 0;
			$ro['Activo'] = 1;
			
			$idRO = $this->ros_model->insertar($ro);
			$this->mostrar($idRO);
		}
	}
	
	function eliminar($idRO)
	{
		$this->ros_model->eliminar($idRO);
		$this->index();
	}
	
	function recuperar($idRO)
	{
		$this->ros_model->recuperar($idRO);
		$this->purgar();
	}
	
	function purgar_do($idRO)
	{
		$this->ros_model->purgar_do($idRO);
		$this->purgar();	
	}
}
?>
