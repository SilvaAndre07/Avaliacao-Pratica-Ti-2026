<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Startup;
use Illuminate\Support\Carbon;

class StartupSeeder extends Seeder
{
    public function run(): void
    {
        $startups = [
            [
                'nome' => 'TechNova',
                'setor' => 'Fintech',
                'email_contato' => 'contato@technova.com',
            ],
            [
                'nome' => 'GreenFuture',
                'setor' => 'Sustainability',
                'email_contato' => 'hello@greenfuture.io',
            ],
            [
                'nome' => 'HealthPlus',
                'setor' => 'HealthTech',
                'email_contato' => 'contact@healthplus.com',
            ],
            [
                'nome' => 'EduSmart',
                'setor' => 'EdTech',
                'email_contato' => 'info@edusmart.com',
            ],
        ];

        foreach ($startups as $startup) {
            Startup::create([
                'nome'           => $startup['nome'],
                'setor'          => $startup['setor'],
                'email_contato'  => $startup['email_contato'],
                'data_cadastro'  => Carbon::now()->subDays(rand(0, 30)),
            ]);
        }
    }
}
