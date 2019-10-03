<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use PHPHtmlParser\Dom;

class Room extends Model
{
    public function getPage($url)
    {
        $dom = new Dom;
        $dom->load($url);
        $object = $dom->find('.bd-item');

        foreach ($object as $n){
            //получаем название
            $title = $n->find('.title a')->text;
            //получаем ссылку на объявление
            $src = $n->find('.title a')->getAttribute('href');
            //получаем описание объявления
            $text = $n->find('.bd-item-right .bd-item-right-center p')->nextSibling()->text;
            //получаем картинку объявления
            $img = $n->find('.bd-item-left .bd-item-left-top a img')->getAttribute('data-original');

            //сохраняем
            $url = Room::where('url', '=', $src)->first();
            if(!$url){
                $room = new Room();
                $room->name = $title;
                $room->text = $text;
                $room->url = $src;

                //задаём новое имя картинке
                $new_img_name = Str::random(10) . '.jpg';
                $room->img = $new_img_name;
                //сохраняем картинку себе
                $output = $_SERVER['DOCUMENT_ROOT'] . '/public/img/' . $new_img_name;
                file_put_contents($output, file_get_contents($img));
                $room->save();
            }

        }
    }

    public function getPages($url){
        $dom = new Dom;
        $dom->load($url);
        $pages_count = $dom->find('.uni-paging span span a')->text;

        for ($i = 1; $i != $pages_count; $i++){
            $url = 'https://realt.by/sale/flats/rooms/?page='.$i;
            $this->getPage($url);
        }
    }

    public function scopeSearch($query, $s)
    {
        return $query->where('name', 'like', '%' . $s . '%')->orWhere('text', 'like', '%' . $s . '%');
    }
}