<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Clothing',
            'Home & Garden',
            'Sports & Outdoors',
            'Books',
            'Toys & Games',
            'Beauty & Personal Care',
            'Automotive',
            'Food & Grocery',
            'Health & Wellness'
        ];

        \DB::table('products')->truncate();

        $products = [
            ['name' => 'iPhone 15 Pro Max', 'description' => 'Latest Apple smartphone with titanium design and advanced camera system', 'price' => 1199.99, 'category' => $categories[0]],
            ['name' => 'Samsung Galaxy S24 Ultra', 'description' => 'Premium Android phone with S Pen and AI features', 'price' => 1099.99, 'category' => $categories[0]],
            ['name' => 'MacBook Air M3', 'description' => 'Ultra-thin laptop with powerful M3 chip and all-day battery', 'price' => 1299.00, 'category' => $categories[0]],
            ['name' => 'Dell XPS 15', 'description' => 'Professional laptop with 4K OLED display and RTX graphics', 'price' => 1899.99, 'category' => $categories[0]],
            ['name' => 'Sony WH-1000XM5', 'description' => 'Industry-leading noise canceling wireless headphones', 'price' => 399.99, 'category' => $categories[0]],
            ['name' => 'iPad Pro 12.9', 'description' => 'Powerful tablet with ProMotion display and M-series chip', 'price' => 1399.00, 'category' => $categories[0]],
            ['name' => 'Surface Laptop 7', 'description' => 'Sleek Windows laptop with Copilot+ and long battery life', 'price' => 1599.00, 'category' => $categories[0]],
            ['name' => 'Google Pixel 9 Pro', 'description' => 'Android flagship with exceptional camera and AI features', 'price' => 999.00, 'category' => $categories[0]],
            ['name' => 'AirPods Pro (2nd Gen)', 'description' => 'Wireless earbuds with active noise cancelation', 'price' => 249.00, 'category' => $categories[0]],
            ['name' => 'Kindle Paperwhite', 'description' => 'Waterproof e-reader with adjustable warm light', 'price' => 149.99, 'category' => $categories[0]],
            ['name' => 'Logitech MX Master 3S', 'description' => 'Ergonomic wireless mouse with MagSpeed scroll', 'price' => 99.99, 'category' => $categories[0]],
            ['name' => 'Razer Blade 16', 'description' => 'High-performance gaming laptop with RTX graphics', 'price' => 2799.99, 'category' => $categories[0]],
            ['name' => 'LG C3 OLED TV 55"', 'description' => 'Ultra-thin 4K OLED TV with perfect blacks', 'price' => 1399.99, 'category' => $categories[0]],
            ['name' => 'Sonos One (Gen 2)', 'description' => 'Smart speaker with rich sound and voice control', 'price' => 219.00, 'category' => $categories[0]],
            ['name' => 'Anker PowerCore 20000', 'description' => 'High-capacity portable charger with fast charging', 'price' => 59.99, 'category' => $categories[0]],
            ['name' => "Levi's 501 Original Jeans", 'description' => 'Classic straight fit denim jeans with button fly', 'price' => 89.50, 'category' => $categories[1]],
            ['name' => 'Nike Air Max 270', 'description' => 'Comfortable running shoes with Max Air unit', 'price' => 150.00, 'category' => $categories[1]],
            ['name' => 'Adidas Ultraboost 22', 'description' => 'Responsive running shoes with energy-returning cushioning', 'price' => 190.00, 'category' => $categories[1]],
            ['name' => 'Patagonia Better Sweater Jacket', 'description' => 'Warm fleece jacket made from recycled materials', 'price' => 149.00, 'category' => $categories[1]],
            ['name' => 'Uniqlo Heattech T-Shirt', 'description' => 'Thermal innerwear that retains body heat', 'price' => 19.90, 'category' => $categories[1]],
            ['name' => 'H&M Classic Hoodie', 'description' => 'Soft cotton hoodie for everyday comfort', 'price' => 29.99, 'category' => $categories[1]],
            ['name' => 'The North Face ThermoBall Jacket', 'description' => 'Lightweight insulated jacket for cold weather', 'price' => 199.00, 'category' => $categories[1]],
            ['name' => 'Dr. Martens 1460 Boots', 'description' => 'Iconic leather boots with durable construction', 'price' => 169.99, 'category' => $categories[1]],
            ['name' => 'Converse Chuck Taylor', 'description' => 'Classic canvas sneakers with timeless style', 'price' => 60.00, 'category' => $categories[1]],
            ['name' => 'Columbia Rain Jacket', 'description' => 'Waterproof shell for hiking and city wear', 'price' => 89.99, 'category' => $categories[1]],
            ['name' => 'Dyson V15 Detect', 'description' => 'Cordless vacuum with laser dust detection technology', 'price' => 749.99, 'category' => $categories[2]],
            ['name' => 'KitchenAid Stand Mixer', 'description' => 'Professional 5-quart mixer with 10 speeds', 'price' => 449.99, 'category' => $categories[2]],
            ['name' => 'Instant Pot Duo Plus', 'description' => '9-in-1 pressure cooker with yogurt maker', 'price' => 149.99, 'category' => $categories[2]],
            ['name' => 'Nest Learning Thermostat', 'description' => 'Smart thermostat that programs itself', 'price' => 249.00, 'category' => $categories[2]],
            ['name' => 'Herman Miller Aeron Chair', 'description' => 'Ergonomic office chair with PostureFit SL support', 'price' => 1495.00, 'category' => $categories[2]],
            ['name' => 'Philips Hue Starter Kit', 'description' => 'Smart lighting kit with bridge and bulbs', 'price' => 199.99, 'category' => $categories[2]],
            ['name' => 'Ninja Air Fryer', 'description' => 'Countertop air fryer with rapid air technology', 'price' => 129.99, 'category' => $categories[2]],
            ['name' => 'iRobot Roomba j7+', 'description' => 'Robot vacuum with self-emptying dock', 'price' => 799.99, 'category' => $categories[2]],
            ['name' => 'Brita Water Pitcher', 'description' => 'Filtered water pitcher with replaceable cartridge', 'price' => 39.99, 'category' => $categories[2]],
            ['name' => 'Lodge Cast Iron Skillet', 'description' => 'Pre-seasoned skillet for perfect searing', 'price' => 29.99, 'category' => $categories[2]],
            ['name' => 'YETI Tundra 65 Cooler', 'description' => 'Heavy-duty cooler that keeps ice for days', 'price' => 375.00, 'category' => $categories[3]],
            ['name' => 'Garmin Fenix 7X', 'description' => 'Multisport GPS watch with solar charging', 'price' => 899.99, 'category' => $categories[3]],
            ['name' => 'The North Face Base Camp Duffel', 'description' => 'Durable expedition duffel with weather-resistant fabric', 'price' => 149.00, 'category' => $categories[3]],
            ['name' => 'Wilson Pro Staff Tennis Racket', 'description' => 'Professional-grade tennis racket used by champions', 'price' => 249.99, 'category' => $categories[3]],
            ['name' => 'Peloton Bike+', 'description' => 'Connected fitness bike with rotating screen', 'price' => 2495.00, 'category' => $categories[3]],
            ['name' => 'Trek Marlin 7 Mountain Bike', 'description' => 'Trail-ready mountain bike with hydraulic brakes', 'price' => 999.00, 'category' => $categories[3]],
            ['name' => 'Adidas FIFA Soccer Ball', 'description' => 'Professional-grade match soccer ball', 'price' => 39.99, 'category' => $categories[3]],
            ['name' => 'Coleman Camping Tent (4-Person)', 'description' => 'Weatherproof dome tent for weekend camping', 'price' => 149.99, 'category' => $categories[3]],
            ['name' => 'Hydro Flask 32oz', 'description' => 'Insulated stainless steel bottle for outdoor use', 'price' => 49.95, 'category' => $categories[3]],
            ['name' => 'Black Diamond Spot Headlamp', 'description' => 'Bright headlamp with multiple light modes', 'price' => 39.99, 'category' => $categories[3]],
            ['name' => 'Atomic Habits by James Clear', 'description' => 'Bestselling book on building good habits', 'price' => 18.99, 'category' => $categories[4]],
            ['name' => 'The Great Gatsby by F. Scott Fitzgerald', 'description' => 'Classic American novel about the Jazz Age', 'price' => 14.99, 'category' => $categories[4]],
            ['name' => 'Educated by Tara Westover', 'description' => 'Memoir about education and family', 'price' => 16.99, 'category' => $categories[4]],
            ['name' => 'Harry Potter Box Set', 'description' => 'Complete 7-book series in hardcover', 'price' => 155.00, 'category' => $categories[4]],
            ['name' => 'The Body Keeps the Score', 'description' => 'Book on trauma and healing', 'price' => 19.99, 'category' => $categories[4]],
            ['name' => '1984 by George Orwell', 'description' => 'Dystopian novel exploring surveillance and control', 'price' => 12.99, 'category' => $categories[4]],
            ['name' => 'To Kill a Mockingbird', 'description' => 'Classic novel on justice and moral growth', 'price' => 10.99, 'category' => $categories[4]],
            ['name' => 'Sapiens by Yuval Noah Harari', 'description' => 'History of humankind from evolution to present', 'price' => 22.99, 'category' => $categories[4]],
            ['name' => 'Dune by Frank Herbert', 'description' => 'Epic science fiction saga set on Arrakis', 'price' => 18.50, 'category' => $categories[4]],
            ['name' => 'Becoming by Michelle Obama', 'description' => 'Memoir from the former First Lady', 'price' => 19.99, 'category' => $categories[4]],
            ['name' => 'LEGO Star Wars Millennium Falcon', 'description' => 'Detailed 7541-piece building set', 'price' => 849.99, 'category' => $categories[5]],
            ['name' => 'Barbie Dreamhouse', 'description' => '3-story dollhouse with 70+ accessories', 'price' => 199.99, 'category' => $categories[5]],
            ['name' => 'Nintendo Switch OLED', 'description' => 'Gaming console with vibrant OLED screen', 'price' => 349.99, 'category' => $categories[5]],
            ['name' => 'Hot Wheels Ultimate Garage', 'description' => 'Massive playset with 36 parking spots', 'price' => 99.99, 'category' => $categories[5]],
            ['name' => "Rubik's Cube", 'description' => 'Classic 3x3 puzzle cube', 'price' => 12.99, 'category' => $categories[5]],
            ['name' => 'Monopoly Classic', 'description' => 'Family board game with houses, hotels, and chance cards', 'price' => 21.99, 'category' => $categories[5]],
            ['name' => 'Catan Base Game', 'description' => 'Strategy board game of trading and building', 'price' => 44.99, 'category' => $categories[5]],
            ['name' => 'Nerf Elite Blaster', 'description' => 'Foam dart blaster for action play', 'price' => 24.99, 'category' => $categories[5]],
            ['name' => 'Play-Doh 24-Pack', 'description' => 'Colorful modeling compound for kids', 'price' => 19.99, 'category' => $categories[5]],
            ['name' => 'LEGO Technic Bugatti Chiron', 'description' => 'Advanced building set with realistic details', 'price' => 349.99, 'category' => $categories[5]],
            ['name' => 'La Mer Crème de la Mer', 'description' => 'Luxury moisturizing cream with Miracle Broth', 'price' => 380.00, 'category' => $categories[6]],
            ['name' => 'Olaplex No. 3 Hair Perfector', 'description' => 'Treatment that reduces breakage and strengthens hair', 'price' => 28.00, 'category' => $categories[6]],
            ['name' => 'Estée Lauder Advanced Night Repair', 'description' => 'Anti-aging serum for radiant skin', 'price' => 105.00, 'category' => $categories[6]],
            ['name' => 'Dyson Airwrap', 'description' => 'Multi-styler that curls, waves, and smooths', 'price' => 599.99, 'category' => $categories[6]],
            ['name' => 'Glossier Boy Brow', 'description' => 'Cult-favorite brow grooming pomade', 'price' => 16.00, 'category' => $categories[6]],
            ['name' => 'Maybelline Lash Sensational Mascara', 'description' => 'Volumizing mascara for bold lashes', 'price' => 11.99, 'category' => $categories[6]],
            ['name' => 'NARS Velvet Matte Lipstick', 'description' => 'Rich pigment lipstick with matte finish', 'price' => 28.00, 'category' => $categories[6]],
            ['name' => 'The Ordinary Niacinamide 10%', 'description' => 'Serum for blemish-prone skin', 'price' => 6.50, 'category' => $categories[6]],
            ['name' => 'Philips Sonicare Toothbrush', 'description' => 'Electric toothbrush with multiple modes', 'price' => 59.99, 'category' => $categories[6]],
            ['name' => 'Panasonic Nanoe Hair Dryer', 'description' => 'Powerful dryer with moisture infusion', 'price' => 129.99, 'category' => $categories[6]],
            ['name' => 'Rain-X Windshield Treatment', 'description' => 'Repels rain and improves visibility', 'price' => 8.99, 'category' => $categories[7]],
            ['name' => 'Michelin CrossClimate 2 Tires', 'description' => 'All-weather tires with exceptional grip', 'price' => 189.99, 'category' => $categories[7]],
            ['name' => 'Chemical Guys Car Wash Kit', 'description' => 'Complete detailing kit for car enthusiasts', 'price' => 69.99, 'category' => $categories[7]],
            ['name' => 'Garmin Dash Cam 67W', 'description' => 'Wide-angle dash cam with voice control', 'price' => 299.99, 'category' => $categories[7]],
            ['name' => 'NOCO Boost Plus Jump Starter', 'description' => 'Portable jump starter with USB charging', 'price' => 99.99, 'category' => $categories[7]],
            ['name' => 'Meguiar’s Ultimate Liquid Wax', 'description' => 'Premium car wax for deep shine and protection', 'price' => 24.99, 'category' => $categories[7]],
            ['name' => 'Magnetic Car Phone Mount', 'description' => 'Dashboard mount with strong magnetic hold', 'price' => 15.99, 'category' => $categories[7]],
            ['name' => 'Portable Tire Inflator', 'description' => 'Compact air compressor for car tires', 'price' => 49.99, 'category' => $categories[7]],
            ['name' => 'LED Headlight Bulbs H11', 'description' => 'Bright low-power automotive LED bulbs', 'price' => 39.99, 'category' => $categories[7]],
            ['name' => 'WeatherTech Floor Mats', 'description' => 'Custom-fit floor liners for vehicles', 'price' => 129.99, 'category' => $categories[7]],
            ['name' => 'Blue Bottle Coffee Beans', 'description' => 'Premium whole bean coffee from Ethiopia', 'price' => 22.00, 'category' => $categories[8]],
            ['name' => 'Olive Oil Extra Virgin', 'description' => 'Cold-pressed organic olive oil from Italy', 'price' => 34.99, 'category' => $categories[8]],
            ['name' => 'Sourdough Bread', 'description' => 'Fresh-baked artisan sourdough loaf', 'price' => 7.50, 'category' => $categories[8]],
            ['name' => 'Kombucha Variety Pack', 'description' => 'Assorted flavors of probiotic tea', 'price' => 45.99, 'category' => $categories[8]],
            ['name' => 'Organic Quinoa', 'description' => 'High-protein gluten-free grain', 'price' => 12.99, 'category' => $categories[8]],
            ['name' => 'Almond Butter (16oz)', 'description' => 'Creamy nut butter made from roasted almonds', 'price' => 9.99, 'category' => $categories[8]],
            ['name' => 'Raw Organic Honey', 'description' => 'Unfiltered honey in glass jar', 'price' => 12.49, 'category' => $categories[8]],
            ['name' => 'Ceremonial Matcha Powder', 'description' => 'Premium green tea powder for lattes', 'price' => 24.99, 'category' => $categories[8]],
            ['name' => 'Italian Pasta Variety Pack', 'description' => 'Assorted durum wheat pasta shapes', 'price' => 16.99, 'category' => $categories[8]],
            ['name' => '70% Dark Chocolate Bars', 'description' => 'Rich cocoa bars with minimal sugar', 'price' => 4.99, 'category' => $categories[8]],
            ['name' => 'Vitamix Blender', 'description' => 'Professional-grade blender for smoothies', 'price' => 449.99, 'category' => $categories[9]],
            ['name' => 'Peloton Guide', 'description' => 'AI-powered strength training device', 'price' => 295.00, 'category' => $categories[9]],
            ['name' => 'Fitbit Charge 6', 'description' => 'Advanced fitness tracker with GPS', 'price' => 159.99, 'category' => $categories[9]],
            ['name' => 'Theragun Elite', 'description' => 'Percussive massage therapy device', 'price' => 399.99, 'category' => $categories[9]],
            ['name' => 'Hydro Flask Water Bottle', 'description' => 'Insulated stainless steel bottle', 'price' => 44.95, 'category' => $categories[9]],
            ['name' => 'Premium Yoga Mat', 'description' => 'Non-slip mat for yoga and pilates', 'price' => 29.99, 'category' => $categories[9]],
            ['name' => 'High-Density Foam Roller', 'description' => 'Muscle recovery roller for deep tissue massage', 'price' => 21.99, 'category' => $categories[9]],
            ['name' => 'Resistance Bands Set', 'description' => 'Stackable bands with door anchor', 'price' => 24.99, 'category' => $categories[9]],
            ['name' => 'Shiatsu Neck Massager', 'description' => 'Electric kneading massager with heat', 'price' => 49.99, 'category' => $categories[9]],
            ['name' => 'Memory Foam Sleep Mask', 'description' => 'Comfortable blackout eye mask', 'price' => 14.99, 'category' => $categories[9]],
        ];

        foreach ($products as $product) {
            \DB::table('products')->insert([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'category' => $product['category'],
                'stock_quantity' => fake()->numberBetween(0, 500),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

    }
}
