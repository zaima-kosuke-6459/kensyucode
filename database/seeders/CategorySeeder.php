<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['name' => '総記'],
            ['name' => '百科事典'],
            ['name' => '年鑑・雑誌'],
            ['name' => '情報科学'],
            ['name' => '哲学'],
            ['name' => '心理(学)'],
            ['name' => '倫理(学)'],
            ['name' => '宗教'],
            ['name' => '仏教'],
            ['name' => 'キリスト教'],
            ['name' => '歴史総記'],
            ['name' => '日本歴史'],
            ['name' => '外国歴史'],
            ['name' => '伝記'],
            ['name' => '地理'],
            ['name' => '旅行'],
            ['name' => '社会科学総記'],
            ['name' => '政治-含む国防軍事'],
            ['name' => '法律'],
            ['name' => '経済・財政・統計'],
            ['name' => '経営'],
            ['name' => '社会'],
            ['name' => '教育'],
            ['name' => '民族・風習'],
            ['name' => '自然科学総記'],
            ['name' => '数学'],
            ['name' => '物理学'],
            ['name' => '化学'],
            ['name' => '天文・地学'],
            ['name' => '生物学'],
            ['name' => '医学・歯学・薬学'],
            ['name' => '工学・工学総記'],
            ['name' => '土木'],
            ['name' => '建築'],
            ['name' => '機械'],
            ['name' => '電気'],
            ['name' => '電子通信'],
            ['name' => '海事'],
            ['name' => '採鉱・冶金'],
            ['name' => 'その他の工業'],
            ['name' => '産業総記'],
            ['name' => '農林業'],
            ['name' => '水産業'],
            ['name' => '商業'],
            ['name' => '交通・通信'],
            ['name' => '芸術総記'],
            ['name' => '絵画・彫刻'],
            ['name' => '写真・工芸'],
            ['name' => '音楽・舞踊'],
            ['name' => '演劇・映画'],
            ['name' => '体育・スポーツ'],
            ['name' => '諸芸・娯楽'],
            ['name' => '家事'],
            ['name' => 'コミックス・劇画'],
            ['name' => '語学総記'],
            ['name' => '日本語'],
            ['name' => '英米語'],
            ['name' => 'ドイツ語'],
            ['name' => 'フランス語'],
            ['name' => '各国語'],
            ['name' => '文学総記'],
            ['name' => '日本文学総記'],
            ['name' => '日本文学詩歌'],
            ['name' => '日本文学、小説・物語'],
            ['name' => '日本文学、評論、随筆、その他'],
            ['name' => '外国文学小説'],
            ['name' => '外国文学、その他']
        ];
        \DB::table('book_categories')->insert($data);
    }
}
