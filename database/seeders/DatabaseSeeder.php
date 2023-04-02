<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Album;
use App\Models\Playlist;
use App\Models\Song;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $songs = [
            [
                "title" => "Bohemian Rhapsody",
                "artist" => "Queen",
                "album" => "A Night at the Opera",
            ],
            [
                "title" => "You're My Best Friend",
                "artist" => "Queen",
                "album" => "A Night at the Opera",
            ],
            [
                "title" => "Love of My Life",
                "artist" => "Queen",
                "album" => "A Night at the Opera",
            ],
            [
                "title" => "Black Dog",
                "artist" => "Led Zeppelin",
                "album" => "Led Zeppelin IV",
            ],
            [
                "title" => "Rock and Roll",
                "artist" => "Led Zeppelin",
                "album" => "Led Zeppelin IV",
            ],
            [
                "title" => "Stairway to Heaven",
                "artist" => "Led Zeppelin",
                "album" => "Led Zeppelin IV",
            ],
            [
                "title" => "Thriller",
                "artist" => "Michael Jackson",
                "album" => "Thriller",
            ],
            [
                "title" => "Beat It",
                "artist" => "Michael Jackson",
                "album" => "Thriller",
            ],
            [
                "title" => "Billie Jean",
                "artist" => "Michael Jackson",
                "album" => "Thriller",
            ],
        ];

        $albums = [
            [
                "title" => "A Night at the Opera",
                "artist" => "Queen",
                "release_date" => "1975",
                "tracks" => [
                    "Bohemian Rhapsody",
                    "You're My Best Friend",
                    "Love of My Life"
                ]
            ],
            [
                "title" => "Led Zeppelin IV",
                "artist" => "Led Zeppelin",
                "release_date" => "1971",
                "tracks" => [
                    "Stairway to Heaven",
                    "Black Dog",
                    "Rock and Roll"
                ]
            ],
            [
                "title" => "Thriller",
                "artist" => "Michael Jackson",
                "release_date" => "1982",
                "tracks" => [
                    "Thriller",
                    "Beat It",
                    "Billie Jean"
                ]
            ]
        ];

        $playlists = [
            [
                "name" => "Rock Classics",
                "author" => "John Doe",
                "songs" => [
                    "Love of My Life",
                    "Stairway to Heaven",
                    "Black Dog"
                ]
            ],
            [
                "name" => "80s Pop",
                "author" => "John Doe",
                "songs" => [
                    "You're My Best Friend",
                    "Billie Jean",
                    "Love of My Life"
                ]
            ]
        ];

        foreach ($songs as $song) {
            $newSong = new Song();
            $newSong->title = $song['title'];
            $newSong->artist = $song['artist'];
            $newSong->album_id = array_search($song['album'], array_column($albums, 'title')) + 1;
            $newSong->save();
        }

        foreach ($albums as $album) {
            $newAlbum = new Album();
            $newAlbum->title = $album['title'];
            $newAlbum->artist = $album['artist'];
            $newAlbum->release_date = Carbon::parse($album['release_date']);
            $newAlbum->save();
        }

        foreach ($playlists as $playlist) {
            $newPlaylist = new Playlist();
            $newPlaylist->title = $playlist['name'];
            $newPlaylist->author = $playlist['author'];
            $newPlaylist->songs = json_encode(array_map(function ($song) use ($songs) {
                return array_search($song, array_column($songs, 'title')) + 1;
            }, $playlist['songs']));
            $newPlaylist->save();
        }
    }
}
