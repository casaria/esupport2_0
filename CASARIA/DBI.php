<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html>
<head>
<script type="text/javascript">
    WebFontConfig = {
        google: {families: ['Roboto::latin', 'Lato::latin', 'Roboto+Condensed::latin', 'Ropa+Sans:latin', 'Titillium+Web:600,700:latin']}
    };

    function  {
        var wf = document.createElement('script');
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    }
</script>



  <title>Casaria Database Oject factory TEST</title>
  <style type="text/css">
  body {
    font-family: Titillium+Web,  Lucida Sans, "Times New Roman",
          Times, serif;
    color: orange;
      background-color: #6974b5 }
  h1 {
    font-family: Helvetica, Geneva, Arial,
          sans-Regular-Regular, sans-serif;
          color: indigo;
    }

  div {
      display: inline;
      width: 300px;
      border: 4px solid pink;
      padding: 10px;
      margin: 8px;
  }
          
          

  body { margin-left: 5%; margin-right: 5%; }

          
  </style>
</head>
 <body>
<h1>DYNAMIC OBJECTS CREATED</h1>


<?php

// include class files
function __autoload($class_name) {
    require_once ''.$class_name.'class.php';
}

__autoload("DBIgenerator");
global $dbg;

try {
    // connect to MySQL
    $dbg=new mysqli('localhost','casaria_hdesk1','5XwoR]B','casaria_hdesk1');
    $gn=new DBIgenerator('users',"users",'classes/');
    // generate class file
    $gn->generate();
    // get $user object
    $users=$gn->getObject();
    $sql ="SELECT * FROM 'users' WHERE id=2";
    //$user->setid(2);
        $row = $users->load($sql);



    echo $row['last_name'] ;
    echo $row['first_name'];
    echo '<br>';
    echo $users->getuser_name();
    unset($users, $gn);
    echo '<br>..User table row successfully read';

    $gn=new DBIgenerator('tickets',"tickets",'classes/');
    // generate class file
    $gn->generate();
    // get $user object
    $tickets=$gn->getObject();
    $sql ="SELECT * FROM 'tickets' WHERE id=4994";
    
    //$ticket->setid(4340);
    $row = $tickets>load($sql);

    echo '<br>';
    echo "<div>". $tickets->getshort()."</div>";
    echo "<div>". $tickets->getdescription()."</div>";
    echo '<br>..Ticket table row successfully read';
    unset($tickets, $gn);
    $gn=new DBIgenerator('time_track',"time_track",'classes/');
    // generate class file
    $gn->generate();
    // get $user object
    $time_track=$gn->getObject();
    $time_track->setticket_id(4994);
    $sql ="SELECT * FROM 'time_track' WHERE ticket_id=4994";
    $row = $time_track->load($sql);

    echo '<br>';
    echo "<div>". $time_track->getsupporter_id()."</div>";
    echo "<div>". $time_track->getreference()."</div>";
    echo '<br>..Timetrack table row successfully read';
    unset($time_track, $gn);



    $gn=new DBIgenerator('tmaterial',"tmaterial",'classes/');
    // generate class file
    $gn->generate();
    // get $user object
    $tmaterial=$gn->getObject();
    //$tmaterial->setid(1);

    $row = $tmaterial->load($sql);



    echo '<br>..Tmaterial table row successfully read';

    echo '<br>';
    echo $tmaterial->getourpartnum();

    echo '<b> SHORT:</b>';
    echo $tmaterial->getshort();

    echo '<b> DESCRIPTION:</b>';
    echo $tmaterial->getdescription();
    unset($tmaterial, $gn);
    
    

    $gn=new DBIgenerator('tequipment',"tequipment",'classes/');
    // generate class file
    $gn->generate();
    $tequipment=$gn->getObject();
    //$tequipment->setgroupid(2);
    $sql ="SELECT * FROM 'tequipment' WHERE id=1";
    $row = $tequipment->load($sql);



    $firstvar = $tequipment->getdescription();
    echo $firstvar;
    unset($tequipment, $gn);
}
catch (Exception $e){
    echo $e->getMessage();
    exit();
}
?>

</body>