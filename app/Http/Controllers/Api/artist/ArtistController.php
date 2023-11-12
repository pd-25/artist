<?php

namespace App\Http\Controllers\Api\artist;

use App\core\artist\ArtistInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    private $artist;
    public function __construct(ArtistInterface $artistInterface)
    {
        $this->artist = $artistInterface;
    }
    public function artistInfo()
    {
        $data = $this->artist->getSingleArtist(auth()->id());

        if ($data == 'Not Found') {
            return response()->json([
                'status' => false,
                'msg' => 'No user found'
            ]);
        }
        return response()->json([
            'status' => true,
            'msg' => 'Artist data fetched successfully',
            'data' => $data
        ]);
    }
}
