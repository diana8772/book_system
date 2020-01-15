<?php

use Illuminate\Database\Seeder;

class bookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $book_id = $book->select('book_id');
        foreach (range(1,100) as $index) {
            DB::table("book1")
              ->insert([
                'book_id' => $book_id+1,
                'book_name' => $faker->paragraph(10),
                'book_publisher' => $faker->name(),
                'book_language' => $faker->dateTime(),
                'book_publish_time' => $faker->dateTime(),
                'book_summary' => $faker->dateTime(),
                'book_image' => $faker->dateTime(),
                'book_dynamic' => $faker->dateTime(),
            ]);
        }
    }
}
