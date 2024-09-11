<?php
namespace App\Ldap;

use LdapRecord\Models\Model;

class User extends Model
{
    protected $fillable = [
        'displayname',
        'uid',
        'sn',
        'givenname',
    ];
    protected $objectClass = ['person'];

    public function getLdapDomainColumn()
    {
        return 'displayname';
    }
}
