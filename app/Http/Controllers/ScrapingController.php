<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

class ScrapingController extends Controller
{
    public function test(Client $client)
    {
            $client = new Client(HttpClient::create(['timeout' => 60]));
            $crawler = $client->request('GET', 'https://www.facebook.com/pg/Conseil.Arrondissement.Agdal.Ryad/posts/?ref=page_internal');
            if($crawler->filter('._1xnd > div')->count()>0){
                $posts = $crawler->filter('._1xnd > div')->each(function (Crawler $post, $i) {
                    print 'Post : ' . $i . ' <br>';
                    //filtre text start
                    print 'Text : ' . $i . '<br>';

                    if($post->filter('.text_exposed_root > p')->count()>0){
                        $post->filter('.text_exposed_root > p')->each(function (Crawler $text, $i) {
                            print $text->text();
                            print '<br>';

                        });
                    }
                    //filtre text end
                    //filtre image begin
                    if($post->filter('.mtm > div')->count()>0){
                        $post->filter('.mtm > div')->each(function (Crawler $test, $i) {
                            if($test->filter('a')->count()>0){
                                $test->filter('a')->each(function (Crawler $image, $i) {
                                    print 'Image : ' . $i . '<br>';
                                    if($image->filter('img')->count()>0)
                                    print $image->filter('img')->attr('src');
                                    print '<br>';
                                });
                            }
                        });
                    }
                    //filtre image end
                    $MyPost = [];

                });
            }






        return 1;
    }
}
