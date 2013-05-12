<?php
require("connect.php");
$sql = mysql("SELECT * FROM Blog_posts ORDER BY id DESC LIMIT 10"); 
$numrows = mysql_num_rows($sql);
if($numrows >= 1){

header("Content-type: text/xml"); 

echo "<?xml version='1.0' encoding='UTF-8'?> 
<rss version='2.0'>
<channel>
<title>Notebook Blog | NXT </title>
<link>http://example.com</link>
<description>Notebook Blog </description>
<language>en-us</language>"; 

while($row = mysql_fetch_array($sql)){
$id = $row['id'];
$title = $row['title']; 
$text = $row['text']; 
$date = $row['date']; 

echo "<item> 
<title>$title</title>
<link>http://example.com/blog?id=$id</link>
<description>$text</description>
</item>"; 
} 
echo "</channel></rss>";

}
else
  echo "There are currently no posts."; 
?>
