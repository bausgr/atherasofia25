<?php include VIEW_PATH . '/admin/layouts/header.php';  ?>

<?php include VIEW_PATH . '/admin/layouts/topnav.php'; ?>

<?php include VIEW_PATH . '/admin/layouts/sidebar.php'; ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Curriculum - Τάξεις</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Curriculum - Τάξεις</li>
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
      Users
    </div>
    <div class="card-body">
      <form method="post" action="/admin/curriculum/create">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input id="title" type="text" class="form-control" name="curriculum[title]" value="<?= $title ?? '' ?>">
        </div>
        <div class="mb-3">
          <label for="ordered" class="form-label">Order</label>
          <select name="curriculum[ordered]" class="ordered-dropdown form-select">
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