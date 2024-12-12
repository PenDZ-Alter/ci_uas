<?php
namespace App\Controllers;

use App\Models\EMP_model;
use App\Models\WP_model;

class View extends BaseController {
  public function Alter() {
    $model = new EMP_model();

    $data['alter'] = $model->getAlternative();

    echo view("dashboard/header");
    echo view("dashboard/nav");
    echo view("content/alternatif", $data);
    echo view("dashboard/footer");
  }

  public function NormalizedVector() {
    $model = new WP_model();

    $data['norm'] = $model->getNormalizedWeights();

    echo view("dashboard/header");
    echo view("dashboard/nav");
    echo view("content/normalisasi", $data);
    echo view("dashboard/footer");
  }

  public function PrefData() {
    $model = new WP_model();

    // $data['norm'] = $model->getNormalizedWeights();
    $data['prefs'] = $model->calculatePreferences();

    echo view("dashboard/header");
    echo view("dashboard/nav");
    echo view("content/pref", $data);
    echo view("dashboard/footer");
  }

  public function ResultRanks() {
    $model = new WP_model();

    $data['res'] = $model->calculateRanks();

    echo view("dashboard/header");
    echo view("dashboard/nav");
    echo view("content/hasil", $data);
    echo view("dashboard/footer");
  }
}
