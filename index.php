<?php include VIEW_PATH . '/admin/layouts/header.php';  ?>

<?php include VIEW_PATH . '/admin/layouts/topnav.php'; ?>

<?php include VIEW_PATH . '/admin/layouts/sidebar.php'; ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Gallery</h1>
  <ol class="breadcrumb mb-4 d-flex align-items-center justify-content-between">
    <li class="breadcrumb-item active">Gallery</li>
    <a class="btn btn-danger" type="button" href="/admin/gallery/create">Add</a>
  </ol>


  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Gallery
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>ID</th>
            <th>Text</th>
            <th>File name</th>
            <th>Order</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Text</th>
            <th>File name</th>
            <th>Order</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($gallery as $img): ?>
            <tr>
              <td><?= $img['id'] ?></td>
              <td><?= $img['alt'] ?></td>
              <td><?= $img['img_path'] ?></td>
              <td><?= $img['ordered'] ?></td>
              <td>
                <a href="/admin/gallery/update?id=<?= $img['id'] ?>" class="btn btn-info" type="update"
                  name="update">Edit</a>
              </td>
              <td>
                <form method="post" action="/admin/gallery/delete">
                  <input type="hidden" name="id" value="<?= $img['id'] ?>" />
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