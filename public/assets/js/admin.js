/**
 * CMS Admin Panel Helpers
 */
(function ($) {
    'use strict';

    const Admin = {
        csrfToken: function () {
            return $('meta[name="csrf-token"]').attr('content') || '';
        },

        init: function () {
            this.setupAjax();
            this.initDataTables();
            this.initConfirmDelete();
            this.initSlugGenerator();
            this.initThemeToggle();
            this.initSidebar();
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
            const base = $('meta[name="app-url"]').attr('content') || '';
            return base.replace(/\/$/, '') + '/api/slug';
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

        initCKEditor: function (selector) {
            if (typeof ClassicEditor === 'undefined') return;
            document.querySelectorAll(selector || '.ckeditor').forEach(function (el) {
                if (el.dataset.ckeditorInit) return;
                el.dataset.ckeditorInit = '1';
                ClassicEditor.create(el, {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'insertTable', 'mediaEmbed', '|', 'undo', 'redo']
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
