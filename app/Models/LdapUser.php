
<!--?php



// app/Models/LdapUser.php
namespace App\Models;

use LdapRecord\Models\ActiveDirectory\User as LdapUserModel;

class LdapUser extends LdapUserModel
{
    protected $fillable = [
        'uid',
        'displayName',
        'sn',
        'givenName',
    ];
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
    public function getDisplayNameAttribute()
    {
        return $this->displayName; // Assurez-vous que 'mail' est le bon attribut LDAP
    }

}

*/
