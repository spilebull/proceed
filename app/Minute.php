<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Minute extends Model
{
    /**
     * モデルと関連しているテーブル.
     *
     * @var string
     */
    protected $table = 'minutes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'relation_id',
        'ticket_id',
        'tracker', // TODO
        'project',
        'subject',
        'description',
        'due_date', // TODO
        'category', // TODO
        'status',  // TODO
        'assigned_to',
        'priority', // TODO
        'version',
        'author', // TODO
        'created_on', // TODO
        'updated_on', // TODO
        'start_date', // TODO
        'done_ratio', // TODO
        'estimated_hours', // TODO
        'parent_id', // TODO
        'reration_ticket', // TODO
        'is_private', // TODO
        'end_date', // TODO
        'minute',
        'memo',
    ];

    /**
     * 議事録情報.
     *
     * @param $id minutes.id
     * @return Response
     */
    public static function data($id)
    {
        return DB::table('relations')
            ->join('minutes', 'relations.id', '=', 'minutes.relation_id')
            ->where('relations.id', '=', $id)
            ->get();
    }

    /**
     * 登録内容を確認後、新しいユーザーインスタンスを生成.
     *
     * @param array $param Minites Datas, string $id relations.id
     * @return ture
     */
    public static function register($param, $id)
    {
        if (empty($param)) {
            $minute = self::create([
                'relation_id' => $id,
            ]);
        } else {
            $minute = null;
            foreach ($param as $value) {
                $minute = self::create([
                    'relation_id' => $id,
                    'ticket_id' => $value['ticket_id'],
                    'project' => $value['project'],
                    'subject' => $value['subject'],
                    'description' => $value['description'],
                    'assigned_to' => $value['assigned_to'],
                    'version' => $value['version'],
                    'minute' => $value['minute'],
                    'memo' => $value['memo'],
                ]);
            }
        }

        return $minute;
    }
}
