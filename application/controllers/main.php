<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	
	public function index()
	{
		$this->inicio();
	}

	public function inicio()
	{
		$this->load->model('model_posts');
		
		$data['results'] = $this->model_posts->ver_post();
		
		if($this->session->userdata('is_logged_in'))
		{
		
			redirect('main/normal');
			
		}else
		{
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('content_inicio');
			$this->load->view('posts', $data);
			$this->load->view('posts_final');
			$this->load->view('footer');
		}
	}
	
	public function acceso()
	{
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('content_acceso');
		$this->load->view('footer');
	}
	
	public function registro()
	{
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('content_registro');
		$this->load->view('footer');
	}
	
	public function normal()
	{
		
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->model('model_posts');
		
			$data['results'] = $this->model_posts->ver_post();
			
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('content_normal');
			$this->load->view('posts', $data);
			$this->load->view('posts_final');
			$this->load->view('footer');
		} else
		{
			redirect('main/restricted');			
		}
	}
	
	public function post()
	{
		if($this->session->userdata('is_logged_in'))
		{
						
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('content_post',$this->session->all_userdata());
			$this->load->view('footer');
		} else
		{
			redirect('main/restricted');			
		}
	}
		
	public function restricted()
	{
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('restricted');
		$this->load->view('footer');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('main/inicio');
	}

	public function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password','Contrase&ntilde;a','required|md5|trim');
		
				
		if ($this->form_validation->run())
		{
			$data = array(
				'email' => $this->input->post('email'),
				'is_logged_in' => 1
			);
			$this->session->set_userdata($data);
			
			redirect('main/normal');
			
		} else 
		{
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('content_acceso');
			$this->load->view('footer');
		}
	}
	
	public function signup_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[usuarios.email]');
		$this->form_validation->set_rules('password','Contrase&ntilde;a','required|trim');
		$this->form_validation->set_rules('cpassword','Contrase&ntilde;a repetida','required|trim|matches[password]');
		
		$this->form_validation->set_message('is_unique', "El correo introducido ya existe.");
		
		if ($this->form_validation->run())
		{
			$key = md5(uniqid());
			
			$this->load->library('email', array('mailtype'=>'html'));
			$this->load->model('model_usuarios');
			
			$this->email->from('admin@example.com', "Administrador");
			$this->email->to($this->input->post('email'));
			$this->email->subject("Confirma tu cuenta de usuario.");
			
			$message = "<p>Gracias por registrarse con nostros</p>";
			$message .= "<p><a href='".base_url()."main/registra_usu/$key'>Clic aqu&icute;</a> para confirmar registro</p>";
			
			$this->email->message($message);
			
			if ($this->model_usuarios->add_temp_user($key))
			{
				if ($this->email->send())
				{
					echo "<a href='".base_url()."main/registro'>Correo de confirmaci&ocute;n enviado.</a>";
					
				} else
				{
					echo "<a href='".base_url()."main/registro'>No se puedo enviar el correo de confirmaci&ocute;n...</a>";
				}
			} else 
			{
				echo "<a href='".base_url()."main/registro'>Error de al grabar en la base de datos.</a>";
			}
					
		} else 
		{
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('content_registro');
			$this->load->view('footer');
		}
	}
	
	public function post_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('titulo','Titulo','required|trim');
		$this->form_validation->set_rules('cuerpo','Cuerpo','required|trim');
		
		
		
		if ($this->form_validation->run())
		{
			$this->load->model('model_posts');
			
			$query = $this->db->query("SELECT id FROM usuarios WHERE email='".$this->input->post('usuario')."'");
			$row = $query->row();
			$id_usu = $row->id;
			
			
			$linea = array(
			'titulo' => $this->input->post('titulo'),
			'usuario' => $id_usu,
			'cuerpo' => $this->input->post('cuerpo'),
			'visible' => 1
			);
			
			$this->model_posts->publicar_post($linea);
					
		} else 
		{
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('content_post', $this->session->all_userdata());
			$this->load->view('footer');			
		}
	}
	
	public function registra_usu($key)
	{
		$this->load->model('model_usuarios');
		
		if($this->model_usuarios->is_valid_key($key))
		{
			if ($nuevo_email = $this->model_usuarios->add_user($key))
			{
				
				$data = array(
					'email' => $nuevo_email,
					'is_logged_in' => 1
				);
				
				$this->session->set_userdata($data);
				
				redirect('main/normal');
				
			} else
			{
				echo "<a href='".base_url()."main/registro'>Fallo al a&ntilde;adir usuario, intentalo de nuevo...</a>";
			}
		}else
		{
			echo "<a href='".base_url()."main/registro'>C&oacute;digo de seguridad inv&aacute;lido, lo sentimos vuelva a registrarse.</a>";
		}
		
	}
	
	public function validate_credentials()
	{
		$this->load->model('model_usuarios');
		
		if($this->model_usuarios->can_log_in())
		{
			return true;
		}else
		{
			$this->form_validation->set_message('validate_credentials','Nombre de usuario o contrase&ntilde;a incorrectos.');
			return false;
		}
	}	
		
}
