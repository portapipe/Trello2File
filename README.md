# Trello2File
Save your Trello lists to your own server.

## Features
- Free Forever
- One-file script :)
- CAN AVOID THE Cross-Domain ISSUE!
- Configurable in few seconds
- Edit few lines to create tons of files with all the data containted in the cards
- Just call the trello2file.php file one time to generate/update all the json files
- Can be used with cronjobs (so it will auto-update everything, you can forget it exist)

### 2 Steps Installation
- drag trello2file.php into your server
- create a "jsons" folder with 777 permissions

### Configuration
- edit trello2file.php file
- put your api key ([take it from here](https://trello.com/app-key)) and the token key (from the app-key link click on the "Token" link a few lines below the key)
- optionally you can decide to use jsonp format to avoid the annoying cross-domain issue ([little help here](https://github.com/portapipe/Trello2File/wiki/Cross-Domain-issue,-avoid-it-with-jsonp))
- add every lists you want to create a file for like
```js
var lists = {
  "hereTheFileName" : "hereTheIdOfTheList",
  "secondList" : "idOfSecondList"
}
```
This will create 2 files in the jsons folder, one with the name "hereTheFileName.json" containing all the cards in the first list and "secondList.json" with the cards of the second list.

Now is up to you :) I really can't make it simpler.

##TIPS and TRICKS
- To get the ID of a list open a card and edit the URL adding a ".json" at the end of it. Now search the "idList". Now you can use it in hte lists variable to get all its cards :)
- don't use spaces or special chars into the file names, so use just alphanumeric characters in the key of the lists variable or it should not work
- a good tip is to check the json files the system generate, at least the first time, to check that everything is generated correctly
