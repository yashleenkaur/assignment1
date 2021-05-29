# PHP Form Processing
Nearly all useful web applications involve form processing. The user enters something into a form and we process this data in some way.

## A simple example
### The HTML

```html
<form action="somepage.php" method="POST">
<p>
<label for="uname">Name:</label>
<input type="text" name="uname" id="uname">
<label for="col">Favourite colour:</label>
<input type="text" name="col" id="col">
<input type="submit" name="submitBtn">
</p>
</form>

```

* The form is created using HTML
  * The ```<form>``` tags mark out the start and end of the form
  * ```<input>``` tags specify form controls e.g. text boxes, buttons, radio buttons etc.
  * The *type* attribute specifies the type of element e.g. *type=text* is a text field the user can type into, *type="submit"* specifies a submit button
   * ```<label>``` tags provide a description for the form control

### The *action* and *method* attributes
This action attribute specifies where the data will be sent.
```html
<form action="somepage.php" method="POST">
```
In the above example when the user clicks the submit button, the data will be sent to somepage.php.

The data is sent as name-value pairs e.g. if the user entered *Fred* into the first text box and *red* into the second, the browser will send:

| name   |       value       |       
|:--:|:-------------:|
|uname|Fred|
|col|red|

* The method attribute specifies how the data will be sent. In this example we use a value of POST. See below for an alternative to POST.

## The PHP
PHP in *somepage.php* has access to the form data through something called the $\_POST variable. The text in quotes specifies which value we want to retrieve.

```php
…
<!DOCTYPE HTML>
<html>
<head>
<title>This is somepage.php</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<?php
echo $_POST["uname"]; //displays whatever the user typed into the uname text box text box
echo $_POST["col"]; //displays whatever the user typed into the col text box box
?>
</body>
</html>

```

## The method attribute
The previous example used the POST method. The other method we will use is the GET method. Here's an example:

HTML
```html
<form action="somepage.php" method="GET">
<p>
<label for="uname">Name:</label>
<input type="text" name="uname" id="uname">
<label for="col">Favourite colour:</label>
<input type="text" name="col" id="col">
<input type="submit" name="submitBtn">
</p>
</form>
```

somepage.php

```php
<?php
echo $_GET["uname"]; //displays whatever the user typed into the uname text box
echo $_GET["col"]; //displays whatever the user typed into the col text box
?>
```

* Notice that it is nearly identical to the previous example, we have just changed the method from POST to GET.
* The difference is how the data is sent. The data is sent as part of the URL.
* When the user clicks the submit button, the browser will follow the following url:

```
http://www.somesite/somepage.php?uname=Fred&col=red
```

* The name-value pairs are appended to the URL
* This part of the URL is called the query string
    * A question mark (?) separates the URL from the query string
    * Each name-value pair is separated by an ampersand(&) symbol

### GET vs POST
* Data sent by GET is visible in the URL as a query string:
  * This can be bookmarked, meaning users don’t have to re-enter form information.
  * Some security issues, the data sent is visible.

* POST is used for:
  * Submitting data for inclusion is a database.
  * Ordering a product.
  * Submitting usernames/passwords.

## Validating user input
When a user submits a form we usually need to check:
* Has the user submitted the form (or have they somehow managed to get to the processing page without completing the form first)?
* Has the user completed all the fields
* Have they entered sensible values?

### Has the user submitted the form?

A commonly used approach is to test for the existence of the submit button variable.

To do this we use a PHP function, *isset()*. Here's a simple (and pointless) example:
```php
<?php
$someVar;
if(isset($someVar)){
    echo "someVar exists"; //echo statement is run, $someVar exists
}
if(isset($aDifferentVar)){
    echo "aDifferentVar exists"; //echo statement not run, $aDifferentVar doesn't exist
}
?>
```

Here's another example showing how we can test if the user has submitted the form:

```html
<form action="formchecker.php" method="GET">
<p>
<label for="uname">Name:</label><input type="text" name="uname" id="uname">
<label for="col">Favourite colour:</label><input type="text" name="col" id="col">
<input type="submit" name="submitBtn">
</p>
</form>

```
Here's the page that will process the form, formchecker.php
```php
<?php
if(isset($_POST["submitBtn"])){
    echo "You submitted the form";
}else{
    echo "You shouldn't have got to this page";
}
?>
```

Here's another example, this time using radio buttons:
* The *type* attribute specifies the inputs are radio buttons.
* The radio buttons all need the same HTML *name* attribute. They then work together as a group. If the user selectes one, the others are deselected.   
* Each radio button has a different *value* attribute. This is the data that will be read using PHP.

```html
...
<form action="city_test.php" method="POST">
<fieldset>
<legend>What is the capital city of Venezuela?</legend>
<label for="sucre_rb">Sucre</label>
<input type="radio" id="sucre_rb" value="Sucre" name="answer">
<label for="sucre_rb">Caracas</label>
<input type="radio" id="caracas_rb" value="Caracas" name="answer">
<label for="sucre_rb">Lima</label>
<input type="radio" id="lima_rb" value="Lima" name="answer">
<input type="submit"/>
</p>
</form>
...
```

Here's the page that will process the form, city_test.php.

```php
<?php
if(isset($_POST["answer"])==true){
    $answer=$_POST["answer"];
    if($answer=='Caracas'){
        echo 'Well done you are correct';
    }else{
        echo "You answered {$answer} that\'s not right';
    }
}else{
    echo 'You didn\'t answer, go back and try again';
}
?>
```

