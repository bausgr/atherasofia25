<?php include VIEW_PATH . '/admin/layouts/header.php';  ?>

<?php include VIEW_PATH . '/admin/layouts/topnav.php'; ?>

<?php include VIEW_PATH . '/admin/layouts/sidebar.php'; ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Users</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Users</li>
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
      <form method="post" action="/admin/users/create">
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input id="email" type="email" class="form-control" name="user[email]" value="<?= $email ?? '' ?>">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input id="password" type="text" class="form-control" name="user[password]" value="<?= $password ?? '' ?>">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
  </div>
</div>

<?php include VIEW_PATH . '/admin/layouts/footer.php'; ?>