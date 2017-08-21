<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

/**
 * This class allows you to preform various operations with
 * Media Access Control (MAC addresses) on UNIX type systems.
 *
 * @author Filipe Monteiro 
 * @copyright Copyright (c) 2017, Filipe Monteiro
 * @license MIT License (see License.txt)
 */
class MacAddress extends Controller
{
	/**
	 * Regular expression for matching and validating a MAC address
	 * @var string
	 */
	private static $valid_mac = "([0-9A-F]{2}[:-]){5}([0-9A-F]{2})";
	/**
	 * An array of valid MAC address characters
	 * @var array
	 */
	private static $mac_address_vals = array(
			"0", "1", "2", "3", "4", "5", "6", "7",
			"8", "9", "A", "B", "C", "D", "E", "F"
	);
	/**
	 * Change the MAC address of the network interface specified
	 * @param string $interface Name of the interface e.g. eth0
	 * @param string $mac The new MAC address to be set to the interface
	 * @return bool Returns true on success else returns false
	 */
	public static function setFakeMacAddress($interface, $mac = null)
	{
		// if a valid mac address was not passed then generate one
		if (!self::validateMacAddress($mac)) {
			$mac = self::generateMacAddress();
		}
		// bring the interface down, set the new mac, bring it back up
		self::runCommand("ifconfig {$interface} down");
		self::runCommand("ifconfig {$interface} hw ether {$mac}");
		self::runCommand("ifconfig {$interface} up");
		// TODO: figure out if there is a better method of doing this
		// run DHCP client to grab a new IP address
		self::runCommand("dhclient {$interface}");
		// run a test to see if the operation was a success
		if (self::getCurrentMacAddress($interface) == $mac) {
			return true;
		}
		// by default just return false
		return false;
	}
	/**
	 * @return string generated MAC address
	 */
	public static function generateMacAddress()
	{
		$vals = self::$mac_address_vals;
		if (count($vals) >= 1) {
			$mac = array("00"); // set first two digits manually
			while (count($mac) < 6) {
				shuffle($vals);
				$mac[] = $vals[0] . $vals[1];
			}
			$mac = implode(":", $mac);
		}
		return $mac;
	}
	/**
	 * Make sure the provided MAC address is in the correct format
	 * @param string $mac
	 * @return bool true if valid; otherwise false
	 */
	public static function validateMacAddress($mac)
	{
		return (bool) preg_match("/^" . self::$valid_mac . "$/i", $mac);
	}
	/**
	 * Run the specified command and return it's output
	 * @param string $command
	 * @return string Output from command that was ran
	 */
	protected static function runCommand($command)
	{
		//$retorno = '';
		//shell_exec('arp '.$ipaddress.' -a', $retorno);
		return exec($command);
	}
	/**
	 * Get the system's current MAC address
	 * @param string $interface The name of the interface e.g. eth0
	 * @return string|bool Systems current MAC address; otherwise false on error
	 */
	public static function getCurrentMacAddress()
	{
			
		if (isset($_SERVER['HTTP_CLIENT_IP'])){
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			$onde = '1';
		}else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			$onde = '2';
		}else if(isset($_SERVER['HTTP_X_FORWARDED'])){
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			$onde = '3';
		}else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			$onde = '4';
		}else if(isset($_SERVER['HTTP_FORWARDED'])){
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
			$onde = '5';
		}else if(isset($_SERVER['REMOTE_ADDR'])){
			$ipaddress = $_SERVER['REMOTE_ADDR'];
			$onde = '6';
			if ($ipaddress == '::1') {
				$ipaddress = '';
			}
		}
		$MAC='';
		$retorno = self::runCommand('arp '.$ipaddress.' -a');
		//for ($i = 24; $i < 41; $i++) {
		for ($i = 24; $i < 41; $i++) {
			$MAC = $MAC.$retorno[$i];
		}
		$MACInfo['ip'] = $ipaddress;
		$MACInfo['entrou'] = $onde;
		$MACInfo['MAC'] = $MAC;
		
		return $MACInfo['MAC'];
		
	}
}