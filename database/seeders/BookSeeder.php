<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $endpoint = "https://fakerapi.it/api/v1/books";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $endpoint, ['query' => [
            '_quantity' => 100,
        ]]);
        $statusCode = $response->getStatusCode();
        if ($statusCode == 200) {
            $books = json_decode($response->getBody(), true);
            foreach ($books['data'] as $blog) {
                \DB::table('books')->insert([
                    'title' => $blog['title'],
                    'author' => $blog['author'],
                    'genre' => $blog['genre'],
                    'description' => $blog['description'],
                    'isbn' => $blog['isbn'],
                    'image' => $blog['image'],
                    'published' => $blog['published'],
                    'publisher' => $blog['publisher']
                ]);
            }
        }
    }
}