<?php



// app/Models/LdapUser.php
namespace App\Models;

use LdapRecord\Models\ActiveDirectory\User as LdapUserModel;

class LdapUser extends LdapUserModel
{
    // Si vous utilisez Active Directory, cette classe est généralement suffisante.
    // Vous pouvez ajouter des méthodes ou des propriétés spécifiques ici.

    // Exemple : récupérer le prénom de l'utilisateur
    public function getFirstNameAttribute()
    {
        return $this->givenName; // Assurez-vous que 'givenName' est le bon attribut LDAP
    }

    // Exemple : récupérer le nom de famille de l'utilisateur
    public function getLastNameAttribute()
    {
        return $this->sn; // Assurez-vous que 'sn' est le bon attribut LDAP
    }

    // Exemple : récupérer l'email de l'utilisateur
    public function getEmailAttribute()
    {
        return $this->mail; // Assurez-vous que 'mail' est le bon attribut LDAP
    }
}
namespace App\Ldap;

use LdapRecord\Models\Model;

class User extends Model
{
    protected $fillable = [
        'uid',
        'cn',
        'sn',
        'mail',
    ];

    public function getLdapDomainColumn()
    {
        return 'uid';
    }
}

