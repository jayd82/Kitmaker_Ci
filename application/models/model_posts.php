<?php 
class model_posts extends CI_Model {
	
	public function ver_post()
	{
		$query = $this->db->query("SELECT post.titulo, usuarios.email, post.cuerpo FROM post INNER JOIN usuarios ON post.usuario=usuarios.id AND post.visible=1;");
		
		return $query->result();
		
	}
	
	
	public function publicar_post($data)
	{
		$this->db->insert('post', $data);
				
		$this->db->where('id',$data['usuario']);
		$query = $this->db->get('usuarios');
		
		
		if ($query->num_rows() == 1)
		{
			$row = $query->row();
			
			if ($row->nivel)
			{
				redirect('main/admin');
			} else
			{
				redirect('main/normal');
			}			
		}else 
		{
			redirect('main/inicio');
		}			
	}
	
	public function ocultar_post($censurado)
	{
		$data = array(
               'visible' => 0
            );

		$this->db->where('id', $censurado);
		$this->db->update('post', $data);
		
		redirect('main/admin');
						
	}		
	
	public function cargar_post()
	{
		$query = $this->db->query("SELECT post.titulo, post.id FROM post WHERE post.visible=1;");
		
		return $query;
		
	}
}
?>