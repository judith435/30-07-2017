<?php
    require_once 'connection.php';
    require_once 'content.php';
    require_once 'misc.php';

    if (isset($_POST['header']) && isset($_POST['content'])) {
         if (($_POST['header']) != "" && ($_POST['content']) != "") {
            $cheader = $_POST['header'];
            $ctext = $_POST['content'];


            $con = new Connection();
            $resultsSqlRows = $con->executeInsertStatement(
            'INSERT INTO `ls42_contents`(`content_type`, `content_header`, `content_text`) VALUES 
                (:ctype, :cheader, :ctext)', ["ctype" => 1, "cheader" => $cheader, "ctext" => $ctext]);
        
         }
    }
?>
<html>
<head>
</head>
<body>
    <form action='create.php' method='post'>
        Header: <input name='header'>
        Content: <textarea name='content'></textarea>
        <button>Insert</button>
    </form>
</body>
</html>