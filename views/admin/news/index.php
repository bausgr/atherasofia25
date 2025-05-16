<?php include VIEW_PATH . '/admin/layouts/header.php';  ?>

<?php include VIEW_PATH . '/admin/layouts/topnav.php'; ?>

<?php include VIEW_PATH . '/admin/layouts/sidebar.php'; ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">News- Νέα</h1>
  <ol class="breadcrumb mb-4 d-flex align-items-center justify-content-between">
    <li class="breadcrumb-item active">News- Νέα</li>
    <a class="btn btn-danger" type="button" href="/admin/news/create">Add</a>
  </ol>


  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      News- Νέα
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Created at</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Created at</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($news as $new): ?>
            <tr>
              <td><?= $new['id'] ?></td>
              <td><?= $new['title'] ?></td>
              <td><?= $new['created_at'] ?></td>
              <td>
                <a href="/admin/news/update?id=<?= $new['id'] ?>" class="btn btn-info" type="update"
                  name="update">Edit</a>
              </td>
              <td>
                <form method="post" action="/admin/news/delete">
                  <input type="hidden" name="id" value="<?= $new['id'] ?>" />
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