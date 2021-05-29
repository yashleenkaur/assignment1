<!DOCTYPE HTML>
<html>
<head>
<title>Introduction to PHP</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<?php
// echo "Welcome to PHP";

/*
1.
a) Upload this page to the selene web server. View the page in a browser. Make sure you can see the welcome message.
b) Modify the message so that it appears as a <h1> heading.
*/

echo "<h1>Welcome To PHP</h1>";

/*
2. Uncomment the following three PHP variables.
a) Using these variables and a PHP echo statement output the message 'Hi Fred. Your favourite colour is red. Your favourite website is http://www.hud.ac.uk.'
b) Use HTML <em> tags to italicise the word Fred.
c) Use an HTML anchor element to make the text http://www.hud.ac.uk into an actual hyperlink that links to the University homepage. Again, this should all be done using a PHP echo statement.
*/

$name = "Fred";
$colour = "red";
$url="http://www.hud.ac.uk";
echo "<p>Hi <em>$name</em>. Your favourite colour is $colour. Your favourite website is <a href='".$url."'>$url</a>.</p><br> ";


/*
3. Uncomment following two PHP variables.
a) Create a third variable, name it $total. $total should be assigned a value that is the sum of $num1 and $num2. Using these variables and a PHP echo output the value of $total e.g. '10 + 20 = 30'
b) Create another variable, call it $average. $average should be assigned a value that is the mean average of $num1 and $num2. Again, use a PHP echo statement to output the value of $average.
*/

$num1=10;
$num2=20;

$total= $num1+$num2;

echo "Total: $total <br>";

$average=($num1+$num2)/2;
echo "Average of $num1 and $num2: $average<br>";

/*
4. Uncomment following three PHP variables.
The variables $assign1, $assign2 and $assign3 store the marks out of 100 for a student for three different assignments. Assignment 1 has a weighting of 40%, Assignment 2 has a weighting of 25% and Assignment 3 has a weighting of 35%. Create another PHP variable called $overall. Using PHP mathematical operators, calculate an overall mark for the student and assign this value to the variable $overall. Use an echo statement to print this mark into the HTML page.
*/

$assign1 = 56;
$assign2 = 78;
$assign3 = 68;

$a1=($assign1*40)/100;
$a2=($assign2*25)/100;
$a3=($assign3*35)/100;

$overall=$a1+$a2+$a3;

echo "Overall marks: $overall<br>";

/*
5.
a) In order to pass a module students must get an overall mark that is greater or equal to 40. Write a PHP if statement that will test if $overall is greater than or equal to 40. If it is, use an echo statement to output "passed". If it isn't use an echo statement to output "failed"
b) Write another if statement. This time it should test the value of $overall and output if the student has an A, B, C, D etc.
*/

// a)
if($overall>=40){
    echo "<p>passed</p><br>";
}else{
    echo "<p>failed</p><br>";
}
// b)

if ($overall>100) {
    echo "Invalid marks";
} else if ($overall>=70) {
    echo "Student got A grade";
} else if ($overall>59 && $overall<70) {
    echo "Student got B grade";
} else if ($overall>49 && $overall<60) {
    echo "Student got C grade";
} else if ($overall>39 && $overall<50) {
    echo "Student got D grade";
} else if ($overall>29 && $overall<40) {
    echo "Student got E grade";
} else if ($overall<30) {
    echo "failed";
}

/*
6.
The Kaboom Gas company charge their customers for gas as follows:
Units of Gas Used Cost(£)
Units of Gas:0 to 500 Cost:£10
Units of Gas:501 to 1000 Cost:£10 + 5p for each unit over 500
Units of Gas:Over 1000 Cost:£35 + 3p for each unit over 1000

The following PHP code will assign a random number value to the variable $units. Uncomment the code and write some additional PHP code that will calculate and output the cost of a gas bill based on the value of $units.
*/

$units=rand(0,2000);
echo "<p>Units has a value of {$units}.</p>";

if ($units>1000) {
    echo "cost: £35 + 3p for each unit over 1000<br>";
    $cost=35+($units*3)/100;
    echo "Overall Cost: £$cost";
} else if ($units>=501 && $units<=1000) {
    echo "Cost:£10 + 5p for each unit over 500<br>";
    $cost= 10+($units*5)/100;
    echo "Overall Cost: £$cost";
} else if ($units>0 && $units<=500) {
    echo "Cost:£10<br>";
    $cost= 10;
    echo "Overall Cost: £$cost";
}

?>
</body>
</html>
