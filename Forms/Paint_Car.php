<?php
//set caller for page
$GLOBALS['caller_page'] = basename(__FILE__, '.php');
include '../HTML_Page_frame/header.php';

//////////get client names
$connection = new mysqli('localhost', 'root', '', 'bookstore');
$connection->query("set names 'utf8'");
if ($connection->connect_errno) {
    die('connection failed:' . $connection->connect_error);
}
$sql_name_query = "SELECT `NAME` FROM `clients`";
$name_result = $connection->query($sql_name_query);
$name_list = $name_result->fetch_all(MYSQLI_ASSOC);

///////get books
$sql_book_query = "SELECT `id`,`NAME`, `author_name` FROM `books`";
$book_result = $connection->query($sql_book_query);
$book_list = $book_result->fetch_all(MYSQLI_ASSOC);
//////////
?>
<style>
    * {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    form input {
        width: 80%;
        padding: 0.1em;
        margin-bottom: 0.5em;
        border: 0.1em solid #ccc;
        border-radius: 0.2em;
        color: #474747;
    }
    form input:focus {
        outline: 0.1em solid #7ccc14;
        background: #edfbda;
    }

</style>
<div class="main">
    <div style="border-radius: 15px;" class="main-div">
        <h1><b>Select car to paint</b></h1>
        <hr>
        <form action="#" method="POST">
            <!--add client select dropdown-->
            <select name="clients" id="sclient" class="reginput"/>
            <option value="">Select Client</option>
            <?php
            foreach ($name_list as $key => $value) {
                foreach ($value as $shit => $name) {
                    $name = iconv('UTF-8', 'Windows-1255', $name);
                    echo '<option value="' . $name . '">' . $name . '</option>';
                }
            }
            ?>
            </select>
            <!--add book info dropdown-->
            <select name="books" id="sclient" class="reginput"/>
            <option value="">Select Book</option>
            <?php
            foreach ($book_list as $key => $book) {
                echo
                '<option   dir="rtl" value="' .
                $book['id'] .
                '">' .
                iconv('UTF-8', 'Windows-1255', ($book['NAME'] . " מאת " . $book['author_name'])) .
                '</option>';
            }
            ?>
            </select>
            <br><br>
            <input type = "submit" class = "btn-login" value = " Submit"/>

        </form>
        <hr>
    </div>
</div>

<?php
include '../HTML_Page_frame/navbar.php';
include '../HTML_Page_frame/footer.php';
