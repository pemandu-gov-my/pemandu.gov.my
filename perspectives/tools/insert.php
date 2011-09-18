<pre><?php
$dbserver = "127.0.0.1";
$dbname = "pemandu1_gtp";
$dbusername = "pemandu1_gtp";
$dbpassword = "pemandu1_gtp";

function seoUrl($string) {
$url = $string;
$urlout = urlencode($url);
return $urlout;
}

$temp = nl2br(addslashes($_POST['post_content']));
$tempexplode = explode('<br />',$temp);

mysql_connect("$dbserver","$dbusername","$dbpassword") or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
$query = "select * from `pm_posts` order by id desc limit 1";
$result = mysql_query($query);
$row=mysql_fetch_assoc($result);
$id = $row['ID']+1;

$post_author = 1;
$post_date = date('Y-m-d H:i:s');
$post_date_gmt = date('Y-m-d H:i:s');
$post_content = nl2br(($_POST['post_content']));
$post_title = addslashes($tempexplode[0]);
$post_excerpt = '';
$post_status = 'publish';
$comment_status = 'open';
$ping_status = 'open';
$post_password = '';
$post_name = $id."-".seoUrl($post_title);
$to_ping = '';
$pinged = '';
$post_modified = date('Y-m-d H:i:s');
$post_modified_gmt = date('Y-m-d H:i:s');
$post_content_filtered = '';
$post_parent = $id-1;
$guid = "http://www.pemandu.gov.my/gtp/?p=$id";
$menu_order = 0;
$post_type = 'post';
$post_mime_type = '';
$comment_count = 0;

echo "
`ID` = \"$id\",
`post_author` = \"$post_author\",
`post_date` = \"$post_date\",
`post_date_gmt` = \"$post_date_gmt\",
`post_content` = \"$post_content\",
`post_title` = \"$post_title\",
`post_excerpt` = \"$post_excerpt\",
`post_status` = \"$post_status\",
`comment_status` = \"$comment_status\",
`ping_status` = \"$ping_status\",
`post_password` = \"$post_password\",
`post_name` = \"$post_name\",
`to_ping` = \"$to_ping\",
`pinged` = \"$pinged\",
`post_modified` = \"$post_modified\",
`post_modified_gmt` = \"$post_modified_gmt\",
`post_content_filtered` = \"$post_content_filtered\",
`post_parent` = \"$post_parent\",
`guid` = \"$guid\",
`menu_order` = \"$menu_order\",
`post_type` = \"$post_type\",
`post_mime_type` = \"$post_mime_type\",
`comment_count` = \"$comment_count\"
";

$query = "
INSERT INTO `pm_posts` set 
`ID` = \"$id\",
`post_author` = \"$post_author\",
`post_date` = \"$post_date\", 
`post_date_gmt` = \"$post_date_gmt\",
`post_content` = \"$post_content\",
`post_title` = \"$post_title\",
`post_excerpt` = \"$post_excerpt\",
`post_status` = \"$post_status\",
`comment_status` = \"$comment_status\",
`ping_status` = \"$ping_status\",
`post_password` = \"$post_password\",
`post_name` = \"$post_name\",
`to_ping` = \"$to_ping\",
`pinged` = \"$pinged\",
`post_modified` = \"$post_modified\",
`post_modified_gmt` = \"$post_modified_gmt\",
`post_content_filtered` = \"$post_content_filtered\",
`post_parent` = \"$post_parent\",
`guid` = \"$guid\",
`menu_order` = \"$menu_order\",
`post_type` = \"$post_type\",
`post_mime_type` = \"$post_mime_type\",
`comment_count` = \"$comment_count\"
";
mysql_query($query) or die(mysql_error());

?>
<form method=post>
<textarea rows="" cols="" name="post_content" style="width:100%;height:480px;"></textarea>
<input type="submit">
</form>