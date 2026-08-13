<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Database;
use App\Models\ActivityLog;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;

class DashboardController extends BaseAdminController
{
    public function index(): void
    {
        $db = Database::getInstance();
        $postModel = new Post();

        $stats = [
            'posts'      => (new Post())->count(),
            'categories' => (new Category())->count(),
            'pages'      => (new Page())->count(),
            'users'      => (new User())->count(),
            'visitors'   => $db->count('visitors'),
        ];

        $latestPosts = $postModel->query(
            'SELECT p.*, u.name AS author_name
             FROM `posts` p
             LEFT JOIN `users` u ON u.id = p.user_id
             ORDER BY p.created_at DESC, p.id DESC
             LIMIT 10'
        );

        $recentActivity = (new ActivityLog())->latest(15);

        $chartData = $postModel->query(
            "SELECT DATE(created_at) AS date, COUNT(*) AS count
             FROM `posts`
             WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
             GROUP BY DATE(created_at)
             ORDER BY date ASC"
        );

        $labels = [];
        $values = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-{$i} days"));
            $labels[] = date('M j', strtotime($date));
            $count = 0;
            foreach ($chartData as $row) {
                if ($row['date'] === $date) {
                    $count = (int) $row['count'];
                    break;
                }
            }
            $values[] = $count;
        }

        $this->view('admin.dashboard.index', [
            'stats'          => $stats,
            'latestPosts'    => $latestPosts,
            'recentActivity' => $recentActivity,
            'chartLabels'    => $labels,
            'chartValues'    => $values,
        ], 'admin.layouts.app');
    }
}
