<?php

return [
    // components
    // header.blade.php
    'header' => [
        'search' => '検索',
    ],

    // auth
    // register.blade.php
    'register' => [
        'title' => 'アカウント作成',
        'name' => '氏名',
        'name_placeholder' => '氏名を入力してください',
        'name_error' => '氏名を入力してください。',
        'email' => 'メールアドレス',
        'email_placeholder' => 'メールアドレスを入力してください',
        'email_error' => 'メールアドレスを入力してください。',
        'postal_code' => '郵便番号',
        'postal_code_placeholder' => '郵便番号を入力してください',
        'address' => '住所',
        'address_placeholder' => '住所を入力してください',
        'phone' => '電話番号',
        'phone_placeholder' => '電話番号を入力してください',
        'password' => 'パスワード',
        'password_placeholder' => 'パスワードを入力してください',
        'password_error' => 'パスワードを入力してください。',
        'password_confirm' => 'パスワード確認',
        'password_confirm_placeholder' => 'パスワードを再入力してください',
        'submit' => '登録',
    ],

    // login.blade.php
    'login' => [
        'title' => 'ログイン',
        'email_placeholder' => 'メールアドレス',
        'email_error' => 'メールアドレスが正しくない可能性があります。',
        'password_placeholder' => 'パスワード',
        'password_error' => 'パスワードが正しくない可能性があります。',
        'remember_me' => 'ログイン状態を保持する',
        'submit' => 'ログイン',
        'forgot_password' => 'パスワードをお忘れですか？',
        'signup' => '新規登録',
    ],

    // forgot-password.blade.php
    'forgot_password' => [
        'title' => 'パスワード再設定',
        'description' => '登録済みのメールアドレスを入力してください。<br>パスワード再設定用のメールを送信します。',
        'email_placeholder' => 'メールアドレス',
        'email_error' => 'メールアドレスが正しくない可能性があります。',
        'submit' => 'メール送信',
        'status_success' => 'パスワード再設定用のリンクをメールで送信しました。',
    ],

    // verify-email.blade.php
    'register_confirmation' => [
        'title' => '登録ありがとうございます！',
        'temporary_status' => '現在、アカウントは仮登録状態です。',
        'check_email' => 'ご入力いただいたメールアドレス宛に確認メールを送信しました。',
        'click_link' => 'メール内のリンクをクリックすると本登録が完了します。',
        'go_home' => 'ホームページへ',
    ],

    // web
    // index.blade.php
    'top' => [
        'recommend' => 'おすすめ',
        'products' => '商品一覧',
        'more' => 'もっと見る →'
    ],

    // product
    // show.blade.php
    'product' => [
        'quantity' => '数量',
        'add' => 'カートに追加',
        'remove_fav' => 'お気に入りから削除',
        'add_fav' => 'お気に入りに追加',
        'customer_review' => 'カスタマーレビュー',
        'no_review' => 'まだレビューはありません。',
        'write_review' => 'レビューを書く',
        'rating' => '評価',
        'title' => 'タイトル',
        'error_title' => 'タイトルを入力してください。',
        'review' => 'レビュー内容',
        'error_review' => 'レビュー内容を入力してください。',
        'submit' => 'レビューを送信',
    ],

    // index.blade.php
    'product_list' => [
        'home' => 'ホーム',
        'all_products' => 'すべての商品',
        'products_list' => '商品一覧',
        'products_in_category' => '「:category」内の商品 :count 件',
        'results_for' => '「:keyword」の検索結果 :count 件',
        'total_items' => '商品一覧 :count 件',
        'sort' => '並び替え',
        'sort_newest' => '新着順',
        'sort_price' => '価格順',
        'no_products' => '該当する商品はありません。',
        'price' => '価格',
    ],

    // users
    // mypage.blade.php
    'mypage' => [
        'title' => 'マイアカウント',
        'flash_success' => '変更が正常に保存されました。',
        'edit_account_title' => 'アカウント情報を編集',
        'edit_account_description' => '登録情報を更新することができます。',
        'order_history_title' => '注文履歴',
        'order_history_description' => '過去の購入履歴を確認できます。',
        'change_password_title' => 'パスワード変更',
        'change_password_description' => 'アカウントを安全に保つためにパスワードを変更します。',
        'logout_title' => 'ログアウト',
        'logout_description' => 'アカウントからログアウトします。',
    ],

    // edit.blade.php
    'edit_profile' => [
        'breadcrumb' => 'マイアカウント > プロフィール編集',
        'title' => 'プロフィール編集',
        'name' => '氏名',
        'error_name' => '氏名を入力してください。',
        'email' => 'メールアドレス',
        'error_email' => 'メールアドレスを入力してください。',
        'postal_code' => '郵便番号',
        'error_postal_code' => '郵便番号を入力してください。',
        'address' => '住所',
        'error_address' => '住所を入力してください。',
        'phone' => '電話番号',
        'error_phone' => '電話番号を入力してください。',
        'save' => '保存',
    ],

    // edit_password.blade.php
    'edit_password' => [
        'breadcrumb' => 'マイアカウント > パスワード編集',
        'title' => 'パスワード編集',
        'new_password' => '新しいパスワード',
        'confirm_password' => 'パスワード（確認用）',
        'save' => '保存',
    ],

    // order_history.blade.php
    'order_history' => [
        'breadcrumb' => 'マイアカウント > 注文履歴',
        'title' => '注文履歴',
        'no_orders' => '注文はまだありません。',
        'order_number' => '注文番号',
        'ordered_at' => '注文日時',
        'total' => '合計',
        'status' => 'ステータス',
        'view_details' => '詳細を見る',
    ],

    // order_detail.blade.php
    'order_detail' => [
        'breadcrumb' => 'マイアカウント > 注文履歴 > 注文詳細',
        'title' => '注文詳細',
        'title_sub' => '注文情報',
        'order_number' => '注文番号',
        'ordered_at' => '注文日時',
        'total' => '合計',
        'total_items' => '合計数量',
        'product' => '商品',
        'price' => '価格',
        'quantity' => '数量',
        'subtotal' => '小計',
        'back_to_history' => '注文履歴に戻る',
        'deleted_product' => '削除された商品',
    ],

    // favorite.blade.php
    'favorites' => [
        'title' => 'お気に入り',
        'empty_list' => 'お気に入りリストは空です。',
        'remove' => '削除',
        'add_to_cart' => 'カートに追加',
    ],

    // carts
    // index.blade.php
    'cart' => [
        'title' => 'ショッピングカート',
        'product' => '商品',
        'price' => '価格',
        'quantity' => '数量',
        'total' => '合計',
        'update' => '更新',
        'remove' => '削除',
        'total_label' => '合計',
        'tax' => 'すべての価格は税込です',
        'continue_shopping' => '買い物を続ける',
        'confirm_purchase' => '購入を確認',
        'modal_title' => '購入内容を確認',
        'modal_body' => '購入を進めてもよろしいですか？',
        'cancel' => 'キャンセル',
        'purchase' => '購入する',
        'empty_cart' => 'カートは空です。',
        'browse_products' => '商品を探す',
        'success' => '操作が完了しました。',
        'error' => '操作に失敗しました。',
    ],

    // checkout
    // index.blade.php
    'checkout' => [
        'title' => '注文内容の確認',
        'review_items' => 'お支払い前に商品内容を確認してください。',
        'product' => '商品',
        'quantity' => '数量',
        'subtotal' => '小計',
        'total' => '合計',
        'pay_now' => '支払う',
        'back_to_cart' => '← カートに戻る',
    ],

    // success.blade.php
    'success' => [
        'title' => '支払い完了！',
        'thank_you' => 'ご購入ありがとうございます。',
        'order_summary' => '注文内容の確認',
        'order_number' => '注文番号',
        'total' => '合計',
        'status' => 'ステータス',
        'continue_shopping' => 'ショッピングを続ける',
    ],
];