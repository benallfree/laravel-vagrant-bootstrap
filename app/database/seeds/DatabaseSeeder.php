<?php

class DatabaseSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Eloquent::unguard();

    $this->call('UserTableSeeder');
    $this->call('ProductTableSeeder');
  }

}

use Flynsarmy\CsvSeeder\CsvSeeder;
class UserTableSeeder extends CsvSeeder {
  public function __construct()
  {
    $this->table = 'users';
    $this->filename = app_path().'/database/seeds/users.csv';
  }

  public function run()
  {
    DB::table($this->table)->truncate();
    parent::run();
    DB::table($this->table)->update(['password'=>'$2y$10$WLnDf/xwkBa6G8fcM5hn7.Izoj3sY6AG/l5F1Pw3WkbOv7XUe62w2']);
    // DB::table($this->table)
    //   ->where('agent_email', '99999')
    //   ->update(['agent_email'=>null]);
    
  }
}

class ProductTableSeeder extends CsvSeeder {
  public function __construct()
  {
    $this->table = 'products';
    $this->filename = app_path().'/database/seeds/products.csv';
  }

  public function run()
  {
    DB::table($this->table)->truncate();
    parent::run();
    $nullable = [
      'description',
      'amazon_category',
      'shipping_cost',
      'amazon_rank',
    ];
    foreach($nullable as $field_name)
    {
      DB::table($this->table)
        ->where($field_name, '=', '~')
        ->update([$field_name=>null]);
    }
    
  }
}