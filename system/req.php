<title>Refresh Div withour refershing the page completely</title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    $(document).ready(function(){
		 $("#div_refresh").load("torder.php");
        setInterval(function() {
            $("#div_refresh").load("torder.php");
        }, 100);
    });
 
</script>
</head>
<body>
    <div id="div_refresh"></div>
</body>
</html>