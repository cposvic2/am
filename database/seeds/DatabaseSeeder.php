<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;
use League\Csv\Statement;

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
            'marker_img' => 'marker-sprite-clubcarlson.png',
            'old_id' => 'clubcarlson',
        ));

        App\Subbrand::create(array(
            'name'  => 'Country Inn & Suites',
            'order' => 1,
            'brand_id' => $brand->id,
            'old_id' => 'countryinn',
        ));

        App\Subbrand::create(array(
            'name'  => 'Park Inn',
            'order' => 2,
            'brand_id' => $brand->id,
            'old_id' => 'parkinn',
        ));

        App\Subbrand::create(array(
            'name'  => 'Radisson',
            'order' => 3,
            'brand_id' => $brand->id,
            'old_id' => 'radisson',
        ));

        App\Subbrand::create(array(
            'name'  => 'Park Plaza',
            'order' => 4,
            'brand_id' => $brand->id,
            'old_id' => 'parkplaza',
        ));

        App\Subbrand::create(array(
            'name'  => 'Radisson Blu',
            'order' => 5,
            'brand_id' => $brand->id,
            'old_id' => 'radissonblu',
        ));

        App\Subbrand::create(array(
            'name'  => 'Quorvus Collection',
            'order' => 6,
            'brand_id' => $brand->id,
            'old_id' => 'quorvus',
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
            'marker_img' => 'marker-sprite-hilton.png',
            'old_id' => 'hilton',
        ));

        App\Subbrand::create(array(
            'name'  => 'Hampton Inn',
            'order' => 1,
            'brand_id' => $brand->id,
            'old_id' => 'hamptoninn',
        ));

        App\Subbrand::create(array(
            'name'  => 'Homewood Suites',
            'order' => 2,
            'brand_id' => $brand->id,
            'old_id' => 'homewoodsuites',
        ));

        App\Subbrand::create(array(
            'name'  => 'Home2 Suites',
            'order' => 3,
            'brand_id' => $brand->id,
            'old_id' => 'home2suites',
        ));

        App\Subbrand::create(array(
            'name'  => 'DoubleTree',
            'order' => 4,
            'brand_id' => $brand->id,
            'old_id' => 'doubletree',
        ));

        App\Subbrand::create(array(
            'name'  => 'Embassy Suites',
            'order' => 5,
            'brand_id' => $brand->id,
            'old_id' => 'embassysuites',
        ));

        App\Subbrand::create(array(
            'name'  => 'Hilton Garden Inn',
            'order' => 6,
            'brand_id' => $brand->id,
            'old_id' => 'hiltongardeninn',
        ));

        App\Subbrand::create(array(
            'name'  => 'Hilton',
            'order' => 7,
            'brand_id' => $brand->id,
            'old_id' => 'hiltonhotels',
        ));

        App\Subbrand::create(array(
            'name'  => 'Conrad',
            'order' => 8,
            'brand_id' => $brand->id,
            'old_id' => 'conrad',
        ));

        App\Subbrand::create(array(
            'name'  => 'Waldorf Astoria',
            'order' => 9,
            'brand_id' => $brand->id,
            'old_id' => 'waldorfastoria',
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
            'marker_img' => 'marker-sprite-hyatt.png',
            'old_id' => 'hyatt',
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
            'old_id' => 'hyatthouse',
        ));

        App\Subbrand::create(array(
            'name'  => 'Hyatt Place',
            'order' => 2,
            'brand_id' => $brand->id,
            'old_id' => 'hyattplace',
        ));

        App\Subbrand::create(array(
            'name'  => 'Hyatt Regency',
            'order' => 3,
            'brand_id' => $brand->id,
            'old_id' => 'hyattregency',
        ));

        App\Subbrand::create(array(
            'name'  => 'Hyatt',
            'order' => 4,
            'brand_id' => $brand->id,
            'old_id' => 'hyatthotels',
        ));

        App\Subbrand::create(array(
            'name'  => 'Park Hyatt',
            'order' => 5,
            'brand_id' => $brand->id,
            'old_id' => 'parkhyatt',
        ));

        App\Subbrand::create(array(
            'name'  => 'Grand Hyatt',
            'order' => 6,
            'brand_id' => $brand->id,
            'old_id' => 'grandhyatt',
        ));

        App\Subbrand::create(array(
            'name'  => 'Andaz',
            'order' => 7,
            'brand_id' => $brand->id,
            'old_id' => 'andaz',
        ));

        App\Subbrand::create(array(
            'name'  => 'Hyatt Ziva & Zilara',
            'order' => 8,
            'brand_id' => $brand->id,
            'old_id' => 'zivazilara',
        ));

        $brand = App\Brand::create(array(
            'name'  => 'IHG',
            'order' => 4,
            'points_name' => 'Rewards Club points',
            'marker_img' => 'marker-sprite-ihg.png',
            'old_id' => 'ihg',
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
            'old_id' => 'candlewoodsuites',
        ));

        App\Subbrand::create(array(
            'name'  => 'Staybridge Suites',
            'order' => 2,
            'brand_id' => $brand->id,
            'old_id' => 'staybridgesuites',
        ));

        App\Subbrand::create(array(
            'name'  => 'EVEN Hotels',
            'order' => 3,
            'brand_id' => $brand->id,
            'old_id' => 'evenhotels',
        ));

        App\Subbrand::create(array(
            'name'  => 'Holiday Inn Express',
            'order' => 4,
            'brand_id' => $brand->id,
            'old_id' => 'holidayinnexpress',
        ));

        App\Subbrand::create(array(
            'name'  => 'Hotel Indigo',
            'order' => 5,
            'brand_id' => $brand->id,
            'old_id' => 'hotelindigo',
        ));

        App\Subbrand::create(array(
            'name'  => 'Holiday Inn',
            'order' => 6,
            'brand_id' => $brand->id,
            'old_id' => 'holidayinn',
        ));

        App\Subbrand::create(array(
            'name'  => 'Crowne Plaza',
            'order' => 7,
            'brand_id' => $brand->id,
            'old_id' => 'crowneplaza',
        ));

        App\Subbrand::create(array(
            'name'  => 'Hualuxe',
            'order' => 8,
            'brand_id' => $brand->id,
            'old_id' => 'hualuxe',
        ));

        App\Subbrand::create(array(
            'name'  => 'Intercontinental',
            'order' => 9,
            'brand_id' => $brand->id,
            'old_id' => 'intercontinental',
        ));

        $brand = App\Brand::create(array(
            'name'  => 'Marriott',
            'order' => 5,
            'points_name' => 'Marriott points',
            'marker_img' => 'marker-sprite-marriott.png',
            'old_id' => 'marriott',
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
            'old_id' => 'townplacesuites',
        ));

        App\Subbrand::create(array(
            'name'  => 'Residence Inn',
            'order' => 2,
            'brand_id' => $brand->id,
            'old_id' => 'residenceinn',
        ));

        App\Subbrand::create(array(
            'name'  => 'Springhill Suites',
            'order' => 3,
            'brand_id' => $brand->id,
            'old_id' => 'springhillsuites',
        ));

        App\Subbrand::create(array(
            'name'  => 'Fairfield Inn & Suites',
            'order' => 4,
            'brand_id' => $brand->id,
            'old_id' => 'fairfieldinnsuites',
        ));

        App\Subbrand::create(array(
            'name'  => 'Courtyard',
            'order' => 5,
            'brand_id' => $brand->id,
            'old_id' => 'courtyard',
        ));

        App\Subbrand::create(array(
            'name'  => 'AC Hotels',
            'order' => 6,
            'brand_id' => $brand->id,
            'old_id' => 'achotels',
        ));

        App\Subbrand::create(array(
            'name'  => 'Marriott',
            'order' => 7,
            'brand_id' => $brand->id,
            'old_id' => 'marriotthotels',
        ));

        App\Subbrand::create(array(
            'name'  => 'Renaissance',
            'order' => 8,
            'brand_id' => $brand->id,
            'old_id' => 'renaissance',
        ));

        App\Subbrand::create(array(
            'name'  => 'JW Marriott',
            'order' => 9,
            'brand_id' => $brand->id,
            'old_id' => 'jwmarriott',
        ));

        App\Subbrand::create(array(
            'name'  => 'Ritz Carlton',
            'order' => 10,
            'brand_id' => $brand->id,
            'old_id' => 'ritzcarlton',
        ));

        $brand = App\Brand::create(array(
            'name'  => 'Starwood',
            'order' => 6,
            'points_name' => 'Starpoints',
            'marker_img' => 'marker-sprite-starwood.png',
            'old_id' => 'starwood',
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
            'old_id' => 'fourpoints',
        ));

        App\Subbrand::create(array(
            'name'  => 'Aloft',
            'order' => 2,
            'brand_id' => $brand->id,
            'old_id' => 'aloft',
        ));

        App\Subbrand::create(array(
            'name'  => 'Element',
            'order' => 3,
            'brand_id' => $brand->id,
            'old_id' => 'element',
        ));

        App\Subbrand::create(array(
            'name'  => 'Sheraton',
            'order' => 4,
            'brand_id' => $brand->id,
            'old_id' => 'sheraton',
        ));

        App\Subbrand::create(array(
            'name'  => 'Westin',
            'order' => 5,
            'brand_id' => $brand->id,
            'old_id' => 'westin',
        ));

        App\Subbrand::create(array(
            'name'  => 'Le Meridien',
            'order' => 6,
            'brand_id' => $brand->id,
            'old_id' => 'lemeridien',
        ));

        App\Subbrand::create(array(
            'name'  => 'W Hotels',
            'order' => 7,
            'brand_id' => $brand->id,
            'old_id' => 'whotels',
        ));

        App\Subbrand::create(array(
            'name'  => 'The Luxury Collection',
            'order' => 8,
            'brand_id' => $brand->id,
            'old_id' => 'luxurycollection',
        ));

        App\Subbrand::create(array(
            'name'  => 'St Regis',
            'order' => 9,
            'brand_id' => $brand->id,
            'old_id' => 'stregis',
        ));

        // Seed hotels

        $reader = Reader::createFromPath(storage_path('app/migrate.csv'), 'r');
        $reader->setHeaderOffset(0);
        $hotels = (new Statement())->process($reader);

        $i = 0;
        foreach ($hotels as $hotel) {
            if ($hotel["category"]) {
                $brand = App\Brand::where('old_id', $hotel["brand"])->firstOrFail();
                $subbrand = App\Subbrand::where('old_id', $hotel["subbrand"])->firstOrFail();
                $category = App\Category::where(['brand_id' => $brand->id, 'order' => $hotel["category"]])->firstOrFail();

                App\Hotel::create(array(
                    'name'  => $hotel["name"],
                    'address'  => $hotel["address"],
                    'link'  => $hotel["link"],
                    'latitude'  => $hotel["lat"],
                    'longitude'  => $hotel["long"],
                    'brand_id'  => $brand->id,
                    'subbrand_id'  => $subbrand->id,
                    'category_id'  => $category->id,
                    'display'  => true,
                ));
                if (!(++$i % 500)) {
                    $this->command->info($i.' hotels created');
                }
            }
        }
        $this->command->info('Job\'s done, '.$i.' total hotels created');
    }
}
