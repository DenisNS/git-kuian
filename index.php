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



      <div class="items"> 
      <div>
      




        <div class="items-video"> <iframe allowfullscreen="" src="https://www.youtube.com/embed/k3ussYRN52I?rel=0" width="300" height="300" frameborder="0"></iframe></div>
        <div class="items-text" ><b>Видео</b></div>
        <div class="items-text" ><b>Автор: </b></div>
        <div class="items-text" ><b>Дата: </b></div>
        <div class="items-text" ><b>Просмотры: </b></div>
      
      
        
      </div>
      </div>

  </div>

    
 </body>
</html>