<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $s = $request->input('s');

        $rooms = Room::search($s)->paginate(10);
        return view('pages.index', compact('rooms', 's'));
    }

    public function parsing()
    {
        $url = 'https://realt.by/sale/flats/rooms/';
        $get_list = new Room();
        $get_list->getPages($url);
        return view('pages.parsing');
    }
}