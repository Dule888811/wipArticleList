<?php
namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Article;
use \Validator;
use Intervention\Image\ImageServiceProvider;
use Illuminate\Support\Facades\Input;
use Image;
use Illuminate\Support\Facades\Auth;



class ArticleController extends BaseController
{
    public function index()
    {
        $artices = Article::all();
        $data = $artices->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Articles retrieved successfully.'
        ];

        return response()->json($response, 200);
    }
  
    
    public function store(Request $request)
    {
        $input = $request->all();
        


        $validator = Validator::make($input, [
            'main_picture' => 'required|image',
            'text' => 'required',
            'item_image[]' =>'nullable'
        ]);


        if($validator->fails()){
            return response()->json([
                'massage' => $validator->errors()->all(),
                'class_name' => "aler-danger"
            ]);
        }
        $data[] = '';
      
        if($request->hasFile('item_image'))
        {
            foreach($request->file('item_image') as $image)
            {
               
                $name =  time() . $image->getClientOriginalName();
                $path = 'public/images';
                $image->move($path,$name);
                $data[] = $name;      
                
            }
        } 

        $main_picture = $request->file('main_picture');
        $mainPictureName = time() .  $main_picture->getClientOriginalName();
        $path =  'public/image';
        $main_picture->move( $path, $mainPictureName);
        $article = new Article([
            'text' => $request->post('text'),
            'main_picture' => $path . '/' . $main_picture->getClientOriginalName(),
            'item_image' => json_encode(implode(',' ,$data)),
            'user_id' =>  $request->post('user_id'),
        ]);
        $article->save();
               

        return $this->sendResponse($article->toArray(), 'Article created successfully.');
    }
}    