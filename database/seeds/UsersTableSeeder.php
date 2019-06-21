<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'nome' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'descricao' => Str::random(80),
            'imagem'  => '0',
            'password' => '0',
        ]);
    }
}
