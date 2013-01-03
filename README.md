Minecraft Server Status
=======================

Usage
-----

### Examples:

Use default Port:

    $info = fetch_server_info("127.0.0.1");

Use a specific port (25567):

    $info = fetch_server_info("127.0.0.1", 25567);

### Returned data

    Array(
       "motd"        => "The message of the day",
       "players"     => 2, // current online players
       "max_players" => 5  // players allowed to connect simultanous
    )
