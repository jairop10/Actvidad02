<?php
# Incluir la conexión
require_once "./config.php";

# Verificar si el parámetro "id" está presente en la URL y no está vacío
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    # Obtener el valor del parámetro "id" de la URL
    $id = trim($_GET["id"]);

    # Preparar una declaración de eliminación
    $sql = "DELETE FROM employees WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        # Vincular variables a la declaración preparada como parámetros
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        # Establecer parámetros
        $param_id = $id;

        # Ejecutar la declaración
        if (mysqli_stmt_execute($stmt)) {
            # Redireccionar a la página principal después de la eliminación exitosa
            header("location: index.php");
            exit();
        } else {
            echo "¡Oops! Algo salió mal. Por favor, inténtalo de nuevo más tarde.";
        }
    }

    # Cerrar declaración
    mysqli_stmt_close($stmt);

    # Cerrar conexión
    mysqli_close($link);
} else {
    # Mostrar un mensaje de error si no se proporciona el parámetro "id"
    echo "¡Oops! No se proporcionó el ID del empleado para eliminar.";
}
?>
