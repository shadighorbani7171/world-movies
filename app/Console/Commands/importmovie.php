<?php

namespace App\Console\Commands;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieGenre;
use App\Models\MovieImage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class importmovie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:importmovie';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentpage = 1;
        $totalpages = 255;

        for ($i = $currentpage; $i <= $totalpages; $i++) {
            $this->warn('current page:' . $i);
            $response = Http::get('https://mocki.io/v1/d5da28bc-3949-4045-83e0-cb08a767744a?page=' . $i);

           
            $data = $response->json();

            $movies = $data['data'];

            foreach ($movies as $movie) {
                $poster =  $this->saveImage($movie['poster'], $movie['title'], 'poster' );

                $create = Movie::create([
                    'title' => $movie['title'],
                    'poster' => $poster,
                    'year' => $movie['year'],
                    'country' => $movie['country'],
                    'imdb_rating' => $movie['imdb_rating'],
                ]);
                 if(isset($movie['genres'])){
                foreach ($movie['genres'] as $genre) {
                    $genreModel = Genre::firstOrCreate([
                        'name' => $genre,
                        'slug' => Str::slug($genre)
                    ]);

                    MovieGenre::create([
                        'movie_id' => $create->id,
                        'genre_id' => $genreModel->id,
                    ]);
                }
                }
                    if(isset($movie['images'])){
                foreach ($movie['images'] as $image) {
                    $imagePath = $this->saveImage($image, $movie['title'], Uuid::uuid4()->toString());
                    MovieImage::create([
                        'image' => $imagePath,
                        'movie_id' => $create->id,
                    ]);
                }
                }

                $this->info('Movie: ' . $movie['title'] . ' saved');
            }
        }

        $this->info('Import process completed successfully.');

    

    }

    public function saveImage($image, $title, $name)
    {
        $image = file_get_contents($image);
    
        $path = Str::slug($title) . '/' . $name . '.jpg';
    
        
    
        Storage::put( $path , $image);
    
        return $path;
    }
}
