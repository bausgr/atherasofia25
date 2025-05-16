<?php include VIEW_PATH . '/admin/layouts/header.php';  ?>

<?php include VIEW_PATH . '/admin/layouts/topnav.php'; ?>

<?php include VIEW_PATH . '/admin/layouts/sidebar.php'; ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Services- Υπηρεσίες</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Services- Υπηρεσίες</li>
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
      <form enctype="multipart/form-data" method="post" action="/admin/services/create">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input id="title" type="text" class="form-control" name="service[title]" value="<?= $title ?? '' ?>">
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">File (pdf)</label>
          <input class="form-control" type="file" id="formFile" name="service[service_path]">
        </div>
        <div class="mb-3">
          <label for="ordered" class="form-label">Order</label>
          <select name="service[ordered]" class="ordered-dropdown form-select">
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