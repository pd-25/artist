<?php

namespace App\core\artist;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ArtistRepository implements ArtistInterface
{
    public function getAllArtist()
    {
        return User::whereNotIn('id', [1])->orderBy('id', 'DESC')->get();
    }

    public function storeArtistData(array $data)
    {
        if (isset($data['profile_image']) && $data['profile_image'] != null) {
            $content_db = time() . rand(0000, 9999) . "." . $data['profile_image']->getClientOriginalExtension();
            $data['profile_image']->storeAs("public/ProfileImage", $content_db);
            $data['profile_image'] = $content_db;
        }

        if (isset($data['banner_image']) && $data['banner_image'] != null) {
            $content_ban = time() . rand(0000, 9999) . "." . $data['banner_image']->getClientOriginalExtension();
            $data['banner_image']->storeAs("public/BannerImage", $content_ban);
            $data['banner_image'] = $content_ban;
        }
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }

    public function getSingleArtist($id)
    {
        $find =  User::with('artworks')->where('id', $id)->first();
        if ($find) {
            return $find;
        } else {
            return 'Not Found';
        }
    }

    public function updateArtist($data, $id)
    {
        $find =  User::where('id', $id)->first();
        if ($find) {
            if (isset($data['profile_image']) && $data['profile_image'] != null) {
                File::delete(public_path("storage/ProfileImage/" . $find->profile_image));
                $content_db = time() . rand(0000, 9999) . "." . $data['profile_image']->getClientOriginalExtension();
                $data['profile_image']->storeAs("public/ProfileImage", $content_db);
                $data['profile_image'] = $content_db;
            }

            if (isset($data['banner_image']) && $data['banner_image'] != null) {
                File::delete(public_path("storage/ProfileImage/" . $find->banner_image));
                $content_ban = time() . rand(0000, 9999) . "." . $data['banner_image']->getClientOriginalExtension();
                $data['banner_image']->storeAs("public/BannerImage", $content_ban);
                $data['banner_image'] = $content_ban;
            }
            if (isset($data['password']) && $data['password'] != null) {
                $data['password'] = Hash::make($data['password']);
            }else{
                $data['password'] = $find->password;
            }
            return $find->update($data);
        }else{
            return 'No data';
        }
    }


    public function deleteArtist($id){
        $find =  User::where('id', $id)->first();
        if($find) {
            foreach($find->artworks as $art){
                $art->delete();
            }
            
            return $find->delete();
        }
        return 'not found';
    }
}
