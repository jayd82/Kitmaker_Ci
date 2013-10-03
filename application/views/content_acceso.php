<!-- Begin Container -->
  <div id="container" class="opacity">
    <div class="full-width">
      <div class="one-third">
		<h2>¿Eres nuevo?</h2>
        <p>Registrate <a href='<?php echo base_url()."main/registro"; ?>'>aqui</a></p>
        <br />
        <br />
	  </div>
      <div class="two-third last">
        <h1>Acceso usuarios</h1>
		<?php
		echo form_open('main/login_validation');
		echo validation_errors();
		
		echo "<p>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo form_input('email', $this->input->post('email'));
		echo "</p>";
		
		echo "<p>Contrase&ntilde;a:&nbsp;";
		echo form_password('password');
		echo "</p>";
		
		echo "<p>";
		echo form_submit('login_submit', 'Aceptar');
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