<?php include VIEW_PATH . '/admin/layouts/header.php';  ?>

<?php include VIEW_PATH . '/admin/layouts/topnav.php'; ?>

<?php include VIEW_PATH . '/admin/layouts/sidebar.php'; ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Curriculum - Τάξεις</h1>
  <ol class="breadcrumb mb-4 d-flex align-items-center justify-content-between">
    <li class="breadcrumb-item active">Curriculum - Τάξεις</li>
    <a class="btn btn-danger" type="button" href="/admin/curriculum/create">Add</a>
  </ol>


  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Users
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Ordered</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Ordered</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($curriculum as $cur): ?>
            <tr>
              <td><?= $cur['id'] ?></td>
              <td><?= $cur['title'] ?></td>
              <td><?= $cur['ordered'] ?></td>
              <td>
                <a href="/admin/curriculum/update?id=<?= $cur['id'] ?>" class="btn btn-info" type="update"
                  name="update">Edit</a>
              </td>
              <td>
                <form method="post" action="/admin/curriculum/delete">
                  <input type="hidden" name="id" value="<?= $cur['id'] ?>" />
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include VIEW_PATH . '/admin/layouts/footer.php'; ?>

<div class="mb-3">
          <label for="title" class="form-label">Curriculum - Τάξη</label> <?= $course['curriculum_id'] ?>
          <select name="course[curriculum_id]" class="form-select">
            <?php foreach ($curriculum as $cur): ?>
            <?php if ($course['curriculum_id'] === $cur['id']): ?>
            <option selected value="<?= $cur['id'] ?>"><?= $cur['title'] ?></option>
            <?php else: ?>
            <option value="<?= $cur['id'] ?>"><?= $cur['title'] ?></option>
            <?php endif; ?>
            <?php endforeach ?>
          </select>
        </div>