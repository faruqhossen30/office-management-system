<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


  </head>
  <body>



      <div class="card p-3">
          <h3 class="text-center mb-5"><u>Asset  information</u></h3>
    <table class="" width="100%">

        <tbody>
            <tr>
                <th><b>Asset Name</b></th>
                <td>{{$assets->name}}</td>
            </tr>
            <tr>
                <th><b>Asset Type</b></th>
                <td>{{$assets->assettype->asset_name}}</td>
            </tr>
            <tr>
                <th><b>Buy Date</b></th>
                <td>{{$assets->buy_date}}</td>
            </tr>

            <tr>
                <th><b>Expiry Date</b></th>
                <td>{{$assets->expiry_date}}</td>
            </tr>
            <tr>
                <th><b>Warranty Time</b></th>
                <td>{{$assets->warranty_date}}</td>
            </tr>
            <tr>
                <th><b>Serial</b></th>
                <td>{{$assets->serial}}</td>
            </tr>
            <tr>
                <th><b>Additional Information</b></th>
                <td>{{$assets->additional_information}}</td>
            </tr>

            <tr>
                <th><b>Remarks</b></th>
                <td>{{$assets->remarks}}</td>
            </tr>
            <tr>
                <th><b>Author</b></th>
                <td>{{$assets->author->name
                }}</td>
            </tr>
        </tbody>
      </div>
    </table>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


  </body>
</html>




