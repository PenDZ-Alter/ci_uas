<center>
  <div class="card" style="width: 80%">
    <div class="card-header">
      <h3 class="card-title">Data Normalisasi (Weighted Vector)</h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Kode Kriteria</th>
            <th>Nama Kriteria</th>
            <th>Nilai Vector</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($norm as $row):
            ?>
            <tr>
              <td><?php echo $row['criteria_id']; ?></td>
              <td><?php echo $row['criteria_name']; ?></td>
              <td><?php echo $row['normalized_weight']; ?></td>
            </tr>
            <?php
          endforeach;
          ?>
        </tbody>
      </table>
    </div>
  </div>
</center>