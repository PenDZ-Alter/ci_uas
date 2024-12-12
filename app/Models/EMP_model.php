<?php
namespace App\Models;
use CodeIgniter\Model;

class EMP_model extends Model
{
  public function getCriteria($id = null) {
    $q = $id != null 
      ? $this->db->query("SELECT * FROM criteria_data WHERE `criteria_id`='$id'")
      : $this->db->query("SELECT * FROM criteria_data");

    return $q->getResult();
  }

  public function getWeight($id = null) {
    $q = $id != null
      ? $this->db->query("SELECT * FROM weight_data WHERE `weight_id`='$id'")
      : $this->db->query("SELECT * FROM weight_data");
      
    return $q->getResult();
  }

  public function getEmployee($id = null) {
    $q = $id != null
      ? $this->db->query("SELECT * FROM employee WHERE `id`='$id'")
      : $this->db->query("SELECT * FROM employee");

    return $q->getResult();
  }

  public function getAlternative() {
    // Table from view "alternative_data"
    $q = $this->db->query("SELECT * FROM alternative_data");

    return $q->getResult();
  }

  public function getAlternativeRaw() {
    // Table from view "alternative_data"
    $q = $this->db->query("SELECT ar.alter_id, e.name as employee_name, ar.C1, ar.C2, ar.C3, ar.C4, ar.C5 FROM alternative_raw ar, employee e WHERE ar.employee_id = e.id");

    return $q->getResult();
  }

  public function getMissingAlterUsers() {
    $q = $this->db->query("SELECT * FROM alternative_missing_employees");

    return $q->getResult();
  }

  public function countData($table) {
    return $this->db->table($table)->countAllResults();
  }

  public function addEmployee($name) {
    return $this->db->query("INSERT INTO employee (`name`) VALUES (?)", [$name]);
  }

  public function updateEmployee($id, $name) {
    return $this->db->query("UPDATE employee SET `name`=? WHERE id=?", [$name, $id]);
  }

  public function deleteEmployee($id) {
    return $this->db->query("DELETE FROM employee WHERE id=?", [$id]);
  }

  public function addAlter($data) {
    $bindFields = [
      $data['emp_id'],
      $data['C1'],
      $data['C2'],
      $data['C3'],
      $data['C4'],
      $data['C5']
    ];

    return $this->db->query("INSERT INTO alternative_raw (`employee_id`, C1, C2, C3, C4, C5) VALUES (?,?,?,?,?,?)", $bindFields);
  }

  public function editAlter($id, $data) {
    $bindFields = [
      $data['emp_id'],
      $data['C1'],
      $data['C2'],
      $data['C3'],
      $data['C4'],
      $data['C5'],
      $id
    ];

    return $this->db->query("
        UPDATE alternative_raw 
        SET `employee_id`=?, C1=?, C2=?, C3=?, C4=?, C5=?
        WHERE alter_id = ?
      ", 
      $bindFields
    );
  }

  public function deleteAlter($id) {
    return $this->db->query("DELETE FROM alternative_raw WHERE alter_id=?", [$id]);
  }
}