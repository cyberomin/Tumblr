Tumblr
======

A small PHP that allows you to read post from a tumblr blog

#####Usage
```php
require_once("Tumblr/tumblr.php");  
$tumblr = new Tumblr("david.tumblr.com", "YOUR_API_KEY");  //Replace with your domain and API key
$posts = $tumblr->getPost();  
$post = $posts[0];  
echo "<a href='".$post['post_url']."'>".$post['title']."</a><br>";  
echo substr(strip_tags($post['body']), 0,170)." ...<br/>";  
echo "<a href='".$post['post_url']."'>Read More</a><br>";  
```