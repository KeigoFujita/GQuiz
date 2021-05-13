<?php

use App\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // {"id":"1","department_id":"1","role_name":"Teacher"},
        // {"id":"2","department_id":"2","role_name":"Registrar"},
        // {"id":"3","department_id":"5","role_name":"Librarian"},
        // {"id":"4","department_id":"4","role_name":"OSA Officer"},
        // {"id":"5","department_id":"3","role_name":"Cashier"},
        // {"id":"6","department_id":"6","role_name":"Marketing Head"}

        // $employee = Employee::create([
        //     'first_name' => 'Mark Jovan',
        //     'middle_name' => 'Reyes',
        //     'last_name' => 'Carsido',
        //     'mobile_number' => '9128125911',
        //     'gender' => 'male'
        // ]);
        // $employee->roles()->sync('1');

        // $employee = Employee::create([
        //     'first_name' => 'Venus',
        //     'middle_name' => 'Raj',
        //     'last_name' => 'Malit',
        //     'mobile_number' => '9126125789',
        //     'gender' => 'female'
        // ]);

        // $employee->roles()->sync('2');


        // $employee = Employee::create([
        //     'first_name' => 'Ralph',
        //     'middle_name' => 'Recto',
        //     'last_name' => 'De Castro',
        //     'mobile_number' => '91261247891',
        //     'gender' => 'male'
        // ]);
        // $employee->roles()->sync('1');

        // $employee = Employee::create([
        //     'first_name' => 'Lorelei',
        //     'middle_name' => 'Tupaz',
        //     'last_name' => 'Zapanta',
        //     'mobile_number' => '9123567890',
        //     'gender' => 'female'
        // ]);
        // $employee->roles()->sync('5');



        // $employee = Employee::create([
        //     'first_name' => 'Rona',
        //     'middle_name' => 'Cojuanco',
        //     'last_name' => 'Librarian',
        //     'mobile_number' => '9102386895',
        //     'gender' => 'female'
        // ]);

        // $employee->roles()->sync('1');


        // $employee = Employee::create([
        //     'first_name' => 'Issay',
        //     'middle_name' => 'Sotto',
        //     'last_name' => 'Ambas',
        //     'mobile_number' => '9123678901',
        //     'gender' => 'female'
        // ]);
        // $employee->roles()->attach('6');


        // $employee = Employee::create([
        //     'first_name' => 'Philip Jayson',
        //     'middle_name' => 'Rickets',
        //     'last_name' => 'Cortes',
        //     'mobile_number' => '9123789012',
        //     'gender' => 'male'
        // ]);
        // $employee->roles()->attach('1');


        // $employee = Employee::create([
        //     'first_name' => 'Jim',
        //     'middle_name' => 'Locsin',
        //     'last_name' => 'Guab',
        //     'mobile_number' => '9123890123',
        //     'gender' => 'female'
        // ]);
        // $employee->roles()->attach('1');


        // $employee = Employee::create([
        //     'first_name' => 'Argee',
        //     'middle_name' => 'Nino',
        //     'last_name' => 'Presto',
        //     'mobile_number' => '9123901234',
        //     'gender' => 'male'
        // ]);
        // $employee->roles()->attach('1');


        // $employee = Employee::create([
        //     'first_name' => 'Lydia',
        //     'middle_name' => 'Soberano',
        //     'last_name' => 'Cajucom',
        //     'mobile_number' => '9123012345',
        //     'gender' => 'female'
        // ]);
        // $employee->roles()->attach('1');


        // $employee = Employee::create([
        //     'first_name' => 'Albert',
        //     'middle_name' => 'Dalisay',
        //     'last_name' => 'Mamaril',
        //     'mobile_number' => '9123123456',
        //     'gender' => 'male'
        // ]);
        // $employee->roles()->attach('1');


        // $employee = Employee::create([
        //     'first_name' => 'Leah',
        //     'middle_name' => 'Vecencio',
        //     'last_name' => 'Grabillo',
        //     'mobile_number' => '9123234567',
        //     'gender' => 'female'
        // ]);
        // $employee->roles()->attach('1');


        // $employee = Employee::create([
        //     'first_name' => 'Amado',
        //     'middle_name' => 'de Leon',
        //     'last_name' => 'Ramos',
        //     'mobile_number' => '9123345678',
        //     'gender' => 'male'
        // ]);
        // $employee->roles()->attach('1');


        // $employee = Employee::create([
        //     'first_name' => 'Johnny',
        //     'middle_name' => 'Estregan',
        //     'last_name' => 'Yanguas',
        //     'mobile_number' => '9124567890',
        //     'gender' => 'male'
        // ]);
        // $employee->roles()->attach('1');


        // $employee = Employee::create([
        //     'first_name' => 'Samson',
        //     'middle_name' => 'Delailah',
        //     'last_name' => 'Baloaloa',
        //     'mobile_number' => '9124678901',
        //     'gender' => 'male'
        // ]);
        // $employee->roles()->attach('1');


        // $employee = Employee::create([
        //     'first_name' => 'Ralph',
        //     'middle_name' => 'Cuenca',
        //     'last_name' => 'De Castro',
        //     'mobile_number' => '9124789012',
        //     'gender' => 'male'
        // ]);
        // $employee->roles()->attach('1');


        // $employee = Employee::create([
        //     'first_name' => 'Joseph',
        //     'middle_name' => 'Baldivino',
        //     'last_name' => 'Fidelino',
        //     'mobile_number' => '9124890123',
        //     'gender' => 'male'
        // ]);
        // $employee->roles()->attach('1');


        // $employee = Employee::create([
        //     'first_name' => 'Lakay',
        //     'middle_name' => 'Bautista',
        //     'last_name' => 'Dela Cruz',
        //     'mobile_number' => '9124901234',
        //     'gender' => 'male'
        // ]);
        // $employee->roles()->attach('1');


        // $employee = Employee::create([
        //     'first_name' => 'Ruben',
        //     'middle_name' => 'Matiwasay',
        //     'last_name' => 'Donor',
        //     'mobile_number' => '9124012345',
        //     'gender' => 'male'
        // ]);
        // $employee->roles()->attach('1');


        // $employee = Employee::create([
        //     'first_name' => 'Jeremy',
        //     'middle_name' => 'de Castro',
        //     'last_name' => 'Roldan',
        //     'mobile_number' => '9124123456',
        //     'gender' => 'male'
        // ]);
        // $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Jemar',
            'middle_name' => 'Ogatcho',
            'last_name' => 'Dematera',
            'mobile_number' => '9238024324',
            'gender' => 'male',
            'user_id' => 1
        ]);
        $employee->roles()->attach('2');


        $employee = Employee::create([
            'first_name' => 'Mateo',
            'middle_name' => 'John',
            'last_name' => 'Doe',
            'mobile_number' => '9238824324',
            'gender' => 'male',
            'user_id' => 2
        ]);
        $employee->roles()->attach('1');


        $employee = Employee::create([
            'first_name' => 'Brad',
            'middle_name' => 'Fit',
            'last_name' => 'Olicia',
            'mobile_number' => '9238824323',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Chrissadel',
            'middle_name' => 'Ribo',
            'last_name' => 'Ambas',
            'mobile_number' => '9238824322',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Laica',
            'middle_name' => 'Dela',
            'last_name' => 'Cruz',
            'mobile_number' => '9238824321',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Carthy',
            'middle_name' => 'Zanulla',
            'last_name' => 'Cunanan',
            'mobile_number' => '9238824320',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Jessica',
            'middle_name' => 'Valles',
            'last_name' => 'Naño',
            'mobile_number' => '9238824229',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Jodel',
            'middle_name' => 'Enzong',
            'last_name' => 'Zaballa',
            'mobile_number' => '9238824228',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Brian',
            'middle_name' => 'Enwan',
            'last_name' => 'Sumalinog',
            'mobile_number' => '9238824227',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Shirley',
            'middle_name' => 'Dha',
            'last_name' => 'Rebellon',
            'mobile_number' => '9238824226',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Mikaela Janine',
            'middle_name' => 'Ellas',
            'last_name' => 'Torres',
            'mobile_number' => '9238824225',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Ma. Rowena',
            'middle_name' => 'Ponta',
            'last_name' => 'Perez',
            'mobile_number' => '9238824224',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Leslyn May',
            'middle_name' => 'Right',
            'last_name' => 'Tabinas',
            'mobile_number' => '9238824223',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Kimberly',
            'middle_name' => 'Larapan',
            'last_name' => 'Paderan',
            'mobile_number' => '9238824222',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Jonathan',
            'middle_name' => 'Gingzales',
            'last_name' => 'Velarde',
            'mobile_number' => '9238824221',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'John Japhet',
            'middle_name' => 'Cardolisay',
            'last_name' => 'Gacias',
            'mobile_number' => '9238824220',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Angelica Mae',
            'middle_name' => 'Ampatuan',
            'last_name' => 'Pamittan',
            'mobile_number' => '9238824122',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Veronica',
            'middle_name' => 'Martinez',
            'last_name' => 'Solomon',
            'mobile_number' => '9238824121',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Rayben Gell',
            'middle_name' => 'Cambo',
            'last_name' => 'Gallardo',
            'mobile_number' => '9238824120',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Marylyn',
            'middle_name' => 'Sombrero',
            'last_name' => 'Berces',
            'mobile_number' => '9238824129',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Leah Grace',
            'middle_name' => 'Gambo',
            'last_name' => 'Grabillo',
            'mobile_number' => '9238824128',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Lani Rose',
            'middle_name' => 'Aquino',
            'last_name' => 'Cruz',
            'mobile_number' => '9238824127',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Divine Rochelle',
            'middle_name' => 'De',
            'last_name' => 'Avila',
            'mobile_number' => '9238824127',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Bianca Micaella',
            'middle_name' => 'Jobs',
            'last_name' => 'Manuel',
            'mobile_number' => '9238824125',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Arman John Asley',
            'middle_name' => 'Antipolo',
            'last_name' => 'Cagampan',
            'mobile_number' => '9238824124',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Angelika',
            'middle_name' => 'Torres',
            'last_name' => 'Irinco',
            'mobile_number' => '9238824123',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Jeremy',
            'middle_name' => 'De Castro',
            'last_name' => 'Roldan',
            'mobile_number' => '9124123456',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Ruben',
            'middle_name' => 'Matiwasay',
            'last_name' => 'Donor',
            'mobile_number' => '9124012345',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Lakay',
            'middle_name' => 'Bautista',
            'last_name' => 'Dela Cruz',
            'mobile_number' => '9123901234',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Joseph',
            'middle_name' => 'Baldivino',
            'last_name' => 'Fidelino',
            'mobile_number' => '9124890123',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Ralph',
            'middle_name' => 'Cuenca',
            'last_name' => 'De Castro',
            'mobile_number' => '9123789012',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Samson',
            'middle_name' => 'Delailah',
            'last_name' => 'Baloaloa',
            'mobile_number' => '9124678901',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Johny',
            'middle_name' => 'Estregan',
            'last_name' => 'Yanguas',
            'mobile_number' => '9124567890',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Amado',
            'middle_name' => 'De Leon',
            'last_name' => 'Ramos',
            'mobile_number' => '9123345678',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Albert',
            'middle_name' => 'Dalisay',
            'last_name' => 'Mamaril',
            'mobile_number' => '9123123456',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Lydia',
            'middle_name' => 'Soberano',
            'last_name' => 'Cajucom',
            'mobile_number' => '9123012345',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Argee',
            'middle_name' => 'Nino',
            'last_name' => 'Presto',
            'mobile_number' => '9123901234',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Jim',
            'middle_name' => 'Locsin',
            'last_name' => 'Guab',
            'mobile_number' => '9123890123',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Philip Jayson',
            'middle_name' => 'Rickets',
            'last_name' => 'Cortes',
            'mobile_number' => '9123789012',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Issay',
            'middle_name' => 'Sotto',
            'last_name' => 'Ambas',
            'mobile_number' => '9123678901',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('6');

        $employee = Employee::create([
            'first_name' => 'Rona',
            'middle_name' => 'Cojuanco',
            'last_name' => 'Dominguez',
            'mobile_number' => '9102386895',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('3');

        $employee = Employee::create([
            'first_name' => 'Lorelei',
            'middle_name' => 'Tupaz',
            'last_name' => 'Zapanta',
            'mobile_number' => '9123567890',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('5');

        $employee = Employee::create([
            'first_name' => 'Ralph',
            'middle_name' => 'Rekto',
            'last_name' => 'De Castro',
            'mobile_number' => '9126124789',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Venus',
            'middle_name' => 'Raj',
            'last_name' => 'Malit',
            'mobile_number' => '9126125789',
            'gender' => 'female'
        ]);
        $employee->roles()->attach('1');

        $employee = Employee::create([
            'first_name' => 'Mark Jovan',
            'middle_name' => 'Reyes',
            'last_name' => 'Carsido',
            'mobile_number' => '9128125911',
            'gender' => 'male'
        ]);
        $employee->roles()->attach('4');
    }
}