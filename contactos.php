<?php include 'includes/header.php'; ?>
<?php include 'includes/database.php'; ?>

<h2 class="mb-4">Contactanos</h2>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = $_POST['Nombre'];
        $email = $_POST['Email'];
        $mensaje = $_POST['mensaje'];

        //VAlidacion basica en php
        if(!empty($nombre) && !empty($email) && !empty($mensaje) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $stmt = $conn->prepare('INSERT INTO mensajes (Nombre, Email, mensaje) VALUES (?, ?, ?)');
            $stmt->bind_param("sss", $nombre, $email, $mensaje);

            if($stmt->execute()){
                echo '<div class="alert alert-success">Mensaje enviado correctamente</div>';
        }else{
            echo '<div class="alert alert-danger">Error al enviar el mensaje</div>';
        }
    }else{
        echo '<div class="alert alert-Warning">Por favor completa todos los campos correctamente</div>';
    }
}
?>

<form action="contactos.php" method="post" onsubmit="return validarformulario()">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="Nombre" id="Nombre" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="Email" id="Email" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Mensaje</label>
        <textarea class="form-control" name="mensaje" id="mensaje" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="reset" class="btn btn-secondary">Limpiar</button>
</form>
<script src="assets/js/scripts.js"></script>
<?php include 'includes/footer.php'; ?>