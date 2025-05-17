<?php include 'includes/header.php';
 include 'includes/database.php';?>

 <h2>Ultimas Publicaciones</h2>

<?php 
//obtener las publicaciones desde la bse de datos 
$query = "SELECT * FROM publicaciones ORDER BY Fecha desc";
$result = $conn->query($query);
 if ($result -> num_rows > 0)
 {
    echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">';
    while($row = $result -> fetch_assoc()){
        $fecha_formateada = date('d-m-Y H:i', strtotime($row['Fecha'])); //formato de fecha
        echo '<div class="col">';
        echo '<div class="card">';
        echo '<div class= "card-body">';
        echo '<h5 class= "card-title">'.$row['Titulo'].'</h5>';
        echo '<p class="card-text">'.substr($row['Contenido'],0,150).'...</p>';
        echo '<small class= "text-muted">'.$fecha_formateada.'</small>';
        echo '<div class="card-footer bg-transparent">';
            echo '<a href="post.php?id='.$row['id_pu'].'" class="btn btn-sm btn-primary float-end">Ver más</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
 }else {

    echo '<p class="text-muted">No hay publicaciones</p>';
}
$conn->close();
?>