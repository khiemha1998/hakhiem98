<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();

        return view('backend.article.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->slug = Str::slug($request->input('title')); //slug

//        if ($request->hasFile('image')){ // dòng này kiểm tra xem có image có được chọn
//            // get file
//
//            $file = $request->input('image');
//
//            // đặt tên cho file image
//            $filename = time().'_jojiuo'; // $file->getClientOriginalName() = tên
//
//
//            $path = $request->image->storeAs('article', time().'_filename.jpg');
//            //lưu lại cái tên
//            $article->image = $path;
//
//        }
        if ($request->hasFile('image')) { // kiểm tra xem có image có đc chọn ko
            // get file
            $file = $request->file('image');
            // dặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); //tên ban đầu của file
            // Định nghĩa đường dẫn file upload lên
            $path_upload = 'upload/article/'; // uploads/brands
            // thực hiện upload file
            $file->move($path_upload,$filename);
            // lưu lại cái tên
            $article->image = $path_upload.$filename;
        }
        //loại
        $article->type = $request->input('type');
        //trạng thái

        $is_active = 0;
        if ($request->has('is_active')){ // kiểm tra is_active có tồn tại không?
            $is_active = $request->input('is_active');

        }
        //trạng thái
        $article->is_active = $is_active;
        //vị trí
        $position = 0;
        if ($request->has('position')){
            $position = $request->input('position');
        }
        $article->position = $position;

        //mô tả
        $article->description = $request->input('description');

        //lưu
        $article->save();

        //chuyển hướng trang về trang danh sách
        return redirect()->route('admin.article.index');
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
        $article = Article::findorFail($id);
        return view('backend.article.edit', ['data' => $article ]);
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
        $article = Article::findorFail($id);
        $article->title = $request->input('title');
        $article->slug = Str::slug($request->input('title')); //slug

        if ($request->hasFile('new_image')) { // kiểm tra xem có image có đc chọn ko
            //xóa file cũ
            @unlink(public_path($article->image)); // hàm unlink của php không phải của laravel, chúng ta thêm @ đằng trước để tránh bị lỗi
            //get new_image
            $file = $request->file('new_image');
            // dặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); //tên ban đầu của file
            // Định nghĩa đường dẫn file upload lên
            $path_upload = 'upload/article/'; // uploads/brands
            // thực hiện upload file
            $file->move($path_upload,$filename);
            // lưu lại cái tên
            $article->image = $path_upload.$filename;
        }

        //loại
        $article->type = $request->input('type');
        //trạng thái

        $is_active = 0;
        if ($request->has('is_active')){ // kiểm tra is_active có tồn tại không?
            $is_active = $request->input('is_active');

        }
        //trạng thái
        $article->is_active = $is_active;
        //vị trí
        $position = 0;
        if ($request->has('position')){
            $position = $request->input('position');
        }
        $article->position = $position;

        //mô tả
        $article->description = $request->input('description');

        //lưu
        $article->save();

        //chuyển hướng trang về trang danh sách
        return redirect()->route('admin.article.index');
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
        $isDelete = Article::destroy($id);

        if ($isDelete) { // xóa thành công
            $statusCode = 200;
            $isSuccess = true;
        } else {
            $statusCode = 400;
            $isSuccess = false;
        }

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'isSuccess' => $isSuccess
        ], $statusCode);
    }
}
