<?php

namespace App\core\artist;

use App\Models\TimeTable;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ArtistRepository implements ArtistInterface
{
    public function getAllArtist()
    {
        return User::whereNotIn('id', [1])->orderBy('id', 'DESC')->get();
    }

    public function storeArtistData(array $data, $timeData)
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

        $user = User::create($data);
        $timeData['user_id'] = $user->id;
        return TimeTable::create($timeData);
    }

    public function getSingleArtist($id)
    {
        $find =  User::with('artworks', 'timeData', 'bannerImages')->where('id', $id)->first();
        if ($find) {
            return $find;
        } else {
            return 'Not Found';
        }
    }

    public function updateArtist($data, $id, $timeData, $close)
    {
        $find =  User::where('id', $id)->first();
        if ($find) {
          
                 $check_if_time =  TimeTable::where('user_id', $id)->first();
                 if($check_if_time) {
                    if(isset($close['tuesday_close'])){
                        $timeData['tuesday_from'] =null;
                        $timeData['tuesday_to'] =null;
                    }

                    if(isset($close['friday_close'])){
                        $timeData['friday_from'] =null;
                        $timeData['friday_to'] =null;
                    }
                    if(isset($close['saterday_close'])){
                        $timeData['saterday_from'] =null;
                        $timeData['saterday_to'] =null;
                    }
                    if(isset($close['sunday_close'])){
                        $timeData['sunday_from'] =null;
                        $timeData['sunday_to'] =null;
                    }
                    if(isset($close['monday_close'])){
                        $timeData['monday_from'] =null;
                        $timeData['monday_to'] =null;
                    }
                    if(isset($close['wednesday_close'])){
                        $timeData['wednesday_from'] =null;
                        $timeData['wednesday_to'] =null;
                    }
                    
                    if(isset($close['thrusday_close'])){
                        $timeData['thrusday_from'] =null;
                        $timeData['thrusday_to'] =null;
                    }
                    
                    $check_if_time->update($timeData);
                 }else{
                    $timeData['user_id']= $id;
                    TimeTable::create($timeData);

                 }
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

            foreach($find->bannerImages as $bannerImage){
                $bannerImage->delete();
            }
            
            return $find->delete();
        }
        return 'not found';
    }
}
