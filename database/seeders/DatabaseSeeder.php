<?php

namespace Database\Seeders;

use App\Models\Admin\About;
use App\Models\Admin\Agence;
use App\Models\Admin\Agent;
use App\Models\Admin\Bus;
use App\Models\Admin\Itineraire;
use App\Models\Admin\Jour;
use App\Models\Admin\Siege;
use App\Models\Admin\Ville;
use App\Models\User;
use App\Models\User\Customer;
use App\Models\User\Region;
use Faker\Factory;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $jours = [
            'Diamache' => 0, 
            'Lundi' => 1,
            'Mardin' => 2,
            'Mercredi' => 3,
            'Jeudi' => 4,
            'Vendredi' => 5,
            'Samdi' => 6
        ];
       foreach ($jours as $name => $index) {
            Jour::create([
                'name' => $name,
                'index' => $index
            ]);
       }

       $regions = [
            'Dakar','Kaolack','Thies',
            'Saint Louis','Diourbel',
            'Kedougou','Kolda','Fatick',
            'Matam','Zinguinchor','Sedhiou',
            'Tambacounda','Louga','Kafrine'
        ];

        foreach ($regions as $reg) {
            Region::create([
                'name' => $reg,
                'slug' => $reg,
                'status' => 1
            ]);
        }
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Ousmane Diallo',
            'email' => "toucki@gmail.com",
            'phone' => '221770900000',
            'adress' => 'Kedougou',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'status' => 1,
            'is_active' => 1,
            'is_admin' => 0,
            'slug' => str_replace('/','',Hash::make(Str::random(20).'admin/toucki@gmail.com')),
            'confirmation_token' => null
        ]);

        User::create([
            'name' => 'Oumar Barry',
            'email' => "barry@gmail.com",
            'phone' => '221780000001',
            'adress' => 'Kedougou',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'status' => 1,
            'is_active' => 1,
            'is_admin' => 1,
            'slug' => str_replace('/','',Hash::make(Str::random(20).'admin/barry@gmail.com')),
            'confirmation_token' => null
        ]);

        // Ajout des agences
        Agence::create([
            'name' => 'Terrenga Transport',
            'email' => 'terranga@gmail.com',
            'phone' => '221770000000',
            'adress' => 'Kedougou',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 0,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Terrange Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'slogan' => 'Voyager en bonne compagnie',
            'region_id' => 1,
            'method_ticket' => 0
        ]);


        Agence::create([
            'name' => 'Oriental Transport',
            'email' => 'oriental@gmail.com',
            'phone' => '221780007000',
            'adress' => 'Kedougou',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 0,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Oriental Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'slogan' => 'Votre bien etre notre priorite',
            'region_id' => 1,
            'method_ticket' => 1
        ]);

        Agence::create([
            'name' => 'Bassari Transport',
            'email' => 'bassari@gmail.com',
            'phone' => '221750060000',
            'adress' => 'Salemata',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 0,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Bassari Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'slogan' => 'Faire du voyage votre passion',
            'region_id' => 1,
            'method_ticket' => 0,
            'terme' => 1
        ]);

          Agence::create([
            'name' => 'Saloum Transport',
            'email' => 'saloum@gmail.com',
            'phone' => '221781006009',
            'adress' => 'Kaolack',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 0,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Saloum Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'slogan' => 'Faire du voyage votre passion',
            'region_id' => 6,
            'method_ticket' => 0,
            'terme' => 1
        ]);


        Agence::create([
            'name' => 'Niokolo Transport',
            'email' => 'niokolo@gmail.com',
            'phone' => '221781000070',
            'adress' => 'Dakar',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 0,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Niokolo Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'slogan' => 'Faire du voyage votre passion',
            'region_id' => 6,
            'method_ticket' => 1,
            'terme' => 1
        ]);

         Agence::create([
            'name' => 'Warraba Transport',
            'email' => 'warraba@gmail.com',
            'phone' => '22178104000',
            'adress' => 'Dakar',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 0,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Warraba Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'slogan' => 'Faire du voyage votre passion',
            'region_id' => 6,
            'method_ticket' => 0,
            'terme' => 1
        ]);

        // Des agence sans sieges
         Agence::create([
            'name' => 'Tamba Transport',
            'email' => 'tamba@gmail.com',
            'phone' => '22378104000',
            'adress' => 'Tamba',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 0,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Warraba Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'slogan' => 'Faire du voyage votre passion',
            'region_id' => 1,
            'method_ticket' => 1,
            'terme' => 1
        ]);

          Agence::create([
            'name' => 'Louga Transport',
            'email' => 'louga@gmail.com',
            'phone' => '2247810111',
            'adress' => 'Louga',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 0,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Warraba Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'slogan' => 'Faire du voyage votre passion',
            'region_id' => 1,
            'method_ticket' => 0,
            'terme' => 1
        ]);

        Agence::create([
            'name' => 'Matam Transport',
            'email' => 'matam@gmail.com',
            'phone' => '2257810111',
            'adress' => 'Matam',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 0,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Warraba Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'slogan' => 'Faire du voyage votre passion',
            'region_id' => 1,
            'method_ticket' => 1,
            'terme' => 1
        ]);
        // Fin D'ajout des agences

        $agences = Agence::all();

        foreach ($agences as $agence) {
            About::create([
                'abaout' => "Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.",

                'motivation' => "Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.",

                'politic_ticket' => "Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.",

                'politic_bc' => "Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.",

                'politic_apte' => "Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.",

                'ville_arret' => "Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.",

                'agence_id' => $agence->id,
            ]);
        }

      

        //Pour les sieges
            //Pour terranga 
            Siege::create([
                'name' => 'Dakar',
                'email' => 'terrangadakar@gmail.com',
                'phone' => '770702300',
                'adress' => 'Medina Rue 19x26',
                'agence_id' => 3,
                'jours' => serialize($jours),
                'opened_at' => "08:00:00",
                'closed_at' => "18:00:00",

            ]);   
            Siege::create([
                'name' => 'Kedougou',
                'email' => 'terrangakedougou@gmail.com',
                'phone' => '770002300',
                'adress' => 'Dalaba',
                'agence_id' => 3,
                'jours' => serialize($jours),
                'opened_at' => "08:00:00",
                'closed_at' => "18:00:00",

            ]);
            Siege::create([
                'name' => 'Ziguinchor',
                'email' => 'terrangaZiguinchor@gmail.com',
                'phone' => '770702901',
                'adress' => 'Bingniona',
                'agence_id' => 3,
                'jours' => serialize($jours),
                'opened_at' => "08:00:00",
                'closed_at' => "18:00:00",

            ]);       

            // Pour Oriental
             Siege::create([
            'name' => 'Dakar',
            'email' => 'orientaldakar@gmail.com',
            'phone' => '730791300',
            'adress' => 'Medina Rue 19x26',
            'agence_id' => 4,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]);   
        Siege::create([
            'name' => 'Kedougou',
            'email' => 'orientalkedougou@gmail.com',
            'phone' => '700602300',
            'adress' => 'Dalaba',
            'agence_id' => 4,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]);
        Siege::create([
            'name' => 'Ziguinchor',
            'email' => 'orientalZiguinchor@gmail.com',
            'phone' => '870502301',
            'adress' => 'Bingniona',
            'agence_id' => 4,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]);  

        // Bassari
          Siege::create([
            'name' => 'Dakar',
            'email' => 'bassaridakar@gmail.com',
            'phone' => '740701300',
            'adress' => 'Medina Rue 19x26',
            'agence_id' => 5,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]);   
        Siege::create([
            'name' => 'Kedougou',
            'email' => 'bassarikedougou@gmail.com',
            'phone' => '730602300',
            'adress' => 'Dalaba',
            'agence_id' => 5,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]);
        Siege::create([
            'name' => 'Ziguinchor',
            'email' => 'bassariZiguinchor@gmail.com',
            'phone' => '750502301',
            'adress' => 'Bingniona',
            'agence_id' => 5,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]); 

        // Saloum Transpor
          Siege::create([
            'name' => 'Dakar',
            'email' => 'saloumdakar@gmail.com',
            'phone' => '710701300',
            'adress' => 'Medina Rue 19x26',
            'agence_id' => 6,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]);   
        Siege::create([
            'name' => 'Kedougou',
            'email' => 'saloumkedougou@gmail.com',
            'phone' => '720602300',
            'adress' => 'Dalaba',
            'agence_id' => 6,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]);
        Siege::create([
            'name' => 'Ziguinchor',
            'email' => 'saloumZiguinchor@gmail.com',
            'phone' => '790582301',
            'adress' => 'Bingniona',
            'agence_id' => 6,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]); 

        // Pour Niokolo
          Siege::create([
            'name' => 'Dakar',
            'email' => 'niokolodakar@gmail.com',
            'phone' => '760701303',
            'adress' => 'Medina Rue 19x26',
            'agence_id' => 7,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]);   
        Siege::create([
            'name' => 'Kedougou',
            'email' => 'niokolokedougou@gmail.com',
            'phone' => '721602303',
            'adress' => 'Dalaba',
            'agence_id' => 7,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]);
        Siege::create([
            'name' => 'Ziguinchor',
            'email' => 'niokoloZiguinchor@gmail.com',
            'phone' => '750582303',
            'adress' => 'Bingniona',
            'agence_id' => 7,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]); 

        // Warraba
          Siege::create([
            'name' => 'Dakar',
            'email' => 'warrabadakar@gmail.com',
            'phone' => '790701303',
            'adress' => 'Medina Rue 19x26',
            'agence_id' => 8,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]);   
        Siege::create([
            'name' => 'Kedougou',
            'email' => 'warrabakedougou@gmail.com',
            'phone' => '720609303',
            'adress' => 'Dalaba',
            'agence_id' => 8,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]);
        Siege::create([
            'name' => 'Ziguinchor',
            'email' => 'warrabaZiguinchor@gmail.com',
            'phone' => '750552303',
            'adress' => 'Bingniona',
            'agence_id' => 8,
            'jours' => serialize($jours),
            'opened_at' => "08:00:00",
            'closed_at' => "18:00:00",

        ]); 


          // Ajout des Agents
        Agent::create([
            'name' => 'Mouhamadou Dansokho',
            'email' => 'kaw@gmail.com',
            'phone' => '2218823900',
            'adress' => 'Kedougou',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 0,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Terrange Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'agence_id' => 3,
            'siege_id' => 2,
            'role' => 1
        ]);

        Agent::create([
            'name' => 'Cheikhe Tidjiane',
            'email' => 'cheikh@gmail.com',
            'phone' => '2218823901',
            'adress' => 'Dakar',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 0,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Terrange Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'agence_id' => 3,
            'siege_id' => 1,
            'role' => 2
        ]);

        Agent::create([
            'name' => 'Moussa Khouma',
            'email' => 'khouma@gmail.com',
            'phone' => '22188276901',
            'adress' => 'Ziguinchor',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 0,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Terrange Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'agence_id' => 3,
            'siege_id' => 3,
            'role' => 3
        ]);

        $sieges = Siege::all();
        foreach ($sieges as $siege) {
            for ($i=0; $i < 4; $i++) { 
                Itineraire::create([
                    'name' => $faker->name,
                    'siege_id' => $siege->id
                ]);
            }

        }

        $itineraires = Itineraire::all();
        foreach ($itineraires as $itineraire) {
            for ($i=0; $i < 6; $i++) { 
                Ville::create([
                    'name' => $faker->city,
                    'amount' => $faker->numberBetween(3000 , 10000),
                    'itineraire_id' => $itineraire->id,
                ]);
            }

            for ($i=0; $i < 3; $i++) { 
                Bus::create([
                    'matricule' => 'MT'. $i .'/'. $itineraire->id,
                    'place' => 80,
                    'status' => 0,
                    'itineraire_id' => $itineraire->id,
                    'siege_id' => $itineraire->siege->id,
                    'number' => $i,
                    'heure_rv' => '15:30',
                    'heure_depart' => '16:30',
                ]);
            }
        }

        Customer::create([
            'name' => 'Ousmane Diallo',
            'email' => 'yabaye07@gmail.com',
            'phone' => 770003003,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'cni' => 1234567890456,
            'slug' => str_replace('/','',Hash::make(Str::random(20).'customers'.'yabaye07@gmail.com')),
            'confirmation_token' => null,
            'region_id' => 1,
            'is_admin' => 1,
            'is_active' => 1,
            'image' => null,
            'terme' => 1
        ]);

        Customer::create([
            'name' => 'Ousmane Diallo',
            'email' => 'yabaye075@gmail.com',
            'phone' => 770103003,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'cni' => 1234597890456,
            'slug' => str_replace('/','',Hash::make(Str::random(20).'customers'.'yabaye075@gmail.com')),
            'confirmation_token' => null,
            'region_id' => 1,
            'is_admin' => 1,
            'is_active' => 1,
            'image' => null,
            'terme' => 1
        ]);
    }
}
