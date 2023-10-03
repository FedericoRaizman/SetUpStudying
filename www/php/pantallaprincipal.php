
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SetUpStudying</title>
</head>
<body>
    <header>
        <h1>Bienvenido a SetUpStudying <?php echo $_SESSION['Nombre']?></h1>
    </header>
    <main>
        <section>
            <h2>Calendario</h2>
            <!-- Aquí podrías insertar un widget o código para el calendario -->
            <div id="calendar-placeholder">
                <!-- El calendario se mostrará aquí -->
            </div>
        </section>
    </main>
    <?php include("subirarchivos.php");?>
    <footer>
        <p>SetUpStudying - Todos los derechos reservados.</p>
    </footer>
</body>
</html>

