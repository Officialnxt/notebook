<?php
//require file that allows use to connect to the database
require("connect.php");

//Search our database for blog posts. They will be order by the id and limited to 10 posts
$sql = mysql_query("SELECT * FROM Blog_posts ORDER BY id LIMIT 10");
//Get the number of posts
$numrows = mysql_num_rows($sql);
//Check if there is atleast 1 post
if($numrows >= 1){
//while loop for posts
while($row = mysql_fetch_assoc($sql)){

$id = $row['id'];
$title = $row['title'];
$text = nl2br($row['text']);
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
