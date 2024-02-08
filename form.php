<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Locaton:index.html");
}
    // Recibir los datos del formulario
    $format = $_POST["format"];
    $alçada = $_POST["alçada"];
    $amplada = $_POST["amplada"];
    $seleccio = $_POST["seleccio"];
    $marge = isset($_POST["marge"]) ? $_POST["marge"] : "No especificado";
    $persones = $_POST["persones"];
    $fons = $_POST["fons"];
    $textopcional = $_POST["textopcional"];
    $correu = $_POST["correu"];
    $imatge = $_FILES["imatge"]["name"]; // Nombre del archivo de imagen
    $estrellas = $_POST["estrellas"];

    // Procesar los datos recibidos como desees, por ejemplo, enviarlos por correo electrónico
    $mensaje = "Formato: $format\n";
    $mensaje .= "Tamaño: $grandaria\n";
    $mensaje .= "Selección de tamaño: $seleccio\n";
    $mensaje .= "Marge: $marge\n";
    $mensaje .= "Personas/Animales: $persones\n";
    $mensaje .= "Fondo: $fons\n";
    $mensaje .= "Texto opcional: $textopcional\n";
    $mensaje .= "Correo electrónico: $correu\n";
    $mensaje .= "Nombre de la imagen: $imatge\n";
    $mensaje .= "Puntuación: $estrellas\n";

    // Enviar el correo electrónico
    $para = "artelbb4@gmail.com"; // Cambia esta dirección de correo electrónico
    $titulo = "Nuevo pedido de dibujo recibido";
    $cabeceras = "From: $correu" . "\r\n" .
                 "Reply-To: $correu" . "\r\n" .
                 "X-Mailer: PHP/" . phpversion();

    // Si se ha subido una imagen, moverla a la carpeta deseada
    $carpeta_destino = "uploads/";
    $ruta_imagen = $carpeta_destino . basename($_FILES["imatge"]["name"]);
    move_uploaded_file($_FILES["imatge"]["tmp_name"], $ruta_imagen);

    // Aquí puedes enviar el correo electrónico con la función mail()
    $rta = mail($para, $titulo, $mensaje, $cabeceras);
    var_dump($rta);

?>

