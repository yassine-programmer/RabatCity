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

        $posts = $crawler->filter('._1xnd > div')->each(function (Crawler $post, $i) {

            if($post->filter('.text_exposed_root > p')->count()> 0) {
                $post->filter('.text_exposed_root > p')->each(function (Crawler $text, $i) {

                    if ($text->count() > 0)
                        $Mytext = $text->text();
                    else
                        $Mytext = '';
                    $tab = array('text'=>$Mytext);
                    // print $tab;
                });
            }
            //filtre text end
            //filtre image begin
            if($post->filter('.mtm > div')->count()>0) {
                $post->filter('.mtm > div')->each(function (Crawler $test, $i) {
                    $test->filter('a')->each(function (Crawler $image, $i) {
                        if ($image->filter('img')->count() > 0)
                            $Myimage = $image->filter('img')->attr('src');
                        else
                            $Myimage = 0;
                        //print $Myimage;
                    });
                });
            }
            //filtre image end


        });






        return $crawler->filter('._1xnd > div')->count();
    }
}
