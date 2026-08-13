<div class="page-header">
    <h1><i class="fa-solid fa-gauge-high me-2 text-primary"></i>Dashboard</h1>
</div>

<div class="row g-4 mb-4">
    <?php
    $statCards = [
        ['key' => 'posts', 'label' => 'Posts', 'icon' => 'fa-newspaper', 'color' => 'primary', 'url' => '/admin/posts'],
        ['key' => 'categories', 'label' => 'Categories', 'icon' => 'fa-folder-tree', 'color' => 'success', 'url' => '/admin/categories'],
        ['key' => 'pages', 'label' => 'Pages', 'icon' => 'fa-file-lines', 'color' => 'info', 'url' => '/admin/pages'],
        ['key' => 'users', 'label' => 'Users', 'icon' => 'fa-users', 'color' => 'warning', 'url' => '/admin/users'],
        ['key' => 'visitors', 'label' => 'Visitors', 'icon' => 'fa-eye', 'color' => 'secondary', 'url' => '#'],
    ];
    foreach ($statCards as $card):
    ?>
    <div class="col-sm-6 col-xl">
        <div class="card stat-card h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-<?= $card['color'] ?> bg-opacity-10 text-<?= $card['color'] ?>">
                    <i class="fa-solid <?= e($card['icon']) ?>"></i>
                </div>
                <div>
                    <div class="stat-value"><?= number_format((int) ($stats[$card['key']] ?? 0)) ?></div>
                    <div class="stat-label"><?= e($card['label']) ?></div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header">
                <i class="fa-solid fa-chart-line me-2"></i>Posts — Last 7 Days
            </div>
            <div class="card-body">
                <canvas id="postsChart" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fa-solid fa-clock-rotate-left me-2"></i>Recent Activity</span>
                <a href="<?= url('/admin/activity') ?>" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush" style="max-height:320px;overflow-y:auto;">
                    <?php if (empty($recentActivity)): ?>
                        <div class="p-3 text-muted text-center">No recent activity.</div>
                    <?php else: ?>
                        <?php foreach ($recentActivity as $log): ?>
                        <div class="list-group-item activity-item">
                            <div class="d-flex justify-content-between">
                                <strong class="small"><?= e($log['user_name'] ?? 'System') ?></strong>
                                <span class="text-muted small"><?= format_date($log['created_at'], 'M j, H:i') ?></span>
                            </div>
                            <div class="small text-muted"><?= e(str_limit($log['description'], 60)) ?></div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fa-solid fa-newspaper me-2"></i>Latest Posts</span>
        <a href="<?= url('/admin/posts/create') ?>" class="btn btn-sm btn-primary">
            <i class="fa-solid fa-plus me-1"></i>New Post
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($latestPosts)): ?>
                        <tr><td colspan="5" class="text-center text-muted py-4">No posts yet.</td></tr>
                    <?php else: ?>
                        <?php foreach ($latestPosts as $post): ?>
                        <tr>
                            <td><?= e(str_limit($post['title'], 50)) ?></td>
                            <td><?= e($post['author_name'] ?? '—') ?></td>
                            <td>
                                <?php
                                $statusClass = match ($post['status'] ?? '') {
                                    'published' => 'success',
                                    'draft' => 'secondary',
                                    'archived' => 'warning',
                                    default => 'light',
                                };
                                ?>
                                <span class="badge bg-<?= $statusClass ?> badge-status"><?= e(ucfirst($post['status'] ?? 'unknown')) ?></span>
                            </td>
                            <td class="text-muted small"><?= format_date($post['created_at']) ?></td>
                            <td>
                                <a href="<?= url('/admin/posts/' . $post['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php \App\Core\View::startSection('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('postsChart');
    if (!ctx) return;
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= json_encode($chartLabels) ?>,
            datasets: [{
                label: 'Posts Created',
                data: <?= json_encode($chartValues) ?>,
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.1)',
                fill: true,
                tension: 0.3,
                pointRadius: 4,
                pointBackgroundColor: '#2563eb'
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            }
        }
    });
});
</script>
<?php \App\Core\View::endSection(); ?>
