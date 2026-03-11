<?php
require_once __DIR__ . '/../config.php';

class Cliente

{
    // Validación mínima: devuelve array de errores por campo
    public static function validate(array $data): array
    {
        $errors = [];

        $name  = trim($data['name'] ?? '');
        $email = trim($data['email'] ?? '');
        $phone = trim($data['phone'] ?? '');

        if ($name === '')  $errors['name']  = 'El nombre es obligatorio.';
        if ($email === '') $errors['email'] = 'El email es obligatorio.';
        if ($phone === '') $errors['phone'] = 'El teléfono es obligatorio.';

        return $errors;
    }

    // Listar todos los clientes
    public static function all(): array
    {
        $stmt = db()->query("SELECT id, name, email, phone FROM clientes ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar un cliente por id
    public static function find(int $id): ?array
    {
        $stmt = db()->prepare("SELECT id, name, email, phone FROM clientes WHERE id = :id");
        $stmt->execute([':id' => $id]);

        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cliente ? $cliente : null;
    }

    // Crear un cliente
    public static function create(array $data): void
    {
        $stmt = db()->prepare("
            INSERT INTO clientes (name, email, phone)
            VALUES (:name, :email, :phone)
        ");

        $stmt->execute([
            ':name'  => trim($data['name']),
            ':email' => trim($data['email']),
            ':phone' => trim($data['phone']),
        ]);
    }

    // Actualizar un cliente
    public static function update(int $id, array $data): void
    {
        $stmt = db()->prepare("
            UPDATE clientes
            SET name = :name, email = :email, phone = :phone
            WHERE id = :id
        ");

        $stmt->execute([
            ':id'    => $id,
            ':name'  => trim($data['name']),
            ':email' => trim($data['email']),
            ':phone' => trim($data['phone']),
        ]);
    }

    // Borrar un cliente
    public static function delete(int $id): void
    {
        $stmt = db()->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}


