<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <title>Operaciones CRUD con PHP</title>
</head>

<body>
  <div class="container">
    <div class="py-4">
      <a href="./create.php" class="btn btn-secondary">
        <i class="bi bi-plus-circle-fill"></i> Agregar Empleado
      </a>
    </div>

    <!-- La tabla comienza aquí -->
    <table class="table table-bordered table-striped align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Dirección de Correo Electrónico</th>
          <th>Edad</th>
          <th>Género</th>
          <th>Rol</th>
          <th>Fecha de Ingreso</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once "./config.php";

        $sql = "SELECT * FROM employees";

        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $count = 1;
                foreach ($rows as $row) { ?>
                    <tr>
                        <td><?= $count++; ?></td>
                        <td><?= $row["first_name"]; ?></td>
                        <td><?= $row["last_name"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><?= $row["age"]; ?></td>
                        <td><?= $row["gender"]; ?></td>
                        <td><?= $row["designation"]; ?></td>
                        <td><?= $row["joining_date"]; ?></td>
                        <td>
                            <a href="./update.php?id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <a href="./delete.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
                                <i class="bi bi-trash-fill"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                <?php }
                mysqli_free_result($result);
            } else { ?>
                <tr>
                    <td class="text-center text-danger fw-bold" colspan="9">** No se encontraron registros **</td>
                </tr>
            <?php }
        }
        mysqli_close($link);
        ?>
      </tbody>
    </table>
  </div>

  <script>
    const delBtnEl = document.querySelectorAll(".btn-danger");
    delBtnEl.forEach(function(delBtn) {
      delBtn.addEventListener("click", function(e) {
        const message = confirm("¿Estás seguro de que deseas eliminar este registro?");
        if (message == false) {
          e.preventDefault();
        }
      });
    });
  </script>
</body>

</html>
