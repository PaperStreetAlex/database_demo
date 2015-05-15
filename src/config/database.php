<?php  namespace Acme\Config;
Class Database{
	public function __construct(){

		$capsule = new \Illuminate\Database\Capsule\Manager; 

		$capsule->addConnection(array(
		    'driver'    => 'mysql',
		    'host'      => 'localhost',
		    'database'  => 'demo',
		    'username'  => 'root',
		    'password'  => '',
		    'charset'   => 'utf8',
		    'collation' => 'utf8_unicode_ci',
		    'prefix'    => ''
		));

		$capsule->bootEloquent();
	}
}
