<?php
$names = ['Rock','Paper','Scissors'];
$compItem=2;
if(isset($_POST['play']))$compItem=rand(0,2);
function check($computer, $human) {

    if($human==$computer)
    return "Tie";

    if((($human==0&$computer==2)|($human==1&$computer==0)|($human==2&$computer==1)))
    return "You Win";

    if((($human==0&$computer==1)|($human==1&$computer==2)|($human==2&$computer==0)))
    return "You Lose";

}

function test($names){

    for($c=0;$c<3;$c++) {
        for($h=0;$h<3;$h++) {
            $r = check($c, $h);
            echo "Human=$names[$h] Computer=$names[$c] Result=$r\n";
        }
    }
}
if(isset($_POST['logout'])) header("Location: index.php");
if(!isset($_GET['name'])) die("Name parameter missing");
?>
<head><title>Бакаев Родион Олександрович Rock Paper Scissors</title></head>
<body>
<div class="container">
<h1>Rock Paper Scissors</h1>
<p>Welcome: <?php echo $_GET['name']; ?></p>
<form method="post">
    <select name="human">
        <option value="-1" selected>Select</option>
        <option value="0">Rock</option>
        <option value="1">Paper</option>
        <option value="2">Scissors</option>
        <option value="3">Test</option>
    </select>
    <input type="submit" name='play' value="Play">
    <input type="submit" name="logout" value="Logout">
</form>

<pre>
<?php
if(!isset($_POST['human'])OR$_POST['human']==-1) echo "Please select a strategy and press Play.";
if(isset($_POST['human'])AND$_POST['human']!=3 AND $_POST['human']!=-1) echo "Your Play=".$names[$_POST['human']]." Computer Play=".$names[$compItem]." Result=".check($compItem,$_POST['human']."\n");
if(isset($_POST['human'])AND$_POST['human']==3) test($names);
?>
</pre>
</div>
</body>

