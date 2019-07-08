<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Relation extends Model
{
    /**
     * モデルと関連しているテーブル.
     *
     * @var string
     */
    protected $table = 'relations';

    /**
     * モデルのタイムスタンプを更新するかの指示.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cover_id',  // 表紙ID
        'share_id',  // 共有ID
        'minute_id', // 議事録ID
    ];

    /*
     * HOME情報.
     *
     * @return HOME情報一覧
     */
    public static function data()
    {
        return DB::table('relations')
            ->join('covers', 'relations.cover_id', '=', 'covers.id')
            ->join('users', 'covers.secretary', '=', 'users.id')
            ->select(
                'relations.id',
                'relations.cover_id',
                'covers.date',
                'covers.doc',
                'users.last_name',
                'users.first_name'
            )
            ->orderBy('covers.date', 'desc')
            ->get();
    }

    /**
     * 次回担当者情報.
     *
     * @return nextuser
     */
    public static function nextuser()
    {
        $user = DB::table('relations')
            ->join('covers', 'relations.cover_id', '=', 'covers.id')
            ->join('users', function ($join) {
                $join->on('covers.secretary', '=', 'users.id')
                ->where('is_sec', '=', 1);
            })
            ->select('users.id')
            ->orderBy('covers.date', 'desc')
            ->first();

        $max = DB::table('users')
            ->select('id')
            ->where('is_sec', '=', 1)
            ->orderBy('id', 'desc')
            ->first();

        if (empty($userid)) {
            return false;
        }

        $newid = $user->id;
        while(empty($user)) {
            $nextuser = DB::table('users')
                ->select('users.last_name', 'users.first_name')
                ->where('is_sec', '=', 1)
                ->where('id', '=', $newid)
                ->first();
                $newid += 1;

            if ($newid > $max->id) {
                $nextuser = DB::table('users')
                    ->where('is_sec', '=', 1)
                    ->select('users.last_name', 'users.first_name')
                    ->orderBy('id', 'asc')
                    ->first();
            }
        }

        // 次回担当者 取得
        $data = $nextuser->last_name.'　'.$nextuser->first_name;

        dd($data);

        return $data;
    }

    /**
     * HOME情報 削除処理.
     *
     * @param Relations ID $id
     * @return true | false
     */
    public static function erase($id)
    {
        // 関連TBL, 表示TBL, 共有TBL, 議事録TBL 一括削除
        $relations = DB::table('relations')
            ->where('relations.id', '=', $id)
            ->first();

        // 表紙情報 削除
        $cover = DB::table('covers')
            ->where('covers.id', '=', $relations->cover_id)
            ->delete();

        // 共有情報 削除
        $share = DB::table('shares')
            ->where('shares.id', '=', $relations->share_id)
            ->delete();

        // 議事録情報 削除
        $minute = DB::table('minutes')
            ->where('minutes.relation_id', '=', $relations->minute_id)
            ->delete();

        // 関連情報 削除
        $relation = DB::table('relations')
            ->where('relations.id', '=', $id)
            ->delete();
        if (!$relation) {
            return false;
        }
        return true;
    }
}
