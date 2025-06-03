<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use EsperoSoft\Faker\Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        $title = "Welcome to Blog";
        $description = "<h3>Bienvenue, sur la description du blog Dawan</h3>";
        
        $faker = new Faker();

        if(Category::count() === 0) {
            for($i = 0; $i < 10; $i++) {
            Category::create([
                "name" => $faker->title(25),
                "description" => $faker->title(60),
                "imageUrl" => $faker->image()
            ]);
        }
            
        }

       if(Post::count() === 0) {
         for ($i = 0; $i < 200; $i++) {
            $title = $faker->title(30);
            Post::create([
                "title" => $title,
                "slug" => Str::slug($title),
                "description" => $faker->title(60),
                "content" => $faker->text(),
                "imageUrl" => $faker->image(),
                "category_id" => rand(1,10)
            ]);
        }
       }
       
        $posts = Post::paginate(50);
       return view('blog.home', ['title' => $title, 'description' => $description, 'posts' => $posts]);

    }

     public function show(string $slug, int $id)
    {
        $post = Post::find($id);

        if($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }

        return view('blog.show', ['post' => $post]);
    }

   public function categories()
   {
    $categories = Category::paginate(4);

    return view('blog.categories', ["categories" => $categories]);

   }

   public function showCategory($id)
   {
    $category = Category::findOrFail($id);
    return view('blog.showCategory', ["category" => $category]);
   }

    
}
