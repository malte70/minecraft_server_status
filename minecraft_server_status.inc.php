<?php
/**
 * Minecraft Server Status
 *
 * Get the status of a Minecraft SMP server. This was written for
 * the website of my own Minecraft server at http://khaos-miners.tk.
 *
 * @author Malte Bublitz
 * @version 0.20120722
 * @package minecraft_server_status
 */

/**
 * get the server status
 *
 * returns an associative array like that:
 *   array('motd' => 'I am a minecraft server','players'=> 3,'max_players'=>10)
 * if either the server is not reachable or doesn't look like a SMP server,
 * false is returned.
 *
 * @param string $ip The IP of the server to query
 * @param integer $port The port to connect to (defaults to default port 25565)
 * @return false or array
 */
function fetch_server_info($ip, $port=25565) {
	/**
	 * connect to the socket
	 */
	$socket = @fsockopen($ip, $port, $errno, $errstr, 1);
	if ($socket === false) {
		return false;
	}

	/**
	 * create query packet
	 */
	fwrite($socket, "\xfe");

	/**
	 * fetch data and check if it is valid
	 */
	$data = fread($socket, 256);
	if (substr($data, 0, 1) != "\xff") {
		return false;
	}

	/**
	 * extract data
	 */
	$data = explode("§", mb_convert_encoding(substr($data, 3), "UTF8", "UCS-2"));

	return array(
		'motd'        => $data[0],
		'players'     => intval($data[1]),
		'max_players' => intval($data[2])
	);
}

?>
