<?php

class Tumblr 
{
	private $url = "http://api.tumblr.com/v2/blog/";
        
	public function __construct($blog_url,$api_key) {
                $blog_url = $this->url.$blog_url."/posts/text?api_key=";
	        $this->url = $blog_url.$api_key;
	}

	public function getPost() {
		$ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $this->url);
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HTTPGET, 1);
                $result = trim(curl_exec($ch));
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                $result = json_decode($result, true);
                if ($result['meta']['status'] == 200) {

                	return $result['response']['posts'];
                } 
	}
}
?>