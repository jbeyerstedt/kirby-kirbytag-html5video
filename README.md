## README: kirby-kirbytag-html5video

This is an extension of kirbytext for the [kirby cms](getkirby.com), which adds the possibiliy to add html5-video very simple in your text file.  
It will add source links for a poster, HTTP-live-streaming, mp4 (h.264) and webm source. You can exclude some of them if you have no source.

### how to use
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

### why not store the video files in the content-folder?
I choosed to store all the videos in a seperate folder, because all my html-root is synced to my dropbox. But the video-files are quite big, so I excluded the video-folder from the sync.  
** exclude this folder from dropbox-sync before you add any content to that folder! Or move the content temprary to another folde! Otherwise alle the content in the excluded folder will be removed from the local directory (but not the server)**

So I add video-files via FTP an edit all my other files via dropbox sync to my computers dorectory.


### CSS

you can add css-rules for the class "html5player" to style the video-player:
Add this little rule to make the player fill the full width of the parent-container and have the aspect-ratio of the poster-file

    .html5player {width: 100%; height: auto;}
    
    
### to do:
perhaps someone can add a auto-detection, if the source file exists, so you needn´t add the options manually.