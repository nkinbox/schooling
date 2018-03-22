<?php
//serror_reporting(0);
class GFHConfig{

	// public static $SERVER='localhost';
	// public static $USER='schoolli_schooll';
	// public static $PASSWORD='#.B~EIkhlR*3';
	// public static $DATABASE='schoolli_schoolling';
	// public static $link='';
	public static $SERVER='localhost';
	public static $USER='root';
	public static $PASSWORD='';
	public static $DATABASE='schoolli_schoolling1';
	public static $link='';

	public function __construct()
	{
		return self::$link=mysqli_connect(self::$SERVER,self::$USER,self::$PASSWORD,self::$DATABASE);
	}

}
global $GFH_Config;
$GFH_Config=new GFHConfig();