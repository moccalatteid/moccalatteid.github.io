<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MahasiswaSeeder extends Seeder
{
	public function run()
	{
		for ($i = 0; $i < 100; $i++) {
			$faker = \Faker\Factory::create('id_ID');
			$data = [
				'nama' => $faker->name,
				'slug' => $faker->name,
				'nim' => $faker->creditCardNumber,
				'jurusan' => $faker->countryCode,
				'gambar' => $faker->image,
				'created_at' => Time::now(),
				'updated_at' => Time::now(),

			];

			$this->db->table('mahasiswa')->insert($data);
		}
	}
}
