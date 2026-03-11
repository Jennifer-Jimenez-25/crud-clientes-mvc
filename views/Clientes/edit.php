<?php
// views/clients/edit.php
// Formulario de edición. Si hay errores, se muestran.
// Si el alumno envió datos con errores, se muestran esos (old).
$old = $old ?? [];
$errors = $errors ?? [];

// Decide qué valor mostrar en el input
function val(string $key, array $cliente, array $old): string {
    if (isset($old[$key])) return (string)$old[$key];
    return (string)($cliente[$key] ?? '');
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Editar cliente</title>
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
  <h1>Editar cliente #<?php echo (int)$cliente['id']; ?></h1>

  <form method="post" action="index.php?action=update&id=<?php echo (int)$cliente['id']; ?>">
    <label>
      Nombre
      <input name="name" value="<?php echo htmlspecialchars(val('name', $cliente, $old)); ?>">
      <?php if (isset($errors['name'])): ?>
        <div class="error"><?php echo htmlspecialchars($errors['name']); ?></div>
      <?php endif; ?>
    </label>

    <label>
      Email
      <input name="email" value="<?php echo htmlspecialchars(val('email', $cliente, $old)); ?>">
      <?php if (isset($errors['email'])): ?>
        <div class="error"><?php echo htmlspecialchars($errors['email']); ?></div>
      <?php endif; ?>
    </label>

    <label>
      Teléfono
      <input name="phone" value="<?php echo htmlspecialchars(val('phone', $cliente, $old)); ?>">
      <?php if (isset($errors['phone'])): ?>
        <div class="error"><?php echo htmlspecialchars($errors['phone']); ?></div>
      <?php endif; ?>
    </label>

    <button type="submit">Guardar</button>
  </form>

</body>
</html>
