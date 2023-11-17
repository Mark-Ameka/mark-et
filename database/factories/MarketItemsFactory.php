<?php

namespace Database\Factories;

use \App\Models\MarketItems;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MarketItems>
 */
class MarketItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = MarketItems::class;

    public function generate_countries() {
        $countries = [
            "Afghanistan", "Albania", "Algeria", "Andorra", "Angola",
            "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
            "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados",
            "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
            "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei",
            "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia",
            "Cameroon", "Canada", "Central African Republic", "Chad", "Chile",
            "China", "Colombia", "Comoros", "Congo", "Costa Rica",
            "Croatia", "Cuba", "Cyprus", "Czechia", "Denmark",
            "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt",
            "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini",
            "Ethiopia", "Fiji", "Finland", "France", "Gabon",
            "Gambia", "Georgia", "Germany", "Ghana", "Greece",
            "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana",
            "Haiti", "Honduras", "Hungary", "Iceland", "India",
            "Indonesia", "Iran", "Iraq", "Ireland", "Israel",
            "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan",
            "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kosovo",
            "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon",
            "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania",
            "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives",
            "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius",
        ];
    
        $random_countries = $countries[array_rand($countries)];
    
        return 'Imported from'. ' ' . $random_countries;
    }

    public function definition(): array
    {
        $items = [
            "Coffee Mug", "Laptop Stand", "Backpack", "Water Bottle", "Headphones",
            "Sunglasses", "Blender", "Air Purifier", "Scarf", "Coffee Maker",
            "Smart TV", "Gaming Mouse", "Yoga Mat", "Suitcase", "Bluetooth Speaker",
            "Perfume", "Hair Dryer", "VR Headset", "Skincare Set", "Power Bank",
            "Air Freshener", "Potted Plant", "Laptop Bag", "Wall Art", "Essential Oils",
            "Fitness Tracker", "Nightstand Lamp", "Wireless Charger", "Pillowcase", "Wind Chimes",
            "Garden Kit", "Candles", "Star Projector", "Plant Stand", "Tea Set",
            "Skincare Mask", "Nail Polish Set", "Diffuser", "Fountain Pen", "Meditation Cushion",
            "Music Box", "Puzzle Board Game", "Phone Stand", "Bath Salts", "Desk Organizer",
            "Coloring Book", "Perfume Set", "Meditation Bowl", "Flower Vase", "Night Light",
            "Laptop Stand", "Candle Trio", "Galaxy Notebook", "Music Playlist", "Herb Garden Kit",
            "Oil Diffuser", "Crystal Collection", "Desk Organizer", "Facial Mist", "Baby Blanket",
            "Cooking Set", "Sleep Mask", "Bathrobe", "Desk Lamp", "Yoga Block",
            "Laptop Sleeve", "Jewelry Box", "Bath Bomb Set", "Pen Holder", "Body Lotion",
            "Baby Onesies", "Spice Rack", "Sleep Aid", "Eye Mask", "Galaxy Mug",
            "Yoga Strap", "Laptop Skin", "Bracelet", "Bubble Bath", "Desk Clock",
            "Hand Cream", "Baby Bibs", "Cookware Set", "Sound Machine", "Sleep Tea",
            "Galaxy Coasters", "Yoga Towel", "Laptop Mouse", "Earrings", "Body Scrub",
            "Desk Calendar", "Perfume Roller", "Baby Mobile", "Apron", "Sleep Journal",
            "Sleep Mask", "Galaxy Puzzle", "Yoga Mat Bag", "Laptop Decal", "Necklace"
        ];

        return [
            'seller_id' => $this->faker->numberBetween(1, 7), // Assuming there are 10 sellers
            'item_name' => $this->faker->randomElement($items),
            'item_description' => $this->generate_countries(),
            'item_qty' => $this->faker->numberBetween(30, 500),
            'item_price' => $this->faker->randomFloat(2, 1, 1000), // Generating a random float between 1 and 1000
        ];
    }
}