* If the user didn’t answer the question $\_POST["answer"] doesn't exist and the else action is executed.
* If they did answer the question a second (nested) if statement tests if they answered correctly
* We can test checkboxes, radio buttons and submit buttons to see if they have been set
* Text boxes will have always have a value. If the user didn’t enter anything this value will be an empty string i.e. "".

### empty()
We can test to see if a variable is empty. That is the variable exists but doesn't have a value.

```html
<form action="somepage.php" method="GET">
<p>
<label for="uname">Name:</label><input type="text" name="uname" id="uname">
<label for="col">Favourite colour:</label><input type="text" name="col" id="col">
<input type="submit" name="submitBtn">
</p>
</form>
```

This is the page that will process the form, somepage.php.
```php
<?php
if(empty($_POST["uname"])){
    echo "You need to enter a username";
}else{
    echo $_POST["uname"];
}
?>

```

In this example, if the user hasn't entered anything into the text box, the error message will be triggered.

## Form processing - good practices

### Use shorter variable names
A common approach when form processing is to store values from $\_POST in another variable. This variable will be shorter in length so will be easier to work with. Here's an example:
```php
<?php
$uname=$_POST["uname"];
$col=$_POST["col"];
echo "Your favourite colour is {$col}";
?>
```

### Separate PHP code from HTML
Form processing code can quickly become messy. We should try to keep the PHP code as separate as we can from the HTML code.
* Do the bulk of the PHP code at the top of the page before the HTML.
* Assign values to message variables.
* The only PHP in the HTML is used for displaying messages.

Have a look at the following example. The large block of PHP at the top of the page doesn't feature any echo statements. instead we store messages in variables e.g. $err_msg. The PHP in the actual HTML page is simply used to display messages for the user.

```html
<form action="somepage.php" method="GET">
<p>
<label for="uname">Name:</label><input type="text" name="uname" id="uname">
<label for="col">Favourite colour:</label><input type="text" name="col" id="col">
<input type="submit" name="submitBtn">
</p>
</form>
```

This is the page that will process the form, somepage.php.
```php
<?php
$uname;
$col;
$err_msg="";
$errors=false;
if(isset($_POST['submitBtn'])){ //has the form been submitted
    $uname=trim($_POST['uname']);
    $col=trim($_POST['col']);
    if(empty($uname)){ //have they entered a username
        $errors=true;
        $err_msg.="<p>You need to enter a username.</p>";
    }
    if(empty($col)){ //have they entered a colour
        $errors=true;
        $err_msg.="<p>You need to enter a colour.</p>";
    }
}else{
    $errors=true;
    $err_msg.="<p>You shouldn't have got to this page</p>";
}   
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Your page</title>
</head>
<body>
<?php
if($errors){
    echo $err_msg;
}else{
    echo "<p>Username:{$uname} Colour:{$col}</p>";
}
?>
</body>
</html>
```

### 'Postback' forms
It is common to have a single PHP page that displays the form and processes the data the user has entered.

Have a look at the following example that uses the approach described above:

```html
<!DOCTYPE html>
<html>
<head>
<title>Submitting a form to the same page</title>
</head>
<body>
<form action="process.php" method="POST">
<label for="capital">What is the capital of France:</label>
<input type="text" name="capital">
<input type="submit" name="answerBtn">
</form>
</body>
</html>
```

process.php
```php
<?php
$msg="";
$userAns="";
if(isset($_POST["answerBtn"]))
{
    $userAns=$_POST["capital"];
    if($userAns===""){
        $msg = "You need to answer the question";
    }else{
        if($userAns==="Paris"){
            $msg = "You are correct";
        }else{
            $msg = "You are wrong";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Testing the user's answer</title>
</head>
<body>
<?php
echo "<p>{$msg}</p>";
?>
</body>
</html>
```

Instead of having two separate pages, often we will want to have a single page that displays the form and tests the user's answer. Here's the same application written using a single page:

```php
<?php
$msg="";
$userAns="";
if(isset($_POST["answerBtn"]))
{
    $userAns=$_POST["capital"];
    if($userAns===""){
        $msg = "You need to answer the question";
    }else{
        if($userAns==="Paris"){
            $msg = "You are correct";
        }else{
            $msg = "You are wrong";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Submitting a form to the same page</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<label for="capital">What is the capital of France:</label>
<input type="text" value="<?php echo $userAns;?>" name="capital">
<input type="submit" name="answerBtn">
</form>

<?php
echo "<p>{$msg}</p>";
?>
</body>
</html>
```

Here are the key things to notice:
* The HTML form code and PHP processing code are now in one page
* The key to this the action attribute
```php
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
```
The value of SERVER['PHP_SELF'] is simply the URL of the current page. So when the user clicks submit we load the same page again.
* We have to check if the form has been submitted ```if(isset($_POST["answerBtn"]))``` otherwise we would get errors the first time the page loads from trying to work with variable that don't exist yet.
* The textbox where the users enter their answer now looks like the following:
```php
<input type="text" value="<?php echo $userAns;?>" name="capital">
```

 This will display the users answer back into the text box.  

* The first time you see this, it is confusing.
* Try and run this example and understand what is happening.

## More info
http://php.net/

All available via books 24x7 through the library PHP for Absolute Beginners by  Thomas Blom Hansen and Jason Lengstorf

* Beginning PHP 5 by  Matt Doyle
* Beginning PHP and MySQL: From Novice to Professional, Fourth Edition by  W. Jason Gilmore.
