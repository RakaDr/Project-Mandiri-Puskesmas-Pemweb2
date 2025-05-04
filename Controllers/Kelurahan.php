<?php
require_once 'Config/DB.php';

class Kelurahan
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT * FROM kelurahan");
        return $stmt->fetchAll();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM kelurahan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO kelurahan (nama, kec_id) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['nama'], $data['kec_id']]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE kelurahan SET nama = ?, kec_id = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['nama'], $data['kec_id'], $id]);
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $stmt = $this->pdo->prepare("DELETE FROM kelurahan WHERE id = ?");
        $stmt->execute([$id]);
        return $row;
    }
}

// Pastikan ini hanya dipanggil sekali dan $pdo sudah tersedia
$kelurahan = new Kelurahan($pdo);
