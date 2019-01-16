
<?php
require 'vendor/autoload.php';
class YouTubeVideo
{

    public $id; //id видео
    public $idView=array();
    public $views=array();
    public $viewsID=array();
    private $apiKey = 'AIzaSyB7oqNYxEGnskHEpKHSCbIH_-VI4_sJkzg';

    private $youtube;


    public function __construct()
    {
        $client = new Google_Client();
        $client->setDeveloperKey($this->apiKey);

        $this->youtube = new Google_Service_YouTube($client);

    }

    public function videosByIds( string $ids)
    {
        return $this->youtube->videos->listVideos('snippet, statistics, contentDetails', [
            'id' => $ids,
        ]);
    }

     public function videos(int $maxResults=20, string $region='RU')
    {
        return $this->youtube->videos->listVideos('snippet, statistics, contentDetails', [
           //'chart' => 'mostPopular',
            'maxResults' => $maxResults,
            'regionCode' => $region,
        ]);
    }


    public function search(string $q, int $maxResults=20, string $lang='ru',string $order ='date' ){

        $response = $this->youtube->search->listSearch('snippet',
            array(
                'q' => $q,
                'maxResults' => $maxResults,
                'relevanceLanguage' => $lang,
                'order' => $order,
                'type' => 'video'
            ));
      
     

        return $response;
      }

  public function viewSort($dataBySearch)
  {

    for ($i=0; $i < 20; $i++)
    { 
      
        $dataById=$this->videosByIds($dataBySearch->items[$i]->id->videoId);
        
        $views[$i]=(int)($dataById->items[0]->statistics->viewCount);
        $viewsID[$i]=(int)($dataById->items[0]->statistics->viewCount);
    }
    
    $sort =arsort($views);
    foreach ($views as $key => $value) {
      $idView[]=$key;
    }
    
        
          

        

        return $idView;
  }
    


}

       
if(isset($_POST['submit']))
{

        $video = new YouTubeVideo();
       
        $dataBySearch = $video->search($_POST['q']);
        $idView=$video->viewSort($dataBySearch);



      }





?>