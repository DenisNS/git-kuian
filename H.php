
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

  

  


}

       
if(isset($_POST['submit']))
{

        $video = new YouTubeVideo();
       
        $dataBySearch = $video->search($_POST['q']);


        
       



      }





?>