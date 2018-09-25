<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::with('user','category')->orderBy('id','desc')->paginate(10);
        /*
         * $data['products'] = Product::where([
            ['name','like','%go%'],
            ['id',56]
        ])->get();
        */
        //dd($data);
        return view('admin.products.index',$data);
    }
    public function create(){
        $data['categories'] = Product::orderBy('name','asc')->get();
        return view('admin.products.create',$data);
    }
    public function store(Request $request){
        $valid = Validator::make($request->all(),[
            'name' => 'required',
            'code' => 'required|unique:products,code',
            'content' => 'required',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'original_price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ],[
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'code.required' => 'Vui lòng nhập mã sản phẩm.',
            'content.required' => 'Vui lòng nhập nội dung sản phẩm.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Không tồn tại danh mục.',
            'user_id.exists' => 'Không tồn tại danh mục.',
            // required
            'regular_price.required' => 'Vui lòng nhập giá thị trường sản phẩm.',
            'sale_price.required' => 'Vui lòng nhập giá bán sản phẩm.',
            'original_price.required' => 'Vui lòng nhập giá gốc sản phẩm.',
            'quantity.required' => 'Vui lòng nhập số lượng sản phẩm.',
            // numeric
            'regular_price.numeric' => 'Vui lòng nhập số.',
            'sale_price.numeric' => 'Vui lòng nhập số.',
            'original_price.numeric' => 'Vui lòng nhập số.',
            'quantity.numeric' => 'Vui lòng nhập số.',
            // min
            'regular_price.min' => 'Vui lòng nhập số nhỏ nhất là :min.',
            'sale_price.min' => 'Vui lòng nhập số nhỏ nhất là :min.',
            'original_price.min' => 'Vui lòng nhập số nhỏ nhất là :min.',
            'quantity.min' => 'Vui lòng nhập số nhỏ nhất là :min.'
        ]);

        if ($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $order = 0;
            if($request->input('order')){
                $order = $request->input('order');
            }
            $Product = Product::create([
                'name' => $request->input('name'),
                'slug' => str_slug($request->input('name')),
                'parent' => $request->input('parent'),
                'parent' => $order
            ]);
            return redirect()->route('admin.Product.index')->with('messager',"Thêm chuyên mục $Product->name thành công.");
        }

    }
    public function delete($id){
        $Product = Product::find($id);
        if ($Product!==null){
            $Product->delete();
            return redirect()->route('admin.Product.index')->with('messager',"Xóa chuyên mục $Product->name thành công.");
        }
        return redirect()->route('admin.Product.index');
    }
    public function show($id)
    {
        $data['Product'] = Product::find($id);
        $data['products'] = Product::where([
            ['parent' ,'=', 0],
            ['id' ,'<>', 1]
        ])->get();
        if ($data['Product']!==null){
            return view('admin.products.show',$data);
        }
        return redirect()->route('admin.Product.index')->with('error',"Không tìm thấy chuyên mục này.");

    }
    public function update(Request $request,$id){
        $valid = Validator::make($request->all(),[
            'name' => 'required|unique:products,name,'.$id,
            'parent' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên chuyên mục.',
            'name.unique' => 'Chuyên mục đã bị trùng.Vui lòng nhập nhập chuyên mục khác.',
            'parent.required' => 'Vui lòng chọn danh mục cha.',
            'parent.exists' => 'Danh mục cha không hợp lệ.'
        ]);

        if ($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $Product = Product::find($id);
            if ($Product!==null){
                $order = 0;
                if($request->input('order')){
                    $order = $request->input('order');
                }
                $Product->name = $request->input('name');
                $Product->email = $request->input('parent');
                $Product->order = $order;
                $Product->save();
                return redirect()->route('admin.Product.index')->with('messager',"Cập nhật chuyên mục $Product->name thành công.");

            }
            return redirect()->route('admin.Product.index')->with('error',"Không tìm thấy chuyên mục này.");

            }

    }
}
