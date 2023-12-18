<?php

namespace App\Http\Controllers\artist;

use App\core\artist\ArtistInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $artistInterface;

    public function __construct(ArtistInterface $artistInterface)
    {
        $this->artistInterface = $artistInterface;
    }
   public function index() {
    return view('admin.dashboard.dashboard');
   }

   public function profile() {
    $data['artist'] = $this->artistInterface->getSingleArtist(auth()->guard('artists')->id());
    // dd($data);
    if ($data['artist'] == 'Not Found') {
        return back()->with('msg', 'No artist found!');
    }
    return view('admin.artist.edit', $data);
   }
}
