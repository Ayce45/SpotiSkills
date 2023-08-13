<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Playing;
use App\Models\Playlist;
use App\Models\SignupRequest;
use App\Models\Song;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Operation albumsGet
     *
     * Récupérer tous les albums.
     *
     *
     */
    public function albumsGet()
    {
        return response(['albums' => Album::with('songs')->orderBy('release_date', 'desc')->get()], 200);
    }

    /**
     * Operation albumsPost
     *
     * Créer un nouvel album.
     *
     *
     * @return Http response
     */
    public function albumsPost()
    {
        $input = Request::all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'artist' => 'required',
            'release_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response(['message' => 'La requête est mal formulée'], 400);
        }

        $album = new Album();
        $album->title = $input['title'];
        $album->artist = $input['artist'];
        $album->release_date = $input['release_date'];
        $album->save();

        return response(['message' => 'Album ajoutée avec succès'], 201);
    }

    /**
     * Operation playlistsGet
     *
     * Récupère une liste de playlists.
     *
     *
     * @return Http response
     */
    public function playlistsGet()
    {
        $playlists = Playlist::all();
        $playlists->map(function ($playlist) {
            $playlist->songs = $playlist->songs();
        });

        return response(["playlists" => $playlists], 200);
    }

    /**
     * Operation playlistsPost
     *
     * Crée une nouvelle playlist.
     *
     *
     * @return Http response
     */
    public function playlistsPost()
    {
        $input = Request::all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'author' => 'required',
            'songs' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response(['message' => 'La requête est mal formulée'], 400);
        }

        $playlist = new Playlist();
        $playlist->title = $input['title'];
        $playlist->author = $input['author'];

        foreach ($input['songs'] as $songId) {
            $song = Song::find($songId);
            if (!$song) {
                return response(['message' => 'La chanson n\'existe pas'], 404);
            }
        }

        $playlist->songs = '[' . implode(',', $input['songs']) . ']';

        $playlist->save();

        return response(['message' => 'Playlist ajoutée avec succès'], 201);
    }

    /**
     * Operation signupPost
     *
     * Crée une nouvelle demande d'inscription.
     *
     *
     * @return Http response
     */
    public function signupPost()
    {
        $input = Request::all();

        $validator = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['message' => 'La requête est mal formulée'], 400);
        }

        $signup = new SignupRequest();
        $signup->email = $input['email'];
        $signup->password = $input['password'];
        $signup->first_name = $input['first_name'];
        $signup->last_name = $input['last_name'];
        $signup->save();

        return response(['message' => "Demande d'inscription ajoutée avec succès"], 201);
    }

    /**
     * Operation songsGet
     *
     * Récupère une liste de chansons.
     *
     *
     * @return Http response
     */
    public function signupGet()
    {
        return response(['signup' => SignupRequest::orderBy('id', 'desc')->where('status', '=', 'pending')->get()], 200);
    }

    /**
     * Operation signupIdAcceptPut
     *
     * Accepter une demande d'inscription.
     *
     * @param int $id ID de la demande d'inscription (required)
     *
     * @return Http response
     */
    public function signupIdAcceptPut($id)
    {
        $signup = SignupRequest::where('id', '=', $id)->where('status', '=', 'pending')->first();
        if (!$signup) {
            return response(['message' => 'La demande d\'inscription n\'existe pas'], 404);
        }

        $signup->status = 'accepted';
        $signup->save();

        return response(['message' => 'Demande d\'inscription acceptée avec succès'], 200);
    }

    /**
     * Operation signupIdRejectPut
     *
     * Refuser une demande d'inscription.
     *
     * @param int $id ID de la demande d'inscription (required)
     *
     * @return Http response
     */
    public function signupIdRejectPut($id)
    {
        $signup = SignupRequest::where('id', '=', $id)->where('status', '=', 'pending')->first();
        if (!$signup) {
            return response(['message' => 'La demande d\'inscription n\'existe pas'], 404);
        }

        $signup->status = 'rejected';
        $signup->save();

        return response(['message' => 'Demande d\'inscription refusée avec succès'], 200);
    }

    /**
     * Operation songsGet
     *
     * Récupère une liste de chansons.
     *
     *
     * @return Http response
     */
    public function songsGet()
    {
        return response(['songs' => Song::orderBy('title', 'asc')->with('album')->get()], 200);
    }

    /**
     * Operation songsPost
     *
     * Ajoute une nouvelle chanson.
     *
     *
     * @return Http response
     */
    public function songsPost()
    {
        $input = Request::all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'artist' => 'required',
            'album_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response(['message' => 'La requête est mal formulée'], 400);
        }

        $album = Album::find($input['album_id']);

        if (!$album) {
            return response(['message' => 'L\'album n\'existe pas'], 404);
        }


        $song = new Song();
        $song->title = $input['title'];
        $song->artist = $input['artist'];
        $song->album_id = $input['album_id'];
        $song->save();

        return response(['message' => 'Chanson ajoutée avec succès'], 201);
    }

    /**
     * Operation songsIdGet
     *
     * Récupère une chanson par ID.
     *
     * @param string $id ID de la chanson à récupérer (required)
     *
     * @return Http response
     */
    public function songsIdGet($id)
    {
        $song = Song::whereId($id)->with('album')->first();

        if (!$song) {
            return response(['message' => 'La chanson n\'existe pas'], 404);
        }

        return response(['song' => $song], 200);
    }

    /**
     * Operation statsGet
     *
     * Récupérer des statistiques sur l'utilisation du service de streaming musical.
     *
     *
     * @return Http response
     */
    public function statsGet()
    {
        $input = Request::all();

        $validator = Validator::make($input, [
            'type' => 'required|in:artists,albums,songs,playing_time',
            'user_id' => 'exists:User,id',
            'from' => 'date_format:Y-m-d',
            'to' => 'date_format:Y-m-d',
        ]);

        if ($validator->fails()) {
            return response(['message' => 'La requête est mal formulée'], 400);
        }

        $query = Playing::query();

        if (isset($input['user_id'])) {
            $query = $query->where('user_id', '=', $input['user_id']);
        }
        if (isset($input['from'])) {
            $query = $query->where('playing_at', '>=', $input['from']);
        }
        if (isset($input['to'])) {
            $query = $query->where('playing_at', '<=', $input['to']);
        }

        if ($input['type'] === 'playing_time') {
            $query = $query->selectRaw('SUM(time) as time');
            $totalTime = $query->first()->time;

            return response(['stats' => ['playing' => (int)$totalTime]], 200);
        }

        if ($input['type'] === 'albums') {
            $query = $query->selectRaw('Song.album_id, SUM(time) as time')
                ->join('Song', 'Song.id', '=', 'Playing.song_id')
                ->groupBy('Song.album_id')
                ->orderBy('time', 'desc')
                ->limit(3);

            $albums = $query->get();

            $albumStats = [];

            $albums->each(function ($album) use (&$albumStats) {
                $albumData = Album::find($album->album_id);
                $albumStats[] = [
                    'time' => (int)$album->time,
                    'title' => $albumData->title,
                    'artist' => $albumData->artist,
                ];
            });
            return response(['stats' => ['albums' => $albumStats]], 200);

        }

        if ($input['type'] === 'songs') {
            $query = $query->selectRaw('song_id, SUM(time) as time')
                ->groupBy('song_id')
                ->orderBy('time', 'desc')
                ->limit(3);

            $songs = $query->get();

            $songStats = [];

            $songs->each(function ($song) use (&$songStats) {
                $songData = Song::find($song->song_id);
                $songStats[] = [
                    'time' => (int)$song->time,
                    'title' => $songData->title,
                    'artist' => $songData->artist,
                ];
            });
            return response(['stats' => ['songs' => $songStats]], 200);
        }

        if ($input['type'] === 'artists') {
            $query = $query->selectRaw('Song.artist, SUM(time) as time')
                ->join('Song', 'Song.id', '=', 'Playing.song_id')
                ->groupBy('Song.artist')
                ->orderBy('time', 'desc')
                ->limit(3);

            $artists = $query->get();

            $artistStats = [];

            $artists->each(function ($artist) use (&$artistStats) {
                $artistStats[] = [
                    'time' => (int)$artist->time,
                    'artist' => $artist->artist,
                ];
            });
            return response(['stats' => ['artists' => $artistStats]], 200);
        }
    }
}
