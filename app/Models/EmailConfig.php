<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailConfig extends Model
{
    protected $fillable = [
        'id', // 👈 add this if you want to use updateOrCreate with 'id'
        'mail_mailer',
        'mail_host',
        'port',
        'mail_username',
        'password',
        'mail_encryption',
        'email_name',
        'mail_name',
        'status',
    ];

    public static function find(int $int) {}
}
