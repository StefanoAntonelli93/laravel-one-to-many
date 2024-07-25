<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // svuoto tabella per non duplicare seed
        Type::truncate();

        // popolo type con array
        $types = ['Sviluppo software', 'Progetti di ristrutturazione', 'Ricerca scientifica', 'Sviluppo di nuovi farmaci e terapie'];

        // ciclo per creare type

        foreach ($types as $type) {
            $new_type = new Type();

            $new_type->name = $type;
            $new_type->slug = Str::of($new_type->name)->slug();

            // salvo e lancio istanze nel db
            $new_type->save();
        }
    }
}
