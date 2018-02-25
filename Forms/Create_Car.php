<?php
//globals caller must be first line!
$GLOBALS['caller_page'] = basename(__FILE__, '.php');
include '../HTML_Page_frame/header.php';
include '../Data_Creation/Class_Car.php';
?>
<?php
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    $form_name = filter_var($_POST['car_name'], FILTER_SANITIZE_STRING);
    $form_color = filter_var($_POST['car_color'], FILTER_SANITIZE_STRING);

//    $FormCar = new Car($form_name, $form_color);
//    $FormCar->save_Car();
    try {
        $FormCar = new Car($form_name, $form_color);
        $FormCar->save_Car();
    } catch (Exception $e) {
        file_put_contents('error.txt', $e . "\n");
        echo "SHITSHIT";
    }
}
?>
<div class="main">
    <div style="border-radius: 15px;" class="main-div">
        <h1><b>Please add a car</b></h1>
        <hr>
        <form action="Create_Car.php" method="POST">
            <input type="text" name="car_name" placeholder=" Car name" required/>
            <input type="color" name="car_color" value="#000000"/>  
            <br><br>
            <input type = "submit" class = "btn-login" value = " Submit"/>

        </form>
        <hr>
    </div>
</div>
<script>
    $('[name="car_color"]').change(function () {
        alert($(this).val());
    });
</script>
<?php
include '../HTML_Page_frame/navbar.php';
include '../HTML_Page_frame/footer.php';
