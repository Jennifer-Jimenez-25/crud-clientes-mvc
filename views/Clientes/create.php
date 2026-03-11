<?php
// views/clients/create.php
// Formulario de creación. Si hay errores, se muestran debajo de cada campo.
$old = $old ?? [];
$errors = $errors ?? [];
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Nuevo cliente</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 24px; }
    label { display:block; margin-top: 10px; }
    input { width: 320px; padding: 8px; }
    .error { color:#c62828; font-size:14px; }
    button { margin-top: 12px; padding:8px 12px; }
  </style>
</head>
<body>

  <p><a href="index.php?action=index">← Volver</a></p>
  <h1>Nuevo cliente</h1>

  <form method="post" action="index.php?action=store">
    <label>
      Nombre
      <input name="name" value="<?php echo htmlspecialchars($old['name'] ?? ''); ?>">
      <?php if (isset($errors['name'])): ?>
        <div class="error"><?php echo htmlspecialchars($errors['name']); ?></div>
      <?php endif; ?>
    </label>

    <label>
      Email
      <input name="email" value="<?php echo htmlspecialchars($old['email'] ?? ''); ?>">
      <?php if (isset($errors['email'])): ?>
        <div class="error"><?php echo htmlspecialchars($errors['email']); ?></div>
      <?php endif; ?>
    </label>

    <label>
      Teléfono
      <input name="phone" value="<?php echo htmlspecialchars($old['phone'] ?? ''); ?>">
      <?php if (isset($errors['phone'])): ?>
        <div class="error"><?php echo htmlspecialchars($errors['phone']); ?></div>
      <?php endif; ?>
    </label>

    <button type="submit">Crear</button>
  </form>

</body>
</html>
