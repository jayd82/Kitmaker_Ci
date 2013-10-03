<!-- Begin Container -->
  <div id="container" class="opacity">
    <div class="full-width">
      <div class="one-third">
		<h4>Men&uacute;</h4>
        <p><a href='<?php echo base_url()."main/post_adm"; ?>'>Publicar</a></p>
        <p><a href='<?php echo base_url()."main/borrar"; ?>'>Borrar</a></p>
        <p><a href='<?php echo base_url()."main/admin"; ?>'>Ver posts</a></p>
        <p><a href='<?php echo base_url()."main/logout" ?>'>Desconectar</a></p>
	  </div>
      <div class="two-third last">
        <h1>Publicar un post</h1>
		<?php
		echo form_open('main/post_validation');
		echo validation_errors();
		
		echo "<p>Titulo: ";
		echo form_input('titulo', $this->input->post('titulo'));
		echo "</p>";
		
		echo "<p>" . form_textarea('cuerpo') . "</p>";
		
		
		if (!isset($email))
		{
			echo form_hidden('usuario',$this->input->post('email'));
		} else
		{
			echo form_hidden('usuario',$email);
		}
				
		echo "<p>";
		echo form_submit('login_submit', 'Publicar');
		echo "</p>";
		
		echo form_close();
		?>
      </div>
      <div class="clear"></div>
    </div>
    <!-- End Full Width -->
    
    <div class="clear"></div>
    <div id="footer">
      <div class="footer-top"></div>
      <!-- Divider -->
      
      <div class="clear"></div>
    </div>
  </div>
  <!-- End Container -->