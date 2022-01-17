<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSS reader</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <input type="text" name="feedval" placeholder="Please enter the website feed URL" class="feedval">
        <input type="submit" name="submit" class="sub-btn">
    </form>
    <?php 
        $url = "https://makitweb.com/feed/";
        if(isset($_POST['submit'])){
            if($_POST['feedval'] != ''){
                $url = $_POST['feedval'];
            }else{
                
            }
        }

        if(@simplexml_load_file($url)){
            $feeds = @simplexml_load_file($url);
        }else{
            echo "URL is invalid";
        }

        if(!empty($feeds)):
            $site = $feeds->channel->title;
            $siteLink = $feeds->channel->link;

            echo "<h1 class='web-title'>". $site ."</h1>";

            foreach($feeds->channel->item as $item):
                $title = $item->title;
                $link = $item->link;
                $description = $item->description;
                $postDate = $item->pubDate;
                $pubDate = date('d M Y, D', strtotime($postDate));
                
            ?> 
                <div class="post">
                    <div class="post-head">
                        <h2><a href="<?php echo $link ?>"><?php echo $title ?></a></h2>
                        <p><?php echo $pubDate ?></p>
                    </div>
                    <div class="post-content">
                        <p><?php echo implode(' ', array_slice(explode(' ', $description), 0, 20)) . "..."; ?> <a href="<?php echo $link; ?>">Read more</a></p>
                    </div>
                </div>
    <?php    
            endforeach;
        endif;
    ?>

</body>
</html>