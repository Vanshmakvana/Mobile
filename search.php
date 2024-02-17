<h2>Search</h2>
	<div id="search_box">
    	<form action="searchresult.php" method="get">
        <input type="text" value="Enter keyword here..." name="search" size="10" id="searchfield" onfocus="ClearText(this)" onblur="ClearText(this)" />
        
        <input type="submit" value="search" />
        </form>
    </div>
<br />
<hr color="green" style="border:2px dotted" />
<h2>Other Links</h2>
<ul class="category_list">
	<li><a href="compare.php">Compare</a>
	<li><a href="selected_search.php">Selected Search</a></li>
</ul>
<?php
	include("connect.php");
	$qv="select * from visit";
	$resv=mysqli_query($con,$qv);
	$rowv=mysqli_fetch_assoc($resv);
?>
<br />
<hr color="green" style="border:2px dotted" /><br />
<font color="#993300" size="3">Visited :</font>
<font color="red" size="3"><b><?php echo $rowv['v_count']; ?></b></font>


         
       