<?php
  $title="Instagram";
  $ct=1;
  $ct2=0;
  require("config.php");
  $comments=explode("\n",file_get_contents("comments.txt"));
?>
<!doctype html>
<html lang="ja" dir="ltr" itemscope itemtype="http://schema.org/ProfilePage">
	<head prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Rajdhani:500" rel="stylesheet">
		<link rel="stylesheet" href="style.css">
		<title><?php echo $config["title"] ?></title>
    <!--script src=".js"></script-->
    <style>
    #picture-side{
      width:100%;
      grid-area: pictureside;
      height:100%;
      display: grid;
      grid-template-columns: 20% 20% 20% 20% 20%;
      grid-template-rows: 20% 20% 20% 20% 20%;
      grid-template-areas:  'picture_grid_1 picture_grid_2 picture_grid_3 picture_grid_4 picture_grid_5' 'picture_grid_6 picture_center picture_center picture_center picture_grid_7' 'picture_grid_8 picture_center picture_center picture_center picture_grid_9' 'picture_grid_10 picture_center picture_center picture_center picture_grid_11' 'picture_grid_12 picture_grid_vertical picture_grid_13 picture_grid_14 picture_grid_15'
      }
      <?php for($i=1;$i<=15;$i++): ?>
    #picture_grid_<?php echo $i; ?>{
      grid-area: picture_grid_<?php echo $i; ?>;
      display: grid;
      height: calc(100% + 1px);
      width: calc(100% + 1px);
      grid-template-columns: 50% 50%;
      grid-template-rows: 33.3% 33.3% 33.3%;
      grid-template-areas:  'picture_<?php echo $ct++; ?> picture_<?php echo $ct++; ?>' 'picture_<?php echo $ct++; ?> picture_<?php echo $ct++; ?>' 'picture_<?php echo $ct++; ?> picture_<?php echo $ct++; ?>'
    }
    <?php endfor; ?>
    #picture_grid_16{
      grid-area: picture_grid_vertical;
      display: grid;
      height: calc(100% + 1px);
      width: calc(100% + 1px);
      grid-template-rows: 50% 50%;
      grid-template-columns: 33.3% 33.3% 33.3%;
      grid-template-areas:  'picture_<?php echo $ct++; ?> picture_<?php echo $ct++; ?> picture_<?php echo $ct++; ?>' ' picture_<?php echo $ct++; ?> picture_<?php echo $ct++; ?> picture_<?php echo $ct++; ?>'
    }
    <?php for($i=1;$i<=72;$i++): ?>
    #picture_<?php echo $i; ?>{
      grid-area: picture_<?php echo $i; ?>;
      height: 100%;
    }
    <?php endfor; ?>
    #picture_center{
      grid-area: picture_center;
      position:relative;
    }
    #picture-side img{
      width:100%;
      height:100%;
    }
    </style>
  </head>
  <body>
  <div id="header">
        <div class="title"><?php echo $config["title"] ?></div>
        </div>
      <div id="wrap">
        <div id="box">
          <div id="picture-side">
          <?php for($i=1;$i<=15;$i++): ?>
          <div id="picture_grid_<?php echo $i; ?>">
            <?php for($k=1;$k<=6;$k++): $ct2++; ?>
            <div id="picture_<?php echo  $ct2?>">
              <img src="./img_deploy/<?php echo $ct2; ?>.jpg">
            </div>
            <?php endfor; ?>
            </div>
            <?php endfor; ?>
            <div id="picture_grid_16">
            <?php for($l=1;$l<=6;$l++): $ct2++;?>
            <div id="picture_<?php echo  $ct++?>">
              <img src="./img_deploy/vertical/<?php echo $l; ?>.jpg">
            </div>
            <?php endfor; ?>
            </div>
            <div id="picture_center">
              <span id="location"><img src="room.svg" id="room"><span class="letters"><?php echo $config["title"] ?></span></span>
              <img src="./img_deploy/center/1.jpg">
            </div>
          </div>
          <div id="add-side">
            <div id="info">
              <img src="./img_deploy/components/insta-likes.png" id="insta-likes">
              <img src="./img_deploy/components/insta-bm.png" id="insta-bm"><br>
              <div id="likes-count"><b>いいね！<?php echo $config["likes"] ?>件</b><br><span id="times-count"><?php echo $config["time"] ?></span></div>
              <div id="comment-add">
                コメントを追加...
              </div>
            </div>
          </div>
          <div id="comments-side">
              <div id="user">
                <img src="./img_deploy/components/pg.png" id="user-img">
                <div id="user-name">
                <?php echo $config["name"] ?>・フォロー中
                </div>
              </div>
              <div id="comments">
              <?php for($i=0;$i<=$config["count"];$i++): ?>
                  <div class="comment"><span class="name"><?php echo $names[$i]; ?></span><?php echo $comments[$i]; ?></div>
              <?php endfor; ?>
              </div>
          </div>
        </div>
      </div>
      <script src="//twemoji.maxcdn.com/2/twemoji.min.js?11.2"></script>
      <script>
      document.body=twemoji.parse(document.body);
      </script>
  </body>