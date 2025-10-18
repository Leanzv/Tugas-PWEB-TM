<?php
class User {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $stmt = $this->pdo->query("SELECT id, username, nama, email, role, created_at FROM users ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT id, username, nama, email, role, created_at FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByUsername($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password, nama, email, role) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['username'],
            $data['password'], // sudah harus hash
            $data['nama'] ?? null,
            $data['email'] ?? null,
            $data['role'] ?? 'user'
        ]);
    }

    public function update($id, $data) {
        // jika password ada, update; kalau tidak, lewati
        if (!empty($data['password'])) {
            $stmt = $this->pdo->prepare("UPDATE users SET username=?, password=?, nama=?, email=?, role=? WHERE id=?");
            return $stmt->execute([$data['username'], $data['password'], $data['nama'], $data['email'], $data['role'], $id]);
        } else {
            $stmt = $this->pdo->prepare("UPDATE users SET username=?, nama=?, email=?, role=? WHERE id=?");
            return $stmt->execute([$data['username'], $data['nama'], $data['email'], $data['role'], $id]);
        }
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
