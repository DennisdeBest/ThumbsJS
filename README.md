Add the script to your page, make sure the page contains 2 divs with the id #thumbnails and #largeImg.

Every image you add to the /img/large folder will automaticaly generate it's thumbnail in /img/small (folder will be created if it doesn't exist)

The thumbnails will be displayed in the #miniatures with the class .thumbnail and the id mini_[i].

Make sure rights to the img folder are set to 777 so that php can create the /small folder.

Images can be either jpeg, gif or png
