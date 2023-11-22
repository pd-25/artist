<?php

namespace App\Http\Controllers\Api\artwork;

use App\core\artwork\ArtworkInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    private $artworkInterface;

    public function __construct(ArtworkInterface $artworkInterface)
    {
        $this->artworkInterface = $artworkInterface;
    }


    public function allArtwork()
    {
        try {
            $data = $this->artworkInterface->getAllArtwork();
            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'data' => $th->getMessage()
            ]);
        }
    }


    public function artworkUpload(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric|exists:users,id',
            'style_id' => 'required|numeric|exists:styles,id',
            'placement_id' => 'required|numeric|exists:placements,id',
            'subject_id' => 'required|numeric|exists:subjects,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $data = $request->only('user_id', 'style_id', 'placement_id', 'subject_id', 'image');
        $store = $this->artworkInterface->storeArtworkData($data);
        if ($store) {
            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Some error occur'
            ]);
        }
    }
}
