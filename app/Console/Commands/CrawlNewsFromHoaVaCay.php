<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Article\ArticleRepositoryInterface;
use Goutte;

class CrawlNewsFromHoaVaCay extends Command
{
    protected $articleRepo;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:crawlHoaVaCay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hoa và cây https://cayvahoa.net/';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        ArticleRepositoryInterface $articleRepo
    )
    {
        parent::__construct();
        $this->articleRepo = $articleRepo;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('max_execution_time', 360);
        $crawler = \Goutte::request('GET', 'https://cafef.vn/bat-dong-san.chn');
        $crawler->filter('#LoadListNewsCat .tlitem')->each(function ($node) {
            $title = $node->filter('h3')->text();
            $url = 'https://cafef.vn'.$node->filter('h3 > a', 0)->attr('href');
            $img = $node->filter('img')->attr('src');

            $content1 = \Goutte::request('GET', $url);
            $content = '';

            $contents = $content1->filter('#form1 #mainContent')->each(function ($n1) {

                $str = '';
                try {
                    $str = $n1->filter('.link-content-footer')->html();
                } catch (\Exception $e){

                }

                return [$str, $n1->html()];
            });


            if(isset($contents)){
                if($contents[0][0] != ''){
                    $content = str_replace($contents[0][0], '', $contents[0][1]);
                }
                else{
                    $content = $contents[0][1];
                }

                $code = substr(md5(microtime()),rand(0,5), 7);
                $slug = slug($title).'-'.$code;

                $data = [
                    'name' => $title,
                    'slug' => $slug,
                    'code' => $code,
                    'photo' => $img,
                    'author' => $url,
                    'content' => $content,
                    'type' => 'chia-se',
                    'status' => 1,
                ];

                $check = $this->articleRepo->findByAttributes(['name' => $title]);
                if(!$check){
                    if(!$this->articleRepo->create($data)){

                    }
                }
            }
        });

//        $page = 1;
//        for ($page; $page < 11; $page++){
//            $crawler = Goutte::request('GET', 'https://cayvahoa.net/tin-tuc/page/'.$page.'/');
//            $crawler->filter('.content .list-post-cat .col-md-4')->each(function ($node) {
//                $photo = '';
//                if ($node->filter('img')->count() > 0 ) {
//                    $photo = $node->filter('img')->attr('data-lazy-src');
//                }
//                if($photo != ''){
//                    $title = $node->filter('.title > a', 0)->text();
//                    $url = $node->filter('.title > a', 0)->attr('href');
//
//                    $crawlContent = Goutte::request('GET', $url);
//                    $content = '';
//                    $output = $crawlContent->filter('.entry-content')->each(function ($nodeContent) {
//                        return $nodeContent->html();
//                    });
//                    $attributes = [
//                        'type' => 'chia-se'
//                    ];
//                    $articles = $this->articleRepo->getByAttributesAll($attributes)->pluck('name')->toArray();
//                    if(!in_array($title, $articles)){
//                        if(isset($output[0])){
//                            $content = $output[0];
//                        }
//                        $code = randomCode();
//                        $data = [
//                            'code' => $code,
//                            'name' => $title,
//                            'author' => $url,
//                            'slug' => slug($title).'-'.$code,
//                            'content' => $content,
//                            'photo' => $photo,
//                            'type' => 'chia-se'
//                        ];
//                        $query = $this->articleRepo->create($data);
//                    }
//                }
//            });
//        }
        $this->info('Crawl news successfully');
    }
}
