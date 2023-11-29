<?php

namespace App\Http\Controllers\Api\artwork;

use App\core\artwork\ArtworkInterface;
use App\core\banner\BannerInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    public $artworkInterface, $bannerInterface;

    public function __construct(ArtworkInterface $artworkInterface, BannerInterface $bannerInterface)
    {
        $this->artworkInterface = $artworkInterface;
        $this->bannerInterface = $bannerInterface;
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);
        $data = $request->only('user_id', 'style_id', 'placement_id', 'subject_id', 'image','zipcode', 'country');
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

    public function artworkBanner(Request $request) {
        $request->validate([
            'user_id' => 'required|numeric|exists:users,id',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);
        $data = $request->only('user_id', 'banner_image');
        $store = $this->bannerInterface->storeBannerImage($data);
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

    public function artworkdelete($id){
        if($this->artworkInterface->deleteArtwork($id)){
            return response()->json([
                'status' => true,
                'data' => 'Artwork deleted successfully'
            ], 200);
        }else {
            return response()->json([
                'status' => false,
                'data' => 'Some error occur'
            ]);
        }
    }

    public function bannerdelete($id){
        if($this->bannerInterface->deleteBannerImage($id)){
            return response()->json([
                'status' => true,
                'data' => 'Banner image deleted successfully'
            ], 200);
        }else {
            return response()->json([
                'status' => false,
                'data' => 'Some error occur'
            ]);
        }
    }
    
}
