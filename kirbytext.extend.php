<?php 

class kirbytextExtended extends kirbytext {
  
  function __construct($text, $markdown=true) {
    
    parent::__construct($text, $markdown);
     

    $this->addTags('html5video');
    
    $this->addAttributes('hls');
    $this->addAttributes('h264');
    $this->addAttributes('webm');
    
  }
  
  function html5video($params) {
    $source = $params['html5video'];
    
    $defaults = array(
      'hls' => true,
      'h264' => true,
      'webm' => true
    );
    $options = array_merge($defaults, $params);

    $baseurl = 'http://jtbyt-pictures.de/video/';
    $posterurl = $baseurl . urlencode($source) . '-poster.png';
    
    if ($options['hls'] == true) {
      $hlsurl = $baseurl . urlencode($source) . '-hls/' . urlencode($source) . '-index.m3u8';
      $hlssource = '<source src="' . $hlsurl . '" type="application/x-mpegurl">';}
    else {
      $hlssource = "";}
    
    if ($options['h264'] == true) {
      $mp4url = $baseurl . urlencode($source) . '-h264.mp4';
      $mp4source = '<source src="' . $mp4url . '" type="video/mp4">';}
    else {
      $mp4source = "";}
    
    if ($options['webm'] == true) {
      $webmurl = $baseurl . urlencode($source) . '-webm.webm'; 
      $webmsource = '<source src="' . $webmurl . '" type="video/webm">';}
    else {
      $webmsource = "";}
    
    return '<video class=html5player controls="controls" poster="' . $posterurl . '">' . 
      $hlssource . 
      $mp4source . 
      $webmsource .
      'Dein Browser kann HTML5-Video nicht. Nimm eine aktuelle Version. Your browser does not support the video tag, choose an other browser.' . 
      '</video>';
  }
  
}

?>