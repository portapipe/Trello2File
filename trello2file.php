<!--no edit here - IGNORE THE NEXT LINE-->
<?php if(isset($_GET['file'])){ $id = $_GET['file']; $myfile = file_get_contents("jsons/$id.json", "w") or die("Unable to open file $id!");	if(isset($_GET['callback'])){ echo $_GET['callback']."(".$myfile.");"; }else{ echo $myfile; }die;}

/* - YOU MUST EDIT THESE LINES BELOW WITH YOUR KEY AND TOKEN - */
$key = "YOUR_KEY";
$token = "YOUR_TOKEN";
?>
<!-- YOU HAVE TO ADD YOUR LIST IDs HERE, THE SYSTEM WILL DO THE MAGIC -->
<script>
	var lists = {
		"FileNameBasedOnColumn1" : "idOfColumn1",
		"FileNameBasedOnColumn2" : "idOfColumn2"
	}
</script>

<?php
/* jsonp avoid the cross-domain issue, change to "true" if you have that issue
   so the json data will be closed into a function with the name of the list
   - example: FileNameBasedOnColumn1(..json..)
*/ $use_jsonp = false;
?>


<!-- DO NOT EDIT DOWN HERE IF YOU DON'T KNOW WHAT YOU ARE DOING :) -->
<?php
$url = "https://api.trello.com/1/client.js?key=$key&token=$token";

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$content = $_POST['content'];
	if($use_jsonp){ $content = $_POST['id']."(".$content.")"; }
	$myfile = fopen("jsons/$id.json", "w") or die("Unable to open file $id!");
	$txt = $content;
	fwrite($myfile, $txt);
	fclose($myfile);
	die;
}
	
?>
<html>
	<head>
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="<?=$url?>"></script>

		<script>		
		$.each(lists,function(index,value){
			Trello.lists.get(value+"/cards/",success,error);
			function success(data,response){
				if(response=="success"){
					$.post( "trello2file.php", { id: ""+index, content: JSON.stringify(data) } );
					console.log("- Processing "+index+".json")
				}
			}
			function error(error){
				console.log(error);
			}
		})
		</script>
	</head>
	<body>
	</body>
</html>
