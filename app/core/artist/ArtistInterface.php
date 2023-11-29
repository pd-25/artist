<?php
namespace App\core\artist;

interface ArtistInterface {
    public function getAllArtist();
    public function storeArtistData(array $data, $timeData);
    public function getSingleArtist($id);
    public function updateArtist($data,$id, $timeData, $close);
    public function deleteArtist($id);
    
}