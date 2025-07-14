<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        // branch
        DB::table('branch')->insert([
            [
                'name' => 'K2 Computer',
                'phone' => '099 645 836',
                'logo' => 'https://img.freepik.com/free-vector/creative-computer-logo-template_23-2149201860.jpg?semt=ais_hybrid&w=740',
                'remark' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        //users
        $faker = \Faker\Factory::create();
        $data = [];
        for ($i = 1; $i <= 3; $i++) {
            $data[] = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->optional()->phoneNumber,
                'password' => Hash::make('password123'),
                'type' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('users')->insert($data);

        //customer
        $faker = \Faker\Factory::create();
        $data = [];
        for ($i = 1; $i <= 3; $i++) {
            $data[] = [
                'name' => $faker->word,
                'order' => $faker->numberBetween(0, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('category')->insert($data);

        //tag
        $faker = \Faker\Factory::create();
        $data = [];
        for ($i = 1; $i <= 3; $i++) {
            $data[] = [
                'name' => $faker->word,
                'order' => $faker->numberBetween(0, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('tag')->insert($data);

        //brand
        $faker = \Faker\Factory::create();
        $data = [];
        for ($i = 1; $i <= 3; $i++) {
            $data[] = [
                'name' => $faker->company,
                'order' => $faker->numberBetween(0, 10),
                'logo' => $faker->imageUrl(200, 200, 'business'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('brand')->insert($data);

        //product
        $faker = \Faker\Factory::create();
        $categoryIds = DB::table('category')->pluck('id')->toArray();
        $tagIds = DB::table('tag')->pluck('id')->toArray();
        $branchIds = DB::table('branch')->pluck('id')->toArray();

        $data = [];
        for ($i = 1; $i <= 30; $i++) {
            $data[] = [
                'name' => $faker->word,
                'old_price' => $faker->randomFloat(2, 5, 100),
                'new_price' => $faker->randomFloat(2, 5, 100),
                'category_id' => $faker->randomElement($categoryIds),
                'tag_id' => $faker->randomElement($tagIds),
                'branch_id' => $faker->randomElement($branchIds),
                'image' => $faker->imageUrl(400, 400, 'product'),
                'remark' => $faker->optional()->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('product')->insert($data);


        $faker = \Faker\Factory::create();
        $productIds = DB::table('product')->pluck('id')->toArray();

        $data = [];
        for ($i = 1; $i <= 30; $i++) {
            $data[] = [
                'product_id' => $faker->randomElement($productIds),
                'key' => $faker->word,
                'value' => $faker->word,
                'color' => $faker->safeColorName,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('product_spec')->insert($data);
    }
}
