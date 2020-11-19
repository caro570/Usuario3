<?php 

include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST ['usuario'];
$clave = $_POST['clave'];


$query = "INSERT INTO usuarios(nombre_completo,correo,usuario,clave) VALUES('$nombre_completo', '$correo', '$usuario', '$clave')";

//Verificar que el correo no se repita en la base de datos
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");

if (mysqli_num_rows($verificar_correo) > 0 ) {
  echo '
   <script>
       alert("Este correo ya esta registrado intenta con otro diferente");
       window.location = "index.php";
   </script>
  ';
  exit();
}

$ejecutar = mysqli_query($conexion, $query);



if ($ejecutar) {
	echo '
       <script>
            alert("Usuario alamacenado exitosamente");
            window.location = "index.php";
       </script>
       ';
}else{
    echo '
       <script>
            alert("Intentalo de nuevo usuario no alamacenado");
            window.location = "index.php";
       </script
       ';

   myqli_close($conexion);


 ?>