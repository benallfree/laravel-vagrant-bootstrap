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