<?php
namespace App\core\banner;

use App\Models\BannerImage;

class BannerRepository implements BannerInterface {
    public function getAllBanners(){
        return BannerImage::with('artist')->orderBy('id', 'DESC')->get();
    }

    public function storeBannerImage($data) {
        if (isset($data['banner_image']) && $data['banner_image'] != null) {
            $content_db = time().rand(0000, 9999) . "." . $data['banner_image']->getClientOriginalExtension();
            $data['banner_image']->storeAs("public/BannerImage", $content_db);
            $data['banner_image'] = $content_db;
        }
        return BannerImage::create($data);
    }

    public function deleteBannerImage($id) {
        $find =  BannerImage::where('id', $id)->first();
        if($find) {
            return $find->delete();
        }
        return 'not found';
    }
}