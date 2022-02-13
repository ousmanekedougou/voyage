<?php

namespace Database\Seeders;

use App\Models\Admin\Siege;
use App\Models\User;
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
        User::create([
            'name' => 'Ousmane Diallo',
            'name_agence' => 'Terranga Transport',
            'email' => 'ousmane@gmail.com',
            'email_agence' => 'terranga@gmail.com',
            'phone' => '221770000000',
            'agence_phone' => '332359087',
            'adress' => 'Kedougou',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 2,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Terrange Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'image_agence' => null,
            'slogan' => 'Voyager en bonne compagnie',
            'user_id' => 1
        ]);


        User::create([
            'name' => 'Moussa Diallo',
            'name_agence' => 'Oriental Transport',
            'email' => 'moussa@gmail.com',
            'email_agence' => 'oriental@gmail.com',
            'phone' => '221780007000',
            'agence_phone' => '3423597087',
            'adress' => 'Kedougou',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 2,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Oriental Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'image_agence' => null,
            'slogan' => 'Votre bien etre notre priorite',
            'user_id' => 1
        ]);

        User::create([
            'name' => 'Amadou Keita',
            'name_agence' => 'Bassari Transport',
            'email' => 'keita@gmail.com',
            'email_agence' => 'bassari@gmail.com',
            'phone' => '221750060000',
            'agence_phone' => '34112059087',
            'adress' => 'Salemata',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 2,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Bassari Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'image_agence' => null,
            'slogan' => 'Faire du voyage votre passion',
            'user_id' => 1
        ]);

          User::create([
            'name' => 'Amadou Ba',
            'name_agence' => 'Saloum Transport',
            'email' => 'ba@gmail.com',
            'email_agence' => 'saloum@gmail.com',
            'phone' => '221781006009',
            'agence_phone' => '339000009',
            'adress' => 'Kaolack',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 2,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Saloum Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'image_agence' => null,
            'slogan' => 'Faire du voyage votre passion',
            'user_id' => 1
        ]);


        User::create([
            'name' => 'Tidjane Camara',
            'name_agence' => 'Niokolo Transport',
            'email' => 'camara@gmail.com',
            'email_agence' => 'niokolo@gmail.com',
            'phone' => '221781000070',
            'agence_phone' => '339000400',
            'adress' => 'Dakar',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 2,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Niokolo Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'image_agence' => null,
            'slogan' => 'Faire du voyage votre passion',
            'user_id' => 1
        ]);

         User::create([
            'name' => 'Hamady Cissokho',
            'name_agence' => 'Warraba Transport',
            'email' => 'cissokho@gmail.com',
            'email_agence' => 'warraba@gmail.com',
            'phone' => '22178104000',
            'agence_phone' => '339000056',
            'adress' => 'Dakar',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 2,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Warraba Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'image_agence' => null,
            'slogan' => 'Faire du voyage votre passion',
            'user_id' => 1
        ]);

        // Des agence sans sieges
         User::create([
            'name' => 'Lopeze Cissokho',
            'name_agence' => 'Tamba Transport',
            'email' => 'lopeze@gmail.com',
            'email_agence' => 'tamba@gmail.com',
            'phone' => '22378104000',
            'agence_phone' => '1339000056',
            'adress' => 'Tamba',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 2,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Warraba Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'image_agence' => null,
            'slogan' => 'Faire du voyage votre passion',
            'user_id' => 1
        ]);

          User::create([
            'name' => 'Ramatoulay Cissokho',
            'name_agence' => 'Louga Transport',
            'email' => 'ramatou@gmail.com',
            'email_agence' => 'louga@gmail.com',
            'phone' => '2247810111',
            'agence_phone' => '4439000056',
            'adress' => 'Louga',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 2,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Warraba Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'image_agence' => null,
            'slogan' => 'Faire du voyage votre passion',
            'user_id' => 1
        ]);

        User::create([
            'name' => 'Mortala sokho',
            'name_agence' => 'Matam Transport',
            'email' => 'mortala@gmail.com',
            'email_agence' => 'matam@gmail.com',
            'phone' => '2257810111',
            'agence_phone' => '5539000056',
            'adress' => 'Matam',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 2,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Warraba Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'image_agence' => null,
            'slogan' => 'Faire du voyage votre passion',
            'user_id' => 1
        ]);
        // Fin D'ajout des agences

      

        //Pour les sieges
            //Pour terranga 
            Siege::create([
                'name' => 'Dakar',
                'email' => 'terrangadakar@gmail.com',
                'phone' => '770702300',
                'adress' => 'Medina Rue 19x26',
                'user_id' => 3
            ]);   
            Siege::create([
                'name' => 'Kedougou',
                'email' => 'terrangakedougou@gmail.com',
                'phone' => '770002300',
                'adress' => 'Dalaba',
                'user_id' => 3
            ]);
            Siege::create([
                'name' => 'Ziguinchor',
                'email' => 'terrangaZiguinchor@gmail.com',
                'phone' => '770702901',
                'adress' => 'Bingniona',
                'user_id' => 3
            ]);       

            // Pour Oriental
             Siege::create([
            'name' => 'Dakar',
            'email' => 'orientaldakar@gmail.com',
            'phone' => '730791300',
            'adress' => 'Medina Rue 19x26',
            'user_id' => 4
        ]);   
        Siege::create([
            'name' => 'Kedougou',
            'email' => 'orientalkedougou@gmail.com',
            'phone' => '700602300',
            'adress' => 'Dalaba',
            'user_id' => 4
        ]);
        Siege::create([
            'name' => 'Ziguinchor',
            'email' => 'orientalZiguinchor@gmail.com',
            'phone' => '870502301',
            'adress' => 'Bingniona',
            'user_id' => 4
        ]);  

        // Bassari
          Siege::create([
            'name' => 'Dakar',
            'email' => 'bassaridakar@gmail.com',
            'phone' => '740701300',
            'adress' => 'Medina Rue 19x26',
            'user_id' => 5
        ]);   
        Siege::create([
            'name' => 'Kedougou',
            'email' => 'bassarikedougou@gmail.com',
            'phone' => '730602300',
            'adress' => 'Dalaba',
            'user_id' => 5
        ]);
        Siege::create([
            'name' => 'Ziguinchor',
            'email' => 'bassariZiguinchor@gmail.com',
            'phone' => '750502301',
            'adress' => 'Bingniona',
            'user_id' => 5
        ]); 

        // Saloum Transpor
          Siege::create([
            'name' => 'Dakar',
            'email' => 'saloumdakar@gmail.com',
            'phone' => '710701300',
            'adress' => 'Medina Rue 19x26',
            'user_id' => 6
        ]);   
        Siege::create([
            'name' => 'Kedougou',
            'email' => 'saloumkedougou@gmail.com',
            'phone' => '720602300',
            'adress' => 'Dalaba',
            'user_id' => 6
        ]);
        Siege::create([
            'name' => 'Ziguinchor',
            'email' => 'saloumZiguinchor@gmail.com',
            'phone' => '790582301',
            'adress' => 'Bingniona',
            'user_id' => 6
        ]); 

        // Pour Niokolo
          Siege::create([
            'name' => 'Dakar',
            'email' => 'niokolodakar@gmail.com',
            'phone' => '760701303',
            'adress' => 'Medina Rue 19x26',
            'user_id' => 7
        ]);   
        Siege::create([
            'name' => 'Kedougou',
            'email' => 'niokolokedougou@gmail.com',
            'phone' => '721602303',
            'adress' => 'Dalaba',
            'user_id' => 7
        ]);
        Siege::create([
            'name' => 'Ziguinchor',
            'email' => 'niokoloZiguinchor@gmail.com',
            'phone' => '750582303',
            'adress' => 'Bingniona',
            'user_id' => 7
        ]); 

        // Warraba
          Siege::create([
            'name' => 'Dakar',
            'email' => 'warrabadakar@gmail.com',
            'phone' => '790701303',
            'adress' => 'Medina Rue 19x26',
            'user_id' => 8
        ]);   
        Siege::create([
            'name' => 'Kedougou',
            'email' => 'warrabakedougou@gmail.com',
            'phone' => '720609303',
            'adress' => 'Dalaba',
            'user_id' => 8
        ]);
        Siege::create([
            'name' => 'Ziguinchor',
            'email' => 'warrabaZiguinchor@gmail.com',
            'phone' => '750552303',
            'adress' => 'Bingniona',
            'user_id' => 8
        ]); 


          // Ajout des Agents
        User::create([
            'name' => 'Mouhamadou Dansokho',
            'agence_name' => 'Terranga Transport',
            'email' => 'kaw@gmail.com',
            'email_agence' => 'terranga@gmail.com',
            'phone' => '2218823900',
            'agence_phone' => '002458976',
            'adress' => 'Kedougou',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 3,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Terrange Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'image_agence' => null,
            'slogan' => 'Voyager en bonne compagnie',
            'user_id' => 3,
            'siege_id' => 2,
            'role' => 1
        ]);

        User::create([
            'name' => 'Cheikhe Tidjiane',
            'agence_name' => 'Terranga Transport',
            'email' => 'cheikh@gmail.com',
            'email_agence' => 'terranga@gmail.com',
            'phone' => '2218823901',
            'agence_phone' => '082458976',
            'adress' => 'Dakar',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 3,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Terrange Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'image_agence' => null,
            'slogan' => 'Voyager en bonne compagnie',
            'user_id' => 3,
            'siege_id' => 1,
            'role' => 2
        ]);

        User::create([
            'name' => 'Moussa Khouma',
            'agence_name' => 'Terranga Transport',
            'email' => 'khouma@gmail.com',
            'email_agence' => 'terranga@gmail.com',
            'phone' => '22188276901',
            'agence_phone' => '0898458976',
            'adress' => 'Ziguinchor',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'is_admin' => 3,
            'slug' => str_replace('/','',Hash::make(Str::random(5).'Terrange Transport')),
            'confirmation_token' => null,
            'is_active' => 1,
            'logo' => null,
            'image_agence' => null,
            'slogan' => 'Voyager en bonne compagnie',
            'user_id' => 3,
            'siege_id' => 3,
            'role' => 3
        ]);
    }
}
