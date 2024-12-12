<center>
  <div class="card" style="width: 80%">
    <div class="card-header">
      <h3 class="card-title">Data Nilai Preferensi</h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Karyawan</th>
            <th>Nilai Pref</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($prefs as $row):
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row['employee_name']; ?></td>
              <td><?php echo number_format($row['preference'], 4); ?></td>
            </tr>
            <?php
          endforeach;
          ?>
        </tbody>
      </table>
    </div>
  </div>
</center>