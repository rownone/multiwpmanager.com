<?php  
  
class DBconn
{  
    // property declaration
    private $link;
    private $host;
    private $username;
    private $password;
    private $dbname;
    
    public function host($host)
    {
        $this->host = $host;
    }
    
    public function username($username)
    {
        $this->username = $username;
    }
    
    public function password($password)
    {
        $this->password = $password;
    }
    
    public function dbname($dbname)
    {
        $this->dbname = $dbname;
    }
    
    // method declaration
    public function dbConnect() 
    {
        $this->link = mysql_connect($this->host, $this->username, $this->password);
        if (!$this->link) {
            die('Could not connect: ' . mysql_error());
        }
        return $this->link;
    }
    
    public function dbClose()
    {
        return mysql_close($this->link);
    }
    
    public function dbSelect()
    {
        return mysql_select_db($this->dbname, $this->link);
    }
    
    public function dbQuery($sql)
    {
        echo "<br><br>".$sql;
        return mysql_query($sql, $this->link);
    }
    
    
    
    
    
}

?>