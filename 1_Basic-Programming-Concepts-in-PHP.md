# Basic programming concepts in PHP

## The basics - how do I add PHP to a web page?
To start with we will write PHP by embedding it in an HTML page. here's an example:
```php
<!DOCTYPE HTML>
<html>
<head>
<title>A simple PHP page</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<h1> This is a PHP Page</h1>

<?php
echo "<p>Welcome to PHP</p>";
?>

</body>
</html>
```
This example simply prints the text *Welcome to PHP*. Here are some key points.

* *echo* is a simple print command.
* The PHP tags (```<?php``` and ```?>```) indicate that the enclosed statements are PHP and not HTML
* The page needs to be saved with a .php extension e.g. mypage.php
* All PHP statements must end with a semi-colon ( ; ) !

### How can I view my PHP web page
* Upload to web server
* Open the page in a browser

## Variables and data type
In PHP all variables start with the dollar sign ($)
```php
<?php
$myVar="Hello World";
echo $myVar; //outputs Hello World
?>
```
PHP is a dynamically typed language.
* We don’t need to specify the type of data a variable contains
* We can change the type of data stored in a variable e.g.
```php
<?php
$myVar = 9;  //number
$myVar = "Hiya"; //string
$myVar = true;  //boolean
?>
```

### Data types in PHP
There are Four simple scalar types:
* boolean (true/false)
* integer e.g. 3, 4,-3201
* float e.g. 1.42, 56.7
* string
  * Can be in single quotes e.g. 'hello world'
  * Can be in double quotes e.g. "hello world"
  

Three compound data types
* array, object, callable (more on these later)

And two special types
* Resource (reference to an external resource e.g. database)
* NULL (A variable with no value)

### Generating output
If we use double quotes (and curly brackets around the variable) the variables in a string will be evaluated e.g.

```php
<?php
$name="Bob";
$job="mechanic";
echo "<p>Hi, my name is {$name}. I work as a {$job}<p>"; //<p>Hi, my name is Bob . I work as a mechanic</p>
?>
```
* If we use single quotes the variable won't be evaluated e.g.

```php
<?php
$name="Bob";
$job="mechanic";
echo '<p>Hi, my name is $name. I work as a $job<p>'; //<p>Hi, my name is $name. I work as a $job</p>
?>
```

If we use single quotes we can use the concatenate operator ( . ) to join the two strings

```php
<?php
$name="Bob";
$job="mechanic";
echo '<p>Hi, my name is '.$name.'. I work as a '.$job; //<p>Hi, my name is Bob . I work as a mechanic</p>
?>
```

For more info see:
* http://php.net/manual/en/language.types.string.php
* https://stackoverflow.com/questions/3446216/what-is-the-difference-between-single-quoted-and-double-quoted-strings-in-php 


## Conditional statements
Again, testing data in PHP works like many other programming languages e.g. a web site that is only for people aged 65 and over:

```php
<?php
$age = 65;
if($age>=65){
    echo "<p><a href='homepage.html'>Welcome to the website</a></p>";
}else{
    echo '<p>Sorry you are not old enough for the website</p>';
}
?>
```

### Comparison Operators
These are the most commonly used comparison operators

| Operator   |       Name       |       
|:--:|:-------------:|
|===|equal|
|!==|not equal|
|<|less than|
|>|greater than|
|<=|less than or equal to|
|>=|greater than or equal to|

Here are some examples:

```php
<?php
//As long as $team doesn't equal Chelsea we display the message
$team="Huddersfield Town";
if($team!=="Chelsea"){
    echo 'Good choice';
}
?>
```

```php
<?php
//if the score is greater than 70 display the message
$score=88;
if($score>=70){
    echo 'You scored an A grade';
}
?>
```

### Logical Operators
| Operator   |       Name       |       
|:--:|:-------------:|
|&&|AND|
|\\|\\||OR|

Logical operators AND (&&) and OR (||) allow us to check for more than one condition at a time.

```php
<?php
//if $score is in the range 60 and 69 the message is displayed
$score=63;
if($score>=60 && $score<70){
    echo 'You got a B grade';
}
?>
```

```php
<?php
//if $uName has a value of Bill or Bob the message is displayed
$uName="Ben";
if($uName=="Bill" || $uName=="Bob"){
    echo "Welcome {$uName}";
}
?>
```

### Else if and switch
We can chain together lots of if statements using *else*:

```php
<?php
$score=45;
if ($score>100) {
    echo "I'm sorry, it's not possible to score higher than 100";
} else if ($score>=70) {
    echo "You got an A grade";
} else if ($score>59 && $score<70) {
    echo "You got a B grade";
} else if ($score>49 && $score<60) {
    echo "You got a C grade";
} else if ($score>39 && $score<50) {
    echo "You got a D grade";
} else if ($score>29 && $score<40) {
    echo "You got an E grade";
} else if ($score<30) {
    echo "Sorry, you've failed the assignment";
}
?>
```

A more compact approach is to use a *switch* statement:

```php
<?php
$module="CIT2318";
switch ($module) {
    case "CFT2111":
        echo "20 credits";
        break;
    case "CIT2318":
        echo "40 credits";
        break;
    case "CIP2225":
        echo "20 credits";
        break;
}
?>

```

## Mixing HTML and PHP
It is common practice to mix HTML and PHP. Here's an example:
```php
<?php
if($logged_in===false){
?>
    <form action="login.php" method="POST">
    <label for="user_name">Username:</label><input type="text" name="user_name" id="user_name">
    <label for="password">Password:</label><input type="password" name="password" id="password">
    <input type="submit">
    </form>
<?php
}else{
?>
    <h1>Welcome</h1>
    <p>We hope you find this site interesting and informative.</p>
<?php
}
?>
```

* Take a couple of minutes to look where the curly brackets and PHP tags are. The different parts of the conditional statement are interspersed with HTML.


## More info
* http://php.net/

All available via books 24x7 through the library
* PHP for Absolute Beginners by  Thomas Blom Hansen and Jason Lengstorf
* Beginning PHP 5.3 by  Matt Doyle
* Beginning PHP and MySQL: From Novice to Professional, Fourth Edition by  W. Jason Gilmore.
