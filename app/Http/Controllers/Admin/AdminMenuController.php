<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AdminMenuController extends Controller
{
    public function index() {
        $title = 'Menu';
        $menus = Menu::paginate(10);

        return view('admin.menu-page', compact('menus', 'title'));
    }

    public function create() {
        $title = 'Add Menu';
        $categories = Category::all();

        return view('admin.add-menu', compact('title', 'categories'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'menu_name'      => 'required|max:255',
            'id_category'  => 'required',
            'menu_description' => 'required|min:10',
            'menu_price'     => 'required|integer',
            'photo_url'    => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($request->hasFile('photo_url')) {
            $photo = $request->file('photo_url');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('uploads', $photoName);
        }

        Menu::create([
            'menu_name'      => $validated['menu_name'],
            'id_category'  => $validated['id_category'],
            'menu_description' => $validated['menu_description'],
            'menu_price'     => $validated['menu_price'],
            'photo_url'    => $photoName
        ]);

        return redirect()->route('admin.menu')->with(['success' => 'Data Menu Berhasil Disimpan!']);
    }

    public function edit($id_menu) {
        $title = 'Edit Menu';
        $menu = Menu::findOrFail($id_menu);
        $categories = Category::all();

        return view('admin.edit-menu', compact('menu', 'title', 'categories'));
    }

    public function update(Request $request, $id_menu) {
        $validated = $request->validate([
            'menu_name'      => 'required|max:255',
            'id_category'  => 'required',
            'menu_description' => 'required|min:10',
            'menu_price'     => 'required|integer',
            'photo_url'    => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $menu = Menu::findOrFail($id_menu);

        if($request->hasFile('photo_url')) {
            if ($menu->photo_url && Storage::exists('public/uploads/' . $menu->photo_url)) {
                Storage::delete('public/uploads' . $menu->photo_url); // Menghapus foto lama
            }

            $photo = $request->file('photo_url');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('uploads', $photoName);
        } else {
            $photoName = $menu->photo_url;
        }

        $menu->update([
            'menu_name'      => $validated['menu_name'],
            'id_category'  => $validated['id_category'],
            'menu_description' => $validated['menu_description'],
            'menu_price'     => $validated['menu_price'],
            'photo_url'    => $photoName
        ]);

        return redirect()->route('admin.menu')->with(['success' => 'Data Menu Berhasil Diubah!']);
    }

    public function destroy($id_menu): RedirectResponse
    {
        $menu = Menu::findOrFail($id_menu);

        if($menu->photo_url && Storage::exists('public/uploads/' . $menu->photo_url)) {
            Storage::delete('public/uploads' . $menu->photo_url); // Menghapus foto lama
        }

        $menu->delete();

        return redirect()->route('admin.menu')->with(['success' => 'Data Menu Berhasil Dihapus!']);
    }
}
