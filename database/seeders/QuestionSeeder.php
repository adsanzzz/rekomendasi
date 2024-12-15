<?php
database/seeders/QuestionSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        Question::insert([
            ['question' => 'Seberapa sering kulit Anda berminyak?', 'parameter' => 'oil_production'],
            ['question' => 'Seberapa sensitif kulit Anda terhadap produk baru?', 'parameter' => 'sensitivity'],
            ['question' => 'Seberapa sering Anda mengalami jerawat?', 'parameter' => 'acne_frequency'],
            ['question' => 'Bagaimana tingkat kelembapan kulit Anda?', 'parameter' => 'moisture_level'],
        ]);
    }
}
