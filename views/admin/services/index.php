<?php include VIEW_PATH . '/admin/layouts/header.php';  ?>

<?php include VIEW_PATH . '/admin/layouts/topnav.php'; ?>

<?php include VIEW_PATH . '/admin/layouts/sidebar.php'; ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Services- Υπηρεσίες</h1>
  <ol class="breadcrumb mb-4 d-flex align-items-center justify-content-between">
    <li class="breadcrumb-item active">Services- Υπηρεσίες</li>
    <a class="btn btn-danger" type="button" href="/admin/services/create">Add</a>
  </ol>


  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Services- Υπηρεσίες
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>File name</th>
            <th>Order</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>File name</th>
            <th>Order</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($services as $service): ?>
          <tr>
            <td><?= $service['id'] ?></td>
            <td><?= $service['title'] ?></td>
            <td><?= $service['service_path'] ?></td>
            <td><?= $service['ordered'] ?></td>
            <td>
              <a href="/admin/services/update?id=<?= $service['id'] ?>" class="btn btn-info" type="update"
                name="update">Edit</a>
            </td>
            <td>
              <form method="post" action="/admin/services/delete">
                <input type="hidden" name="id" value="<?= $service['id'] ?>" />
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