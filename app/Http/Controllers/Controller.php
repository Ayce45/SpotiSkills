<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Playlist;
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
        return response(Album::with('songs')->get(), 200);
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
            return response('La requête est mal formulée...', 400);
        }

        $album = new Album();
        $album->title = $input['title'];
        $album->artist = $input['artist'];
        $album->release_date = $input['release_date'];
        $album->save();

        return response('Chanson ajoutée avec succès');
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

        return response($playlists, 200);
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

        //path params validation


        //not path params validation
        if (!isset($input['newPlaylist'])) {
            throw new \InvalidArgumentException('Missing the required parameter $newPlaylist when calling playlistsPost');
        }
        $newPlaylist = $input['newPlaylist'];


        return response('How about implementing playlistsPost as a post method ?');
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

        //path params validation


        //not path params validation
        if (!isset($input['newSignupRequest'])) {
            throw new \InvalidArgumentException('Missing the required parameter $newSignupRequest when calling signupPost');
        }
        $newSignupRequest = $input['newSignupRequest'];


        return response('How about implementing signupPost as a post method ?');
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
        $input = Request::all();

        //path params validation


        //not path params validation

        return response('How about implementing signupIdAcceptPut as a put method ?');
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
        $input = Request::all();

        //path params validation


        //not path params validation

        return response('How about implementing signupIdRejectPut as a put method ?');
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
        return response(Song::all(), 200);
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

        //path params validation


        //not path params validation
        $song = $input['song'];


        return response('How about implementing songsPost as a post method ?');
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
        $input = Request::all();

        //path params validation


        //not path params validation

        return response('How about implementing songsIdGet as a get method ?');
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

        //path params validation


        //not path params validation
        if (!isset($input['type'])) {
            throw new \InvalidArgumentException('Missing the required parameter $type when calling statsGet');
        }
        $type = $input['type'];

        $userId = $input['userId'];


        return response('How about implementing statsGet as a get method ?');
    }
}
