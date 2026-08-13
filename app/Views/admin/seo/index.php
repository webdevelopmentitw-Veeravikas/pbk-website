<div class="page-header">
    <h1><i class="fa-solid fa-magnifying-glass-chart me-2 text-primary"></i>SEO Tools</h1>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-start gap-3 mb-3">
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary"><i class="fa-solid fa-sitemap"></i></div>
                    <div>
                        <h5 class="mb-1">Sitemap.xml</h5>
                        <p class="text-muted small mb-0">Generate an XML sitemap with all published pages, posts, and categories.</p>
                    </div>
                </div>
                <div class="mb-3">
                    <?php if ($sitemapExists): ?>
                        <span class="badge bg-success"><i class="fa-solid fa-check me-1"></i>Exists</span>
                        <a href="<?= e($sitemapUrl) ?>" target="_blank" class="ms-2 small"><?= e($sitemapUrl) ?></a>
                    <?php else: ?>
                        <span class="badge bg-secondary"><i class="fa-solid fa-times me-1"></i>Not Generated</span>
                    <?php endif; ?>
                </div>
                <form action="<?= url('/admin/seo/sitemap') ?>" method="POST">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-arrows-rotate me-1"></i>Generate Sitemap
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-start gap-3 mb-3">
                    <div class="stat-icon bg-success bg-opacity-10 text-success"><i class="fa-solid fa-robot"></i></div>
                    <div>
                        <h5 class="mb-1">Robots.txt</h5>
                        <p class="text-muted small mb-0">Generate robots.txt with crawl rules and sitemap reference.</p>
                    </div>
                </div>
                <div class="mb-3">
                    <?php if ($robotsExists): ?>
                        <span class="badge bg-success"><i class="fa-solid fa-check me-1"></i>Exists</span>
                        <a href="<?= e($robotsUrl) ?>" target="_blank" class="ms-2 small"><?= e($robotsUrl) ?></a>
                    <?php else: ?>
                        <span class="badge bg-secondary"><i class="fa-solid fa-times me-1"></i>Not Generated</span>
                    <?php endif; ?>
                </div>
                <form action="<?= url('/admin/seo/robots') ?>" method="POST">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-arrows-rotate me-1"></i>Generate Robots.txt
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header"><i class="fa-solid fa-lightbulb me-2"></i>SEO Tips</div>
    <div class="card-body">
        <ul class="mb-0">
            <li>Regenerate the sitemap after publishing new content.</li>
            <li>Custom robots.txt rules can be set in <a href="<?= url('/admin/settings') ?>">Settings → SEO</a>.</li>
            <li>Submit your sitemap to Google Search Console for better indexing.</li>
        </ul>
    </div>
</div>
