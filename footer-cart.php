<?php 

if(isset($_GET['sbmt'])){
    $cc_input = $_GET['input'];
    $cc_dropdown = $_GET['dropdown'];

    if($cc_dropdown == 'usd'){
        $output = $cc_input * 0.23067259;
        echo "<h2 class='text-center' style='background-color: green;isolation: isolate; width: 40%;display: block;
        margin-left: auto;margin-right: auto;'>" . number_format($output,2) . " $" . "</h2>";
    }
    else if($cc_dropdown == 'ero')
    {
        $output = $cc_input * 0.20222283;
        echo "<h2 class='text-center' style='background-color: green;isolation: isolate; width: 40%;display: block;
        margin-left: auto;margin-right: auto;'>" . number_format($output,2) . " €" . "</h2>";
    }
    else if($cc_dropdown == 'gbp'){
        $output = $cc_input * 0.16861284;
        echo "<h2 class='text-center' style='background-color: green;isolation: isolate; width: 40%;display: block;
        margin-left: auto;margin-right: auto;'>" . number_format($output,2) . " £" . "</h2>";
    }
}

?>

<button id="scroll-btn" onclick="scrollToTop()"  title="go to top">☝️</button>

<footer class="section">
<form action="cart.php" method="get" class="cc">
    <span style="color:black;isolation: isolate;">Enter Currency in <i>ron</i>: </span><input type="text" name="input">
    <br>
    <span style="color:black;isolation: isolate;">Select Currency: </span>
    <select name="dropdown" style="background-color:white; isolation: isolate;">
        <option value="usd">Us Dollar</option>
        <option value="ero">Euro</option>
        <option value="gbp">British Pound</option>
    </select>
    <input type="submit" name="sbmt" value="Convert" class="btn btn-light" style="background-color: -internal-light-dark(rgb(255, 255, 255), rgb(59, 59, 59));border:none;border-radius:7px;isolation: isolate;">
</form>
</footer>

<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
<script src="./assets/js/dark-mode.js"></script>
</body>
</html>