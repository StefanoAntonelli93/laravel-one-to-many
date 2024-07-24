<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// importo faker
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    //  parametri della funzione instanza $faker
    public function run(Faker $faker): void
    {
        // metodo truncate per non duplicare seed
        Project::truncate();

        // creo array per status
        $statusOptions = ['completato', 'in corso', 'in attesa', 'cancellato'];

        // ciclo for per creare 50 project con faker
        for ($i = 0; $i < 50; $i++) {
            // importo model
            $project = new Project();
            // creo instanze con faker
            $project->name = $faker->sentence(2);
            $project->slug = Str::of($project->name)->slug();
            $project->description = $faker->text();
            $project->project_start_date = $faker->date();
            $project->project_end_date = $faker->date();
            // per status creo array + randomElement
            $project->status = $faker->randomElement($statusOptions);
            $project->budget = $faker->randomFloat(2);
            $project->project_manager = $faker->numerify('user-####');
            $project->customer = $faker->numerify('user-####');
            // data di creazione-->ultimi 2 anni
            $project->creation_date = $faker->dateTimeBetween('-2 years', 'now');
            //data di aggiornamento->dopo la data di creazione ad ora
            $project->update_date = $faker->dateTimeBetween($project->creation_date, 'now');

            // verifico con dd se slug funziona
            // dd($project->slug);

            // salvo e lancio istanze nel db
            $project->save();
        }
    }
}
