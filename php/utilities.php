<?php
if (isset($_POST['action']) && !empty($_POST['action'])) {
	$action = $_POST['action'];
	switch($action) {
		case 'getUsername' :
			generalPhp::getUserName($_POST['user']);
			break;
		case 'addNewSite' :
			generalPhp::addNewSite($_POST['sitename'], $_POST['sitedesc'], $_POST['sitelat'], $_POST['sitelon']);
			break;
		case 'fetchAllSites' :
			generalPhp::fetchAllSites();
			break;
		case 'fetchAllStations' :
			generalPhp::fetchAllStations();
			break;
	}
}
class generalPhp {
	private static $databaseName = '234312db2';
	private static $host = 'localhost';
	private static $user = '234312';
	private static $password = 'williams123';

	public static function getUserName($id) {
		mysql_connect(self::$host,self::$user,self::$password) or die(mysql_error());
		mysql_select_db(self::$databaseName) or die(mysql_error());
		$sql = "SELECT user_name FROM user WHERE user_id='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_assoc($result);
		echo $row['user_name'];
	}

	protected static function getId($dbtable) {
		$t1 = null;
		$t2 = null;
		$xmldoc = new DOMDocument();
		$xmldoc -> load('../other/ids.config');

		$xpath = new Domxpath($xmldoc);

		$q1 = $xpath -> query("//table[@name='$dbtable']/sid");
		$q2 = $xpath -> query("//table[@name='$dbtable']/lid");

		$t1 = $q1 -> item(0) -> textContent;
		$t2 = $q2 -> item(0) -> textContent;
		$q1 -> item(0) -> nodeValue = $q1 -> item(0) -> nodeValue + 1;
		$xmldoc -> saveHTMLFile('../other/ids.config');
		return "{$t2}{$t1}";
	}

	public static function addNewSite($sitename, $sitedesc, $sitelat, $sitelon) {
		mysql_connect(self::$host, self::$user, self::$password) or die(mysql_error());
		mysql_select_db(self::$databaseName) or die(mysql_error());
		$temp = generalPhp::getID('sites');
		$sql = "INSERT INTO maltaproject.sites(site_id, site_name, site_decr, site_lat, site_lon) VALUES ('$temp', '$sitename','Students live here', '$sitelat', '$sitelon')";
		echo mysql_query($sql);
	}

	public static function addNewEmerg($emergservice_id, $emergservice_cat_id, $emergservice_lat, $emergservice_lon) {

		mysql_connect(self::$host, self::$user, self::$password) or die(mysql_error());
		mysql_select_db(self::$databaseName) or die(mysql_error());
		$temp = generalPhp::getID('sites');
		$sql = "INSERT INTO `maltaproject`.`emergservices` (`emergservice_id`, `emergservice_cat_id`, `emergservice_lat`, `emergservice_lon`) VALUES ('$emergservice_id', '$emergservice_cat_id', '$emergservice_lat', '$emergservice_lon')";
		mysql_query($sql);
	}

	public static function fetchAllSites() {
		mysql_connect(self::$host, self::$user, self::$password) or die(mysql_error());
		mysql_select_db(self::$databaseName) or die(mysql_error());
		$sql = "SELECT * FROM sites";
		$result = mysql_query($sql) or die(mysql_error());
		while ($row = mysql_fetch_assoc($result))
			$response[] = $row;
		echo json_encode($response);
	}

	public static function fetchAllStations() {
		mysql_connect(self::$host, self::$user, self::$password) or die(mysql_error());
		mysql_select_db(self::$databaseName) or die(mysql_error());
		$sql = "SELECT * FROM emergservices";
		$result = mysql_query($sql) or die(mysql_error());
		while ($row = mysql_fetch_assoc($result))
			$response[] = $row;
		echo json_encode($response);
	}

}
?>