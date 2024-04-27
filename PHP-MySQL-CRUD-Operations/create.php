<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <title>Operaciones CRUD en PHP</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
        <!-- Formulario comienza aquí -->
        <form action="insert.php" class="bg-light p-4 shadow-sm" method="post" novalidate>
          <div class="row gy-3">
            <div class="col-lg-6">
              <label for="fname" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="fname" id="fname" value="">
            </div>
            <div class="col-lg-6">
              <label for="lname" class="form-label">Apellido</label>
              <input type="text" class="form-control" name="lname" id="lname" value="">
            </div>
            <div class="col-lg-12">
              <label for="email" class="form-label">Correo Electrónico</label>
              <input type="email" class="form-control" name="email" id="email" value="">
            </div>
            <div class="col-lg-6">
              <label for="age" class="form-label">Edad</label>
              <input type="text" class="form-control" name="age" id="age" value="">
            </div>
            <div class="col-lg-6">
              <label for="gender" class="form-label">Género</label>
              <select name="gender" class="form-select" id="gender">
                <option selected disabled>Seleccionar Género</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otros">Otros</option>
              </select>
            </div>
            <div class="col-lg-6">
              <label for="designation" class="form-label">Cargo</label>
              <select name="designation" class="form-select" id="designation">
                <option selected disabled>Seleccionar Cargo</option>
                <option value="Diseñador UI">Diseñador UI</option>
                <option value="Desarrollador Frontend">Desarrollador Frontend</option>
                <option value="Desarrollador PHP">Desarrollador PHP</option>
                <option value="Desarrollador Android">Desarrollador Android</option>
              </select>
            </div>
            <div class="col-lg-6">
              <label for="date" class="form-label">Fecha de Ingreso</label>
              <input type="date" class="form-control" name="date" id="date" value="">
            </div>
            <div class="col-lg-12 d-grid">
              <button type="submit" class="btn btn-primary">Agregar Empleado</button>
            </div>
          </div>
        </form>
        <!-- Formulario termina aquí -->
        <!-- Botón para volver a la lista -->
        <div class="mt-3">
          <a href="http://localhost/PHP-MySQL-CRUD-Operations" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Volver a la Lista
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
