<div class="container mt-4">
    <form method="GET" action="" class="mb-4 d-flex justify-content-end">
        <input type="text" name="search" class="form-control w-25 me-2" placeholder="Cari nama..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        <button type="submit" class="btn btn-dark">Search</button>
    </form>

    <div class="row">
    <?php $search = $_GET['search'] ?? '';
        if (!empty($search)) {
            $home_post = array_filter($home_post, function($item) use ($search) {
                return stripos($item['name'], $search) !== false;
            });
        }
        ?>

        <?php foreach ($home_post as $data): ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100 text-center">
                    <img src="<?= base_url('upload/post/' . $data['filename']); ?>"
                         alt="<?= $data['name']; ?>" 
                         class="card-img-top rounded-circle mx-auto mt-3" 
                         style="width: 80px; height: 80px; object-fit: cover;">
                    
                    <div class="card-body">
                        <h6 class="card-title">Nama: <?= $data['name']; ?></h6>
                        <p class="card-text"><small>Deskripsi: <?= $data['description']; ?></small></p>
                    </div>

                    <div class="card-footer d-flex justify-content-center gap-2 flex-wrap">
                        <a href="<?= base_url(); ?>/welcome/view/<?= $data['id']; ?>" 
                           class="btn btn-outline-primary btn-sm">View <i class="bi bi-eye"></i></a>
                        
                        <a href="<?= base_url(); ?>/welcome/edit/<?= $data['id']; ?>" 
                           class="btn btn-outline-warning btn-sm">Edit <i class="bi bi-pencil"></i></a>
                        
                        <a href="<?= base_url(); ?>/welcome/delete/<?= $data['id']; ?>" 
                           class="btn btn-outline-danger btn-sm"
                           onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
                           <i class="bi bi-trash"></i>
                        </a>
                    </div>
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
</div>
