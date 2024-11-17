<?php

declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterPost;
use App\Models\User as UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * トップページ を表示する
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('/user/register');
    }

    /**
     * 会員登録
     *
     */
    public function register(UserRegisterPost $request)
    {
        // validate済

        // データの取得
        $datum = $request->validated();


        //パスワードのハッシュ化
        $datum['password'] = Hash::make($datum['password']);

        // var_dump($datum); exit;


        // user_id の追加
        $datum['user_id'] = Auth::id();


        // テーブルへのINSERT
        try {

        $r = UserModel::create($datum);
        } catch(\Throwable $e) {
            // XXX 本当はログに書く等の処理をする。今回は一端「出力する」だけ
            echo $e->getMessage();
            exit;
        }

        // タスク登録成功
        $request->session()->flash('front.user_register_success', true);

        // リダイレクト
        return redirect('/');



        // // 認証に失敗した場合
        // if (Auth::guard('admin')->attempt($datum) === false) {
        //     return back()
        //           ->withInput() // 入力値の保持
        //           ->withErrors(['auth' => 'ログインIDかパスワードに誤りがあります。',]) // エラーメッセージの出力
        //           ;
        // }

        // //認証に成功した場合
        // $request->session()->regenerate();
        // return redirect()->intended('/admin/top');
    }

    /**
     * ログアウト処理
     *
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();  // CSRFトークンの再生成
        $request->session()->regenerate();  // セッションIDの再生成
        return redirect(route('index'));
    }
}