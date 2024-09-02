<?php
namespace App\Ldap;

use LdapRecord\Models\Model;

class User extends Model
{
    protected $fillable = [
        'uid',

    ];

    public function getLdapDomainColumn()
    {
        return 'uid';
    }
}
