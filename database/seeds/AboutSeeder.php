<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abouts')->insert([
            'visi' => "Lorzem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt iusto iure inventore libero sapiente itaque porro, atque voluptatibus nemo, doloremque, quisquam facilis quo harum ex. Possimus similique accusamus obcaecati praesentium?",
            'misi' => "Lorzem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt iusto iure inventore libero sapiente itaque porro, atque voluptatibus nemo, doloremque, quisquam facilis quo harum ex. Possimus similique accusamus obcaecati praesentium?",
            'history' => "Lorzem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt iusto iure inventore libero sapiente itaque porro, atque voluptatibus nemo, doloremque, quisquam facilis quo harum ex. Possimus similique accusamus obcaecati praesentium?",
        ]);
    }
}
