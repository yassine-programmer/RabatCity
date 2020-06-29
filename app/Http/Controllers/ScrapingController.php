<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use App\Facebook;

class ScrapingController extends Controller
{
    public function test(Client $client)
    {
        if (session()->get('role') == 'admin') {

            $client = new Client(HttpClient::create(['timeout' => 60]));
            $crawler = $client->request('GET', 'https://www.facebook.com/pg/Conseil.Arrondissement.Agdal.Ryad/posts/?ref=page_internal');

            if ($crawler->filter('._1xnd > div')->count() > 0) {

                $posts = $crawler->filter('._1xnd > div')->each(function (Crawler $post, $i) {

                    //filtre text start
                    if ($post->filter('.text_exposed_root')->count() > 0)
                        $text = $post->filter('.text_exposed_root')->text();

                    else
                        $text = 'Arrondissement Agdal Ryad - مجلس مقاطعة أكدال الرياض';
                    //filtre text endtimestampContent

                    //filtre image begin
                    if ($post->filter('.uiScaledImageContainer > img ')->count() > 0)
                        $image = $post->filter('.uiScaledImageContainer > img')->attr('src');
                    else
                        $image = 'https://pic.clubic.com/v1/images/1772114/raw?width=1200&fit=max&hash=61fb71ec095d0f49728f96275a11724e1ae3fd15';
                    //filtre image end

                    //filtre time start
                    if ($post->filter('.timestampContent')->count() > 0)
                        $time = $post->filter('.timestampContent')->text();

                    else
                        $time = '00.00';
                    //filtre time end

                    //filtre url start
                    if ($post->filter('._5pcq')->count() > 0)
                        $url = $post->filter('._5pcq')->attr('href');

                    else
                        $url = '#';
                    //filtre url end

                    $item[] = [
                        'image' => $image,
                        'text' => $text,
                        'time' => $time,
                        'url' => $url
                    ];

                    return $item;

                });
                Facebook::truncate();

                foreach ($posts as $post) {
                    $fb = new Facebook;
                    $fb->Facebook_text = $post[0]['text'];
                    $fb->Facebook_image = $post[0]['image'];
                    $fb->Facebook_time = $post[0]['time'];
                    $fb->Facebook_url = $post[0]['url'];
                    $fb->save();
                }
            }
        }

        return redirect('/');
    }
}
