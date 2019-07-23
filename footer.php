<script>
		function goback(){
			window.location.href="index.php?page_no=<?=$_GET['page_no']?>&query=<?php echo $_GET['query'] ?>";
			alert(console.log($_GET['page_no']));
		}

		function newRecord(){
			window.location.href="new_record.php?page_no=<?php echo $_GET['page_no']; ?>&query=<?php echo $_GET['query'] ?>";
        }

		function display_c(){
		var refresh=1000; // Refresh rate in milli seconds
		mytime=setTimeout('display_ct()',refresh)
		}

		function display_ct() {
		var x = new Date()
		document.getElementById('ct').innerHTML = x;
		display_c();
		}
</script>
</body>
</html>
