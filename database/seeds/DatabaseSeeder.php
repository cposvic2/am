<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $brand = App\Brand::create(array(
            'name'  => 'Club Carlson',
            'order' => 1,
            'points_name' => 'Club Carlson points',
        ));

        App\Subbrand::create(array(
            'name'  => 'Country Inn & Suites',
            'order' => 1,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Park Inn',
            'order' => 2,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Radisson',
            'order' => 3,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Park Plaza',
            'order' => 4,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Radisson Blu',
            'order' => 5,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Quorvus Collection',
            'order' => 6,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 1',
            'points' => 9000,
            'order' => 1,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 2',
            'points' => 15000,
            'order' => 2,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 3',
            'points' => 28000,
            'order' => 3,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 4',
            'points' => 38000,
            'order' => 4,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 5',
            'points' => 44000,
            'order' => 5,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 6',
            'points' => 50000,
            'order' => 6,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 7',
            'points' => 70000,
            'order' => 7,
            'brand_id' => $brand->id,
        ));

        $brand = App\Brand::create(array(
            'name'  => 'Hilton',
            'order' => 2,
            'points_name' => 'Hilton points',
        ));

        App\Subbrand::create(array(
            'name'  => 'Hampton Inn',
            'order' => 1,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Homewood Suites',
            'order' => 2,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'DoubleTree',
            'order' => 3,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Embassy Suites',
            'order' => 4,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Hilton Garden Inn',
            'order' => 5,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Hilton',
            'order' => 6,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Conrad',
            'order' => 7,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Waldorf Astoria',
            'order' => 8,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 1',
            'points' => 5000,
            'order' => 1,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 2',
            'points' => 10000,
            'order' => 2,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 3',
            'points' => 20000,
            'order' => 3,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 4',
            'points' => 30000,
            'order' => 4,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 5',
            'points' => 40000,
            'order' => 5,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 6',
            'points' => 50000,
            'order' => 6,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 7',
            'points' => 60000,
            'order' => 7,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 8',
            'points' => 70000,
            'order' => 8,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 9',
            'points' => 80000,
            'order' => 9,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 10',
            'points' => 95000,
            'order' => 10,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'All-Inclusive Rewards',
            'points' => null,
            'order' => 11,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Distinctive Rewards',
            'points' => null,
            'order' => 12,
            'brand_id' => $brand->id,
        ));

        $brand = App\Brand::create(array(
            'name'  => 'World of Hyatt',
            'order' => 3,
            'points_name' => 'Hyatt points',
        ));

        App\Category::create(array(
            'name'  => 'Category 1',
            'points' => 5000,
            'order' => 1,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 2',
            'points' => 8000,
            'order' => 2,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 3',
            'points' => 12000,
            'order' => 3,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 4',
            'points' => 15000,
            'order' => 4,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 5',
            'points' => 20000,
            'order' => 5,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 6',
            'points' => 25000,
            'order' => 6,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 7',
            'points' => 30000,
            'order' => 7,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Hyatt House',
            'order' => 1,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Hyatt Place',
            'order' => 2,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Hyatt Regency',
            'order' => 3,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Hyatt',
            'order' => 4,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Park Hyatt',
            'order' => 5,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Grand Hyatt',
            'order' => 6,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Andaz',
            'order' => 7,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Hyatt Ziva & Zilara',
            'order' => 8,
            'brand_id' => $brand->id,
        ));

        $brand = App\Brand::create(array(
            'name'  => 'IHG',
            'order' => 4,
            'points_name' => 'Rewards Club points',
        ));

        App\Category::create(array(
            'name'  => 'Category 1',
            'points' => 10000,
            'order' => 1,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 2',
            'points' => 15000,
            'order' => 2,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 3',
            'points' => 20000,
            'order' => 3,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 4',
            'points' => 25000,
            'order' => 4,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 5',
            'points' => 30000,
            'order' => 5,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 6',
            'points' => 35000,
            'order' => 6,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 7',
            'points' => 40000,
            'order' => 7,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 8',
            'points' => 45000,
            'order' => 8,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 9',
            'points' => 50000,
            'order' => 9,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 10',
            'points' => 60000,
            'order' => 10,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Candlewood Suites',
            'order' => 1,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Staybridge Suites',
            'order' => 2,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'EVEN Hotels',
            'order' => 3,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Holiday Inn Express',
            'order' => 4,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Hotel Indigo',
            'order' => 5,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Holiday Inn',
            'order' => 6,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Crowne Plaza',
            'order' => 7,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Hualuxe',
            'order' => 8,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Intercontinental',
            'order' => 9,
            'brand_id' => $brand->id,
        ));

        $brand = App\Brand::create(array(
            'name'  => 'Marriott',
            'order' => 5,
            'points_name' => 'Marriott points',
        ));

        App\Category::create(array(
            'name'  => 'Category 1',
            'points' => 7500,
            'order' => 1,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 2',
            'points' => 10000,
            'order' => 2,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 3',
            'points' => 15000,
            'order' => 3,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 4',
            'points' => 20000,
            'order' => 4,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 5',
            'points' => 25000,
            'order' => 5,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 6',
            'points' => 30000,
            'order' => 6,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 7',
            'points' => 35000,
            'order' => 7,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 8',
            'points' => 40000,
            'order' => 8,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 9',
            'points' => 45000,
            'order' => 9,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Tier 1',
            'points' => 30000,
            'order' => 10,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Tier 2',
            'points' => 40000,
            'order' => 11,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Tier 3',
            'points' => 50000,
            'order' => 12,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Tier 4',
            'points' => 60000,
            'order' => 13,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Tier 5',
            'points' => 70000,
            'order' => 14,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'TownePlace Suites',
            'order' => 1,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Residence Inn',
            'order' => 2,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Springhill Suites',
            'order' => 3,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Fairfield Inn & Suites',
            'order' => 4,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Courtyard',
            'order' => 5,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'AC Hotels',
            'order' => 6,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Marriott',
            'order' => 7,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Renaissance',
            'order' => 8,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'JW Marriott',
            'order' => 9,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Ritz Carlton',
            'order' => 10,
            'brand_id' => $brand->id,
        ));

        $brand = App\Brand::create(array(
            'name'  => 'Starwood',
            'order' => 6,
            'points_name' => 'Starpoints',
        ));

        App\Category::create(array(
            'name'  => 'Category 1',
            'points' => 3000,
            'order' => 1,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 2',
            'points' => 4000,
            'order' => 2,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 3',
            'points' => 7000,
            'order' => 3,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 4',
            'points' => 10000,
            'order' => 4,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 5',
            'points' => 12000,
            'order' => 5,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 6',
            'points' => 20000,
            'order' => 6,
            'brand_id' => $brand->id,
        ));

        App\Category::create(array(
            'name'  => 'Category 7',
            'points' => 30000,
            'order' => 7,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Four Points',
            'order' => 1,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Aloft',
            'order' => 2,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Element',
            'order' => 3,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Sheraton',
            'order' => 4,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Westin',
            'order' => 5,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'Le Meridien',
            'order' => 6,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'W Hotels',
            'order' => 7,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'The Luxury Collection',
            'order' => 8,
            'brand_id' => $brand->id,
        ));

        App\Subbrand::create(array(
            'name'  => 'St Regis',
            'order' => 9,
            'brand_id' => $brand->id,
        ));

    }
}
