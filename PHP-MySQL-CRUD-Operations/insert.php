<?php
// Credenciales de la base de datos
define("DB_SERVER", "mysql");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "crud");

// Crear conexión
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificar conexión
if (!$link) {
  die("Error de conexión: " . mysqli_connect_error());
}

// Definir variables e inicializarlas con valores vacíos
$fname = $lname = $email = $age = $gender = $designation = $date = "";
$fname_err = $lname_err = $email_err = $age_err = $gender_err = $designation_err = $date_err = "";

// Procesar datos del formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validar Nombre
  if (empty(trim($_POST["fname"]))) {
    $fname_err = "Por favor, ingresa el nombre.";
  } else {
    $fname = trim($_POST["fname"]);
  }

  // Validar Apellido
  if (empty(trim($_POST["lname"]))) {
    $lname_err = "Por favor, ingresa el apellido.";
  } else {
    $lname = trim($_POST["lname"]);
  }

  // Validar Correo Electrónico
  if (empty(trim($_POST["email"]))) {
    $email_err = "Por favor, ingresa el correo electrónico.";
  } else {
    $email = trim($_POST["email"]);
  }

  // Validar Edad
  if (empty(trim($_POST["age"]))) {
    $age_err = "Por favor, ingresa la edad.";
  } elseif (!ctype_digit(trim($_POST["age"]))) {
    $age_err = "Por favor, ingresa un valor numérico positivo.";
  } else {
    $age = trim($_POST["age"]);
  }

  // Validar Género
  if (empty(trim($_POST["gender"]))) {
    $gender_err = "Por favor, selecciona el género.";
  } else {
    $gender = trim($_POST["gender"]);
  }

  // Validar Cargo
  if (empty(trim($_POST["designation"]))) {
    $designation_err = "Por favor, selecciona el cargo.";
  } else {
    $designation = trim($_POST["designation"]);
  }

  // Validar Fecha de Ingreso
  if (empty(trim($_POST["date"]))) {
    $date_err = "Por favor, selecciona la fecha de ingreso.";
  } else {
    $date = trim($_POST["date"]);
  }

  // Verificar errores de entrada antes de insertar en la base de datos
  if (empty($fname_err) && empty($lname_err) && empty($email_err) && empty($age_err) && empty($gender_err) && empty($designation_err) && empty($date_err)) {
    // Preparar una declaración de inserción
    $sql = "INSERT INTO employees (first_name, last_name, email, age, gender, designation, joining_date) VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Vincular variables a la declaración preparada como parámetros
      mysqli_stmt_bind_param($stmt, "sssssss", $param_fname, $param_lname, $param_email, $param_age, $param_gender, $param_designation, $param_date);

      // Establecer parámetros
      $param_fname = $fname;
      $param_lname = $lname;
      $param_email = $email;
      $param_age = $age;
      $param_gender = $gender;
      $param_designation = $designation;
      $param_date = $date;

      // Intentar ejecutar la declaración preparada
      if (mysqli_stmt_execute($stmt)) {
        // Redirigir a la página de destino
        header("location: index.php");
        exit();
      } else {
        echo "Algo salió mal. Por favor, inténtalo de nuevo más tarde.";
      }

      // Cerrar declaración
      mysqli_stmt_close($stmt);
    }
  }

  // Cerrar conexión
  mysqli_close($link);
}
?>
