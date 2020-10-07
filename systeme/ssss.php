<!doctype html>
    <html>
    <head>
        <script>
            var x = 0;
            var y = 0;
            var z = 0;
            function calc(obj) {
                var e = obj.id.toString();
                if (e == 'tb1') {
                    x = Number(obj.value);
                    y = Number(document.getElementById('tb2').value);
                } else {
                    x = Number(document.getElementById('tb1').value);
                    y = Number(obj.value);
                }
                z = x - y;
                document.getElementById('total').value = z;
                document.getElementById('update').innerHTML = z;
            }
        </script>
    </head>
    <a name="addem" action="" id="addem" >    
        <span id="update">1000</span>
        <input type="text" id="tb1" name="tb1" onkeyup="calc(this)"/>
        <input type="text" id="tb2" name="tb2" value="1000" onkeyup="calc(this)"/>
        <input type="hidden" id="total" name="total" value="0" />
          </a>
    </body>
    </html>