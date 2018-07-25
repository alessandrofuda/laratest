@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Choose your plan</div>

                <div class="panel-body">
                    <ul class="list-group">
                        @foreach ($plans as $plan)
                            <li class="list-group-item clearfix">
                                <div class="pull-left">
                                    <h4>{{ $plan->name }}</h4>
                                    <h4>€ {{ number_format($plan->cost, 2, ',','.') }} mensili</h4>
                                    @if ($plan->description)
                                        <p>{{ $plan->description }}</p>
                                    @endif
                                </div>
                                
                                @if(Auth::user() && Auth::user()->subscribedToPlan($plan->braintree_plan, 'main'))
                                    <a href="#" class="btn btn-default pull-right disabled">Piano tariffario già acquistato</a>
                                @else
                                    <a href="{{ url('/plan', $plan->slug) }}" class="btn btn-default pull-right">Scegli questo piano tariffario</a>
                                @endif

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection