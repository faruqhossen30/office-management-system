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
          <h3 class="text-center mb-5"><u>Deposit information</u></h3>
    <table class="" width="100%">

        {{-- <caption class="resumecaption">d Contact</caption> --}}
        <tbody>
            <tr>
                <th><b>Amount Source</b></th>
                <td>: &nbsp; {{$deposit->source}}</td>
            </tr>
            <tr>
                <th><b>Authore</b></th>
                <td>:&nbsp;  {{$deposit->author->name}}</td>
            </tr>
            <tr>
                <th>Amount </th>
                <td>: &nbsp; {{$deposit->amount}}</td>
            </tr>
            <tr>
                <th>Payment system </th>
                <td>:&nbsp;  {{$deposit->paymentsystem->name}}</td>
            </tr>
            <tr>
                <th>Office </th>
                <td>: &nbsp; {{$deposit->office->name}}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>: &nbsp; {{$deposit->date}}</td>
            </tr>
            <tr>
                <th>Bank </th>
                <td>:&nbsp;  {{$deposit->banks->name?? ''}}</td>
            </tr>
            <tr>
                <th>Phone </th>
                <td>: &nbsp; {{$deposit->phone}}</td>
            </tr>
            <tr>
                <th>Tranjection </th>
                <td> : &nbsp; {{$deposit->transaction}}</td>
            </tr>
            <tr>
                <th>Description </th>
                <td >:&nbsp;  {{$deposit->remarks}}</td>
            </tr>
            <br>

        </tbody>
      </div>
    </table>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


  </body>
</html>




