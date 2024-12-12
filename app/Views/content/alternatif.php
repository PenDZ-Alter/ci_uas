<center>
  <div class="card" style="width: 80%">
    <div class="card-header">
      <h3 class="card-title">Data Alternatif</h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Karyawan</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 0;
          foreach ($alter as $row):
            $no++;
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row->employee_name; ?></td>
              <td><?php echo $row->C1_value; ?></td>
              <td><?php echo $row->C2_value; ?></td>
              <td><?php echo $row->C3_value; ?></td>
              <td><?php echo $row->C4_value; ?></td>
              <td><?php echo $row->C5_value; ?></td>
            </tr>
            <?php
          endforeach;
          ?>
        </tbody>
      </table>
    </div>
  </div>
</center>