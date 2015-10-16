<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php 


?>
    <div class="container">

      <form  class="form-ingreso " onsubmit="GuardarUsuario(); return false;">
        <h2 class="form-ingreso-heading">Darse de alta como usuario</h2>
        <label for="nombre" class="sr-only" hidden>Nombre</label>
                <input type="text" id="nombre" class="form-control" placeholder="nombre" required="" autofocus="" >
        <label for="correo" class="sr-only" hidden>Correo</label>
                <input type="text" id="correo" class="form-control" placeholder="correo" required="" autofocus="" >
        <label for="clave" class="sr-only" hidden>Clave</label>
                <input type="text" id="clave" class="form-control" placeholder="clave" required="" autofocus="" >
        
        <br>
          
        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <input type="hidden" name="id" id="id" readonly>
      </form>



    </div> <!-- /container -->

  
    
  
