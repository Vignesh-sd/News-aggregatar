<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http; 
use App\Models\Article;             
use Exception;               

class FetchNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch news articles from APIs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
           
            $url = "https://newsapi.org/v2/top-headlines?country=us&apiKey=3cd635f097094bac93ca2c36edc9c79c";

            $response = Http::get($url);

            if ($response->successful()) {
                $articles = $response->json()['articles'];

                foreach ($articles as $article) {
                    Article::updateOrCreate(
                        ['url' => $article['url']],
                        [
                            'title' => $article['title'] ?? '',
                            'description' => $article['description'] ?? '',
                            'source' => $article['source']['name'] ?? '',
                            'published_at' => $article['publishedAt'] ?? now(),
                        ]
                    );
                }

                $this->info('News articles fetched successfully.');
            } else {
                $this->error('API request failed: ' . $response->status());
            }
        } catch (Exception $e) {
            \Log::error('News Fetch Error: ' . $e->getMessage());
            $this->error('Failed to fetch news: ' . $e->getMessage());
        }
    }
}
