<?php
namespace App\core\banner;

interface BannerInterface {
    public function getAllBanners();
    public function storeBannerImage($data);
    public function deleteBannerImage($id);
    
}

