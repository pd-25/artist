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

    public function artistUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'zipcode' => 'required|numeric|min:6',
            'phone' => 'numeric',
            'address' => 'nullable|string|max:500',
        ]);

        $data = $request->only('name', 'username', 'email', 'phone', 'address', 'password', 'zipcode', 'profile_image', 'banner_image');
        $timeData = $request->only('sunday_from', 'sunday_to', 'monday_from', 'monday_to', 'tuesday_from', 'tuesday_to', 'wednesday_from', 'wednesday_to', 'thrusday_from', 'thrusday_to', 'friday_from', 'friday_to', 'saterday_from', 'saterday_to');

        $update = $this->artist->updateArtist($data, decrypt($id), $timeData);
        if ($update) {
            return response()->json([
                'status' => true,
            ]);
        } elseif ($update == 'No data') {
            return response()->json([
                'status' => false,
            ]);
        }
    }
}
