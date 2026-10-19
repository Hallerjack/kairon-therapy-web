<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar datos del formulario
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $correo = filter_var(trim($_POST["correo"]), FILTER_SANITIZE_EMAIL);
    $empresa = htmlspecialchars(trim($_POST["empresa"]));
    $mensaje = htmlspecialchars(trim($_POST["mensaje"]));

    // Configuración del correo
    $destinatario = "marce@kairontherapy.com";
    $asunto = "Nuevo contacto desde el sitio web - $empresa";

    // Cuerpo del correo
    $cuerpo = "Has recibido un nuevo mensaje de contacto desde la Landing Page:\n\n";
    $cuerpo .= "Nombre: $nombre\n";
    $cuerpo .= "Correo: $correo\n";
    $cuerpo .= "Empresa: $empresa\n\n";
    $cuerpo .= "Mensaje:\n$mensaje\n";

    // Cabeceras
    $headers = "From: $correo\r\n";
    $headers .= "Reply-To: $correo\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Enviar el correo
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        // Redirigir de vuelta con un mensaje de éxito (puedes crear una página gracias.html luego)
        echo "<script>alert('Mensaje enviado con éxito. Nos contactaremos pronto.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Hubo un error al enviar el mensaje. Por favor, intente nuevamente o escriba a marce@kairontherapy.com'); window.history.back();</script>";
    }
} else {
    // Si alguien intenta acceder directamente al archivo sin POST
    header("Location: index.html");
    exit;
}
?>