<?php
$members = $members ?? ['data' => [], 'current_page' => 1, 'last_page' => 1];
$q = $q ?? '';
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4 mb-0">Members</h1>
</div>
<form class="row g-2 mb-3" method="get">
  <div class="col-md-4">
    <input type="search" name="q" value="<?= e($q) ?>" class="form-control" placeholder="Search name, email, ID…">
  </div>
  <div class="col-auto"><button class="btn btn-primary">Search</button></div>
</form>
<div class="card">
  <div class="table-responsive">
    <table class="table table-striped mb-0 datatable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Membership</th>
          <th>Name</th>
          <th>Phone</th>
          <th>District</th>
          <th>Email</th>
          <th>Date</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($members['data'] as $m): ?>
        <tr>
          <td><?= (int) $m['id'] ?></td>
          <td><code><?= e($m['membership_id']) ?></code></td>
          <td><?= e($m['name']) ?></td>
          <td><?= e($m['phone']) ?></td>
          <td><?= e($m['district']) ?></td>
          <td><?= e($m['email']) ?></td>
          <td><?= e(format_date($m['created_at'] ?? null, 'd M Y H:i')) ?></td>
          <td class="text-nowrap">
            <a class="btn btn-sm btn-outline-primary" href="<?= e(url('/admin/members/' . $m['id'])) ?>">View</a>
            <a class="btn btn-sm btn-outline-secondary" target="_blank" href="<?= e(url('/membership/card/' . $m['membership_id'])) ?>">Card</a>
            <form class="d-inline" method="post" action="<?= e(url('/admin/members/' . $m['id'] . '/delete')) ?>" onsubmit="return confirm('Delete this member?');">
              <?= csrf_field() ?>
              <button class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?= paginate_links($members, url('/admin/members') . ($q !== '' ? '?q=' . rawurlencode($q) : '')) ?>
