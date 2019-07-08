<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    /**
     * モデルと関連しているテーブル.
     *
     * @var string
     */
    protected $table = 'shares';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'topic',
        'share',
    ];

    /**
     * 共有情報.
     *
     * @param $id covers.id
     * @return Response
     */
    public static function data($id)
    {
        return DB::table('relations')
            ->join('shares', 'relations.share_id', '=', 'shares.id')
            ->select('relations.id', 'shares.topic', 'shares.share')
            ->where('relations.id', '=', $id)
            ->first();
    }

    /**
     * 登録内容を確認後、新しいユーザーインスタンスを生成.
     *
     * @param array $param
     * @return ture
     */
    public static function register($param)
    {
        return self::create([
            'topic' => $param->topic,
            'share' => $param->share,
        ]);
    }
}
