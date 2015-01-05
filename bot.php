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

$config['owner'] = 'EpicnessTw@server.epicnesstwo.tk';

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
$count = count($chans);
  while($timer !== $count)
  {
    fputs($irc,"JOIN " . $chans[$timer] . "\n");
    $timer ++;
  }

//Functions
function doPrivmsg($to, $say)
{
    fputs($irc, "PRIVMSG " . $to . " :" . $say);
}
function commandCmd($from, $channel, $to, $args)
{
    echo 'From: ' . $from . " | Channel: " . $channel . " | To: " . $to . " | Args: " . $args;
}

//To be continued
//Main loop
while(true)
{   
    while($data = fgets($socket))
    {
        echo $data;
        flush();
        
        //Splitting input into sections
        $explode = explode(' ', $data);
        $rawcmd = explode(':', $explode[3]);
        $command = explode('<br>', $rawcmd);
        $channel = $explode[2];
        $nick = explode('@', $explode[0]);
        $nick = explode('!', $nick[0]);
        $nick = explode(':', $nick[0]);
        $hostmask = explode('!', $explode[0]);
        $nick = $nick[1];
        
        if($explode[0] == "PING") //Ping respond
        {
            fputs($socket, "PONG " . $explode[1] . "\n");
        }
        
        $args = NULL;
        for($i = 4; $i < count($ex);$i++)
        {
            $args .= $ex[$i] . ' ';
        }
        
        if ($rawcmd[1] == ($config['prefix'] . "cmd"))
        {   
            $to = explode(' '. $args);
            $to = $to[0]
            //$this->commandCmd($nick, $channel, $to, $args);
            echo 'From: ' . $nick . " | Channel: " . $channel . " | To: " . $to . " | Args: " . $args;
        }
    }
}
?>
