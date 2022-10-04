<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tenant;
use App\Models\User;
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

        if(tenant()){
            User::factory()->create([
                'name' => tenant()->id . ' dev',
                'email' => tenant()->id . '@example.com',
            ]);
        }else{
            $tenant1 = Tenant::create([
                'id' => "leadszapp",
                'name' => "Leadszapp",
                'logo' => "https://knowledge.leadszapp.com/img/leadszapp.png",
                "color" => "#3b82f1"
            ]);
            $tenant1->domains()->create(['domain' => 'leadszapp.test']);
        
            $tenant2 = Tenant::create([
                'id' => "growp",
                "name" => "Growp",
                "logo" => "https://knowledge.growp.app/img/growp.png",
                "color" => "#6266ec"
            ]);
            $tenant2->domains()->create(['domain' => 'growp.test']);
        }

    }
}
