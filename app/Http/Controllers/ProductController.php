<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Brand;
use App\Category;
use App\Product;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::paginate(20);

        return view('backend.product.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $vendors = Vendor::all();

        return view('backend.product.create' ,[
            'categories' => $categories,
            'brands' => $brands,
            'vendors' => $vendors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image',
            'position'=> 'required',
            'meta_title'=>'required|string|max:255',
        ]);
        $product = new Product(); // khởi tạo model
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name'));

        // Upload file
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/product/';
            // Thực hiện upload file
            $file->move($path_upload,$filename); // upload lên thư mục public/uploads/product

            $product->image = $path_upload.$filename;
        }

        $product->stock = $request->input('stock'); // số lượng
        $product->price = $request->input('price');
        $product->sale = $request->input('sale');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->vendor_id = $request->input('vendor_id');
        $product->sku = $request->input('sku');
        $product->position = $request->input('position');
        $product->url = $request->input('url');

        $is_active = 0;// mặc định gán không hiển
        if ($request->has('is_active')) { // kiem tra is_active co ton tai khong ?
            $is_active = $request->input('is_active');
        }

        $product->is_active = $is_active;

        // Sản phẩm Hot
        $is_hot = 0 ;
        if ($request->has('is_hot')){
            $is_hot = $request->input('is_hot');
        }
        $product->is_hot=$is_hot;
        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        // $product->user_id=Auth::id();
        $product->save();
        $product->addToIndex();

        // chuyển hướng đến trang
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $vendors = Vendor::all();

        return view('backend.product.edit', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
            'vendors' => $vendors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position'=> 'required',
            'meta_title'=>'required|string|max:255',
        ]);
        $product = Product::findorFail($id);; // khởi tạo model
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name'));

        // Thay đổi ảnh
        if ($request->hasFile('new_image')) {
            // xóa file cũ
            @unlink(public_path($product->image));
            // get file mới
            $file = $request->file('new_image');
            // get tên
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/product/';
            // upload file
            $request->file('new_image')->move($path_upload,$filename);

            $product->image = $path_upload.$filename;
        }

        $product->stock = $request->input('stock'); // số lượng
        $product->price = $request->input('price');
        $product->sale = $request->input('sale');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->vendor_id = $request->input('vendor_id');
        $product->sku = $request->input('sku');
        $position = 0 ;
        if ($request->has('position')){
            $position = $request->input('position');
        }
        $product->position = $position;
        $product->url = $request->input('url');

        // Trạng thái
        $is_active = 0;
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }

        $product->is_active = $is_active;

        // Sản phẩm Hot
        $is_hot = 0 ;
        if ($request->has('is_hot')){
            $is_hot = $request->input('is_hot');
        }
        $product->is_hot=$is_hot;
        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->user_id = 0;
        $product->save();

        // chuyển hướng đến trang
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // gọi tới hàm destroy của laravel để xóa 1 object
        // DELETE FROM ten_bang WHERE id = 33 -> execute command
        $isDelete = Product::destroy($id); // return 1 | 0, true  false

        if ($isDelete) { // xóa thành công
            $statusCode = 200;
            $isSuccess = true;
        } else {
            $statusCode = 400;
            $isSuccess = false;
        }

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json(['isSuccess' => $isSuccess], $statusCode);
    }
}
