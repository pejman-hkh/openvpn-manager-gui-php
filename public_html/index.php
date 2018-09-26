<?
include("../header.php");

?>


		<h2>Welcome </h2>

		<?
		$fetch = $db->sql("SELECT COUNT(*) as count FROM user ")->find_one();
		$fetch_ac = $db->sql("SELECT COUNT(*) as count FROM user WHERE status = '1' ")->find_one();
		$fetch_online = $db->sql("SELECT COUNT(*) as count FROM user WHERE online = '1' ")->find_one();
		?>

		<b>Cout user : </b> <?=$fetch['count']?> <br />
		
		<b>Cout active user : </b> <?=$fetch_ac['count']?><br />
		<b>Cout online user : </b> <?=$fetch_online['count']?><br />

<?
include("../footer.php");
?>