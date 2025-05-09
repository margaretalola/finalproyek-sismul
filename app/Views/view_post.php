<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>Detail Post</h5>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
            <img src="<?= base_url('upload/post/' . $post->filename); ?>"
                     alt="<?= $post->name; ?>"
                     class="img-fluid rounded" 
                     style="max-height: 300px;">
            </div>
            
            <table class="table table-bordered">
                <tr>
                    <th width="30%">Nama</th>
                    <td><?= $post->name; ?></td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td><?= $post->description; ?></td>
                </tr>
            </table>
            
            <div class="text-end mt-3">
                <a href="<?= base_url(); ?>" class="btn btn-secondary">Kembali</a>
                <a href="<?= base_url('welcome/edit/' . urlencode($post->id)); ?>" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
