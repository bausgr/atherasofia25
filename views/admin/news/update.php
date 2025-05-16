<?php include VIEW_PATH . '/admin/layouts/header.php';  ?>

<?php include VIEW_PATH . '/admin/layouts/topnav.php'; ?>

<?php include VIEW_PATH . '/admin/layouts/sidebar.php'; ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">News- Νέα</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">News- Νέα</li>
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
      <form method="post" action="/admin/news/update">
        <div class=" mb-3">
          <input id="id" type="hidden" class="form-control" name="new[id]" value="<?= $new['id'] ?>">
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input id="title" type="text" class="form-control" name="new[title]" value="<?= $new['title'] ?>">
        </div>
        <div class="mb-3">
          <label for="ordered" class="form-label">Text</label>
          <textarea name="new[text]"><?= $new['text'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>

<?php include VIEW_PATH . '/admin/layouts/footer.php'; ?>