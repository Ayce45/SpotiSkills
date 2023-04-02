<?php
/**
 * SignupRequest
 */
namespace app\Models;

/**
 * SignupRequest
 */
class SignupRequest {

    /** @var string $id Identifiant unique de la demande d'inscription*/
    public $id = "";

    /** @var string $email Adresse email de l'utilisateur*/
    public $email = "";

    /** @var string $password Mot de passe de l'utilisateur*/
    public $password = "";

    /** @var string $firstName Prénom de l'utilisateur*/
    public $firstName = "";

    /** @var string $lastName Nom de famille de l'utilisateur*/
    public $lastName = "";

    /** @var string $status Statut de la demande d'inscription*/
    public $status = "";

}
