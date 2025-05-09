<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h5>Edit Post</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('welcome/update/' . urlencode($post->id)); ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $post->name; ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required><?= $post->description; ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="userfile" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="userfile" name="userfile">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                    
                    <?php if (!empty($post->filename)): ?>
                    <div class="mt-2">
                        <p>Gambar saat ini:</p>
                        <img src="<?= base_url('upload/post/' . $post->filename); ?>" 
                             alt="Current Image" 
                             class="img-thumbnail" 
                             style="max-height: 150px;">
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="text-end mt-3">
                    <a href="<?= base_url(); ?>" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
