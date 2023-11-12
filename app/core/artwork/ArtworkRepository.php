<?php

namespace App\core\artwork;

use App\core\artwork\ArtworkInterface;
use App\Models\Artwork;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ArtworkRepository implements ArtworkInterface
{
    public function getAllArtwork()
    {
        return Artwork::with('user')->orderBy('id', 'DESC')->get();
    }

    public function storeArtworkData(array $data)
    {
        $date = date('md') . substr(date('Y'), 2);
        $check_if_uploded = Artwork::where('user_id', $data['user_id'])->whereDate('created_at', now()->toDateString())->count();
        $username = User::where('id', $data['user_id'])->value('username');
        $data['title'] = $username . '_' . $date . '_' . ($check_if_uploded + 1);
        
        if (isset($data['image']) && $data['image'] != null) {
            $content_db = $data['title']. "." . $data['image']->getClientOriginalExtension();
            $data['image']->storeAs("public/ArtworkImage", $content_db);
            $data['image'] = $content_db;
        }

        return Artwork::create($data);
    }

    public function getSingleArtwork($id)
    {
        $find =  Artwork::where('id', $id)->first();
        if ($find) {
            return $find;
        } else {
            return 'Not Found';
        }
    }

    public function updateArtwork($data, $id)
    {
        $find =  Artwork::where('id', $id)->first();
        if ($find) {
           
            if (isset($data['image']) && $data['image'] != null) {
                File::delete(public_path("storage/ArtworkImage/" . $find->image));
                $content_db =  pathinfo($find->image, PATHINFO_FILENAME) . "." . $data['image']->getClientOriginalExtension();
                $data['image']->storeAs("public/ArtworkImage", $content_db);
                $data['image'] = $content_db;
            }

           
            return $find->update($data);
        } else {
            return 'No data';
        }
    }

    public function deleteArtwork($id){
        $find =  Artwork::where('id', $id)->first();
        if($find) {
            return $find->delete();
        }
        return 'not found';
    }
}
