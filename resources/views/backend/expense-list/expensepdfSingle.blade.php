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



          <table class="table table-hover" width="100%">

            <h1 class="text-center">Deposit information</h1>
            <caption class="resumecaption">Emergency Contact</caption>
            <tbody>
                <tr>
                    <th><b>Amount Source</b></th>
                    <td>{{$expense_lists->office->name}}</td>
                </tr>
                <tr>
                    <th><b>Authore</b></th>
                    <td>{{$expense_lists->author->name}}</td>
                </tr>
                <tr>
                    <th><b>Expense</b></th>
                    <td>{{$expense_lists->expencetype->name}}</td>
                </tr>
                <tr>
                    <th><b>Sub Expense</b></th>
                    <td>{{$expense_lists->subexpense->name}}</td>
                </tr>
                <tr>
                    <th><b>Voucher No</b></th>
                    <td>{{$expense_lists->voucher_no}}</td>
                </tr>
                <tr>
                    <th><b>payment_system</b></th>
                    <td>{{$expense_lists->paymentsystem->name}}</td>
                </tr>
                <tr>
                    <th><b>bank</b></th>
                    <td>{{$expense_lists->bank->name ?? ''}}</td>
                </tr>
                <tr>
                    <th><b>phone</b></th>
                    <td>{{$expense_lists->phone}}</td>
                </tr>
                <tr>
                    <th><b>transaction</b></th>
                    <td>{{$expense_lists->transaction}}</td>
                </tr>
                <tr>
                    <th><b>date</b></th>
                    <td>{{$expense_lists->date}}</td>
                </tr>
                <tr>
                    <th><b>Description</b></th>
                    <td>{{$expense_lists->description}}</td>
                </tr>
                <tr>
                    <th><b>Remarks</b></th>
                    <td>{{$expense_lists->remarks}}</td>
                </tr>

                <br>

            </tbody>
        </table>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


  </body>
</html>




