<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        // //scripti sebelum read di buat : untuk menampilkan view kategori
        // return view('admin.category');

        //script setelah berhasil membuat fitur create, agar tampil ke view-kategori
        $data = category::all();
        return view('admin.category', compact('data'));
    }

    public function view_product()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    //script untuk menghapus data kategori
    public function delete_category($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function add_category(Request $request)
    {
        $data = new category;
        //category_name = nama field di db | sedangkan category = name yang ada pada view admin.addcategory
        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'Add Category Successfull');
    }
    public function add_product(Request $request)
    {
        $product = new product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;
        $product->save();

        return redirect()->back();
    }

    public function show_product()
    {
        $product = product::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect()->back();
    }

    public function update_product($id)
    {
    }
}
