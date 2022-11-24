<?php

include_once("conexion.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "SELECT * FROM contacto WHERE id_contacto='$id' ";
    $resultado=mysqli_query($con, $sql);


    if($fila=mysqli_fetch_assoc($resultado))
    {

    }

}

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $id=$_POST['id'];
    $sucursal=$_POST['sucursal'];
    $direccion=$_POST['direccion'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $cel=$_POST['cel'];
    $whatsapp=$_POST['whatsapp'];


    $sql= "UPDATE contacto SET nombre_suc='$sucursal', direccion='$direccion', email='$email', tel='$tel', cel='$cel', whatsapp='$whatsapp' WHERE id_contacto='$id'";

    $resultado=mysqli_query($con, $sql);
    if ($resultado)
    {
        echo 
        "
        <script>
            alert('Ya se envio padrino ');
            location.href = 'administrar.php';
        </script>
        
        ";
    }
    else {
        echo 
        "
        <script>
            alert('Te falta coco');
        </script>
        
        ";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<style>      

</style>
    <h1 style="text-align: center;">Actualizar Contacto</h1>

    <nav>
        <a href="administrar.php">Administrar</a>
    </nav>


    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

            <input type="hidden" name="id" value="<?php echo $fila['id_contacto']?>">

            <div class="m-3">
                <label for="">Sucursal</label>
                <input type="text" name="sucursal" value="<?php echo $fila['nombre_suc']?>">
            </div>

            <div class="m-3">
                <label for="">Direccion</label>
                <input type="text" name="direccion"  value="<?php echo $fila['direccion']?>">
            </div>

            <div class="m-3">
                <label for="">E-mail</label>
                <input type="text" name="email" value="<?php echo $fila['email']?>">
            </div>

            <div class="m-3">
                <label for="">Teléfono</label>
                <input type="tel" name="tel" value="<?php echo $fila['tel']?>">
            </div>

            <div class="m-3">
                <label for="">Celular</label>
                <input type="tel" name="cel" value="<?php echo $fila['cel']?>">
            </div>

            <div class="m-3">
                <label for="">Whatsapp</label>
                <input type="text" name="whatsapp" value="<?php echo $fila['whatsapp']?>">
            </div>

            <input type="submit" value="Guardar" name="guardar">
    </form>
    </div>

</body>

</html>