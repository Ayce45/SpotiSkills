<?php

/**
 * Streaming Musical API
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 * PHP version 7.2.5
 *
 * The version of the OpenAPI document: 1.0.0
 *
 *
 * NOTE: This class is auto generated by OpenAPI-Generator
 * https://openapi-generator.tech
 * Do not edit the class manually.
 *
 * Source files are located at:
 *
 * > https://github.com/OpenAPITools/openapi-generator/blob/master/modules/openapi-generator/src/main/resources/php-laravel/
 */


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * get albumsGet
 * Summary: Récupérer tous les albums
 * Notes: Cette API permet de récupérer tous les albums disponibles dans le service de streaming musical.
 * Output-Formats: [application/json]
 */
Route::get('albums', [Controller::class, 'albumsGet']);
/**
 * post albumsPost
 * Summary: Créer un nouvel album
 * Notes: Cette API permet de créer un nouvel album dans le service de streaming musical.
 * Output-Formats: [application/json]
 */
Route::post('albums', [Controller::class, 'albumsPost']);
/**
 * get playlistsGet
 * Summary: Récupère une liste de playlists
 * Notes: Récupère une liste de playlists disponibles sur le service de streaming musical
 * Output-Formats: [application/json]
 */
Route::get('playlists', [Controller::class, 'playlistsGet']);
/**
 * post playlistsPost
 * Summary: Crée une nouvelle playlist
 * Notes: Crée une nouvelle playlist et l'ajoute à la base de données du service de streaming musical
 * Output-Formats: [application/json]
 */
Route::post('playlists', [Controller::class, 'playlistsPost']);
/**
 * post signupPost
 * Summary: Crée une nouvelle demande d'inscription
 * Notes: Crée une nouvelle demande d'inscription et l'ajoute à la base de données du service de streaming musical
 * Output-Formats: [application/json]
 */
Route::post('signup', [Controller::class, 'signupPost']);
/**
 * post signupGet
 * Summary: Récupère la liste des demande d'inscription
 * Notes: Récupère la liste des demande d'inscription sur le service de streaming musical
 * Output-Formats: [application/json]
 */
Route::get('signup', [Controller::class, 'signupGet']);
/**
 * put signupIdAcceptPut
 * Summary: Accepter une demande d'inscription
 * Notes:

 */
Route::put('signup/{id}/accept', [Controller::class, 'signupIdAcceptPut']);
/**
 * put signupIdRejectPut
 * Summary: Refuser une demande d'inscription
 * Notes:

 */
Route::put('signup/{id}/reject', [Controller::class, 'signupIdRejectPut']);
/**
 * get songsGet
 * Summary: Récupère une liste de chansons
 * Notes: Récupère une liste de chansons disponibles sur le service de streaming musical
 * Output-Formats: [application/json]
 */
Route::get('songs', [Controller::class, 'songsGet']);
/**
 * post songsPost
 * Summary: Ajoute une nouvelle chanson
 * Notes: Ajoute une nouvelle chanson à la bibliothèque de musique du service de streaming musical

 */
Route::post('songs', [Controller::class, 'songsPost']);
/**
 * get songsIdGet
 * Summary: Récupère une chanson par ID
 * Notes: Récupère une chanson par son identifiant unique
 * Output-Formats: [application/json]
 */
Route::get('songs/{id}', [Controller::class, 'songsIdGet']);
/**
 * get statsGet
 * Summary: Récupérer des statistiques sur l'utilisation du service de streaming musical
 * Notes: Cette API permet de récupérer des statistiques sur l'utilisation du service de streaming musical, telles que les genres musicaux préférés, le nombre de morceaux écoutés, le temps d'écoute total, le temps d'écoute par utilisateur, la musique la plus écoutée de l'année, du mois et de la semaine.
 * Output-Formats: [application/json]
 */
Route::get('stats', [Controller::class, 'statsGet']);
