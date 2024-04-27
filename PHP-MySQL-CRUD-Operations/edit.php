<?php
// Incluir la conexión a la base de datos y otras configuraciones necesarias
require_once "config.php";

// Definir variables e inicializarlas con valores vacíos
$fname = $lname = $email = $age = $gender = $designation = $date = "";
$fname_err = $lname_err = $email_err = $age_err = $gender_err = $designation_err = $date_err = "";

// Obtener el ID del empleado de la URL
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Preparar una declaración de selección
    $sql = "SELECT * FROM employees WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Vincular variables a la declaración preparada como parámetros
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Establecer parámetros
        $param_id = trim($_GET["id"]);

        // Intentar ejecutar la declaración preparada
        if (mysqli_stmt_execute($stmt)) {
            // Almacenar el resultado
            mysqli_stmt_store_result($stmt);

            // Verificar si existe un empleado con ese ID
            if (mysqli_stmt_num_rows($stmt) == 1) {
                // Vincular variables de resultado
                mysqli_stmt_bind_result($stmt, $id, $fname, $lname, $email, $age, $gender, $designation, $date);
                if (mysqli_stmt_fetch($stmt)) {
                    // Los datos del empleado se cargan en las variables
                }
            } else {
                // Si no se encuentra un empleado con ese ID, redirigir a la página de error o mostrar un mensaje de error
                // Por ejemplo: header("location: error.php");
                exit();
            }
        } else {
            echo "Algo salió mal. Por favor, inténtalo de nuevo más tarde.";
        }

        // Cerrar declaración
        mysqli_stmt_close($stmt);
    }

    // Cerrar conexión
    mysqli_close($link);
} else {
    // Si no se proporciona un ID válido en la URL, redireccionar a la página principal o mostrar un mensaje de error
    // Por ejemplo: header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Otros estilos CSS y enlaces a scripts JS aquí -->
</head>

<body>
    <div class="container">
        <h1>Editar Empleado</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
                <label for="fname" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname; ?>">
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Edad</label>
                <input type="text" class="form-control" id="age" name="age" value="<?php echo $age; ?>">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Género</label>
                <select class="form-select" id="gender" name="gender">
                    <option value="Masculino" <?php if ($gender == "Masculino") echo "selected"; ?>>Masculino</option>
                    <option value="Femenino" <?php if ($gender == "Femenino") echo "selected"; ?>>Femenino</option>
                    <option value="Otros" <?php if ($gender == "Otros") echo "selected"; ?>>Otros</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="designation" class="form-label">Cargo</label>
                <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $designation; ?>">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Fecha de Ingreso</label>
                <input type="text" class="form-control" id="date" name="date" value="<?php echo $date; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <!-- Otros elementos HTML y scripts JS aquí -->
</body>

</html>
