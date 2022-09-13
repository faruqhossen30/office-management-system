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



    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Sl</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Office Name</th>
                    <th class="text-center">Expense Type</th>
                    <th class="text-center">Sub Expense Type</th>
                    <th class="text-center">Payment Type</th>
                    <th class="text-center">Expense Date</th>

                </tr>
            </thead>

            @php
                $serial = 1;
            @endphp
            <tbody>
                @foreach ($expense_lists as $expense_list)
                    <tr>

                        <th scope="row">{{$serial++}}</th>
                        <td><strong>{{ $expense_list->amount }}Tk</strong></td>
                        <td>{{ $expense_list->office->name }}</td>
                        <td>{{ $expense_list->expencetype->name ?? '' }}</td>
                        <td>{{ $expense_list->subexpense->name ?? '' }}</td>

                        <td>{{ $expense_list->paymentsystem->name }}</td>
                        <td>{{ Carbon\Carbon::parse($expense_list->date)->format('d M Y') }}</td>




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
