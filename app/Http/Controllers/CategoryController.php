<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
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
        $data['categories'] = Category::orderBy('order','asc')->paginate(10);
        /*
         * $data['categories'] = Category::where([
            ['name','like','%go%'],
            ['id',56]
        ])->get();
        */
        //dd($data);
        return view('admin.categories.index',$data);
    }
    public function create(){
        $data['categories'] = Category::where([
            ['parent' ,'=', 0],
            ['id' ,'<>', 1]
        ])->get();
        return view('admin.categories.create',$data);
    }
    public function store(Request $request){
        $valid = Validator::make($request->all(),[
            'name' => 'required|unique:categories,name',
            'parent' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên chuyên mục.',
            'name.unique' => 'Chuyên mục đã bị trùng.Vui lòng nhập nhập chuyên mục khác.',
            'parent.required' => 'Vui lòng chọn danh mục cha.',
            'parent.exists' => 'Danh mục cha không hợp lệ.'
        ]);

        $valid->sometimes('parent','exists:categories,id',function($input){
            return $input->parent !== "0";
        });
        if ($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $order = 0;
            if($request->input('order')){
                $order = $request->input('order');
            }
            $Category = Category::create([
                'name' => $request->input('name'),
                'slug' => str_slug($request->input('name')),
                'parent' => $request->input('parent'),
                'parent' => $order
            ]);
            return redirect()->route('admin.category.index')->with('messager',"Thêm chuyên mục $Category->name thành công.");
        }

    }
    public function delete($id){
        $category = Category::find($id);
        if ($category!==null){
            $category->delete();
            return redirect()->route('admin.category.index')->with('messager',"Xóa chuyên mục $category->name thành công.");
        }
        return redirect()->route('admin.category.index');
    }
    public function show($id)
    {
        $data['category'] = Category::find($id);
        $data['categories'] = Category::where([
            ['parent' ,'=', 0],
            ['id' ,'<>', 1]
        ])->get();
        if ($data['category']!==null){
            return view('admin.categories.show',$data);
        }
        return redirect()->route('admin.category.index')->with('error',"Không tìm thấy chuyên mục này.");

    }
    public function update(Request $request,$id){
        $valid = Validator::make($request->all(),[
            'name' => 'required|unique:categories,name,'.$id,
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
            $category = Category::find($id);
            if ($category!==null){
                $order = 0;
                if($request->input('order')){
                    $order = $request->input('order');
                }
                $category->name = $request->input('name');
                $category->email = $request->input('parent');
                $category->order = $order;
                $category->save();
                return redirect()->route('admin.category.index')->with('messager',"Cập nhật chuyên mục $category->name thành công.");

            }
            return redirect()->route('admin.category.index')->with('error',"Không tìm thấy chuyên mục này.");

            }

    }
}
