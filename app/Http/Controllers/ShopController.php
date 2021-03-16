<?php

namespace App\Http\Controllers;

use App\article;
use App\Banner;
use App\Blog;
use App\Brand;
use App\Category;
use App\Contact;
use App\Product;
use App\Setting;
use Illuminate\Http\Request;
use Mail;

class ShopController extends GeneralController
{
    public function index()
    {
        $menu = Category::where([
            'is_active' => 1,
        ])->orderBy('position', 'ASC')->orderBy('id', 'DESC')->get();

        $setting = Setting::first();

        $banners = Banner::where('is_active',1)->orderBy('position', 'ASC')
            ->orderBy('id', 'DESC')->get();

        // Box sản phẩm hot
        $hotProducts = Product::where(['is_active' => 1, 'is_hot' => 1])
            ->limit(10)
            ->orderBy('id', 'desc')
            ->get();
        // step 1 - lấy toàn bộ danh mục cha
        $categories = Category::where([
            'is_active' => 1,
            'parent_id' => 0 // danh mục cha
        ])->orderBy('position', 'ASC')->get();

        $arr = [];

    // step 2 lấy tất cả danh mục con theo danh mục cha
         foreach ($categories as $key => $category) {

        $arr[$key]['category'] = $category;
        $ids = [$category->id]; // [1]
        $childCategories = Category::where([
            'is_active' => 1,
            'parent_id' => $category->id // danh mục cha
        ])->get();

        foreach ($childCategories as $child) {
            $ids[] = $child->id; // thêm các phần tử vào mảng
        } // $ids = 7,8,9,11..

        // ids = 1,7,8,9,11,... : toàn bộ id của dạnh mục cha + con


        $products = Product::where(['is_active' => 1])
            ->whereIn('category_id' , $ids)
            ->limit(12)
            ->orderBy('id', 'desc')
            ->get();
        $arr[$key]['products'] = $products;
        }
        $showblogs =Blog::where(['is_active'=>1])->orderBy('id','desc')->limit(3)->get();
        $brands = Brand::where(['is_active'=>1])->get();



        return view('frontend.index', [
            'banners' => $banners,
            'list' => $arr,
            'hotProducts' => $hotProducts,
            'showblog'=>$showblogs,
            'brand'=>$brands,
        ]);
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function postContact(Request $request )
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone'=> 'required|integer',
        ]);
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->content = $request->input('content');

        $contact->save();

        return redirect()->route('shop.contact')->with('msg','Bạn vừa gửi liên hệ thành công');
    }
    public function products(){

        $banners = Banner::where('is_active',1)->orderBy('position', 'ASC')
            ->orderBy('id', 'DESC')->get();

        // step 1 - lấy toàn bộ danh mục cha
        $categories = Category::where([
            'is_active' => 1,
            'parent_id' => 0 // danh mục cha
        ])->orderBy('position', 'ASC')->get();

        $arr = [];

        // step 2 lấy tất cả danh mục con theo danh mục cha
        foreach ($categories as $key => $category) {

            $arr[$key]['category'] = $category;

            $ids = [$category->id]; // [1]

            $childCategories = Category::where([
                'is_active' => 1,
                'parent_id' => $category->id // danh mục cha
            ])->get();

            foreach ($childCategories as $child) {
                $ids[] = $child->id; // thêm các phần tử vào mảng
            } // $ids = 7,8,9,11..

            // ids = 1,7,8,9,11,... : toàn bộ id của dạnh mục cha + con


            $products = Product::where(['is_active' => 1])
                ->whereIn('category_id' , $ids)
                ->limit(12)
                ->orderBy('id', 'desc')
                ->get();
            $arr[$key]['products'] = $products;
        }
        $brands = Brand::where(['is_active'=>1])->get();


        return view('frontend.products', [
            'banners' => $banners,
            'list' => $arr,
            'brand'=>$brands

        ]);

    }


    public function productbycategory($slug){
        $category = Category::where(['slug'=>$slug])->first();
        $products = Product::where([
          'is_active'=>1,
          'category_id'=>$category->id
        ])->orderBy('id','desc')->paginate(10);



        return view('frontend.products.product',['products'=>$products ]);
    }
    public function productdetails($slug,$id){
    $product = Product::where(['is_active'=>1,'slug'=>$slug])->first();

        // get chi tiet sp
        $productIn = Product::find($id);
        if (!$product) {
            return $this->notfound();
        }
        $category = Category::find($productIn->category_id);
        // step 2 : lấy list 10 SP liên quan
        $relatedProducts = Product::where([
            ['is_active' , '=', 1],
            ['category_id', '=' , $productIn->category_id ],
            ['id', '<>' , $productIn->$id]
        ])->orderBy('id', 'desc')
            ->take(10)
            ->get();
        return view('frontend.products.productdetails',['product'=>$productIn,'relateProducts'=>$relatedProducts]);

    }
    public function blog(){
        $blog = Blog::where('is_active',1)->orderBy('position', 'ASC') ->orderBy('id', 'DESC')->limit(6)->get();
        return view('frontend.blog',['data'=>$blog]);
    }

    public function blogdetails($slug){
       $blogdetail = Blog::where(['is_active'=>1,'slug'=>$slug])->first();
       $related_posts = Blog::where([['slug','<>',$slug],['is_active','=',1]])->orderBy('id','desc')->limit(3)->get();
       return view('frontend.blogdetail',['data'=>$blogdetail,'related_posts'=>$related_posts]);
       }
       public function search(Request $request){
        $keyword = $request->input('search');
        $slug = str_slug($keyword);
        $products = Product::where([['is_active','=',1],['slug','like','%'.$slug.'%']])->orwhere('price',$slug)->get();
//      $totalResult =$products->total();


    return view('frontend.search',[
        'products'=>$products,
        'keyword'=>$keyword ? $keyword :'',
        ]);
    }

    public function searchold (Request $request){
        $keyword = $request->input('search');
        $slug = str_slug($keyword);
        $products = Product::where([['is_active','=',1],['slug','like','%'.$slug.'%']])->orwhere('price',$slug)->get();

        $data = Product::searchByQuery(array('match' => array('name' => '$keyword')));
        $products =$data->all();
        $totalResult = $data->count();

        return view('frontend.search',[
            'products'=>$products,
            'keyword'=>$keyword ? $keyword :'',
//          'totalResult' => $totalResult,
        ]);

    }

    public function notfound(){
    return view('frontend.notfound');
    }


}
