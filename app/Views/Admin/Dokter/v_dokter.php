<?= $this->extend('layouts/v_wrapper') ?>
<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Dokter</h1>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-primary float-right" id="btn-tambah" data-toggle="modal" data-target="#dokterModal">Tambah Dokter</button>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Dokter</h3>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($dokter)): ?>
                            <table  id="tables" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Spesialis</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1; ?>
                                    <?php foreach ($dokter as $d): ?>
                                    <tr>
                                        <td><?= $id++ ?></td>
                                        <td><?= $d['nama'] ?></td>
                                        <td><?= $d['spesialis'] ?></td>
                                        <td><?= $d['telepon'] ?></td>
                                        <td><?= $d['email'] ?></td>
                                        <td><?= $d['alamat'] ?></td>
                                        <td>
                                            <button class="btn btn-warning btn-sm btn-edit" 
                                            data-toggle="modal" 
                                            data-target="#dokterModal" 
                                            data-id="<?= $d['id'] ?>" 
                                            data-nama="<?= $d['nama'] ?>" 
                                            data-spesialis="<?= $d['spesialis'] ?>" 
                                            data-telepon="<?= $d['telepon'] ?>" 
                                            data-email="<?= $d['email'] ?>" 
                                            data-alamat="<?= $d['alamat'] ?>">Edit</button>
                                            <button class="btn btn-danger btn-sm btn-hapus" 
                                            data-toggle="modal" 
                                            data-target="#deleteModal" 
                                            data-id="<?= $d['id'] ?>">Hapus</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                            <div class="alert alert-info" role="alert">
                                Tidak ada data dokter yang tersedia.
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah/Edit Dokter -->
<div class="modal fade" id="dokterModal" tabindex="-1" role="dialog" aria-labelledby="dokterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('dokter/save') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="dokterModalLabel">Tambah Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="spesialis">Spesialis</label>
                        <input type="text" class="form-control" name="spesialis" id="spesialis" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" name="telepon" id="telepon" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
                <input type="hidden" name="id" id="delete-id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
  // Handle Edit Button Click
  document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', function() {
      const id = this.getAttribute('data-id');
      const nama = this.getAttribute('data-nama');
      const spesialis = this.getAttribute('data-spesialis');
      const telepon = this.getAttribute('data-telepon');
      const email = this.getAttribute('data-email');
      const alamat = this.getAttribute('data-alamat');

      document.getElementById('id').value = id;
      document.getElementById('nama').value = nama;
      document.getElementById('spesialis').value = spesialis;
      document.getElementById('telepon').value = telepon;
      document.getElementById('email').value = email;
      document.getElementById('alamat').value = alamat;

      document.getElementById('dokterModalLabel').textContent = 'Edit Dokter';
    });
  });

  // Handle Tambah Button Click
  document.getElementById('btn-tambah').addEventListener('click', function() {
    document.getElementById('id').value = '';
    document.getElementById('nama').value = '';
    document.getElementById('spesialis').value = '';
    document.getElementById('telepon').value = '';
    document.getElementById('email').value = '';
    document.getElementById('alamat').value = '';

    document.getElementById('dokterModalLabel').textContent = 'Tambah Dokter';
  });

  // Handle Hapus Button Click
  document.querySelectorAll('.btn-hapus').forEach(button => {
    button.addEventListener('click', function() {
      const id = this.getAttribute('data-id');
      document.getElementById('delete-id').value = id;
    });
  });

  // Handle Confirm Delete Button Click
  document.getElementById('confirmDelete').addEventListener('click', function() {
    const id = document.getElementById('delete-id').value;
    window.location.href = '<?= base_url('dokter/delete/') ?>' + id;
  });

  // SweetAlert for success messages
  <?php if (session()->getFlashdata('success')): ?>
    Swal.fire({
      icon: 'success',
      title: 'Sukses',
      text: '<?= session()->getFlashdata('success') ?>',
      showConfirmButton: false,
      timer: 1500
    });
  <?php endif; ?>
</script>
<?= $this->endSection() ?>
