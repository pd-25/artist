<?php
namespace App\core\artist;

interface ArtistInterface {
    public function getAllArtist();
    public function storeArtistData(array $data);
    public function getSingleArtist($id);
    public function updateArtist($data,$id);
    public function deleteArtist($id);
    
}