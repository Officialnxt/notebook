<?php
//require file that allows use to connect to the database
require("connect.php");

//Search our database for blog posts. They will be order by the id and limited to 10 posts
$sql = mysql_query("SELECT * FROM Blog_posts ORDER BY id LIMIT 10");
$numrows = mysql_num_rows($sql);
if($numrows >= 1){
while($row = mysql_fetch_assoc($sql)){

$id = $row['id'];
$title = $row['title'];
$text = $row['text'];
$tags = $row['tags'];
$date = $row['date'];

echo "<a href='/$id'>$title</a><br />";
echo "$text<br >";
echo "$tags<br />";
echo "$date<hr />";

}

}
else
  echo "There are currently no posts.";

?>
