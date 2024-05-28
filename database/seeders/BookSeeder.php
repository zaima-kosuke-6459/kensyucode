<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            ['name' => '羅生門','author' =>'芥川龍之介', 'publisher' => '訳林出版社','category_id'=>'64','publication_date'=>'2010/11/01'],
            ['name' => 'アメリカ70年代 激動する文化・社会・政治','author' =>'ブルース・J.シュルマン', 'publisher' => '国書刊行会','category_id'=>'13','publication_date'=>'2024/2/18'],
            ['name' => 'アマテラスの暗号','author' =>'伊勢谷 武', 'publisher' => '廣済堂出版','category_id'=>'64','publication_date'=>'2020/10/07'],
            ['name' => '核のプロパガンダ','author' =>'暮沢　剛巳', 'publisher' => '平凡社','category_id'=>'40','publication_date'=>'2024/02/12'],
            ['name' => '落合式イタリアン','author' =>'落合 務', 'publisher' => 'ダイヤモンド社','category_id'=>'53','publication_date'=>'2024/02/12'],
            ['name' => '教養としての西洋建築','author' =>'国広　ジョージ', 'publisher' => '祥伝社','category_id'=>'52','publication_date'=>'2024/05/01'],
            ['name' => '教養としての「半導体」','author' =>'菊地　正典', 'publisher' => '日本実業出版社','category_id'=>'34','publication_date'=>'2024/04/01'],
            ['name' => '「当たり前」を疑う100の方法','author' =>'小川　仁志', 'publisher' => '幻冬舎','category_id'=>'5','publication_date'=>'2024/03/08'],
            ['name' => '一冊でつかむ聖書','author' =>'保坂　俊司', 'publisher' => '河出書房新社','category_id'=>'8','publication_date'=>'2024/04/06'],
            ['name' => '宗教と世界','author' =>'島田　裕巳', 'publisher' => '新星出版社','category_id'=>'8','publication_date'=>'2021/07/04'],
            ['name' => 'VTuberの哲学','author' =>'日比野　恒', 'publisher' => '翔泳社','category_id'=>'1','publication_date'=>'2024/02/01'],
            ['name' => '音訳事例集','author' =>'国本　和基', 'publisher' => 'クロスメディア・パブリッシング','category_id'=>'1','publication_date'=>'2024/04/03'],
            ['name' => 'アジア・太平洋戦争','author' =>'森　武麿', 'publisher' => 'ポプラ社','category_id'=>'2','publication_date'=>'2006/03/20'],
            ['name' => '衣食住の歴史','author' =>'西本　豊弘', 'publisher' => 'ポプラ社','category_id'=>'2','publication_date'=>'2006/03/20'],
        ];

        foreach ($books as $book) {
            Book::create($book);
        };
    }
}
