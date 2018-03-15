<?php include "./dashhead.php";?>

<?php include "../connection/connection.php";?>
<?php include "./navigation/leftnavbar.php";?>
<?php include "./navigation/topnavbar.php";?>

<div class="content-wrapper">
	<div class="login-container">
            <div id="output"></div>
            <span class="btn btn-info" style="width:250px; margin-left:-4px;"><h5>Change-Password</h5></span>
            <div class="form-box">

                <form action="../controller/logcontrol.php" method="post">
                    <input name="pass" required="fill" type="password" placeholder="Old password">
                    <input type="password" required="fill" name="pass1" placeholder="New password">
                    <input type="password" required="fill" name="password" placeholder="Confirm password">
                    <button class="btn btn-info btn-block login" style=" margin-left:10px;" name="change" value="save" type="submit">save</button>
                </form>
            </div>
        </div>

</div>
<?php include "dashfoot.php";?>