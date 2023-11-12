<?php
namespace App\core\artwork;

interface ArtworkInterface {
    public function getAllArtwork();
    public function storeArtworkData(array $data);
    public function getSingleArtwork($id);
    public function updateArtwork($data,$id);
    public function deleteArtwork($id);
    
}