<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use App\Models\Article;
use App\Models\News;
use App\Models\Information;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private array $templates = [
        'default' => '<?xml version="1.0" encoding="UTF-8"?>
                            <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
                            </urlset>',
        'sitemap' => '<?xml version="1.0" encoding="UTF-8"?>
                        <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
                        </sitemapindex>',
    ];

    private string $path = 'sitemaps';
    private int $max_url = 25000;
    private string $site_url;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->site_url = env('APP_URL', 'http://new.million-otkrytok.ru');


        if (!file_exists(public_path($this->path))) {
            mkdir(public_path($this->path), 0777, true);
        }

        $sitemaps = array();

        foreach(get_class_methods($this) as $method) {
            if (Str::contains($method, 'sitemap')) {
                $sitemap = strtolower(str_replace('sitemap', '', $method));

                $generate = $this->{$method}($sitemap);
 
                if ($generate) {
                    $sitemaps[] = array(
                        'loc' => $this->site_url . '/' . $this->path . '/' . $sitemap . '.xml',
                        'lastmod' => Carbon::now(),
                    );
                    
                }
            }
        }

        // Sitemap generator
        $this->template(
            filename: 'sitemap', 
            path: '', 
            data: $sitemaps,
            template: 'sitemap'
        );
    }

    private function template(string $filename, string $path = '', array $data = array(), $template = 'default')
    {
        if (!file_exists(public_path($path))) {
            @mkdir(public_path($path), 0777, true);
        }

        $xmlbase = new \SimpleXMLElement(isset($this->templates[$template]) ? $this->templates[$template] : $this->templates['default']);

        foreach ($data as $item) {
            $row  = $xmlbase->addChild($template == 'sitemap' ? 'sitemap' : 'url');

            $row->addChild('loc', $item['loc']);

            $row->addChild('lastmod', $item['lastmod']);

            if ($template != 'sitemap') {
                $row->addChild('changefreq', $item['changefreq'] ?? 'monthly');
                $row->addChild('priority', $item['priority'] ?? 1);
            }
        }

        $xmlbase->saveXML(public_path($path) . '/' . $filename . '.xml');

        return $path . '/' . $filename . '.xml';
    }

    private function generate($sitemap, $data = array())
    {
        $path = $this->path;
        $template = 'default';

        if ($data) {
            // Разбиваем на подсайтмапы
            if (count($data) > $this->max_url) {
                $template = 'sitemap';
                
                $data_new = array_chunk($data, $this->max_url);

                // Sitemap generator
                $data = array();

                foreach ($data_new as $key => $sitemap_data) {
                    $url = $this->template(
                        filename: $key, 
                        path: $path . '/' . $sitemap, 
                        data: $sitemap_data,
                        template: 'default'
                    ); 

                    $data[] = array(
                        'loc' => $this->site_url . '/' . $url,
                        'lastmod' => Carbon::now(),
                    );
                }
            }

            $this->template(
                filename: $sitemap, 
                path: $path, 
                data: $data,
                template: $template
            );

            return true;
        }
    }

    public function sitemapCategories($sitemap, $data = array())
    {
        $results = Category::select('slug', 'updated_at')->get();

        foreach($results as $result) {
            if (!empty($result->slug)) {
                $data[] = array(
                    'loc' => route('category', $result->slug),
                    'lastmod' => $result->updated_at->toAtomString(),
                );
            }
        }

        return $this->generate($sitemap, $data);
    }

    public function sitemapProducts($sitemap, $data = array())
    {
        $results = Product::select('slug', 'updated_at')->where('status', true)->get();

        foreach($results as $result) {
            if (!empty($result->slug)) {
                $data[] = array(
                    'loc' => route('product', $result->slug),
                    'lastmod' => $result->updated_at->toAtomString(),
                );
            }
        }

        return $this->generate($sitemap, $data);
    }

    public function sitemapArticles($sitemap, $data = array())
    {
        $results = Article::select('slug', 'updated_at')->where('status', true)->get();

        foreach($results as $result) {
            if (!empty($result->slug)) {
                $data[] = array(
                    'loc' => route('article', $result->slug),
                    'lastmod' => $result->updated_at->toAtomString(),
                );
            }
        }

        return $this->generate($sitemap, $data);
    }

    public function sitemapNews($sitemap, $data = array())
    {
        $results = News::select('slug', 'updated_at')->where('status', true)->get();

        foreach($results as $result) {
            $data[] = array(
                'loc' => route('news', $result->slug),
                'lastmod' => $result->updated_at->toAtomString(),
            );
        }

        return $this->generate($sitemap, $data);
    }

    public function sitemapOther($sitemap, $data = array())
    {
        $data[] = array(
            'loc' => route('contact'),
            'lastmod' => Carbon::now(),
        );

        $results = Information::select('slug', 'updated_at')->where('status', 1)->get();

        foreach ($results as $result) {
            $data[] = array(
                'loc' => route('information', $result->slug),
                'lastmod' => $result->updated_at->toAtomString(),
            );
        }
      
        return $this->generate($sitemap, $data);
    }
}