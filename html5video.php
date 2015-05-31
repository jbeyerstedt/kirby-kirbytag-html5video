<?php
/*
 * kirbytag html5video
 * html5 video player embedding for lazy people
 *
 * copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | code@jannikbeyerstedt.de
 * license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License
 *
 * version 2.1 (06.04.2015)
 * changelog:
 * - v2.0: kirby 2 support
 * - v2.1: fix broken default values
 */

kirbytext::$tags['html5video'] = array(
  'attr' => array(
    'hls',
    'h264',
    'webm'
  ),
  'html' => function($tag) {
    $source = $tag->attr('html5video');

    $baseurl =  url('/video/');
    $posterurl = $baseurl . urlencode($source) . '-poster.png';


    if ($tag->attr('hls') === null || strtolower($tag->attr('hls')) === 'true' ) {
      $hlsurl = $baseurl . urlencode($source) . '-hls/' . urlencode($source) . '-index.m3u8';
      $hlssource = '<source src="' . $hlsurl . '" type="application/x-mpegurl">';}
    else {
      $hlssource = "";}

    if ($tag->attr('h264') === null || strtolower($tag->attr('h264')) === 'true' ) {
      $mp4url = $baseurl . urlencode($source) . '-h264.mp4';
      $mp4source = '<source src="' . $mp4url . '" type="video/mp4">';}
    else {
      $mp4source = "";}

    if ($tag->attr('webm') === null || strtolower($tag->attr('webm')) === 'true' ) {
      $webmurl = $baseurl . urlencode($source) . '-webm.webm';
      $webmsource = '<source src="' . $webmurl . '" type="video/webm">';}
    else {
      $webmsource = "";}


    return '<video class=html5player controls="controls" poster="' . $posterurl . '" preload="none">' .
      $hlssource .
      $mp4source .
      $webmsource .
      'Dein Browser kann HTML5-Video nicht. Nimm eine aktuelle Version. Your browser does not support the video tag, choose an other browser.' .
      '</video>';

  }

);
