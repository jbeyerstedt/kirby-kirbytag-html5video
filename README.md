# kirbytag html5video
by Jannik Beyerstedt from Hamburg, Germany  
[jannikbeyerstedt.de](http://jannikbeyerstedt.de) | [Github](https://github.com/jbeyerstedt)  


## responsive html5 video player for lazy people

#### update:
This is the version for kirby 2! html5youtube has moved to [it´s own repository](https://github.com/jtByt-Pictures/kirby-kirbytag-html5youtube)

## Introduction

This is an extension of kirbytext for the [kirby cms](getkirby.com), which adds an easy way to embed your self-hosted html5-video sources in a responsive layout. This means, you can use it responsive, or it´ll adapt to your layout anyway.  

I know that there are some other solutions out there, but I´m lazy, so this is the version for the lazy people.
  
This extension can handle mp4 (h.264), webm and HTTP-live-streaming sources as well as a poster. You can select, which versions you have.  
Another special feature is, that the videos are stored in a special folder to keen bug data in one place.


#### how to use
store this file in
	
	site/tags/

* store your video files in a folder named "video" in your html-root
	* or change the $baseurl in the php
* have a name for your video-files, e.g. "NAME"
* name and store it with this sceme:

type:     | poster-file:    | hls-index:       | mp4-file:    | webm-file:  
------    |------           |------            |------        |------
name:     | NAME-poster.png | NAME-index.m3u8  | NAME-h264.mp4| NAME-webm.webm
location: | /video          | /video/NAME-hls/ | /video       | /video
example (in your video folder):  | cool-video-poster.png | /cool-video-hls/cool-video-index.m3u8 | cool-video-h264.mp4 | cool-video-webm.webm  

* add a kirbytag to your content-file (txt) at the point you want the video to be:  

	  (html5video: cool-video)  
* additional options to exclude single sources (default value is TRUE):
	* hls: FALSE
	* mp4: FALSE
	* webm: FALSE
*  
	   (html5video: cool-video webm: FALSE hls: FALSE)  


#### CSS

you can add css-rules for the class "html5player" to style the video-player:
Add this little rule to make the player fill the full width of the parent-container and have the aspect-ratio of the poster-file

    .html5player {width: 100%; height: auto; background-color: black;}
    
    
#### why not store the video files in the content-folder?
I choosed to store all the videos in a seperate folder, because all my html-root is synced to my dropbox (I´m very lazy to sync my local HTML-editor and my webserver). But the video-files are quite big, so I excluded the video-folder from the sync.  
** exclude this folder from dropbox-sync before you add any content to that folder! Or move the content temprary to another folde! Otherwise alle the content in the excluded folder will be removed from the local directory (but not the server)**

So I add video-files via (S)FTP an edit all my other files via dropbox sync to my computers dorectory.

 
#### to do:
- auto-detection if the source files exist.



