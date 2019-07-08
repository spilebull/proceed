<?php

namespace App;

use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * 複数代入を行う属性.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'last_name', 'first_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 社員情報.
     *
     * @return 社員情報一覧
     */
    public static function data($is_sec = null)
    {
        // 書記情報 取得
        if (!empty($is_sec)) {
            return DB::table('users')
                ->select(
                    'users.id',
                    'users.code',
                    'users.last_name',
                    'users.first_name'
                )
                ->where('users.is_sec', '=', $is_sec)
                ->get();
        }
        // 社員情報 取得
        return DB::table('users')
            ->select(
                'users.id',
                'users.code',
                'users.last_name',
                'users.first_name'
            )
            ->get();
    }
}
