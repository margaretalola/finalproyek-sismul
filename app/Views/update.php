<!-- Update View -->
<div class="container mt-4">
  <!-- Validation Messages -->
  <?php if (session()->has('error') || (isset($validation) && $validation->getErrors())): ?>
    <div class="alert alert-danger">
      <?= session()->getFlashdata('error') ?>
      <?php if (isset($validation)): ?>
        <?= $validation->listErrors() ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  
  <?php if (session()->has('success')): ?>
    <div class="alert alert-success">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
          <h4 class="mb-0">Update Item</h4>
          <a href="<?= base_url('welcome/index/' . $post->id); ?>" class="btn btn-outline-light btn-sm">
            <i class="bi bi-arrow-left"></i> Back to Details
          </a>
        </div>
        <div class="card-body">
          <form action="<?= base_url('welcome/update/' . $post->id); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="mb-3">
              <label for="name" class="form-label">Item Name</label>
              <input name="name" id="name" type="text" class="form-control" value="<?= $post->name ?>">
            </div>
            
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea name="description" id="description" class="form-control" rows="4"><?= $post->description ?></textarea>
            </div>
            
            <div class="mb-3 text-center">
              <h6 class="text-muted mb-2">Current Image</h6>
              <img class="img-fluid rounded border" id="image" style="max-height:30vh;" 
                   src="<?= base_url('upload/post/' . $post->filename); ?>">
            </div>
            
            <div class="mb-3">
              <label for="file" class="form-label">Change Image</label>
              <div class="input-group">
                <input type="file" class="form-control" id="file" name="image" onchange="thumbnail();">
                <label class="input-group-text" for="file">
                  <i class="bi bi-upload"></i>
                </label>
              </div>
              <div class="form-text">Select a new image to replace the current one</div>
            </div>
            
            <div class="d-flex justify-content-between mt-4">
              <a href="<?= base_url('welcome/index/' . $post->id); ?>" class="btn btn-outline-secondary">
                <i class="bi bi-x-circle"></i> Cancel
              </a>
              <button class="btn btn-primary" type="submit">
                <i class="bi bi-check-circle me-1"></i> Update Item
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  // Auto-resize textarea based on content
  const textarea = document.querySelector('#description');
  textarea.addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
  });
  
  // Initialize textarea height
  window.addEventListener('DOMContentLoaded', function() {
    textarea.style.height = 'auto';
    textarea.style.height = (textarea.scrollHeight) + 'px';
  });
  
  // Image preview function
  function thumbnail() {
    var preview = document.querySelector('#image');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();
    
    reader.onloadend = function() {
      preview.src = reader.result;
    }
    
    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "<?= base_url('upload/post/' . $post->filename); ?>";
    }
  }
</script>