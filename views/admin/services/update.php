<?php include VIEW_PATH . '/admin/layouts/header.php';  ?>

<?php include VIEW_PATH . '/admin/layouts/topnav.php'; ?>

<?php include VIEW_PATH . '/admin/layouts/sidebar.php'; ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Services- Υπηρεσίες</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"> Services- Υπηρεσίες</li>
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
      Services- Υπηρεσίες
    </div>
    <div class="card-body">
      <form enctype="multipart/form-data" method="post" action="/admin/services/update">
        <div class=" mb-3">
          <input id="id" type="hidden" class="form-control" name="service[id]" value="<?= $service['id'] ?>">
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input id="title" type="text" class="form-control" name="service[title]" value="<?= $service['title'] ?>">
        </div>
        <div class="mb-3">
          <label for="service_path" class="form-label">File (pdf): <?= $service['service_path'] ?></label>
          <input class="form-control" type="file" id="service_path" name="service[service_path]"
            value="<?= $service['service_path'] ?>">
        </div>

        <div class="mb-3">
          <label for="ordered" class="form-label">Order</label>
          <select name="service[ordered]" class="ordered-dropdown form-select">
            <?php for ($i=1; $i<=9; $i++): ?>
            <?php if ($i===$service['ordered']): ?>
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