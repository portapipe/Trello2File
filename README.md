# Trello2File
Save/Get your Trello lists to/from your own server.

## Features
- Free Forever
- One-file script :)
- CAN AVOID THE Cross-Domain ISSUE!
- Configurable in few seconds
- Build-in dynamic jsonp response
- Return the json/jsonp file from the trello2file.php file
- Edit few lines to create tons of files with all the data containted in the cards
- Just call the trello2file.php file one time to generate/update all the json files
- Can be used with cronjobs (so it will auto-update everything, you can forget it exist)

### 2 Steps Installation
- drag trello2file.php into your server
- create a "jsons" folder with 777 permissions

### How to get the data
After completing the configuration setup (you can find how to do it just here below) you can get the generated json files in 2 ways:
- accessing directly to the generated json file (`http://yourserver.com/jsons/file.json`)
- (suggested) by calling the `trello2file.php` file, appending the file you want at the end of the url (`...php?file=yourFile`)

The last method can let you to make a jsonp call too! J ust add `&callback=yourFunction` after the file argument and you have your jsonp data!
```js
//JSON EXAMPLE
//example for a resturant
var url = "http://yourserver.com/trello2file.php?file=Menu";
//this will return the file 'jsons/Menu.json' (it must exists)

//JSONP EXAMPLE
var url = "http://yourserver.com/trello2file.php?file=Menu&callback=logData";

var logData = function(data){
  console.log("The JSON data are:");
  console.log(data);
}

```

### Configuration
- edit trello2file.php file
- put your api key ([take it from here](https://trello.com/app-key)) and the token key (from the app-key link click on the "Token" link a few lines below the key)
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
- if you want to use JSONP functionality (to avoid the cross-domain limit) you must call the trello2file.php?file=FileName&callback=yourCallback ([little help here](https://github.com/portapipe/Trello2File/wiki/Cross-Domain-issue,-avoid-it-with-jsonp))
