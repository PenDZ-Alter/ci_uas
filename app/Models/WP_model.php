<?php
namespace App\Models;

use CodeIgniter\Model;
use App\Models\EMP_model;

class WP_model extends Model
{
  public function getNormalizedWeights()
  {
    // Query untuk mendapatkan id, nama, dan nilai kriteria
    $query = $this->db->query("SELECT criteria_id, `name`, `value` FROM criteria_data");
    $criteriaValues = $query->getResultArray();

    // Hitung total bobot
    $totalWeight = array_sum(array_column($criteriaValues, 'value'));

    // Normalisasi
    $normalizedWeights = [];
    foreach ($criteriaValues as $criteria) {
      $normalizedWeights[] = [
        'criteria_id' => $criteria['criteria_id'],
        'criteria_name' => $criteria['name'], // Tambahkan nama kriteria
        'normalized_weight' => $criteria['value'] / $totalWeight,
      ];
    }

    return $normalizedWeights;
  }


  // Perhitungan nilai preferensi
  public function calculatePreferences()
  {
    $weights = $this->getNormalizedWeights();

    // Ubah ke format array key-value untuk memudahkan akses
    $weightValues = [];
    foreach ($weights as $weight) {
      $weightValues[$weight['criteria_id']] = $weight['normalized_weight'];
    }

    // Ambil data alternatif dari view
    $query = $this->db->query("SELECT * FROM alternative_data");
    $alternatives = $query->getResultArray();

    // Hitung nilai preferensi untuk setiap alternatif
    $preferences = [];
    foreach ($alternatives as $alt) {
      $product = 1;
      foreach ($weightValues as $criteria => $weight) {
        $product *= pow($alt[$criteria . '_value'], $weight); // Perhitungan WP
      }
      $preferences[] = [
        'alternative_id' => $alt['alternative_id'],
        'employee_name' => $alt['employee_name'],
        'preference' => $product,
      ];
    }

    // Urutkan berdasarkan nilai preferensi (descending)
    usort($preferences, function ($a, $b) {
      return $b['preference'] <=> $a['preference'];
    });

    return $preferences;
  }

  public function calculateRanks() {
    $prefs = $this->calculatePreferences();

    $total_product = array_sum(array_column($prefs, 'preference'));

    $result = [];
    foreach ($prefs as $pref) {
      $product = $pref['preference'] / $total_product;

      $result[] = [
        'alternative_id' => $pref['alternative_id'],
        'employee_name' => $pref['employee_name'],
        'value' => $product
      ];
    }

    usort($result, function ($a, $b) {
      return $b['value'] <=> $a['value'];
    });

    return $result;
  }

}