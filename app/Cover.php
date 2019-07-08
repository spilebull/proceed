<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Cover extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'covers';

    /**
     * 登録可能属性 割当.
     *
     * @var array
     */
    protected $fillable = [
        'date',       // 日時（年月日）
        'start_time', // 日時（開始時間）
        'end_time',   // 日時（終了時間）
        'area',       // 場所
        'attendee',   // 出席者
        'secretary',  // 書記
        'distribute', // 配布先
        'doc',        // 文書名
        'doc_no',     // 文書番号
    ];

    /**
     * 表紙情報.
     *
     * @param $id covers.id
     * @return Response
     */
    public static function data($id)
    {
        $relations = DB::table('relations')
            ->join('covers', 'relations.cover_id', '=', 'covers.id')
            ->join('users', 'covers.secretary', '=', 'users.id')
            ->select('relations.id', 'covers.date', 'covers.start_time',
                'covers.end_time', 'covers.area', 'covers.attendee',
                'covers.secretary', 'covers.distribute', 'covers.doc',
                'covers.doc_no', 'users.last_name', 'users.first_name')
             ->where('relations.id', '=', $id)
             ->first();

        // 出席者 User ID から User Name へ変換
        $attendeeId = explode(',', $relations->attendee);
        foreach ($attendeeId as $aid) {
            $attendeeTemp[$aid] = DB::table('users')
                ->select('users.last_name', 'users.first_name')
                ->where('users.id', '=', $aid)
                ->first();
            if (empty($attendeeTemp[$aid])) {
                continue;
            }
            $attendee[$aid] = $attendeeTemp[$aid]->last_name.' '.$attendeeTemp[$aid]->first_name;
        }
        // 出席者 User ID から User Name へ上書き
        $relations->attendee = implode(',', $attendee);

        return $relations;
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
            'date' => $param->date,
            'start_time' => $param->start_time,
            'end_time' => $param->end_time,
            'area' => $param->area,
            'attendee' => implode(',', $param->attendee),
            'secretary' => $param->secretary,
            'distribute' => $param->distribute,
            'doc' => '201600001-01-01_放送システム課定例議事録'.date('Ymd',  strtotime($param->date)),
            'doc_no' => 'SPA9999M0001-010-201600001',
        ]);
    }
}
