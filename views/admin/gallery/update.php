<?php include VIEW_PATH . '/admin/layouts/header.php';  ?>

<?php include VIEW_PATH . '/admin/layouts/topnav.php'; ?>

<?php include VIEW_PATH . '/admin/layouts/sidebar.php'; ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Gallery</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"> Gallery</li>
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
      <img style="max-width:500px" alt='<?= $img['id']?>' src='/assets/images/carousel/<?= $img['img_path'] ?>' />
      <form enctype="multipart/form-data" method="post" action="/admin/gallery/update">
        <div class=" mb-3">
          <input id="id" type="hidden" class="form-control" name="img[id]" value="<?= $img['id'] ?>">
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input id="alt" type="text" class="form-control" name="img[alt]" value="<?= $img['alt'] ?>">
        </div>
        <div class="mb-3">
          <label for="img_path" class="form-label">File (.jpg, .jpeg or .png): <?= $img['img_path'] ?></label>
          <input type="hidden" name="img[img_path_old]" value="<?= $img['img_path']?>" />
          <input class="form-control" type="file" id="img_path" name="img[img_path]">
        </div>
        <div class="mb-3">
          <label for="ordered" class="form-label">Order</label>
          <select name="img[ordered]" class="ordered-dropdown form-select">
            <?php for ($i=1; $i<=9; $i++): ?>
            <?php if ($i===$img['ordered']): ?>
            <option selected value="<?=$i ?>"><?=$i ?></option>
            <?php else: ?>
            <option value="<?=$i ?>"><?=$i ?></option>
            <?php endif; ?>
            <?php endfor; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>

<?php include VIEW_PATH . '/admin/layouts/footer.php'; ?>