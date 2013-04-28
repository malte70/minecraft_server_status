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

The `fetch_server_info` function returns `false` if the server is not reachable,
or an array with detailed information aboiut the server status if the server is
online. Below an example how the returned Array can look like.

    Array(
       "motd"        => "The message of the day",
       "players"     => 2, // current online players
       "max_players" => 5  // players allowed to connect simultanous
    )

### Complete example

    <?php
    $info = fetch_server_info("127.0.0.1");
    if ($info!=false) {
      print "Server is online, with $info[players] out of a maximum of $info[max_players] players online.<br>\n";
      print "Server\'s message of the day: $info[motd]";
    } else {
      print "Server is offline.";
    }
    ?>

### Example No. 2

    <?php
    $info = fetch_server_info("127.0.0.1");
    if ($info!=false)
      print "Server is online.";
    else
      print "Server is offline.";
    ?>
