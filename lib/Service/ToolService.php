<?php

namespace OCA\ToolTracker\Service;

use OCP\IDBConnection;
use Endroid\QrCode\QrCode;

class ToolService {

    private $db;

    public function __construct(IDBConnection $db) {
        $this->db = $db;
    }

    public function findAll() {
        $sql = 'SELECT * FROM `*PREFIX*tooltracker_tools`';
        return $this->db->executeQuery($sql)->fetchAll();
    }

    public function find($id) {
        $sql = 'SELECT * FROM `*PREFIX*tooltracker_tools` WHERE id = ?';
        return $this->db->executeQuery($sql, [$id])->fetch();
    }

    public function create($name, $description) {
        $sql = 'INSERT INTO `*PREFIX*tooltracker_tools` (name, description) VALUES (?, ?)';
        $this->db->executeUpdate($sql, [$name, $description]);
    }

    public function update($id, $name, $description) {
        $sql = 'UPDATE `*PREFIX*tooltracker_tools` SET name = ?, description = ? WHERE id = ?';
        $this->db->executeUpdate($sql, [$name, $description, $id]);
    }

    public function delete($id) {
        $sql = 'DELETE FROM `*PREFIX*tooltracker_tools` WHERE id = ?';
        $this->db->executeUpdate($sql, [$id]);
    }
	
	public function generateQRCode($toolId) {
		$qrCode = new QrCode((string) $toolId);
		return $qrCode->writeDataUri();
	}
	
	public function updateToolStatus($toolId, $status, $borrowedBy = null) {
		$sql = 'UPDATE `*PREFIX*tooltracker_tools` SET status = ?, borrowed_by = ? WHERE id = ?';
		$this->db->executeUpdate($sql, [$status, $borrowedBy, $toolId]);
	}

}
