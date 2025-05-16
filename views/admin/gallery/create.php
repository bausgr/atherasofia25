<?php include VIEW_PATH . '/admin/layouts/header.php';  ?>

<?php include VIEW_PATH . '/admin/layouts/topnav.php'; ?>

<?php include VIEW_PATH . '/admin/layouts/sidebar.php'; ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Gallery</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Gallery</li>
  </ol>

  <?php
  if (!empty($errors)) :
  ?>
  <div class="errors">
    <ul>
      <?php
        foreach ($errors as $error) :
        ?>
      <li><?= $error ?></li>
      <?php
        endforeach; ?>
    </ul>
  </div>
  <?php
  endif;
  ?>

  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Gallery
    </div>
    <div class="card-body">
      <form enctype="multipart/form-data" method="post" action="/admin/gallery/create">
        <div class="mb-3">
          <label for="title" class="form-label">Text</label>
          <input id="title" type="text" class="form-control" name="img[alt]" value="<?= $alt ?? '' ?>">
        </div>
        <div class="mb-3">
          <label for="img_path" class="form-label">File (.jpg, .jpeg or .png)</label>
          <input class="form-control" type="file" id="img_path" name="img[img_path]">
        </div>
        <div class="mb-3">
          <label for="ordered" class="form-label">Order</label>
          <select name="img[ordered]" class="ordered-dropdown form-select">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
  </div>
</div>

<?php include VIEW_PATH . '/admin/layouts/footer.php'; ?>