<?php
include 'includes/header.php';
include 'includes/database.php';

if(!isset($_GET['id_pu'])){
    header('Location: index.php');
    exit();
}

$id = $_GET['id_pu'];
$query = "SELECT * FROM publicaciones WHERE id_pu=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();

if($result ->num_rows==0){
    echo '<div class="alert alert-warning">Publicación no encontrada</div>';
    exit();
}

$publicacion = $result->fetch_assoc();
?>

<h2 class="mb-4"><?php echo $publicacion['Titulo'];?></h2>
<div class="card">
    <div class="card-body">
        <p><?php echo $publicacion['Contenido'];?></p>
        <small class="text-muted"><?php echo $publicacion['Fecha'] ?></small>
    </div>
</div>