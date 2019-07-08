<?php

namespace App\Http\Controllers;

use App\Relation;

class HomeController extends Controller
{
    /**
     * 議事録情報一覧を表示.
     *
     * @return Response
     */
    public function index()
    {
        // 関連テーブルから値取得
        $relations = Relation::data();
        // 次回担当者 取得
        $nextuser = Relation::nextuser();

        return view('home', compact('relations', 'nextuser'));
    }

    /**
     * 議事録情報一覧を表示.
     *
     * @return Response
     */
    public function search($keyword = null)
    {

        // return view('home', compact('relations'));
    }

    /**
     * 議事録情報一覧 削除
     *  |relations|covers|shares|minutes| 全削除.
     *
     * @return ture
     */
    public static function destroy($id)
    {
        // Delete 処理
        if (Relation::erase($id)) {
            flash('該当の議事録を削除しました。', 'success');
        } else {
            flash('予期せぬエラーが発生しました。', 'danger');
        }

        return redirect('/');
    }
}
