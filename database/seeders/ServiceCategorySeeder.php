<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_categories')->insert([
            [
                "name" => "ABC",
                "slug" => "ac",
                "image" => "1521969345.png"

            ],
            [
                "name" => "ABCD",
                "slug" => "ab",
                "image" => "1521969358.png"

            ],
            [
                "name" => "ABCE",
                "slug" => "ad",
                "image" => "1521969409.png"

            ],
            [
                "name" => "ABCR",
                "slug" => "ae",
                "image" => "1521969419.png"

            ],
            [
                "name" => "ABCT",
                "slug" => "af",
                "image" => "1521969430.png"

            ],
            [
                "name" => "ABCY",
                "slug" => "ag",
                "image" => "1521969446.png"

            ],
            [
                "name" => "ABCU",
                "slug" => "ah",
                "image" => "1521969454.png"

            ],
            [
                "name" => "ABCI",
                "slug" => "aj",
                "image" => "1521969464.png"

            ],
            [
                "name" => "ABCO",
                "slug" => "ak",
                "image" => "1521969490.png"

            ],
            [
                "name" => "ABCP",
                "slug" => "al",
                "image" => "1521972624.png"

            ],
            [
                "name" => "ABCA",
                "slug" => "aq",
                "image" => "1521972593.png"

            ],
            [
                "name" => "ABCS",
                "slug" => "aw",
                "image" => "1521969622.png"

            ],
            [
                "name" => "ABCZ",
                "slug" => "ar",
                "image" => "1521969599.png"

            ],
            [
                "name" => "ABCX",
                "slug" => "aac",
                "image" => "1521969576.png"

            ],
            [
                "name" => "ABCC",
                "slug" => "aca",
                "image" => "1521969558.png"

            ],
            [
                "name" => "ABCV",
                "slug" => "acs",
                "image" => "1521969536.png"

            ],
            [
                "name" => "ABCN",
                "slug" => "acdf",
                "image" => "1521969522.png"

            ],
            [
                "name" => "ABCM",
                "slug" => "achj",
                "image" => "1521969512.png"

            ],
            [
                "name" => "ABCAD",
                "slug" => "achd",
                "image" => "1521972643.png"

            ],
            [
                "name" => "ABGHD",
                "slug" => "acgf",
                "image" => "1521972663.png"

            ],
            [
                "name" => "ABKMN",
                "slug" => "acuyt",
                "image" => "1521972769.png"

            ],
            [
                "name" => "ABASDF",
                "slug" => "achgf",
                "image" => "1521974355.png"

            ],

        ]);
    }
}
