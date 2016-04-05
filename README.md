Add the script to your page, make sure the page contains 2 divs with the id #thumbnails and #largeImg.
Also set the 2 php session variables for the width of the thumbnails and the name of the folder where your large images go (the folder will be created automatically whenthe script is first run).

All you have to do after is add any images you like to the newly created folder and the script will generate the correspondig thumbnail folder and thumbnails and add them to the page.

The thumbnails will be displayed in the #miniatures with the class .thumbnail and the id mini_[i].

Make sure your server has the rights to write to the img folder in oreder to be able to generate the thumbnails

Images can be either jpeg, gif or png
