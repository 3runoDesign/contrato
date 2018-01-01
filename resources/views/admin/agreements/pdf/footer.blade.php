<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="{{ asset('css/pdf.css') }}" rel="stylesheet">
    <script>
        function subst() {
            var vars={};
            var x=window.location.search.substring(1).split('&');
            for (var i in x) {var z=x[i].split('=',2);vars[z[0]] = unescape(z[1]);}
            var x=['frompage','topage','page','webpage','section','subsection','subsubsection'];
            for (var i in x) {
                var y = document.getElementsByClassName(x[i]);
                for (var j=0; j<y.length; ++j) y[j].textContent = vars[x[i]];
            }
        }
    </script>
</head>
<body onload="subst()">
    <footer>
        <p style="text-align: right; font-size: 11px">
            Página <span class="page"></span> of <span class="topage"></span>
        </p>
    </footer>
</body>
</html>
