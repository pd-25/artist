<?php

namespace App\Http\Controllers\Api\artist;

use App\core\artist\ArtistInterface;
use App\core\placement\PlacementInterface;
use App\core\style\StyleInterface;
use App\core\subject\SubjectInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    private $artist, $styleInterface, $subjectInterface, $placementInterface;
    public function __construct(ArtistInterface $artistInterface, StyleInterface $styleInterface, SubjectInterface $subjectInterface, PlacementInterface $placementInterface)
    {
        $this->artist = $artistInterface;
        $this->styleInterface = $styleInterface;
        $this->subjectInterface = $subjectInterface;
        $this->placementInterface = $placementInterface;
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

        $update = $this->artist->updateArtist($data, $id, $timeData);
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

    public function styles() {
        $data = $this->styleInterface->getAllStyle();
        return response()->json([
            'status' => true,
            'data' => $data
        ]);

    }

    public function placements() {
        $data = $this->placementInterface->getAllPlacements();
        return response()->json([
            'status' => true,
            'data' => $data
        ]);

    }

    public function subjects() {
        $data = $this->subjectInterface->getAllSubjects();
        return response()->json([
            'status' => true,
            'data' => $data
        ]);

    }
}
