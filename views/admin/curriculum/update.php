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
      <form method="post" action="/admin/curriculum/update">
        <div class=" mb-3">
          <input id="id" type="hidden" class="form-control" name="curriculum[id]" value="<?= $curriculum['id'] ?>">
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input id="title" type="text" class="form-control" name="curriculum[title]"
            value="<?= $curriculum['title'] ?>">
        </div>
        <div class="mb-3">
          <label for="ordered" class="form-label">Order</label>
          <select name="curriculum[ordered]" class="ordered-dropdown form-select">
            <?php for ($i=1; $i<=9; $i++): ?>
            <?php if ($i===$curriculum['ordered']): ?>
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