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
				
		redirect('main/normal');	
	}
	
	
}
?>