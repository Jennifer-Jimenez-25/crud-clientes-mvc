<?php
// controller/ClientController.php
// El controlador recibe la acción, llama al modelo y carga la vista.

require_once __DIR__ . '/../model/Cliente.php';

class ClienteController
{
    // Muestra el listado
    public function index(): void
    {
        $clientes = Cliente::all();
        require __DIR__ . '/../views/clientes/index.php';
    }

    // Muestra el formulario de creación
    public function create(array $old = [], array $errors = []): void
    {
        require __DIR__ . '/../views/clientes/create.php';
    }

    // Procesa el formulario de creación (POST)
    public function store(array $post): void
    {
        $errors = Cliente::validate($post);

        // Si hay errores, volvemos al formulario mostrando errores
        if (!empty($errors)) {
            $this->create($post, $errors);
            return;
        }

        Cliente::create($post);

        // Redirigir a la lista para evitar reenviar formulario al recargar
        header('Location: index.php?action=index');
        exit;
    }

    // Muestra el formulario de edición
    public function edit(int $id, array $old = [], array $errors = []): void
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            echo "Cliente no encontrado";
            return;
        }

        require __DIR__ . '/../views/clientes/edit.php';
    }

    // Procesa el formulario de edición (POST)
    public function update(int $id, array $post): void
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            echo "Cliente no encontrado";
            return;
        }

        $errors = Cliente::validate($post);

        // Si hay errores, volvemos a editar
        if (!empty($errors)) {
            $this->edit($id, $post, $errors);
            return;
        }

        Cliente::update($id, $post);

        header('Location: index.php?action=index');
        exit;
    }

    // Borrar (POST)
    public function destroy(int $id): void
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            echo "Cliente no encontrado";
            return;
        }

        Cliente::delete($id);

        header('Location: index.php?action=index');
        exit;
    }
}
