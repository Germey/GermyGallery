<?php

    use App\Model\Config;
    use App\Model\Token;
    use Illuminate\Database\Seeder;

    class TokenTableSeeder extends Seeder
    {

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            DB::table('tokens')->delete();

            Token::create([
                'value' => 'admin',
                'kind' => 'admin'
            ]);
            Token::create([
                'value' => 'guest',
                'kind' => 'guest',
            ]);
        }

    }