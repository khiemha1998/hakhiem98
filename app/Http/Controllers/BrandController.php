<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::all();
        return view('backend.brand.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
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
        ]);

        $brand = new Brand();
//        $banner = new Banner();
        $brand->name = $request->input('name');
        $brand->slug = Str::slug($request->input('name'));
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time() . '_' . $file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/brand/'; // uploads/brand ; uploads/vendor
            // Thực hiện upload file
            $file->move($path_upload, $filename);

            // lưu lại cái tên
            $brand->image = $path_upload . $filename;
        }
        $brand->website = $request->input('website'); // $_POST['url'];

        //loại
        $is_active = 0;
        if ($request->has('is_active')) { //kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        // trạng thái
        $brand->is_active = $is_active;
        $position = 0;
        if ($request->has('position')) {
            $position = $request->input('position');
        }
        $brand->position = $position;
        $brand->description = $request->input('description');

        $brand->save();

        return redirect()->route('admin.brand.index');

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
        $data = Brand::findorFail($id);
        return view('backend.brand.edit',['data'=>$data]);
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
//            'image_new' => 'required|image',
           'position'=> 'required',
      ]);

        $brand = Brand::findorFail($id);
        $brand->name = $request->input('name');
        $brand->slug = Str::slug($request->input('name'));
        if ($request->hasFile('new_image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            @unlink(public_path($brand->image));
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time() . '_' . $file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/brand/'; // uploads/brand ; uploads/vendor
            // Thực hiện upload file
            $file->move($path_upload, $filename);

            // lưu lại cái tên
            $brand->image = $path_upload . $filename;
        }
        $brand->website = $request->input('website'); // $_POST['url'];

        //loại
        $is_active = 0;
        if ($request->has('is_active')) { //kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        // trạn thái
        $brand->is_active = $is_active;
        $position = 0;
        if ($request->has('position')) {
            $position = $request->input('position');
        }
        $brand->position = $position;
        $brand->description = $request->input('description');
        $brand->save();
        return redirect()->route('admin.brand.index');
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
        $isDelete = Brand::destroy($id);

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
