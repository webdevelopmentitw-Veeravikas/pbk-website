<div class="page-header">
    <h1><i class="fa-solid fa-envelope me-2 text-primary"></i>Message #<?= (int) $message['id'] ?></h1>
    <div class="d-flex gap-2">
        <a href="<?= url('/admin/contact') ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
        <form action="<?= url('/admin/contact/' . $message['id'] . '/delete') ?>" method="POST" data-confirm="Delete this message?">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash me-1"></i>Delete</button>
        </form>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">Sender Details</div>
            <div class="card-body">
                <dl class="mb-0">
                    <dt class="text-muted small">Name</dt>
                    <dd class="mb-3"><?= e($message['name']) ?></dd>
                    <dt class="text-muted small">Email</dt>
                    <dd class="mb-3"><a href="mailto:<?= e($message['email']) ?>"><?= e($message['email']) ?></a></dd>
                    <?php if (!empty($message['phone'])): ?>
                    <dt class="text-muted small">Phone</dt>
                    <dd class="mb-3"><?= e($message['phone']) ?></dd>
                    <?php endif; ?>
                    <dt class="text-muted small">Date</dt>
                    <dd class="mb-3"><?= format_date($message['created_at'], 'F j, Y g:i A') ?></dd>
                    <?php if (!empty($message['ip_address'])): ?>
                    <dt class="text-muted small">IP Address</dt>
                    <dd class="mb-0"><?= e($message['ip_address']) ?></dd>
                    <?php endif; ?>
                </dl>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><?= e($message['subject'] ?? 'No Subject') ?></span>
                <?php if ((int) ($message['is_read'] ?? 0)): ?>
                    <span class="badge bg-success">Read</span>
                <?php else: ?>
                    <span class="badge bg-warning text-dark">Unread</span>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="message-content" style="white-space: pre-wrap;"><?= e($message['message']) ?></div>
            </div>
            <div class="card-footer">
                <a href="mailto:<?= e($message['email']) ?>?subject=Re: <?= e(rawurlencode($message['subject'] ?? 'Your message')) ?>" class="btn btn-primary">
                    <i class="fa-solid fa-reply me-1"></i>Reply via Email
                </a>
            </div>
        </div>
    </div>
</div>
