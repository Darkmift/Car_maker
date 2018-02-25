<?php
$css_active_books = "";
$css_active_clients = "";
$css_active_purchase = "";
switch ($GLOBALS['caller_page']) {
    case 'Create_Car':
        $css_active_books = 'class="active"';
        break;
    case 'Paint_Car':
        $css_active_clients = 'class="active"';
        break;
}
?>


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Car_factory</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php echo $css_active_books ?>><a href="../Forms/Create_Car.php">Create Car</a></li>
                <li <?php echo $css_active_clients ?>><a href="../Forms/Paint_Car.php">Paint Car</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>