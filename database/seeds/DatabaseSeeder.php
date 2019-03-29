<?php

use Illuminate\Database\Seeder;
use paineladm\User;
use paineladm\Empresa;
use paineladm\Funcionario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create(
            ['nome' => 'APPLE',
            'email' => 'contact@apple.com',
            'logo'  => 'apple.jpg',
            'website' => 'www.apple.com'
        ]);

        Empresa::create(
            ['nome' => 'GOOGLE',
            'email' => 'contact@google.com',
            'logo'  => 'google.jpg',
            'website' => 'www.google.com'
        ]);

        Empresa::create(
            ['nome' => 'IBM',
            'email' => 'contact@ibm.com',
            'logo'  => 'ibm.jpg',
            'website' => 'www.ibm.com'
        ]);

        Funcionario::create(
            ['nome' => 'Daniel Honorio de Oliveira',
            'email' => 'daniel.honorio@ibm.com',
            'telefone'  => '12988660440',
            'cpf' => '22222222222',
            'empresa_id' => '1'
        ]);

        Funcionario::create(
            ['nome' => 'José da Cunha',
            'email' => 'jose.cunha@ibm.com',
            'telefone'  => '1233333333',
            'cpf' => '88888888888',
            'empresa_id' => '1'
        ]);

        User::create(
            ['name' => 'administrador',
            'email' => 'administrador@laravel.com',
            'password'  => Hash::make('laravel123')
        ]);


    }
}
