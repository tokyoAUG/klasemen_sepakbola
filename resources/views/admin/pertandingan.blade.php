
@extends('main.adminlayout')

@section('title', 'Pertandingan')
@section('header')

@stop
@section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pertandingan
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        @if(session('status'))
            <div class="alert alert-success text-center">
            {{ session('message') }}
            </div>
            @endif
          <!-- Small boxes (Stat box) -->
          <div class="row">
          
          </div><!-- /.row -->
          <style>
             
              .score {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .teams {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        margin-top:-15px;
    }
          </style>
          <!-- Main row -->
          <div class="row">
              <div class="col-lg-12">
          <a href="tambah-pertandingan" class="btn btn-primary">Tambah Pertandingan</a>
          <a href="tambah-pertandingan-multiple" class="btn btn-warning">Tambah Pertandingan multiple</a>
          </div>
            <!-- Left col -->
            @foreach($pertandingan as $item)
                    @php
            $homeGroup = $item->homeTeam->groups->first();
            $awayGroup = $item->awayTeam->groups->first();
            @endphp
            <div class="col-md-6">
      
                <div class="box">
                <div class="box-header">
                <h3 class="box-title"> {{ $homeGroup->name }}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="match-box">
                    <div class="score">
                        <h4>{{ $item->home_team_score}}</h4>
                        <h4 style="visibility:hidden">VS</h4>
                        <h4>{{ $item->away_team_score}}</h4>
                    </div>
                    <div class="teams">
                        <h4>{{ $item->homeTeam->team_name }}</h4>
                        <h4>VS</h4>
                        <h4>{{ $item->awayTeam->team_name }}</h4>
                    </div>
                    <p>{{ $item->match_date}}</p>
                    <p>{{ $item->match_time}}</p>
                    <p>{{ $item->place}}</p>
                </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
    </div><!-- /.col -->
  @endforeach
       </div>
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      @stop
      @section('footer')

       @stop