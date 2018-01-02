<?php

use CONTR\Models\Agreement;
use CONTR\Models\Customer;
use Illuminate\Database\Seeder;

class AgreementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Agreement::class)
            ->create([
                'title' => 'Joaneyde e Roberto :: PRE/CASAMENTO',
                'enrolment' => 100001,
                'date_agreement' => '2018-01-02',

                'total_hours' => '10',
                'price' => '1620',
                'description_services' => '6 horas de cobertura com um fotógrafos; 2 horas de making of da noiva; 2 horas de making of da noivo; Sessão pré-casamento (e-session); Pendrive com fotos em alta e editadas; Galeria online por 6 meses; Slideshow',
                'event_schedule' => '07/01/2018 - Pré-Casamento em Araguaína-TO; 20/01/2018 - Casamento em Palestina-PA',
                'payment_terms' => 'Em duas 2x de R$ 810. Até a data do evento',

                'customer_id' => 1,
            ]);

        factory(Agreement::class, 10)
            ->create();
    }
}
