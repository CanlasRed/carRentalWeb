<form action="" method="POST" class="ui form" id="rental_form">
	<input type="text" name="start" id="rental_start" hidden>
	<input type="text" name="end" id="rental_end" hidden>

	<input type="number" name="carID" value="<?php echo $row['carID']?>" hidden>
	<input type="number" name="ownerID" value="<?php echo $row['ownerID']?>" hidden>
	<input type="number" name="userID" value="1" hidden>
	<input type="number" name="driverID" value="<?php echo $row['driverID']?>" hidden>

	<input type="number" name="carAmount" id="carAmount" hidden>
	<input type="number" name="driverAmount" id="driverAmount" value="2000" hidden>
	<input type="number" name="deposit" id="deposit"value="1000" hidden>

	<div id="book_btn" class="ui fluid large vertical green animated disabled submit button rounded-pill">
        <div class="hidden content">Book</div>
        <div class="visible content">
            Book
        </div>
    </div>
</form>