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
        $Tab = array();
            $client = new Client(HttpClient::create(['timeout' => 60]));
            $crawler = $client->request('GET', 'https://www.facebook.com/pg/Conseil.Arrondissement.Agdal.Ryad/posts/?ref=page_internal');
            if($crawler->filter('._1xnd > div')->count()>0){
                $posts = $crawler->filter('._1xnd > div')->each(function (Crawler $post, $i) {
                    print 'Post : ' . $i . ' <br>';
                    //filtre text start
                    print 'Text : ' . $i . '<br>';

                    if($post->filter('.text_exposed_root')->count()>0){
                        print  $post->filter('.text_exposed_root')->text() ;
                        print '<br>';
                    }
                    else
                        print 'text null';
                    //filtre text end
                    //filtre image begin
                    if($post->filter('.uiScaledImageContainer > img ')->count()>0){
                        print 'Image : ' . $i . '<br>';
                        $r = $post->filter('.uiScaledImageContainer > img')->attr('src');
                        print $r;
                        print '<br>';
                    }
                    else
                        print 'image null';
                    //filtre image end
                    $MyPost = [];

                });
            }






        return 1;
    }
}
