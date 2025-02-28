<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Post;
use Carbon\Carbon; 
class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Post::insert([
            [
                'user_id' => 2,
                'title' => 'Trend Dạo Này Em Thế Nào',
                'slug' => Str::slug('Trend Dạo Này Em Thế Nào'),
                'description' => 'Trend "Dạo Này Em Thế Nào" đang làm mưa làm gió trên TikTok với hàng triệu video tham gia.',
                'content' => 'Bài hát "Dạo Này Em Thế Nào" của Ngơ được sử dụng trong trend này...',
                'publish_date' => Carbon::now(),
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'title' => 'Trend Biến Hình Glow Up',
                'slug' => Str::slug('Trend Biến Hình Glow Up'),
                'description' => 'Xu hướng biến hình "Glow Up" giúp người tham gia khoe sự thay đổi ngoạn mục.',
                'content' => 'Trend này thường đi kèm nhạc EDM sôi động và hiệu ứng biến hình đẹp mắt...',
                'publish_date' => Carbon::now(),
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'title' => 'Trend Anh Không Thể ',
                'slug' => Str::slug('Trend Anh Không Thể'),
                'description' => 'Trend "Anh Không Thể" nổi lên với đoạn nhạc cắt ghép từ bài hát cùng tên.',
                'content' => 'Nhiều người dùng TikTok sáng tạo nội dung hài hước hoặc tâm trạng với trend này...',
                'publish_date' => Carbon::now(),
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

    }
}
