<form action='post.php' method='post'>
<input type='text' name='title' placeholder='Title...'><br />
<textarea name='text' rows='7' cols='35' placeholder='Text...'></textarea>
<input type='text' name='tags' placeholder='Tags...'><br />
<input type='submit' name='submit'>
</form>

<?php

if($_POST['submit']){

$title = stripslashes(strip_tags($_POST['title']));
$text = stripslashes(strip_tags($_POST['text']));
$tags = stripslashes(strip_tags($_POST['tags']));

if($title && $text && $tags){

require("connect.php");
$date = date("F d, Y");
$sql = mysql_query("SELECT * FROM Blog_posts WHERE title='$title' AND text='$text' AND tags='$tags'");
$numrows = mysql_num_rows($sql);
if($numrows == 0){

mysql_query("INSERT INTO Blog_posts VALUES('', '$title', '$text', '$tags', '$date')");

$sql = mysql_query("SELECT * FROM Blog_posts WHERE title='$title' AND text='$text' AND tags='$tags'");
$numrows = mysql_num_rows($sql);
if($numrows == 1){

echo "Your post has been submitted.";

}
else
  echo "This post has not been submitted.";

}
else
	echo "This post has already been submitted.";
}
else
	echo "You did not fill in all the required fields.";

}

?>
