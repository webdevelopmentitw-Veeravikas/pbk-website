<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\ActivityLog;
use App\Models\Menu;
use App\Models\Page;
use App\Services\PageMenuSync;

class MenuController extends BaseAdminController
{
    public function index(): void
    {
        (new PageMenuSync())->syncAll();

        $model = new Menu();
        $location = $this->request->get('location');

        $this->view('admin.menus.index', [
            'menus'    => $model->all('sort_order ASC, id ASC'),
            'tree'     => $model->tree($location ?: null),
            'location' => $location,
            'pages'    => (new Page())->all('sort_order ASC, title ASC'),
        ], 'admin.layouts.app');
    }

    public function togglePage(int $id): void
    {
        $model = new Page();
        $page = $model->find($id);
        if (!$page) {
            $this->notFound();
        }

        $show = (int) ($page['show_in_menu'] ?? 0) === 1 ? 0 : 1;
        $model->update($id, ['show_in_menu' => $show]);

        $page['show_in_menu'] = $show;
        (new PageMenuSync())->syncPage($page);

        ActivityLog::record(
            Auth::id(),
            'menu_toggle_page',
            ($show ? 'Added' : 'Removed') . " page #{$id} from header menu"
        );

        $this->flash('success', $show ? 'Page added to header menu.' : 'Page removed from header menu.');
        $this->redirect(url('/admin/menus'));
    }

    public function create(): void
    {
        $model = new Menu();

        $this->view('admin.menus.create', [
            'parents' => $model->all('title ASC'),
            'pages'   => (new Page())->all('sort_order ASC, title ASC'),
        ], 'admin.layouts.app');
    }

    public function store(): void
    {
        $data = $this->validate($this->request->all(), [
            'title'    => 'required|max:150',
            'url'      => 'nullable|max:500',
            'url_type' => 'required|in:internal,external',
            'location' => 'required|in:header,footer,sidebar',
            'target'   => 'required|in:_self,_blank',
            'status'   => 'nullable',
        ]);

        $model = new Menu();
        $id = $model->create([
            'parent_id'  => $this->request->post('parent_id') ?: null,
            'title'      => $data['title'],
            'url'        => $data['url'] ?? null,
            'url_type'   => $data['url_type'],
            'route_name' => $this->request->post('route_name'),
            'target'     => $data['target'],
            'icon'       => $this->request->post('icon'),
            'location'   => $data['location'],
            'sort_order' => (int) ($this->request->post('sort_order') ?? 0),
            'status'     => $this->checkboxVal('status'),
        ]);

        ActivityLog::record(Auth::id(), 'menu_create', "Created menu item #{$id}: {$data['title']}");
        $this->flash('success', 'Menu item created.');
        $this->redirect(url('/admin/menus'));
    }

    public function edit(int $id): void
    {
        $model = new Menu();
        $menu = $model->find($id);
        if (!$menu) {
            $this->notFound();
        }

        $this->view('admin.menus.edit', [
            'menu'    => $menu,
            'parents' => $model->where('id != :id', ['id' => $id], 'title ASC'),
            'pages'   => (new Page())->all('sort_order ASC, title ASC'),
        ], 'admin.layouts.app');
    }

    public function update(int $id): void
    {
        $model = new Menu();
        if (!$model->find($id)) {
            $this->notFound();
        }

        $data = $this->validate($this->request->all(), [
            'title'    => 'required|max:150',
            'url'      => 'nullable|max:500',
            'url_type' => 'required|in:internal,external',
            'location' => 'required|in:header,footer,sidebar',
            'target'   => 'required|in:_self,_blank',
        ]);

        $model->update($id, [
            'parent_id'  => $this->request->post('parent_id') ?: null,
            'title'      => $data['title'],
            'url'        => $data['url'] ?? null,
            'url_type'   => $data['url_type'],
            'route_name' => $this->request->post('route_name'),
            'target'     => $data['target'],
            'icon'       => $this->request->post('icon'),
            'location'   => $data['location'],
            'sort_order' => (int) ($this->request->post('sort_order') ?? 0),
            'status'     => $this->checkboxVal('status'),
        ]);

        ActivityLog::record(Auth::id(), 'menu_update', "Updated menu item #{$id}");
        $this->flash('success', 'Menu item updated.');
        $this->redirect(url('/admin/menus'));
    }

    public function destroy(int $id): void
    {
        $model = new Menu();
        $menu = $model->find($id);
        if (!$menu) {
            $this->notFound();
        }

        $model->delete($id);
        ActivityLog::record(Auth::id(), 'menu_delete', "Deleted menu item #{$id}: {$menu['title']}");
        $this->respondDestroy('Menu item deleted.', url('/admin/menus'));
    }

    public function reorder(): void
    {
        $ordered = $this->request->post('order') ?? $this->request->json()['order'] ?? [];
        if (!is_array($ordered)) {
            $this->json(['success' => false, 'message' => 'Invalid order data.'], 422);
        }

        (new Menu())->reorder(array_map('intval', $ordered));
        ActivityLog::record(Auth::id(), 'menu_reorder', 'Menu items reordered');

        $this->json(['success' => true, 'message' => 'Menu order saved.']);
    }
}
