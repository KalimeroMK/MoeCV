<?php

use App\City;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$cities = ['Берово', 'Делчево', 'Демир Капија', 'Гевгелија', 'Кавадарци', 'Кичево', 'Кочани', 'Кратово', 'Крива Паланка', 'Крушево', 'Македонска Каменица', 'Неготино', 'Пехчево', 'Пробиштип', 'Радовиш', 'Ресен', 'Штип', 'Свети Николе', 'Дебар', 'Демир Хисар', 'Гостивар', 'Кавадарци', 'Куманово', 'Македонаски Брод', 'Охрид', 'Прилеп', 'Дојран', 'Струга', 'Струмица', 'Тетово', 'Валандово', 'Велес', 'Виница', 'Скопје'];

		foreach ($cities as $city) {
			$cityModel = new City();
			$cityModel->name = $city;
			$cityModel->save();
		}
	}
}
