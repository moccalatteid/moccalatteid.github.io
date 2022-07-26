<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class DosenSeeder extends Seeder
{
	public function run()
	{
		for ($i = 0; $i < 20; $i++) {
			$faker = \Faker\Factory::create('id_ID');
			$data = [
				'nama' => $faker->name,
				'alamat' => $faker->address,
				'telp' => $faker->phoneNumber,
				'created_at' => Time::now(),
				'updated_at' => Time::now(),

			];

			$this->db->table('dosen')->insert($data);
		}
	}
}
