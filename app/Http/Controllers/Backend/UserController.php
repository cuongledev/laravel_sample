<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
        $data['users'] = User::paginate(10);
        /*
         * $data['users'] = User::where([
            ['name','like','%go%'],
            ['id',56]
        ])->get();
        */
        //dd($data);
        return view('admin.users.index',$data);
    }
    public function create(){
        return view('admin.users.create');
    }
    public function store(Request $request){
        $valid = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed '
        ],[
            'name.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập chuẩn định dạng email',
            'email.unique' => 'Email đã bị trùng.Vui lòng nhập chọn email khác.',
            'password.required' => 'Vui lòng nhập chuẩn password',
        ]);

        if ($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))
            ]);
            return redirect()->route('admin.user.index')->with('messager',"Thêm người dùng $user->name thành công.");
        }

    }
    public function delete($id){
        $user = User::find($id);
        if ($user!==null){
            $user->delete();
            return redirect()->route('admin.user.index')->with('messager',"Xóa người dùng $user->name thành công.");
        }
        return redirect()->route('admin.user.index');
    }
    public function show($id)
    {
        $data['user'] = User::find($id);
        if ($data['user']!==null){
            return view('admin.users.show',$data);
        }
        return redirect()->route('admin.user.index')->with('error',"Không tìm thấy người dùng này.");

    }
    public function update(Request $request,$id){
        $valid = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'confirmed '
        ],[
            'name.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập chuẩn định dạng email',
            'email.unique' => 'Email đã bị trùng.Vui lòng nhập chọn email khác.',
            'password.required' => 'Vui lòng nhập chuẩn password',
        ]);

        if ($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $user = User::find($id);
            if ($user!==null){
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                if ($request->input('password')){
                    $user->password = bcrypt($request->input('password'));
                }
                $user->save();
                return redirect()->route('admin.user.index')->with('messager',"Cập nhật người dùng $user->name thành công.");

            }
            return redirect()->route('admin.user.index')->with('error',"Không tìm thấy người dùng này.");

            }

    }
}
