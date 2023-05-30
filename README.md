# 0円空家からリノベーション
PHP自作

# 概要
空家を譲りたい方と空家を買いたい方のための
空家アプリを作成しました。

買い手ユーザー、売り手ユーザー、管理者に分け、
ログインできるようになっています。

# 使い方
◯買い手ユーザー　

空家物件一覧を見ることができ、物件の詳細を確認することができます。

リノベーション費用を検討して、購入手続きができます。


◯売り手ユーザー

空家情報を登録することができます。

マイページにて登録物件の確認、編集、削除ができます。


◯管理ユーザー

マイページにて購入者の確認ができます。

また、管理者権限として、空家物件削除、購入者削除機能が使えます。

# 環境

MAMP/MySQL/Laravel/PHP

# データベース

データベース名：house

テーブル

Costsテーブル
id(AI)/cost/user_id/house_id/toilet/bath/kitchen/floor/pillar

Housesテーブル
id(AI)/access/floor/bulding_area/land_area/bulding_date/address/parking/remark/img_id/created_at

Imagesテーブル
id(AI)/top_img/sub1_img//sub2_img/sub2_img/sub3_img/sub4_img/sub5_img/house_id/created_at

Likesテーブル
id(AI)/user_id/house_id/created_at

Usersテーブル
id(AI)/name/email/password/manage/created_at




