<body>
    <div>
        <input type="text" id="stationFilter" onkeyup="myFunction()" class="form-control" placeholder="Zoek op station...">
        <table class="table" id="stationTable">
        <thead>
            <tr>
            <th scope="col">Naam</th>
            <th scope="col">Faciliteiten</th>
            <th scope="col">Stationcode</th>
            <th scope="col">Bekijken</th>
            </tr>
        </thead>
        <tbody>
        @foreach($stations['payload'] as $station)
            <tr>
                <td>{{ $station['namen']['lang'] }}</td>
                <td>{{ $station['heeftFaciliteiten'] }}</td>
                <td>{{ $station['UICCode'] }}</td>
                <td><a class="btn" href="/stations/bekijken/{{ $station['UICCode']}}">Bekijk</a></td>
            </tr>
        @endforeach
        </tbody>
    </div>

    <script>
        function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("stationFilter");
        filter = input.value.toUpperCase();
        table = document.getElementById("stationTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }
        }
        }
    </script>
</body>