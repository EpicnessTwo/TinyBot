<?php
// TinyBot - Written by EpicKitty (EpicnessTwo)
set_time_limit(0); //Stops PHP killing the bot after 30 seconds

//Vars

$config['serverip'] = 'irc.esper.net'; //Server address
$config['port'] = 6667; //Server port
$config['name'] = 'TinyBot'; //Bot's name
$config['user'] = 'TinyBot'; //Bot's user
$config['nick'] = 'TinyBot'; //Bot's nick
$config['prefix'] = '~'; //Command prefix

$config['usebnc'] = true; //Will this be on a bnc?
$config['serverid'] = 'serv1'; //To identify the server
$config['bncpassword'] = 'enterpasshere'; //Password for bnc or server

$chans = array(
    '#Epic',
    '#EpicBots',
  );

//Main

$irc = fsockopen($config['serverip'], $config['port']);
fputs($irc,"USER " . $config['user'] . " * * :" . $config['name'] . "\n");
fputs($irc,"NICK " . $config['nick'] . "\n");

//Channel joining loop
$timer = 0;
$count = count($chans) + 1;
  while($timer !== $count)
  {
    fputs($irc,"JOIN ".$chans[$timer]."\n");
    $timer ++;
  }


//To be continued

?>
