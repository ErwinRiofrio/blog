<?php
session_start();
include 'includes/database.php';

$password_correcto = "admin123";

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['password']) && $_POST['password']== $password_correcto){
    $_SESSION['inicio']=true;
}

if(!isset($_SESSION['inicio'])){
    ?>
    <form action="admin.php" method="POST" class="container mt-5" style="max-width: 400px;">
        <div class="mb-3">
            <label for="">Contraseña del administrador:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Acceder</button>
    </form>
    <?php
    exit();
}

if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['Titulo'])){
    $titulo = $_POST['Titulo'];
    $Contenido = $_POST['Contenido'];

    $stmt = $conn->prepare("INSERT INTO publicaciones(Titulo,Contenido) VALUES(?,?)");
    $stmt->bind_param("ss", $titulo, $Contenido);
    if($stmt->execute()){
        $mensaje = "<div class='alert alert-success'>Publicación creada</div>";
    }else{
        $mensaje = "<div class= 'alert alert-danger'>Error al crear la publicación</div>";
    }

    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/header.php'; ?>
</head>
<body>
    <div class="container mt-4">
        <h2>Crear Nueva Publicación</h2>
        <?php if(isset($mensaje)) echo $mensaje; ?>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" class="form-control" name="Titulo" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contenido</label>
                <textarea name="Contenido" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Publicar</button>
        </form>
    </div>
</body>
</html>