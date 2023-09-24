<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MusicController extends BaseController
{
    private $music;
    private $playlist;
    public function __construct(){
        $this->music = new \App\Models\MusicModel();
        $this->playlist = new \App\Models\PlaylistModel();
    }
   
    public function index()
     {
         $data['name'] = $this->music->findAll();
         $data['playName'] = $this->playlist->findall();
         return view('ViewMusic',$data);
     }

     public function upload(){
        $data = [
            'musicArtist' => $this->request->getVar('music_artist'),
            'musicTitle' => $this->request->getVar('music_title'),
            'filePath' => $this->request->getVar('music_file'),
       ];

       $this->music->save($data);
       return redirect()->to('/');
    }

    public function uploadPlaylist(){
        $data = [
            'playlistName' => $this->request->getVar('playlistName'),
       ];

       $this->playlist->save($data);
       return redirect()->to('/');
    }
 
    public function search(){
        $search = $this->request->getGet('title');
        $musicResults = $this->music->like('musicTitle','%'.$search.'%')->findAll();
        $data = [
            'playlists'=> $this->playlist->findAll(),
            'musicTitle' => $musicResults,
        ];
        $data['playName'] = $this->playlist->findall();
        $data['name'] = $this->music->findAll();
        return view('ViewMusic',$data);
    }

    public function viewPlayList($id){
        $data = [
            'playlistMusicId' => $this->playlist->findAll(),
            'pro' => $this->playlist->where('playlistMusicId', $id)->first(),
        ];
        $data['playName'] = $this->playlist->findall();
        return view('ViewPlaylist',$data);
    }

     public function delete($id){
         $this->music->where('musicId', $id)->delete();
         return redirect()->to('/');
     }
 
}

