<?php

namespace App\Http\Controllers;

use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Notify;

class FrontendController extends Controller
{
  public function index(Request $request)
  {
    $postscalendar = Post::with('category')->Datelimit()->Popular()->orderBy('date_init', 'asc')->get();
    $posts = Post::with('category')->Datelimit()->Popular()->where('date_init', 'like', '%'.$request->search.'%')->orderBy('date_init', 'asc')->get();
    $notes = Post::with('category')->where('note', '=', 1)->orderBy('date_init', 'asc')->paginate(10);
    $categories = Category::all();
    if ($request->search) {
      $search = TRUE;
    }

      else {
        $search = FALSE;
      }
    return view('Frontend.posts', compact('posts', 'categories', 'notes', 'search', 'postscalendar'));
  }

  public function show(Post $post)
  {
    $posts = Post::where('id', '!=', $post->id)->Note()->get();

    return view('Frontend.post', compact('post', 'posts'));
  }

  public function store(Request $request)
  {
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST', 'https://api.imgur.com/3/image', [
              'headers' => [
                  'authorization' => 'Client-ID ' . '0f1eb0c5a21b47e',
                  'content-type' => 'application/x-www-form-urlencoded',
              ],
      'form_params' => [
                  'image' => base64_encode(file_get_contents($request->file('image')->getRealPath()))
              ],
          ]);
          $link = json_decode($response->getBody()->getContents(), true);

        $post = new Post;
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->date_init = date('Y-m-d', strtotime($request->date_init));
        $post->date_end = date('Y-m-d', strtotime($request->date_end));
        $post->hour = $request->hour;
        $post->hour_end = $request->hour_end;
        $post->place = $request->place;
        $post->price = $request->price;
        $post->entrytype = $request->entrytype;
        $post->webfacebook = $request->webfacebook;
        $post->email = $request->email;
        $post->image = $link['data']['link'];
        $post->save();

        Notify::success('', $title = 'Se ha cargado tu evento correctamente, una vez aprobado se cargara en el listado de la web.', $options = []);

        $objDemo = new \stdClass();
        $objDemo->demo_one = $post->title;
        $objDemo->demo_two = $post->email;
        $objDemo->sender = 'el ward oficial';
        $objDemo->receiver = 'alberto';

        Mail::to("cuenta.elwardoficial@gmail.com")->send(new DemoEmail($objDemo));

        return redirect('/');
  }

  public function shareEvent(Post $post)
  {
    return view('Frontend.shareevent', compact('post', 'posts'));
  }

  public function shareEvents(Post $post)
  {
    return view('Frontend.shareevents', compact('post', 'posts'));
  }

}
