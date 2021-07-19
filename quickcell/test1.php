<html>
<head>
<title>Add options dynamically to bootstrap-select (jQuery 3.0)</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>

<link rel="stylesheet" href="http://www.marcorpsa.com/ee/css/custom.css"/>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<style type="text/css">
.dropdown-menu {
-webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
}

.dropdown-menu a {
overflow: hidden;
outline: none;
}

.bss-input
{
border:0;
margin:-3px;
padding:3px;
outline: none;
color: #000;
width: 99%;
}

.bss-input:hover
{
background-color: #f5f5f5;
}

.additem .check-mark
{
opacity: 0;
z-index: -1000;
}

.addnewicon {
position: relative;
padding: 4px;
margin: -8px;
padding-right: 50px;
margin-right: -50px;
color: #aaa;
}

.addnewicon:hover {
color: #222;
}
</style>

</head>
<body>
<div class="wrapper">
<header>
<div class="container">
<h1 class="col-lg-9">Add options dynamically to bootstrap-select - jQuery 3.0</h1>
</div>
</header>
<div class="container">
<h5>Author: Julian Hansen August, 2017</h5>

This is the same sample as t1161.html but uses the jQuery 3.0 library.

<div class="row">
<div class="col-lg-6">
<h2>Select Sample #1</h2>
<select class="selectpicker" id="select1">
<option>Mustard</option>
<option>Ketchup</option>
<option>Relish</option>
</select>
</div>
<div class="col-lg-6">
<h2>Select Sample #2</h2>
<select class="selectpicker" id="select2">
<option>Banana</option>
<option>Peach</option>
<option>Orange</option>
</select>
</div>
</div>


</div>
</div>
<footer>
<div class="container">
Copyright Julian Hansen © 2015
</div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
$(function() {
var content = "<input type="text" class="bss-input" onkeydown="event.stopPropagation();" onkeypress="addSelectInpKeyPress(this,event)" onclick="event.stopPropagation()" placeholder="Add item"> ";

var divider = $('<option/>')
.addClass('divider')
.data('divider', true);


var addoption = $('<option/>', {class: 'addItem'})
.data('content', content)

$('.selectpicker')
.append(divider)
.append(addoption)
.selectpicker();

});

function addSelectItem(t,ev)
{
ev.stopPropagation();

var bs = $(t).closest('.bootstrap-select')
var txt=bs.find('.bss-input').val().replace(/[|]/g,"");
var txt=$(t).prev().val().replace(/[|]/g,"");
if ($.trim(txt)=='') return;

// Changed from previous version to cater to new
// layout used by bootstrap-select.
var p=bs.find('select');
var o=$('option', p).eq(-2);
o.before( $("<option>", { "selected": true, "text": txt}) );
p.selectpicker('refresh');
}

function addSelectInpKeyPress(t,ev)
{
ev.stopPropagation();

// do not allow pipe character
if (ev.which==124) ev.preventDefault();

// enter character adds the option
if (ev.which==13)
{
ev.preventDefault();
addSelectItem($(t).next(),ev);
}
}

</script>


</body>
</html>
