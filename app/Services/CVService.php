<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\DatabaseManager;

class CVService
{
    public function __construct(private DatabaseManager $db) {}

    public function create(string $name, string $path): void
    {
        $this->db->insert('INSERT INTO cvs (name, path) VALUES (:name, :path)', [
            'name' => $name,
            'path' => $path,
        ]);
    }

    public function getById(int $id): array
    {
        return $this->db->select('SELECT * FROM cvs WHERE id = :id', ['id' => $id]);
    }

    public function getAll(): array
    {
        return $this->db->select('SELECT * FROM cvs ORDER BY created_at DESC');
    }
}
