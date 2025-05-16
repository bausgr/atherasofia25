<?php include VIEW_PATH . '/admin/layouts/header.php';  ?>

<?php include VIEW_PATH . '/admin/layouts/topnav.php'; ?>

<?php include VIEW_PATH . '/admin/layouts/sidebar.php'; ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Courses - Μαθήματα</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Courses - Μαθήματα</li>
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
      Courses - Μαθήματα
    </div>
    <div class="card-body">
      <form method="post" action="/admin/courses/update">
        <div class=" mb-3">
          <input id="id" type="hidden" class="form-control" name="course[id]" value="<?= $course['id'] ?>" />
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input id="title" type="text" class="form-control" name="course[title]" value="<?= $course['title'] ?>" />
        </div>
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
        <div class="mb-3">
          <label for="ordered" class="form-label"># hours</label>
          <select name="course[num_hours]" class="ordered-dropdown form-select">
            <?php for ($i=1; $i<=9; $i++): ?>
            <?php if ($i===$course['num_hours']): ?>
            <option selected value="<?=$i ?>"><?=$i ?></option>
            <?php else: ?>
            <option value="<?=$i ?>"><?=$i ?></option>
            <?php endif; ?>
            <?php endfor; ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="ordered" class="form-label">Order</label>
          <select name="course[ordered]" class="ordered-dropdown form-select">
            <?php for ($i=1; $i<=9; $i++): ?>
            <?php if ($i===$course['ordered']): ?>
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