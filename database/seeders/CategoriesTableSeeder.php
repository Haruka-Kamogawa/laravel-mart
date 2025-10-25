<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $major_category_names = [
            'Book', 'Electronic device', 'Display'
        ];

        $book_categories = [
            'Fiction', 'Non-fiction', 'Self-help', 'History', 'Science', 'Business', 'Mystery', 'Fantasy', 'Romance', 'Travel'
        ];

        $device_categories = [
            'Laptop', 'Desktop PC', 'Tablet'
        ];

        $display_categories = [
            '27-inch', 'Desktop PC', 'Tablet'
        ];

        foreach ($major_category_names as $major_category_name) {
            if ($major_category_name == 'Book') {
                foreach ($book_categories as $book_category) {
                    Category::create([
                        'name' => $book_category,
                        'description' => $book_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }

            if ($major_category_name == 'Electronic device') {
                foreach ($device_categories as $device_category) {
                    Category::create([
                        'name' => $device_category,
                        'description' => $device_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }

            if ($major_category_name == 'Display') {
                foreach ($display_categories as $display_category) {
                    Category::create([
                        'name' => $display_category,
                        'description' => $display_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }
        }
    }
}
