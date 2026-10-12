/**
 * CMS Admin Panel Helpers
 */
(function ($) {
    'use strict';

    const Admin = {
        editors: {},

        csrfToken: function () {
            return $('meta[name="csrf-token"]').attr('content') || '';
        },

        appUrl: function () {
            return ($('meta[name="app-url"]').attr('content') || '').replace(/\/$/, '');
        },

        init: function () {
            this.setupAjax();
            this.initDataTables();
            this.initConfirmDelete();
            this.initSlugGenerator();
            this.initThemeToggle();
            this.initSidebar();
            this.initEditorTools();
        },

        setupAjax: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken(),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
        },

        initDataTables: function () {
            if ($.fn.DataTable) {
                $('.datatable').each(function () {
                    if (!$.fn.DataTable.isDataTable(this)) {
                        $(this).DataTable({
                            pageLength: 25,
                            responsive: true,
                            order: [[0, 'desc']],
                            language: {
                                search: '',
                                searchPlaceholder: 'Search...',
                                lengthMenu: 'Show _MENU_ entries',
                                info: 'Showing _START_ to _END_ of _TOTAL_ entries',
                                paginate: {
                                    previous: '<i class="fa-solid fa-chevron-left"></i>',
                                    next: '<i class="fa-solid fa-chevron-right"></i>'
                                }
                            },
                            dom: '<"row mb-3"<"col-sm-6"l><"col-sm-6"f>>rtip'
                        });
                    }
                });
            }
        },

        initConfirmDelete: function () {
            $(document).on('submit', 'form[data-confirm]', function (e) {
                const msg = $(this).data('confirm') || 'Are you sure you want to delete this item?';
                if (!confirm(msg)) {
                    e.preventDefault();
                }
            });

            $(document).on('click', '[data-ajax-delete]', function (e) {
                e.preventDefault();
                const $btn = $(this);
                const url = $btn.data('ajax-delete');
                const msg = $btn.data('confirm') || 'Are you sure you want to delete this item?';

                if (!confirm(msg)) return;

                $.post(url, { _csrf_token: Admin.csrfToken() })
                    .done(function (res) {
                        if (res.success) {
                            $btn.closest('[data-delete-row]').fadeOut(300, function () {
                                $(this).remove();
                            });
                            Admin.showToast(res.message || 'Deleted successfully.', 'success');
                        } else {
                            Admin.showToast(res.message || 'Delete failed.', 'danger');
                        }
                    })
                    .fail(function (xhr) {
                        const msg = xhr.responseJSON?.message || 'Delete failed.';
                        Admin.showToast(msg, 'danger');
                    });
            });
        },

        initSlugGenerator: function () {
            $(document).on('blur', '[data-slug-source]', function () {
                const $source = $(this);
                const $target = $($source.data('slug-target') || '#slug');
                if ($target.val() && !$target.data('manual')) return;

                const title = $source.val();
                if (!title) return;

                $.get(Admin.slugUrl(), { title: title })
                    .done(function (res) {
                        if (res.slug && !$target.data('manual')) {
                            $target.val(res.slug);
                        }
                    });
            });

            $(document).on('input', '#slug, [name="slug"]', function () {
                $(this).data('manual', true);
            });
        },

        slugUrl: function () {
            return this.appUrl() + '/api/slug';
        },

        initThemeToggle: function () {
            const $toggle = $('#themeToggle');
            if (!$toggle.length) return;

            $toggle.on('click', function () {
                const current = document.documentElement.getAttribute('data-theme') || 'light';
                const next = current === 'dark' ? 'light' : 'dark';
                document.documentElement.setAttribute('data-theme', next);
                document.cookie = 'cms_theme=' + next + ';path=/;max-age=31536000';
                $toggle.find('i').toggleClass('fa-moon fa-sun');
            });
        },

        initSidebar: function () {
            $('#sidebarToggle, .sidebar-overlay').on('click', function () {
                $('.admin-sidebar').toggleClass('show');
                $('.sidebar-overlay').toggleClass('show');
            });

            $(document).on('click', '[data-nav-group]', function () {
                $(this).closest('.admin-nav-group').toggleClass('open');
            });
        },

        showToast: function (message, type) {
            type = type || 'info';
            const $alert = $('<div class="alert alert-' + type + ' alert-dismissible fade show position-fixed" style="top:80px;right:20px;z-index:9999;min-width:280px;">' +
                message +
                '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
            $('body').append($alert);
            setTimeout(function () { $alert.alert('close'); }, 4000);
        },

        editorUploadUrl: function () {
            return this.appUrl() + '/admin/media/editor-upload';
        },

        getEditorForTarget: function (target) {
            const key = target || 'content';
            if (this.editors[key]) return this.editors[key];
            const el = document.querySelector('textarea.ckeditor[name="' + key + '"], textarea#' + key + '.ckeditor');
            if (el && el.ckeditorInstance) return el.ckeditorInstance;
            const first = Object.values(this.editors)[0];
            return first || null;
        },

        insertHtml: function (editor, html) {
            if (!editor) return;
            editor.model.change(function () {
                const viewFragment = editor.data.processor.toView(html);
                const modelFragment = editor.data.toModel(viewFragment);
                editor.model.insertContent(modelFragment);
            });
            editor.editing.view.focus();
        },

        insertColumns: function (editor, cols) {
            cols = cols === 3 ? 3 : 2;
            if (!editor) {
                Admin.showToast('Open the content editor first.', 'warning');
                return;
            }
            try {
                editor.execute('insertTable', { rows: 1, columns: cols });
                editor.editing.view.focus();
                Admin.showToast(cols + '-column layout inserted. Type in each cell.', 'success');
            } catch (err) {
                // Fallback HTML if command unavailable
                const cells = Array.from({ length: cols }, function (_, i) {
                    return '<td><p>Column ' + (i + 1) + '</p></td>';
                }).join('');
                Admin.insertHtml(editor, '<figure class="table"><table><tbody><tr>' + cells + '</tr></tbody></table></figure>');
                Admin.showToast(cols + '-column layout inserted.', 'success');
            }
        },

        uploadImageToEditor: function (editor, file) {
            if (!editor || !file) return;

            const data = new FormData();
            data.append('upload', file);
            data.append('_csrf_token', Admin.csrfToken());

            Admin.showToast('Uploading image…', 'info');

            fetch(Admin.editorUploadUrl(), {
                method: 'POST',
                body: data,
                headers: {
                    'X-CSRF-TOKEN': Admin.csrfToken(),
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                credentials: 'same-origin'
            })
                .then(function (r) { return r.json().then(function (j) { return { ok: r.ok, json: j }; }); })
                .then(function (res) {
                    const url = res.json && (res.json.url || (res.json.data && res.json.data.url));
                    if (!res.ok || !url) {
                        const msg = (res.json && res.json.error && res.json.error.message) || (res.json && res.json.message) || 'Upload failed.';
                        throw new Error(msg);
                    }
                    const safeUrl = String(url).replace(/"/g, '&quot;');
                    Admin.insertHtml(editor, '<p><img src="' + safeUrl + '" alt=""></p>');
                    Admin.showToast('Image inserted.', 'success');
                })
                .catch(function (err) {
                    Admin.showToast(err.message || 'Image upload failed.', 'danger');
                });
        },

        initEditorTools: function () {
            $(document).on('click', '[data-editor-cols]', function (e) {
                e.preventDefault();
                const cols = parseInt($(this).data('editor-cols'), 10) || 2;
                const target = $(this).data('editor-target') || 'content';
                Admin.insertColumns(Admin.getEditorForTarget(target), cols);
            });

            $(document).on('click', '[data-editor-image]', function (e) {
                e.preventDefault();
                const target = $(this).data('editor-target') || 'content';
                const inputId = $(this).data('editor-file') || '#editorImageInput';
                const $input = $(inputId);
                $input.data('editor-target', target);
                $input.trigger('click');
            });

            $(document).on('change', '#editorImageInput, [data-editor-image-input]', function () {
                const file = this.files && this.files[0];
                const target = $(this).data('editor-target') || 'content';
                this.value = '';
                if (!file) return;
                Admin.uploadImageToEditor(Admin.getEditorForTarget(target), file);
            });
        },

        initCKEditor: function (selector) {
            if (typeof ClassicEditor === 'undefined') return;

            document.querySelectorAll(selector || '.ckeditor').forEach(function (el) {
                if (el.dataset.ckeditorInit) return;
                el.dataset.ckeditorInit = '1';

                ClassicEditor.create(el, {
                    toolbar: {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'link', '|',
                            'bulletedList', 'numberedList', 'blockQuote', '|',
                            'insertTable', 'uploadImage', 'mediaEmbed', '|',
                            'undo', 'redo'
                        ]
                    },
                    simpleUpload: {
                        uploadUrl: Admin.editorUploadUrl(),
                        withCredentials: true,
                        headers: {
                            'X-CSRF-TOKEN': Admin.csrfToken(),
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    },
                    image: {
                        toolbar: ['imageTextAlternative', 'toggleImageCaption', '|', 'imageStyle:inline', 'imageStyle:block', 'imageStyle:side']
                    },
                    table: {
                        contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                    }
                }).then(function (editor) {
                    el.ckeditorInstance = editor;
                    const name = el.getAttribute('name') || el.id || ('editor_' + Object.keys(Admin.editors).length);
                    Admin.editors[name] = editor;
                }).catch(function (err) {
                    console.error(err);
                });
            });
        }
    };

    window.Admin = Admin;

    $(document).ready(function () {
        Admin.init();
        Admin.initCKEditor();
    });
})(jQuery);
