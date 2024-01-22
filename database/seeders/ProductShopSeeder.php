<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class ProductShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shops = Shop::all(); 

        foreach($shops as $shop){
         $cat =   $shop->category->category_name;
         $products = []; 
           switch ($cat) {
            case 'Épicerie':
                 $products = [1,2,3,4,5,9];
                break;
            case 'Fruits & Légumes':
                 $products = [1,3];
                break;
            case 'Boulangerie':
                 $products = [10];
                break;
            case 'Pâtisserie':
                 $products = [11];
                break;
            case 'Boucherie & Charcuterie':
                 $products = [6,7];
                break;
            case 'Poissonnerie':
                 $products = [8];
                break;
            case 'Fromagerie':
                 $products = [5];
                break;
            case 'Caviste':
                 $products = [6];
                break;
            case 'Marchés de producteurs':
                 $products = [1,2,3,4,5];
                break;
            case 'Fermes':
                 $products = [1,3,4];
                break;
            case 'Produits locaux':
                 $products = [1,4,6];
                break;
           }

           foreach ($products as  $product_id) {
               
               DB::table("shops_products")->insert([
                   'shop_id' =>$shop->id ,
                   'product_id' => $product_id
               ]);
           }
        }
       
    }
}
