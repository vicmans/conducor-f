@extends('layouts.app')

@section('content')

<section class="center">
        
    <div class="container">
        <div class="row">
            
            <h1>Mis Pagos</h1>
            

            <table class="table table-striped">
                
                <tr>
                    
                    <td>ID</td>
                    <td>Activo</td>
                    <td>Pagos</td>
                    <td>Numero de ref</td>
                    <td>plan</td>
                    <td>Fecha</td>
                    <td>Fecha de Exp.</td>
                    <td>Dias restantes</td>
                    <td colspan="2">Acciones</td>

                </tr>

@foreach($payouts as $payout)
    @if($payout->wasCreatedBy( Auth::user() ))
        <tr>
            <td> {{ $payout->id }} </td>
            <td> {{ $payout->active }} </td>
            <td> {{ $payout->last_payout }} </td>
            <td> {{ $payout->num_ref }} </td>
            <td> {{ $payout->plan }} </td>
            <td> {{ $payout->created_at->diffForHumans() }} </td>
            <td> {{ $payout->left_days }} </td>
            <td> {{ $payout->exp_date }} </td>
            <td> <a href="#" class="btn btn-info">Edit</a> </td>
            <td> <form action="{{ route('delete_payout_path', ['payout' => $payout->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class='btn btn-danger'>Delete</button>
            </form> </td>
        </tr>

    @endif

@endforeach
    <tr>
        <td></td><td></td>
        @php

            // Obtengo el nro de usuarios
            $pay_cont = App\Payout::where('user_id', Auth::user()->id )->count();

        @endphp
        <td>{{ $pay_cont }}</td>
    </tr>
</table>
</div>
</div>

</section>
@endsection