<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [ 'name' => 'Remera', 'price' => '450'],
            [ 'name' => 'Pantalon', 'price' => '700'],
            [ 'name' => 'Short', 'price' => '550'],
            [ 'name' => 'Buzo', 'price' => '900'],
            [ 'name' => 'Campera', 'price' => '1100'],
            [ 'name' => 'Musculosa', 'price' => '400']
            
        ];

        foreach($items as $item){
            Item::create($item);
            }
    }
}
