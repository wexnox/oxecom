<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [ 'Hovedkort', 'Prosessor', 'Minnebrikker', 'Kontrollere', 'Skjermkort', 'Strømforsyning', 'Skjerm', 'Kabinett' ];
        foreach ( $categories as $category ) {
            # First fetch category Id
            $category        = DB::table( 'categories' )->where( 'name', '=', trim( strtolower( $category ) ) )->get();
            $category_id     = $category[0]->id;
            $actual_price    = rand( 15.5, 100.5 );
            $discount_factor = ( 10 / 100 ) * $actual_price; // 10% of actual price
            $discount_price  = $actual_price - $discount_factor;

            DB::table( 'products' )->insert( [
                'title'          => 'Product for ' . $category[0]->name,
                'imagePath'      => 'https://www.komplett.no/img/p/800/c3e07913-3f53-4ef7-3879-1bba994c2209.jpg',
                'description'    => 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the',
                'category_id'    => $category_id,
                'original_price' => $actual_price,
                'discount_price' => $discount_price,
                'in_stock'       => 1,
                'status'         => 1,
                'created_at'     => Carbon::now(),
            ] );

        }
    }
}
