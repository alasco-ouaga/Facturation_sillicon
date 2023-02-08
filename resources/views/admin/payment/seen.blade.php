@extends('layouts.admin')
@section('content')
  <div class="container size col-md-12 col-xl-10 col-lg-10 themarge ">
    <form action="{{ route('find_one_payments') }}" method="POST">
        @csrf
        <div class="row mb-3 ">
            <div class="row col-11 rr-marge">
                <input type="number" name="payments_code" required class="form-control"  placeholder="Ecrire le code de récépissé ici">
            </div>
            <div class="row col-1 ">
                <button class="text-center btn btn-primary btn-md  " type="submit">rechercher</button>
            </div>
        </div>
    </form>

    <div class="row">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th scope="col"> Ordre </th>
                    <th scope="col"> Code </th>
                    <th scope="col"> Client </th>
                    <th scope="col"> cout </th>
                    <th scope="col"> montant versé </th>
                    <th scope="col"> Date </th>
                </tr>
            </thead>

            <tbody>
            @if($count != 0 )
                @foreach($payments as $payment)
                        <tr>
                            <td>
                                {{ $payment->id  }} 
                            </td>

                            <td>
                                {{ $payment->invoice->code  }} 
                            </td>
                            
                            <td>
                                {{ $payment->invoice->first_name  }} {{ $payment->invoice->first_name  }}
                            </td>

                            <td>
                                {{$payment->invoice->amount  }}
                            </td>

                            <td>
                                {{$payment->created_at  }}
                            </td>
                            
                            <td>
                                {{ $payments->problem  }}
                            </td>

                            <td>
                                <form action="{{route('payment_view')}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="payment_id" value="{{$payments->id}}" >
                                    <button class="btn btn-primary"> details</button>
                                </form>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
        {{ $paymentss->links()}}
    </div>
    @endif
  </div>
</body>


@endsection