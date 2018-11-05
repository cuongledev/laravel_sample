<?php

namespace App\Http\Controllers\Backend;

use App\Attachment;
use App\CUONGLELIB\Facades\Tool;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


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
        $data['products'] = Product::with('user', 'category')->orderBy('id', 'desc')->paginate(10);
        /*
         * $data['products'] = Product::where([
            ['name','like','%go%'],
            ['id',56]
        ])->get();
        */
        //dd($data);
        return view('admin.products.index', $data);
    }

    public function create()
    {
        $data['categories'] = Category::orderBy('name', 'asc')->get();
        return view('admin.products.create', $data);
    }

    public function store(Request $request)
    {

        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required|unique:products,code',
            'content' => 'required',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'original_price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|max:2048',
            'images.*' => 'image|max:2048'
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'code.required' => 'Vui lòng nhập mã sản phẩm.',
            'content.required' => 'Vui lòng nhập nội dung sản phẩm.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Không tồn tại danh mục.',
            'user_id.exists' => 'Không tồn tại danh mục.',
            'image.image' => 'Không đúng chuẩn định dạng image.',
            'image.size' => 'Dung lượng vượt quá giới hạn cho phép :max KB.',
            'images.*.image' => 'Không đúng chuẩn định dạng image.',
            'images.*.size' => 'Dung lượng vượt quá giới hạn cho phép :max KB.',
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

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = $this->saveImage($request->file('image'));

            }



            $attributes = null;
            if ($request->has('attributes') && is_array($request->input('attributes')) && count($request->input('attributes')) > 0) {
                $attributes = $request->input('attributes');
                foreach ($attributes as $key => $item) {
                    if (!isset($item['name'])) {
                        unset($attributes[$key]);
                        continue;
                    }
                    if (!isset($item['value'])) {
                        unset($attributes[$key]);
                        continue;
                    }
                }
                $attributes = json_encode($attributes);
            }

            $product = Product::create([
                'name' => $request->input('name'),
                'code' => mb_strtoupper($request->input('code'), 'UTF-8'),
                'content' => $request->input('content'),
                'regular_price' => $request->input('regular_price'),
                'sale_price' => $request->input('sale_price'),
                'original_price' => $request->input('original_price'),
                'quantity' => $request->input('quantity'),
                'image' => $imageName,
                'attributes' => $attributes,
                'category_id' => $request->input('category_id'),
                'user_id' => auth()->id()
            ]);

            // thêm vào thư viện hình ảnh
            if ($request->hasFile('images')) {

                foreach ($request->file('images') as $file) {
                    Attachment::create([
                        'type' => 'image',
                        'mime' => $file->getMimeType(),
                        'path' => $this->saveImage($file),
                        'product_id' => $product->id
                    ]);
                }

            }

            // them tags

            if ($request->has('tags') && is_array($request->input('tags')) && count($request->input('tags')) > 0) {
                $tags = $request->input('tags');
                $tagsId = [];
                foreach ($tags as $tag) {
                    $tag = Tag::firstOrCreate([
                        'name' => str_slug($tag)
                    ], [
                        'name' => str_slug($tag),
                        'slug' => str_slug($tag)
                    ]);

                    $tagsId[] = $tag->id;
                }

                $product->tags()->sync($tagsId);
            }


            return redirect()->route('admin.product.index')->with('messager', "Thêm sản phẩm $product->name thành công.");
        }

    }



    public function delete($id)
    {
        $product = Product::find($id);
        if ($product !== null) {
            $this->deleteImage($product->image);
            if(count($product->attachments)>0){
                foreach ($product->attachments as $file){
                    $this->deleteImage($file->path);
                    $file->delete();
                }
            }
            $product->delete();
            return redirect()->route('admin.product.index')->with('messager', "Xóa sản phẩm $product->name thành công.");
        }
        return redirect()->route('admin.product.index');
    }

    public function show($id)
    {
        $data['product'] = Product::find($id);
        $data['categories'] = Category::orderBy('name', 'asc')->get();
        if ($data['product'] !== null) {
            return view('admin.products.show', $data);
        }
        return redirect()->route('admin.product.index')->with('error', "Không tìm thấy sản phẩm này.");

    }

    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required|unique:products,code,' . $id,
            'content' => 'required',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'original_price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|max:2048',
            'images.*' => 'image|max:2048'
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'code.required' => 'Vui lòng nhập mã sản phẩm.',
            'content.required' => 'Vui lòng nhập nội dung sản phẩm.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Không tồn tại danh mục.',
            'user_id.exists' => 'Không tồn tại danh mục.',
            'image.image' => 'Không đúng chuẩn định dạng image.',
            'image.size' => 'Dung lượng vượt quá giới hạn cho phép :max KB.',
            'images.*.image' => 'Không đúng chuẩn định dạng image.',
            'images.*.size' => 'Dung lượng vượt quá giới hạn cho phép :max KB.',
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

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $product = Product::find($id);
            if ($product !== null) {
                $imageName = $product->image;
                if ($request->hasFile('image')) {

                    $this->deleteImage($product->image);
                    $imageName = $this->saveImage($request->file('image'));

                    /*$image = $request->file('image');
                    if (file_exists(public_path('uploads'))) {
                        $folderName = date('Y-m');
                        $fileNameWithTimestamp = md5($image->getClientOriginalName() . time());
                        $fileName = $fileNameWithTimestamp . "." . $image->getClientOriginalExtension();
                        $thumbnailFileName = $fileNameWithTimestamp . "_thumb." . $image->getClientOriginalExtension();
                        if (!file_exists(public_path('uploads/' . $folderName))) {
                            mkdir(public_path('uploads/' . $folderName), 0755);
                        }

                        // Di chuyen file vao uploads
                        $imageName = $folderName . "/" . $fileName;
                        $image->move(public_path('uploads/' . $folderName), $fileName);

                        Image::make(public_path('uploads/' . $folderName . "/" . $fileName))
                            ->resize(200, 150)
                            ->save(public_path('uploads/' . $folderName . "/" . $thumbnailFileName));


                        $this->deleteImage($product->image);



                    }*/

                }

                // cập nhập vào thư viện hình ảnh
                if ($request->hasFile('images')) {

                    foreach ($product->attachments as $file){
                        $this->deleteImage($file->path);
                        $file->delete();
                    }
                    foreach ($request->file('images') as $file) {
                        Attachment::create([
                            'type' => 'image',
                            'mime' => $file->getMimeType(),
                            'path' => $this->saveImage($file),
                            'product_id' => $product->id
                        ]);
                    }

                }


                // thêm attributes
                $attributes = '';
                if ($request->has('attributes') && is_array($request->input('attributes')) && count($request->input('attributes')) > 0) {
                    $attributes = $request->input('attributes');
                    foreach ($attributes as $key => $item) {
                        if (!isset($item['name'])) {
                            unset($attributes[$key]);
                            continue;
                        }
                        if (!isset($item['value'])) {
                            unset($attributes[$key]);
                            continue;
                        }
                    }
                    $attributes = json_encode($attributes);
                }


                $product->name = $request->input('name');
                $product->code = mb_strtoupper($request->input('code'), 'UTF-8');
                $product->content = $request->input('content');
                $product->regular_price = $request->input('regular_price');
                $product->sale_price = $request->input('sale_price');
                $product->original_price = $request->input('original_price');
                $product->quantity = $request->input('quantity');
                $product->image = $imageName;
                $product->attributes = $attributes;
                $product->category_id = $request->input('category_id');
                $product->user_id = auth()->id();

                $product->save();

                // them tags

                if ($request->has('tags') && is_array($request->input('tags')) && count($request->input('tags')) > 0) {
                    $tags = $request->input('tags');
                    $tagsId = [];
                    foreach ($tags as $tag) {
                        $tag = Tag::firstOrCreate([
                            'name' => str_slug($tag)
                        ], [
                            'name' => str_slug($tag),
                            'slug' => str_slug($tag)
                        ]);

                        $tagsId[] = $tag->id;
                    }

                    $product->tags()->sync($tagsId);
                }


                return redirect()->route('admin.product.index')->with('messager', "Cập nhật sản phẩm $product->name thành công.");

            }
            return redirect()->route('admin.product.index')->with('error', "Không tìm thấy sản phẩm này.");

        }

    }

    public function saveImage($image)
    {
        if (!empty($image) && file_exists(public_path('uploads'))) {
            $folderName = date('Y-m');
            $fileNameWithTimestamp = md5($image->getClientOriginalName() . time());
            $fileName = $fileNameWithTimestamp . "." . $image->getClientOriginalExtension();

            if (!file_exists(public_path('uploads/' . $folderName))) {
                mkdir(public_path('uploads/' . $folderName), 0755);
            }

// Di chuyen file vao uploads
            $imageName = $folderName . "/" . $fileName;
            $image->move(public_path('uploads/' . $folderName), $fileName);

            // tạo các hình ảnh theo tỉ lệ
            $createImage = function($suffix = '_thumb',$width = 250,$height = 170) use ($folderName,$fileName,$fileNameWithTimestamp,$image) {
                $thumbnailFileName = $fileNameWithTimestamp . $suffix . "." . $image->getClientOriginalExtension();
                Image::make(public_path('uploads/' . $folderName . "/" . $fileName))
                    ->resize($width, $height)
                    ->save(public_path('uploads/' . $folderName . "/" . $thumbnailFileName))
                    ->destroy();

            };
            $createImage();
            $createImage('_900x530',900,530);
            $createImage('_900x300',900,300);
            $createImage('_450x337',450,337);
            $createImage('_600x170',600,170);
            $createImage('_80x80',80,80);


            return $imageName;

        }
    }

    public function deleteImage($path){
        if (!is_dir(public_path('uploads/' . $path)) && file_exists(public_path('uploads/' . $path))) {
            unlink(public_path('uploads/' . $path));
            $deleteImageAll = function($sizeArr) use ($path){
                foreach ($sizeArr as $size) {
                    if(!is_dir(public_path('uploads/' . getThumbnail($path,$size))) && file_exists(public_path('uploads/' . getThumbnail($path,$size)))){
                        unlink(public_path('uploads/' . getThumbnail($path,$size)));
                    }
                }

            };
            $deleteImageAll(['_thumb','_900x530','_900x300','_600x170','_80x80','_450x337']);

        }
    }
}
