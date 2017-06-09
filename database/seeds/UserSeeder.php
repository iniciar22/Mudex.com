<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $u = new Shoppvel\User();
        $u->name = 'Diego Coelho';
        $u->email = 'diego_coelho@live.com';
        $u->cpf = '05599811980';
        $u->role = 'admin';
        $u->endereco='não lembro';
        $u->password = bcrypt('1234567');
        $u->save();
    }

}
