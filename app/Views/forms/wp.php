<center>
  <div class="card" style="width: 80%">
    <div class="card-header">
      <h3 class="card-title">Data Alternatif (RAW)</h3>
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
            <th>#</th>
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
              <td><?php echo $row->C1; ?></td>
              <td><?php echo $row->C2; ?></td>
              <td><?php echo $row->C3; ?></td>
              <td><?php echo $row->C4; ?></td>
              <td><?php echo $row->C5; ?></td>
              <td>
                <!-- <button class="btn btn-sm btn-warning" data-toggle="modal"
                  data-target="#editModalUMKM<?= $row->alter_id; ?>">Edit</button> -->
                <button class="btn btn-sm btn-danger" data-toggle="modal"
                  data-target="#deleteModalUMKM<?= $row->alter_id; ?>">Hapus</button>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModalUMKM<?= $row->alter_id; ?>" tabindex="-1"
                  aria-labelledby="deleteModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to delete this data?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="/forms/wp/del/<?= $row->alter_id; ?>" class="btn btn-danger">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModalUMKM<?= $row->alter_id; ?>" tabindex="-1" aria-labelledby="editModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit UMKM</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form class="container form" method="POST" action="/forms/wp/edit">
                        <div class="modal-body">
                          <input type="hidden" name="id" value="<?= $row->alter_id; ?>">
                          <div class="form-group">
                            <input class="form-control" type="text" name="nama" placeholder="" value="">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button class="btn btn-primary" type="submit">Simpan Data</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <?php
          endforeach;
          ?>
        </tbody>
      </table>
    </div>
    
    <!-- Modal Tambah Data -->
    <div class="modal inmodal fade" id="modalTambahData" tabindex="-1" role="dialog"
      aria-labelledby="modalTambahDataLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
          <div class="modal-header">
            <h4 class="modal-title" id="modalTambahDataLabel">Tambah Data Karyawan</h4>
          </div>
          <form id="formTambahData" method="POST" action="/forms/wp/add">
            <div class="modal-body">
              <div class="form-group">
                <label for="karyawan">Nama</label>
                <select name="karyawan" id="karyawan" class="form-control">
                  <?php foreach ($miss_emp as $emp) { ?>
                  <option value="<?php echo $emp->employee_id ?>"><?php echo $emp->employee_name ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="c1">Kehadiran (Attendance)</label>
                <select name="c1" id="c1" class="form-control">
                  <?php foreach ($weight_c1 as $w) { ?>
                  <option value="<?php echo $w->weight_id ?>"><?php echo $w->type ?>-<?php echo $w->value ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="c2">Perilaku (Behaviour)</label>
                <select name="c2" id="c2" class="form-control">
                  <?php foreach ($weight_c2 as $w) { ?>
                  <option value="<?php echo $w->weight_id ?>"><?php echo $w->type ?>-<?php echo $w->value ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="c3">Pengalaman (Experience)</label>
                <select name="c3" id="c3" class="form-control">
                  <?php foreach ($weight_c3 as $w) { ?>
                  <option value="<?php echo $w->weight_id ?>"><?php echo $w->type ?>-<?php echo $w->value ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="c4">Kedisiplinan (Discipline)</label>
                <select name="c4" id="c4" class="form-control">
                  <?php foreach ($weight_c4 as $w) { ?>
                  <option value="<?php echo $w->weight_id ?>"><?php echo $w->type ?>-<?php echo $w->value ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="c5">Kerjasama (Team Work)</label>
                <select name="c5" id="c5" class="form-control">
                  <?php foreach ($weight_c5 as $w) { ?>
                  <option value="<?php echo $w->weight_id ?>"><?php echo $w->type ?>-<?php echo $w->value ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="text-center" style="margin-bottom: 1.2rem">
      <button class="btn btn-success" data-toggle="modal" data-target="#modalTambahData">
        <i class="fa fa-plus"></i> Tambah Data
      </button>
    </div>
  </div>
</center>