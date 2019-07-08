<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Relation;
use App\Cover;
use App\Share;
use App\Minute;

class MinutesController extends Controller
{
    /**
     * 議事録 登録画面.
     *
     * @var App\Http\Controllers
     * @return Response
     */
    public function create()
    {
        // 社員一覧 取得
        $users = User::data();
        // 書記一覧 取得
        $secretaries = User::data(1);

        return view('minute.create', compact('users', 'secretaries'));
    }

    /**
     * 議事録 登録処理.
     *
     * @param Illuminate\Http\Request $reauest
     * @return Response
     */
    public function store(Request $request)
    {
        // 表紙情報 登録
        $cover = Cover::register($request);
        // 共有情報 登録
        $share = Share::register($request);
        // 関連情報 登録
        $relation = Relation::create(['cover_id' => $cover->id, 'share_id' => $share->id]);
        // 議事情報 登録
        if (Minute::register($request->minute, $relation->id)) {
            flash('該当の議事録を登録しました。', 'success');
        } else {
            flash('予期せぬエラーが発生しました。', 'danger');
        }

        return redirect('/');
    }

    /**
     * 議事録閲覧.
     *
     * @return View
     */
    public function show($id)
    {
        // 表紙情報 取得
        $covers = Cover::data($id);
        // 共有情報 取得
        $shares = Share::data($id);
        // 議事録情報 取得
        $minutes = Minute::data($id);

        return view('minute.show', compact('covers', 'shares', 'minutes'));
    }
}
