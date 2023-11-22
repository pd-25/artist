<?php

namespace App\Http\Controllers\Admin\Artist;

use App\core\artist\ArtistInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    private $artistInterface;

    public function __construct(ArtistInterface $artistInterface)
    {
        $this->artistInterface = $artistInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['artists'] = $this->artistInterface->getAllArtist();
        return view('admin.artist.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.artist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'zipcode' => 'required|numeric|min:6',
            'phone' => 'numeric',
            'address' => 'nullable|string|max:500',
        ]);
        $data = $request->only('name', 'username', 'email', 'phone', 'address', 'password', 'zipcode', 'profile_image', 'banner_image');
        $timeData = $request->only('sunday_from','sunday_to','monday_from','monday_to','tuesday_from','tuesday_to','wednesday_from','wednesday_to','thrusday_from','thrusday_to','friday_from','friday_to','saterday_from','saterday_to');
        $store = $this->artistInterface->storeArtistData($data, $timeData);
        if ($store) {
            return redirect()->route('artists.index')->with('msg', 'New artist added successfully.');
        } else {
            return back()->with('msg', 'Some error occur.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['artist'] = $this->artistInterface->getSingleArtist(decrypt($id));
        if ($data['artist'] == 'Not Found') {
            return back()->with('msg', 'No artist found!');
        }
        return view('admin.artist.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['artist'] = $this->artistInterface->getSingleArtist(decrypt($id));
        // dd($data);
        if ($data['artist'] == 'Not Found') {
            return back()->with('msg', 'No artist found!');
        }
        return view('admin.artist.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'zipcode' => 'required|numeric|min:6',
            'phone' => 'numeric',
            'address' => 'nullable|string|max:500',
        ]);

        $data = $request->only('name', 'username', 'email', 'phone', 'address', 'password', 'zipcode', 'profile_image', 'banner_image');
        $timeData = $request->only('sunday_from','sunday_to','monday_from','monday_to','tuesday_from','tuesday_to','wednesday_from','wednesday_to','thrusday_from','thrusday_to','friday_from','friday_to','saterday_from','saterday_to');

        $update = $this->artistInterface->updateArtist($data, decrypt($id), $timeData);
        if ($update) {
            return back()->with('msg', 'Artist information updated successfully.');
        } elseif ($update == 'No data') {
            return back()->with('msg', 'No artist found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = $this->artistInterface->deleteArtist(decrypt($id));
        if ($delete) {
            return back()->with('msg', 'Artist has been deleted successfully with his all artworks .');
        } elseif ($delete == 'No data') {
            return back()->with('msg', 'No artwork found.');
        }
    }
}
