<?php

class A{
	
//golabal variable declaration	
//public $dbh;

//error_reporting(1);

function connecttodb(){
$hostname = 'localhost';

$username = 'root';

$password = 'webonise6186';

try {
     $dbh = new PDO("mysql:host=$hostname;dbname=spike3", $username, $password);
    /*** echo a message saying we have connected **/
     echo 'Connected to database';
     return $dbh;
    }
    catch(PDOException $e)
    {
     echo $e->getMessage();
    }
}


/*
function insert_data(){
echo "insert_data";echo "<br>";
$dbh = new PDO("mysql:host=$hostname;dbname=spike3", $username, $password);
    
    $count = $dbh->exec("INSERT INTO user VALUES('ana','ana1234')");

    
    echo $count;

//$dbh = null;
    
}


public function select_data()
{
echo "select_data";echo "<br>";
  	$obj=new A();
	$dbh=$obj->connecttodb();

    
    $sql = "SELECT * FROM user";
    foreach ($dbh->query($sql) as $row)
        {
        print $row['username'] .' - '. $row['password'] . '<br />';
        }

   
}

public function update_data()
{
 echo "update_data"; echo "<br>";
 	$obj=new A();
	$dbh=$obj->connecttodb()
	
	
    $count = $dbh->exec("UPDATE user SET username='anamika' WHERE password='unnati';");

   
    echo $count;
}
*/
function fetch_asso()
{
    //echo "fetchassoc";echo "<br>";

	//$obj=new A();
	 $dbh = new PDO("mysql:host=localhost;dbname=spike3",'root','webonise6186');
	//$dbh=$obj->connecttodb()
    $sql = "SELECT * FROM user";
    $stmt = $dbh->query($sql);   
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
    foreach($result as $key=>$val)
    {
       echo $key.' - '.$val.'<br />';
    }
    
}

   

function fetchnum_data()
{
    //echo "fetchnum";echo "<br>";
    
  //$obj=new A();
	//$dbh=$obj->connecttodb()
	 $dbh = new PDO("mysql:host=localhost;dbname=spike3",'root','webonise6186');
    $sql = "SELECT * FROM user";
    $stmt = $dbh->query($sql);
    $result = $stmt->fetch(PDO::FETCH_NUM);
  
    foreach($result as $key=>$val)
    {
        echo $key.' - '.$val.'<br />';
    }
    
}


  
function fetch_both()
{
   //$obj=new A();
	//$dbh=$obj->connecttodb()
	  $dbh = new PDO("mysql:host=localhost;dbname=spike3",'root','webonise6186');
     $sql = "SELECT * FROM user";
     $stmt = $dbh->query($sql);
     $result = $stmt->fetch(PDO::FETCH_BOTH);
     
     foreach($result as $key=>$val)
     {
         echo $key.' - '.$val.'<br />';
     }
  
}
  
  
  
  
function fetch_obj()
{
     $dbh = new PDO("mysql:host=localhost;dbname=spike3",'root','webonise6186');
     $sql = "SELECT * FROM user";
     $stmt = $dbh->query($sql);
     $obj = $stmt->fetch(PDO::FETCH_OBJ);
     echo $obj->username.'<br />';
     echo $obj->password.'<br />';
}


  
function fetch_lazy()
{
     $dbh = new PDO("mysql:host=localhost;dbname=spike3",'root','webonise6186');
     $sql = "SELECT * FROM user";
     $stmt = $dbh->query($sql);
     $result = $stmt->fetch(PDO::FETCH_LAZY);
  
     foreach($result as $key=>$val)
     {
         echo $key.' - '.$val.'<br />';
     }
}
  
  

function last_insert_id()
{
    $dbh = new PDO("mysql:host=localhost;dbname=spike3",'root','webonise6186');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->exec("INSERT INTO user VALUES(10,'xyz')");
    echo $dbh->lastInsertId();              
}



function transaction()
{
    try {
   
         $dbh = new PDO("mysql:host=localhost;dbname=spike3",'root','webonise6186');
         $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $dbh->beginTransaction();
         $dbh->exec("INSERT INTO user values('abc','abc')");
         $dbh->exec("INSERT INTO user values('qqqq','qqqq')");
         $dbh->exec("INSERT INTO user values('kkkk','kkkk')");
         $dbh->exec("INSERT INTO user values('ggggg','ggggg')");
    
         $dbh->commit();
    
         echo 'Transaction successfull<br />';
        }
        catch(PDOException $e)
        {
         $dbh->rollback();
       //echo $sql . '<br />' .
         $e->getMessage();
         echo 'Transaction Failed!!!<br>';
        }
}



function prepared_statement()
{
    $dbh = new PDO("mysql:host=localhost;dbname=spike3",'root','webonise6186');  
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $username = 'Anamika';
    $password = 'Anamika';
    $stmt = $dbh->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR, 17);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR, 15);
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach($result as $row)
    {
        echo $row['username'].'<br />';
        echo $row['password'].'<br />';
    }

}



function error_handle()
{
    try{
   
        $dbh = new PDO("mysql:host=localhost;dbname=spike3", 'root','webonise');
        $sql = "SELECT username FROM user";
        foreach ($dbh->query($sql) as $row)
        {
            echo $row['username'].'<br />';
        }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
}


}



class stream
{
    public $name;
    public $subject;

    public function __toString()
    {
        return $this->username;
    }
   
    function fetch_class()
    {
    try{
        $dbh = new PDO("mysql:host=localhost;dbname=spike3", 'root','webonise6186');
        $sql = "SELECT * FROM user";
        $stmt = $dbh->query($sql);
        $obj = $stmt->fetchALL(PDO::FETCH_CLASS, 'stream');
        foreach($obj as $stream)
        {
             echo $stream->__toString().'<br />';
        //echo "hello";
        }

    }
    catch(PDOException $e)
    {
       echo $e->getMessage();
    }
 
}

}


$objectc=new stream();
$obj=new A();
?>


<html>
<head>
<title>PHP Data Objects</title>
</head>
<body>

<table border="1" width="75%">
<caption>PHP Data Objects</caption>
<tr><td>DB Connection Status:</td><td><?php  $obj->connecttodb();?></td></tr>
<tr><td>Fetch Assoc</td><td><?php $obj->fetch_asso();?></td></tr>
<tr><td>Fetch Num</td><td><?php $obj->fetchnum_data();?></td></tr> 
<tr><td>Fetch Both</td><td><?php $obj->fetch_both();?></td></tr>
<tr><td>Fetch Object</td><td><?php $obj->fetch_obj();?></td></tr>
<tr><td>Fetch Lazy</td><td><?php $obj->fetch_lazy();?></td></tr>	
<tr><td>Last Insert ID</td><td><?php $obj->last_insert_id();?></td></tr>
<tr><td>Transaction</td><td><?php $obj->transaction();?></td></tr>
<tr><td>Prepared Statement</td><td><?php $obj->prepared_statement();?></td></tr>
<tr><td>Error Handling</td><td><?php $obj->error_handle();?></td></tr>
<tr><td>Fetch Class</td><td><?php $objectc->fetch_class();?></td></tr>
<!--  
<tr><td>Insert Data</td><td><?php $obj->insert_data();?></td></tr>
<!-- <tr><td>Select Data</td><td><?php $obj->select_data();;?></td></tr>
<tr><td>Update Data</td><td><?php $obj->update_data();?></td></tr> -->

</table>

</body>
</html>


