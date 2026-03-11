<?php
// views/clients/index.php
// Lista de clientes con acciones: editar y borrar.
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Clientes</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 24px; }
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #ccc; padding: 8px; }
    th { background: #f5f5f5; text-align: left; }
    .top { display:flex; justify-content:space-between; align-items:center; }
    .danger { background:#c62828; color:#fff; border:0; padding:6px 10px; cursor:pointer; }
  </style>
</head>
<body>

  <div class="top">
    <h1>Clientes</h1>
    <a href="index.php?action=create">+ Nuevo cliente</a>
  </div>

  <?php if (empty($clientes)): ?>
    <p>No hay clientes.</p>
  <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clientes as $c): ?>
          <tr>
            <td><?php echo (int)$c['id']; ?></td>
            <td><?php echo htmlspecialchars($c['name']); ?></td>
            <td><?php echo htmlspecialchars($c['email']); ?></td>
            <td><?php echo htmlspecialchars($c['phone']); ?></td>
            <td>
              <a href="index.php?action=edit&id=<?php echo (int)$c['id']; ?>">Editar</a>

              <form method="post"
                    action="index.php?action=destroy&id=<?php echo (int)$c['id']; ?>"
                    style="display:inline"
                    onsubmit="return confirm('¿Borrar este cliente?');">
                <button class="danger" type="submit">Borrar</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

</body>
</html>


