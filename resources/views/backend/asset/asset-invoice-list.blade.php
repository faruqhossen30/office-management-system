<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


</head>

<body>



    <div class="card p-3">
        <h3 class="text-center mb-5"><u>Asset  information List</u></h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th class="text-center">Asset Name</th>
                    <th>Asset type</th>
                    <th>Price</th>
                    <th>Buy date</th>
                    {{-- <th>Expiry date</th> --}}
                    <th>Warranty Period</th>
                    <th>Serial</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($assets as $asset)
                    <tr>
                        <th scope="row"></th>
                        <td>{{ $asset->name }}</td>
                        <td>{{ $asset->assettype->asset_name }}</td>
                        <td>{{ $asset->price }}</td>
                        <td>{{ Carbon\Carbon::parse($asset->buy_date)->format('d M Y') }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($asset->expiry_date)->format('d M Y') }}</td> --}}
                        <td>{{ $asset->warranty_date }}</td>
                        <td>{{ $asset->serial }}</td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>


</body>

</html>
