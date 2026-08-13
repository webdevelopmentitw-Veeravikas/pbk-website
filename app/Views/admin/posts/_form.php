<?php
$item = $post ?? [];
$val = fn($key, $default = '') => e(old($key, $item[$key] ?? $default));
$tagsVal = old('tags', $tags ?? '');
$parentCategories = array_filter($categories ?? [], fn($c) => empty($c['parent_id']));
?>
<div class="row">
    <div class="col-lg-8">
        <div class="form-section">
            <div class="mb-3">
                <label class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" value="<?= $val('title') ?>" data-slug-source data-slug-target="#slug" required>
                <?php if (isset($errors['title'])): ?><div class="invalid-feedback"><?= e($errors['title']) ?></div><?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" value="<?= $val('slug') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea name="short_description" class="form-control" rows="2"><?= $val('short_description') ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control ckeditor" rows="10"><?= old('content', $item['content'] ?? '') ?></textarea>
            </div>
        </div>

        <div class="form-section">
            <h5 class="mb-3"><i class="fa-solid fa-magnifying-glass me-2"></i>SEO</h5>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">SEO Title</label>
                    <input type="text" name="seo_title" class="form-control" value="<?= $val('seo_title') ?>">
                </div>
                <div class="col-12">
                    <label class="form-label">SEO Description</label>
                    <textarea name="seo_description" class="form-control" rows="2"><?= $val('seo_description') ?></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">SEO Keywords</label>
                    <input type="text" name="seo_keywords" class="form-control" value="<?= $val('seo_keywords') ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Canonical URL</label>
                    <input type="url" name="canonical_url" class="form-control" value="<?= $val('canonical_url') ?>">
                </div>
                <div class="col-12">
                    <label class="form-label">OG Image URL</label>
                    <input type="text" name="og_image" class="form-control" value="<?= $val('og_image') ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-section">
            <h6 class="mb-3">Publish</h6>
            <div class="mb-3">
                <label class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" class="form-select" required>
                    <?php foreach (['draft', 'published', 'archived'] as $s): ?>
                    <option value="<?= $s ?>" <?= old('status', $item['status'] ?? 'draft') === $s ? 'selected' : '' ?>><?= ucfirst($s) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Publish Date</label>
                <input type="datetime-local" name="publish_date" class="form-control" value="<?= !empty($item['publish_date']) ? date('Y-m-d\TH:i', strtotime($item['publish_date'])) : '' ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-select" id="categorySelect">
                    <option value="">— Select —</option>
                    <?php foreach ($parentCategories as $cat): ?>
                    <option value="<?= (int) $cat['id'] ?>" <?= (string) old('category_id', $item['category_id'] ?? '') === (string) $cat['id'] ? 'selected' : '' ?>><?= e($cat['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Sub Category</label>
                <select name="sub_category_id" class="form-select" id="subCategorySelect">
                    <option value="">— Select —</option>
                    <?php foreach ($categories ?? [] as $cat): ?>
                        <?php if (!empty($cat['parent_id'])): ?>
                        <option value="<?= (int) $cat['id'] ?>" data-parent="<?= (int) $cat['parent_id'] ?>" <?= (string) old('sub_category_id', $item['sub_category_id'] ?? '') === (string) $cat['id'] ? 'selected' : '' ?>><?= e($cat['name']) ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tags</label>
                <input type="text" name="tags" class="form-control" value="<?= e($tagsVal) ?>" placeholder="tag1, tag2, tag3">
                <div class="form-text">Comma-separated tags</div>
            </div>
            <div class="d-flex flex-wrap gap-3 mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="is_featured" value="1" id="isFeatured" <?= old('is_featured', $item['is_featured'] ?? 0) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="isFeatured">Featured</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="is_breaking" value="1" id="isBreaking" <?= old('is_breaking', $item['is_breaking'] ?? 0) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="isBreaking">Breaking</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="is_trending" value="1" id="isTrending" <?= old('is_trending', $item['is_trending'] ?? 0) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="isTrending">Trending</label>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h6 class="mb-3">Media</h6>
            <div class="mb-3">
                <label class="form-label">Featured Image</label>
                <?php if (!empty($item['featured_image'])): ?>
                    <div class="mb-2"><img src="<?= upload_url($item['featured_image']) ?>" class="image-preview w-100" alt=""></div>
                <?php endif; ?>
                <input type="file" name="featured_image" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <label class="form-label">Preview Image</label>
                <?php if (!empty($item['preview_image'])): ?>
                    <div class="mb-2"><img src="<?= upload_url($item['preview_image']) ?>" class="image-preview w-100" alt=""></div>
                <?php endif; ?>
                <input type="file" name="preview_image" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <label class="form-label">YouTube URL</label>
                <input type="url" name="youtube_url" class="form-control" value="<?= $val('youtube_url') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">PDF Attachment</label>
                <?php if (!empty($item['pdf_attachment'])): ?>
                    <div class="mb-2 small"><a href="<?= upload_url($item['pdf_attachment']) ?>" target="_blank"><i class="fa-solid fa-file-pdf me-1"></i>Current PDF</a></div>
                <?php endif; ?>
                <input type="file" name="pdf_attachment" class="form-control" accept=".pdf">
            </div>
            <div class="mb-3">
                <label class="form-label">Gallery Images</label>
                <input type="file" name="gallery_images[]" class="form-control" accept="image/*" multiple>
            </div>
            <?php if (!empty($item['images'])): ?>
            <div class="gallery-images-grid">
                <?php foreach ($item['images'] as $img): ?>
                <div class="gallery-image-item">
                    <img src="<?= upload_url($img['image_path']) ?>" alt="">
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php \App\Core\View::startSection('scripts'); ?>
<script>
$('#categorySelect').on('change', function () {
    const parentId = $(this).val();
    $('#subCategorySelect option').each(function () {
        const $opt = $(this);
        if (!$opt.val()) return;
        $opt.toggle(!parentId || $opt.data('parent') == parentId);
    });
    if ($('#subCategorySelect option:selected').is(':hidden')) {
        $('#subCategorySelect').val('');
    }
}).trigger('change');
</script>
<?php \App\Core\View::endSection(); ?>
