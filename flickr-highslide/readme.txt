=== Flickr + Highslide ===

Contributors: Pim Linders
Donate link: http://flickrhighslide.com
Tags: photos, images, admin, gallery, post, photo album, pictures, photo, photoset, picture, image, flickr, highslide
Requires at least: 2.7
Tested up to: 3.0.1
Stable tag: 1.4

== Description ==

This plugin displays flickr photos using highslide.

= Features =
* 13 unique ways of displaying your photos
* 8 different gallery styles
* Displays photos from a photoset
* Displays all of a user's photos 
* Displays photos in latest or random order
* Ability to change the size of images and thumbnails
* Ability to seperate photos into pages
* Displays photo titles

== Credits ==

Copyright 2009  Pim Linders

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

** Please note **

Highslide JS is licensed under a Creative Commons Attribution-NonCommercial
2.5 License. This means you need the author's permission to use highslide 
http://www.highslide.com/ on commercial websites. 

== Installation ==

1. Upload the files to wp-content\plugins\flickr-highslide
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Configure Flickr + Highslide by going to Admin -> Settings -> Flickr + Highslide
4. Go to your post/page and insert the tag '[flickr_highslide]'
5. Alternatively you can insert `<?php flickr_highslide(); ?>` within your blog's templates by going to Admin -> Appearance -> Editor
6. If you like to use multiple photosets on a post/page insert [flickr_highslide set="NAME OF PHOTOSET HERE"], replacing NAME OF PHOTOSET HERE with the name of your photoset

== Screenshots ==

1. Admin Area
2. Flickr gallery with pagination
3. Highslide - White border and drop shadow
4. Highslide - White design
5. Highslide - Vertical thumbstrip to the left
6. Highslide - Gallery in the parent page

== Changelog ==

= 1.4 =
* Added the ability to display multiple photosets
* Fixed random function

= 1.3.1 =
* Changed API key to user input

= 1.3 =
* Added alt tags to images
* Added pagination support
* Updated Highslide JS
* Removed image limit
* Implemented cURL

= 1.2 =
* Added photoset support

= 1.1 =
* Added highslide gallery options

= 1.0 =
* Improved backend

= 0.3 =
* Added highslide options
* Added order control
* Added image size control
* Added thumbnail control
* Added additional error checking
* Fixed bugs

= 0.2 =
* Added display title control
* Removed alt tag from images


== Frequently Asked Questions ==

= How do I find a flickr user ID? =

You can use this tool http://idgettr.com/ to find your flickr user ID.

= This photo is currently unavailable =

You get this error if you have changed the permission of your pictures from private to public and vice versa. If you want large images then you will need to re-upload your pictures as public to flickr. Changing the image size to medium or small will display your images.