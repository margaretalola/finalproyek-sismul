<div class="list-group">
    <?php foreach ($home_post as $data): ?>
        <div class="list-group-item d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="<?= base_url('upload/post/' . $data['filename']); ?>"
                     alt="<?= $data['name']; ?>" 
                     class="rounded-circle me-3" 
                     width="50" height="50">
                <div>
                    <h6 class="mb-1">Nama : <?= $data['name']; ?></h6>
                    <small>Deskripsi : <?= $data['description']; ?></small>
                </div>
            </div>
            <div>
                <!-- Use direct, absolute URLs -->
                <a href="<?= base_url(); ?>/welcome/view/<?= $data['id']; ?>" 
                   class="btn btn-outline-primary"> View
                    <i class="bi bi-eye"></i>
                </a>
                
                <a href="<?= base_url(); ?>/welcome/edit/<?= $data['id']; ?>" 
                   class="btn btn-outline-warning"> Edit
                    <i class="bi bi-pencil"></i>
                </a>
                
                <a href="<?= base_url(); ?>/welcome/delete/<?= $data['id']; ?>" 
                   class="btn btn-outline-danger"
                   onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
                    <i class="bi bi-trash"></i>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="text-center my-4">
    <a href="<?= site_url('welcome/deleteAll') ?>" 
       class="btn btn-danger px-4 py-2"
       onclick="return confirm('Apakah kamu yakin ingin menghapus semua data ini?')">
       DELETE ALL
    </a>
</div>
