<div class="container mt-4">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header bg-dark text-white">
          <h4 class="mb-0">Tambah Informasi Barang</h4>
        </div>
        <div class="card-body">
          <form action="<?= base_url('welcome/create'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            
            <div class="mb-3">
              <label for="name" class="form-label">Nama Barang</label>
              <input name="name" id="name" type="text" class="form-control" value="<?= old('name'); ?>">
            </div>
            
            <div class="mb-3">
              <label for="description" class="form-label">Deskripsi</label>
              <textarea name="description" id="description" class="form-control" rows="4"><?= old('description'); ?></textarea>
            </div>
            
            <div class="mb-3">
              <label for="image1" class="form-label">Upload Gambar</label>
              <input type="file" name="image1" id="image1" class="form-control" accept=".jpg,.png,.jpeg">
              <div class="form-text">Format yang diterima: JPG, PNG, JPEG</div>
            </div>
            
            <div class="d-grid gap-2 col-6 mx-auto">
              <button type="submit" class="btn btn-dark">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
