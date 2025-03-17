<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Comment::insert(
            [
                [
                    'user_id' => 1,
                    'post_id' => 1,
                    'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit harum doloremque nemo, hic odio labore ad! Nobis numquam, provident esse eos recusandae et veritatis impedit eius aspernatur vitae suscipit adipisci.',
                    'status' => 1
                ],
                [
                    'user_id' => 2,
                    'post_id' => 1,
                    'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi saepe quo officia? Deserunt, dignissimos voluptatum reprehenderit ea, nostrum tempore expedita pariatur delectus accusantium repudiandae eveniet fugiat et, blanditiis minus eaque.',
                    'status' => 1
                ]
            ]
        );
    }
}
