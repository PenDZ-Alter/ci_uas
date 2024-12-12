<center>
  <div class="card" style="width: 80%">
    <div class="card-header">
      <h3 class="card-title">Data Karyawan</h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Karyawan</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 0;
          foreach ($emp as $row):
            $no++;
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row->name; ?></td>
              <td>
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModalUMKM<?= $row->id; ?>">Edit</button>
                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalUMKM<?= $row->id; ?>">Hapus</button>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModalUMKM<?= $row->id; ?>" tabindex="-1"
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
                        <a href="/forms/emp/del/<?= $row->id; ?>" class="btn btn-danger">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModalUMKM<?= $row->id; ?>" tabindex="-1" aria-labelledby="editModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data Karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form class="container form" method="POST" action="/forms/emp/edit">
                        <div class="modal-body">
                          <input type="hidden" name="id" value="<?= $row->id; ?>">
                          <div class="form-group">
                            <input class="form-control" type="text" name="nama" placeholder=""
                              value="<?= $row->name; ?>">
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
          <form id="formTambahData" method="POST" action="/forms/emp/add">
            <div class="modal-body">
              <div class="form-group">
                <label for="karyawan">Nama</label>
                <input type="text" class="form-control" id="karyawan" name="karyawan"
                  placeholder="Masukkan nama karyawan" required>
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