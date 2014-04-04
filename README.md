## README: kirby-kirbytag-html5video

## html5 video markdown

This is an extension of kirbytext for the [kirby cms](getkirby.com), which adds the possibiliy to add html5-video very simple in your text file like any link you add. It´s done by extending the default kirbytags in the file kirbytag.extend.php.  
This extension/ funciton will generate the HTML5-video-tag element with the correct source files. It can handle links to mp4 (h.264), webm and HTTP-live-streaming sources (you can disable some) as well as a poster. A special feature of this kirbytag-extension is, that the videos can be stored in a seperate folder so they can be at an other location than the content-folder.


#### how to use
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

#### why not store the video files in the content-folder?
I choosed to store all the videos in a seperate folder, because all my html-root is synced to my dropbox (I´m very lazy to sync my local HTML-editor and my webserver). But the video-files are quite big, so I excluded the video-folder from the sync.  
** exclude this folder from dropbox-sync before you add any content to that folder! Or move the content temprary to another folde! Otherwise alle the content in the excluded folder will be removed from the local directory (but not the server)**

So I add video-files via (S)FTP an edit all my other files via dropbox sync to my computers dorectory.


#### CSS

you can add css-rules for the class "html5player" to style the video-player:
Add this little rule to make the player fill the full width of the parent-container and have the aspect-ratio of the poster-file

    .html5player {width: 100%; height: auto;}
    
    
#### to do:
perhaps someone can add a auto-detection, if the source file exists, so you needn´t add the options manually.



## responsive youtube player embedding

#### how to use

simply add your video ID in your markdown in the following way:

    (html5youtube: {video-ID})

you will only need the youtube-video-ID, not the whole link. Of course you can add more options (the ones that are in the embedding URL. See [google embedding options reference](https://developers.google.com/youtube/player_parameters?hl=en#Parameters). )

Now your markdown tag can look like this:

	(html5youtube: {video-ID} options: &modestbranding=1)


#### CSS

simply add this two lines of code to your CSS file to make the youtube-player responsive/ switch from fixed size to the width of the container it is placed in.

	div.video-container {width: 100%; padding-bottom: 56%; padding-top: 30px; height: 0; overflow: hidden; max-width: 100%; height: auto; position: relative;}
	
	.video-container iframe {position: absolute; top: 0; left: 0; width: 100%; height: 100%;}
