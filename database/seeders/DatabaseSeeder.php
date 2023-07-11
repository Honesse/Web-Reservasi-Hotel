<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Mod.els\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin Tamvan',
            'username' => 'admintamvan',
            'email' => 'admintamvan@ismail.com',
            'password' => bcrypt('admin')
        ]);

        // User::create([
        //     'name' => 'Adam Haikal',
        //     'email' => 'adamhaikalazami053@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        User::factory(10)->create();

        // Category::create([
        //     'name' =>  'Web Programming',
        //     'slug' => 'web-programming'
        // ]);

        // Category::create([
        //     'name' =>  'Web Design',
        //     'slug' => 'web-design'
        // ]);

        // Category::create([
        //     'name' =>  'Personal',
        //     'slug' => 'personal'
        // ]);

        // Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum non fuga repellat placeat ex quae a beatae consectetur velit facere eaque esse 
        //     provident odio eos, quisquam totam modi adipisci consequuntur?',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum non fuga repellat placeat ex quae a beatae consectetur velit facere eaque esse 
        //     provident odio eos, quisquam totam modi adipisci consequuntur? Dicta reprehenderit numquam amet, accusantium eos impedit totam tempore distinctio, 
        //     iusto soluta veniam sunt ipsum aperiam natus fugiat ipsa velit ullam magnam accusantium. Ad facere aliquid labore nulla harum, accusantium ex, eos 
        //     </p><p>odio aut consectetur, ex quis aperiam. Libero cupiditate delectus quas rerum perspiciatis expedita voluptates dolorum possimus iste minus, aliquam 
        //     sed alias aut iusto doloribus amet distinctio nihil corrupti assumenda dignissimos voluptas quaerat explicabo qui deserunt eveniet possimus. Tenetur 
        //     similique porro expedita itaque, adipisci molestias exercitationem autem neque. Sed aliquid consequuntur qui facilis corrupti illum. Pariatur 
        //     </p><p>at sint ipsa illo et. Accusamus beatae reiciendis dolores eius iste repudiandae quisquam, minus nihil numquam ratione quis quos facilis nostrum 
        //     repudiandae sed optio modi praesentium, rerum cumque, magni odio voluptas mollitia eaque.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum non fuga repellat placeat ex quae a beatae consectetur velit facere eaque esse 
        //     provident odio eos, quisquam totam modi adipisci consequuntur?',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum non fuga repellat placeat ex quae a beatae consectetur velit facere eaque esse 
        //     provident odio eos, quisquam totam modi adipisci consequuntur? Dicta reprehenderit numquam amet, accusantium eos impedit totam tempore distinctio, 
        //     iusto soluta veniam sunt ipsum aperiam natus fugiat ipsa velit ullam magnam accusantium. Ad facere aliquid labore nulla harum, accusantium ex, eos 
        //     </p><p>odio aut consectetur, ex quis aperiam. Libero cupiditate delectus quas rerum perspiciatis expedita voluptates dolorum possimus iste minus, aliquam 
        //     sed alias aut iusto doloribus amet distinctio nihil corrupti assumenda dignissimos voluptas quaerat explicabo qui deserunt eveniet possimus. Tenetur 
        //     similique porro expedita itaque, adipisci molestias exercitationem autem neque. Sed aliquid consequuntur qui facilis corrupti illum. Pariatur 
        //     </p><p>at sint ipsa illo et. Accusamus beatae reiciendis dolores eius iste repudiandae quisquam, minus nihil numquam ratione quis quos facilis nostrum 
        //     repudiandae sed optio modi praesentium, rerum cumque, magni odio voluptas mollitia eaque.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum non fuga repellat placeat ex quae a beatae consectetur velit facere eaque esse 
        //     provident odio eos, quisquam totam modi adipisci consequuntur?',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum non fuga repellat placeat ex quae a beatae consectetur velit facere eaque esse 
        //     provident odio eos, quisquam totam modi adipisci consequuntur? Dicta reprehenderit numquam amet, accusantium eos impedit totam tempore distinctio, 
        //     iusto soluta veniam sunt ipsum aperiam natus fugiat ipsa velit ullam magnam accusantium. Ad facere aliquid labore nulla harum, accusantium ex, eos 
        //     </p><p>odio aut consectetur, ex quis aperiam. Libero cupiditate delectus quas rerum perspiciatis expedita voluptates dolorum possimus iste minus, aliquam 
        //     sed alias aut iusto doloribus amet distinctio nihil corrupti assumenda dignissimos voluptas quaerat explicabo qui deserunt eveniet possimus. Tenetur 
        //     similique porro expedita itaque, adipisci molestias exercitationem autem neque. Sed aliquid consequuntur qui facilis corrupti illum. Pariatur 
        //     </p><p>at sint ipsa illo et. Accusamus beatae reiciendis dolores eius iste repudiandae quisquam, minus nihil numquam ratione quis quos facilis nostrum 
        //     repudiandae sed optio modi praesentium, rerum cumque, magni odio voluptas mollitia eaque.</p>',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum non fuga repellat placeat ex quae a beatae consectetur velit facere eaque esse 
        //     provident odio eos, quisquam totam modi adipisci consequuntur?',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum non fuga repellat placeat ex quae a beatae consectetur velit facere eaque esse 
        //     provident odio eos, quisquam totam modi adipisci consequuntur? Dicta reprehenderit numquam amet, accusantium eos impedit totam tempore distinctio, 
        //     iusto soluta veniam sunt ipsum aperiam natus fugiat ipsa velit ullam magnam accusantium. Ad facere aliquid labore nulla harum, accusantium ex, eos 
        //     </p><p>odio aut consectetur, ex quis aperiam. Libero cupiditate delectus quas rerum perspiciatis expedita voluptates dolorum possimus iste minus, aliquam 
        //     sed alias aut iusto doloribus amet distinctio nihil corrupti assumenda dignissimos voluptas quaerat explicabo qui deserunt eveniet possimus. Tenetur 
        //     similique porro expedita itaque, adipisci molestias exercitationem autem neque. Sed aliquid consequuntur qui facilis corrupti illum. Pariatur 
        //     </p><p>at sint ipsa illo et. Accusamus beatae reiciendis dolores eius iste repudiandae quisquam, minus nihil numquam ratione quis quos facilis nostrum 
        //     repudiandae sed optio modi praesentium, rerum cumque, magni odio voluptas mollitia eaque.</p>',
        //     'category_id' => 3,
        //     'user_id' => 2
        // ]);
    }
}
