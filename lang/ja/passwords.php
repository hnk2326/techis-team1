<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Password Reset Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | has failed, such as for an invalid token or invalid new password.
    |
    */
    /*
    |--------------------------------------------------------------------------
    | パスワード再設定の言語設定
    |--------------------------------------------------------------------------
    |
    | ここでパスワードを忘れた際や再設定を行う際にユーザーに表示される
    | メッセージを設定できます。パスワード再設定にメールアドレスからの
    | 専用リンクを使う際などのメッセージも設定できます。
    |
    */

    // 'reset' => 'Your password has been reset.',
    // 'sent' => 'We have emailed your password reset link.',
    // 'throttled' => 'Please wait before retrying.',
    // 'token' => 'This password reset token is invalid.',
    // 'user' => "We can't find a user with that email address.",

    'reset' => 'パスワードがリセットされました。',
    'sent' => 'メールアドレスへパスワード再設定の案内を送信しました。',
    'throttled' => 'しばらく時間が経ってから再度試してください。',
    'token' => '再設定用メールの送信から時間が経ちすぎています。再度最初からやり直してください。',
    'user' => "そのメールアドレスは登録されいません。",

];
