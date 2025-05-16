<?php include VIEW_PATH . '/admin/layouts/header.php';  ?>

<?php include VIEW_PATH . '/admin/layouts/topnav.php'; ?>

<?php include VIEW_PATH . '/admin/layouts/sidebar.php'; ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Courses - Μαθήματα</h1>
  <ol class="breadcrumb mb-4 d-flex align-items-center justify-content-between">
    <li class="breadcrumb-item active">Courses - Μαθήματα</li>
    <a class="btn btn-danger" type="button" href="/admin/courses/create">Add</a>
  </ol>


  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Courses - Μαθήματα
    </div>
    <div class="card-body">
      <table id="datatablesSimple" style="width:100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Curriculum</th>
            <th># hours</th>
            <th>Order</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Curriculum</th>
            <th># hours</th>
            <th>Order</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($courses as $course): ?>
            <tr>
              <td><?= $course['id'] ?></td>
              <td><?= $course['curriculumTitle'] ?></td>
              <td><?= $course['courseTitle'] ?></td>
              <td><?= $course['num_hours'] ?></td>
              <td><?= $course['ordered'] ?></td>
              <td>
                <a href="/admin/courses/update?id=<?= $course['id'] ?>" class="btn btn-info" type="update"
                  name="update">Edit</a>
              </td>
              <td>
                <form method="post" action="/admin/courses/delete">
                  <input type="hidden" name="id" value="<?= $course['id'] ?>" />
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