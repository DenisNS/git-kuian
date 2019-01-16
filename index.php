<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Youtube api</title>
  <!--[if IE]>
   <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <style>
   .containeer{
    display: -webkit-flex; 
    -webkit-flex-wrap: wrap;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
   }
   .items{

    width: 300px;
    height: 450px;
    }
    .items-video{
    display :flex;
    flex-basis: 100%;
    justify-content: center;
   }
    
   h1{
    text-align: center;
   }
   .items-text{
    display: flex;
    align-items: top;
    flex-basis: 100%;
    justify-content: center;
   }

   
  </style>
 </head>
 <body>
  <form action="" method="post">
    <p><input type="search" name="q" placeholder="Поиск по сайту"> 
    <input type="submit" name="submit" value="Найти"></p>   
  </form>
  <?php if($_POST['submit']):?><h1 >Результаты поиска</h1><?php endif;?>
  <div class="containeer">
    <?php require 'H.php';?>

    <?php for($t=0;$t<20;$t++):?>
      <div class="items"> 
      <div>
      
        <?php $video = new YouTubeVideo();
        $dataById=$video->videosByIds($dataBySearch->items[$t]->id->videoId);?>



        <div class="items-video"> <iframe allowfullscreen="" src="https://www.youtube.com/embed/<?php echo $dataBySearch->items[$t]->id->videoId;?>?rel=0" width="300" height="300" frameborder="0"></iframe></div>
        <div class="items-text" ><?php echo ($dataBySearch->items[$t]->snippet->title);?></div>
        <div class="items-text" ><b>Автор: </b><?php echo ($dataBySearch->items[$t]->snippet->channelTitle);?></div>
        <div class="items-text" ><b>Дата: </b><?php echo ($dataBySearch->items[$t]->snippet->publishedAt);?></div>
        <div class="items-text" ><b>Просмотры: </b><?php echo(($dataById->items[0]->statistics->viewCount));?></div>
      
      
        
      </div>
      </div>
    <?php endfor;?>
  </div>

    
 </body>
</html>