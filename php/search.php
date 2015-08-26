<?php
    session_start();
    require_once('credentials.php');
    
    $connection = new mysqli($host, $user, $password, $database);
    if($connection->connect_errno) die($connection->connect_error);
    
    $array3 = array();
    
    echo <<<_END
    
    <!DOCTYPE html>
    <html>
    <head>
        <link rel='stylesheet' type='text/css' href='../css/style.css'/>
        <title>AZLyrics - Search:
_END;
    
    if(isset($_POST['search']) && $_POST['search'] != ""){
        $search = $_POST['search'];
        
        echo <<<_END
        $search</title>
        </head>
        <body>
        <div id='menu'>
          <div id='image'>
              <img src='http://images.azlyrics.com/az_logo_tr.png' width='40' height='40'/>
          </div>
          <ul>
             <li><a href='../html/a.html'>A</a></li>
             <li><a href='../html/b.html'>B</a></li>
             <li><a href='../html/c.html'>C</a></li>
             <li><a href='../html/d.html'>D</a></li>
             <li><a href='../html/e.html'>E</a></li>
             <li><a href='../html/f.html'>F</a></li>
             <li><a href='../html/g.html'>G</a></li>
             <li><a href='../html/h.html'>H</a></li>
             <li><a href='../html/i.html'>I</a></li>
             <li><a href='../html/j.html'>J</a></li>
             <li><a href='../html/k.html'>K</a></li>
             <li><a href='../html/l.html'>L</a></li>
             <li><a href='../html/m.html'>M</a></li>
             <li><a href='../html/n.html'>N</a></li>
             <li><a href='../html/o.html'>O</a></li>
             <li><a href='../html/p.html'>P</a></li>
             <li><a href='../html/q.html'>Q</a></li>
             <li><a href='../html/r.html'>R</a></li>
             <li><a href='../html/s.html'>S</a></li>
             <li><a href='../html/t.html'>T</a></li>
             <li><a href='../html/u.html'>U</a></li>
             <li><a href='../html/v.html'>V</a></li>
             <li><a href='../html/w.html'>W</a></li>
             <li><a href='../html/x.html'>X</a></li>
             <li><a href='../html/y.html'>Y</a></li>
             <li><a href='../html/z.html'>Z</a></li>
             <li><a href='../html/19.html'>#</a></li>
          </ul>
          <div id='searchbox'>
                <input type='text' id='search' name='search'/>
                <button type='submit' id='searchButton' name='searchButton'>
                    Search
                </button>
          </div>
        </div>
        <hr/>
        <div id='content'>
_END;
        
        $string = "";
        $array = array();
        $length = strlen($search);
        for($j = 0;$j < $length;$j++){
            $char = substr($search, $j, 1);
            if(preg_match('/[^A-Za-z0-9]/', $char)){
                if($string == ""){
                    continue;
                }
                array_push($array, $string);
                $string = "";
                continue;
            }
            $string .= $char;
        }
        array_push($array, $string);
        
        $array2 = array();
        $query = "select * from artists";
        $result = $connection->query($query);
        $len = $result->num_rows;
        $string = "";
        for($j = 0;$j < $len;$j++){
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $length = strlen($name);
            
            for($i = 0;$i < $length;$i++){
                $char = substr($name, $i, 1);
                if(preg_match('/[^A-Za-z0-9]/', $char)){
                    if($string == ""){
                        continue;
                    }
                    array_push($array2, $string);
                    $string = "";
                    continue;
                }
                
                $string .= $char;
            }
            array_push($array2, $string);
            $number = 0;
            for($i = 0;$i < count($array);$i++){
                for($k = 0;$k < count($array2);$k++){
                    if($array[$i] == $array2[$k]){
                        $number++;
                    }
                }   
            }
            
            if($number == count($array) && $number == count($array2)){
                array_push($array3, $row['name']);
                break 1;
            }
           
        }
        
        echo <<<_END
        <ol>
_END;
        for($j = 0;$j < count($array3);$j++){
            echo <<<_END
            <li>$array3[$j]</li>
_END;
        }
        
}else{
    echo <<<_END
    </title>
    </head>
    <body>
        <div id='menu'>
            <div id='image'>
                <img src='http://images.azlyrics.com/az_logo_tr.png' width='40' height='40'/>
            </div>
            <ul>
                <li><a href='../html/a.html'>A</a></li>
                <li><a href='../html/b.html'>B</a></li>
                <li><a href='../html/c.html'>C</a></li>
                <li><a href='../html/d.html'>D</a></li>
                <li><a href='../html/e.html'>E</a></li>
                <li><a href='../html/f.html'>F</a></li>
                <li><a href='../html/g.html'>G</a></li>
                <li><a href='../html/h.html'>H</a></li>
                <li><a href='../html/i.html'>I</a></li>
                <li><a href='../html/j.html'>J</a></li>
                <li><a href='../html/k.html'>K</a></li>
                <li><a href='../html/l.html'>L</a></li>
                <li><a href='../html/m.html'>M</a></li>
                <li><a href='../html/n.html'>N</a></li>
                <li><a href='../html/o.html'>O</a></li>
                <li><a href='../html/p.html'>P</a></li>
                <li><a href='../html/q.html'>Q</a></li>
                <li><a href='../html/r.html'>R</a></li>
                <li><a href='../html/s.html'>S</a></li>
                <li><a href='../html/t.html'>T</a></li>
                <li><a href='../html/u.html'>U</a></li>
                <li><a href='../html/v.html'>V</a></li>
                <li><a href='../html/w.html'>W</a></li>
                <li><a href='../html/x.html'>X</a></li>
                <li><a href='../html/y.html'>Y</a></li>
                <li><a href='../html/z.html'>Z</a></li>
                <li><a href='../html/19.html'>#</a></li>
            </ul>
            <div id='searchbox'>
                <input type='text' id='search' name='search'/>
                <button type='submit' id='searchButton' name='searchButton'>
                    Search
                </button>
            </div>
        </div>
        <hr/>
        <div id='content'>
            <div id='searchbox2'>
                <input type='text' id='search2' name='search2'/>
                <button type='submit' id='searchButton2' name='searchButton2'>Search</button>
            </div>
        </div>
        <div id='footer1'>
            <ul>
                <li><a href='#'>Request Lyrics</a></li>
                <li><a href='#'>Submit Lyrics</a></li>
                <li><a href='#'>Soundtracks</a></li>
                <li><a href='#'>Music Videos</a></li>
                <li><a href='#'>Facebook</a></li>
                <li><a href='#'>Links</a></li>
            </ul>
        </div>
        <hr/>
        <div id='footer2'>
            <ul>
                <li><a href='#'>Advertise Here</a></li>
                <li><a href='#'>Privacy Policy</a></li>
                <li><a href='#'>DMCA Policy</a></li>
                <li><a href='#'>Contact Us</a></li>
            </ul>
        </div>
        <div id='footer3'>
            <p id='description'>All lyrics are property and copyright of their owners.
            All lyrics provided for educational purposes and personal use only
            </p>
            <p id='copyright'><strong>Copyright &copy; 2000-2015 AZLyrics.com</strong></p>
        </div>
    </body>
_END;
}
       
?>