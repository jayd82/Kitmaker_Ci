<?php 

class model_usuarios extends CI_Model {
	
	public function can_log_in()
	{
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('password',md5($this->input->post('password')));
		$query = $this->db->get('usuarios');
		
		if ($query->num_rows() == 1)
		{
			return true;			
		}else 
		{
			return false;
		}
	}
		
	public function add_temp_user($key)
	{
		$data = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'key' => $key
		);
		
		$query = $this->db->insert('usuarios_tmp', $data);
			
		if ($query)
		{
			return true;			
		} else 
		{
			return false;
		}
	}
	
	public function is_valid_key($key)
	{
		
		$this->db->where('key',$key);
		$query = $this->db->get('usuarios_tmp');
		
		if ($query->num_rows() == 1)
		{
			return true;			
		}else 
		{
			return false;
		}
	}
	
public function add_user($key)
	{
		$this->db->where('key',$key);
		$tmp_usu = $this->db->get('usuarios_tmp');
		
	if ($tmp_usu)
		{
			$row = $tmp_usu->row();
			
			$data = array(
				'email' => $row->email,
				'password' => $row->password,
				'nivel' => 0
			);
			
			$did_add_user = $this->db->insert('usuarios', $data);
			
		}
		
		if ($did_add_user)
		{
			$this->db->where('key',$key);
			$this->db->delete('usuarios_tmp');
			return $data['email'];
			
		} else 
		{
			return false;
		}
	}
		
}

?>