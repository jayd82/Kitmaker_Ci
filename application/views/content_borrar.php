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
        <h1>Borrar un post</h1>
		<?php
		
		echo form_open('main/borrar_validation');
		echo validation_errors();
		
		$data = array();
    	foreach ($results->result_array() as $row)
        {
        	$data[$row['id']] = $row['titulo']; 
        } 
					
		echo "<p>Elige el titulo del post a censurar: ";
		echo form_dropdown('post_id', $data);
		echo "</p>";
		
		echo "<p>";
		echo form_submit('login_submit', 'Censurar');
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