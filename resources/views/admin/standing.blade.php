
@extends('main.adminlayout')

@section('title', 'Klasemen')
@section('header')

@stop
@section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Klasemen sementara
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
              tr{
                  border : 2px solid black;
              }
              td{
                  border-left :2px solid black;
              }
              .kolom{
                margin-left: 200px;
              }
              @media(max-width:600px){
                .kolom{
                  margin-left:10px;
                }
              }
             
          </style>
          <!-- Main row -->
          <div class="row">
         
           
            <!-- Left col -->
            @foreach ($standings->groupBy('group_id') as $groupId => $groupStandings)
            <div class="col-md-6">
           
       
           <div class="box">
             <div class="box-header">
            
               <h3 class="box-title">Group : {{ $groupStandings->first()->group->name }}</h3>
             </div><!-- /.box-header -->
             <div class="box-body">
             <table class="table table-bordered" style="border : 2px solid black">
                    <tr>
                      <th style="width: 10px;border : 2px solid black">No</th>
                      <th style="border : 2px solid black">Nama Team</th>
                      <th style="border : 2px solid black">P</th>
                      <th style="border : 2px solid black">W</th>
                      <th style="border : 2px solid black">D</th>
                      <th style="border : 2px solid black">L</th>
                      <th style="border : 2px solid black">GF</th>
                      <th style="border : 2px solid black">GA </th>
                      <th style="border : 2px solid black">GD </th>
                      <th style="border : 2px solid black">PTS</th>
                    
                    </tr>
                    @foreach ($groupStandings as $item)
                    <tr>
                    <td style="border : 2px solid black">{{ $loop->iteration}}</td>
                      <td style="border : 2px solid black">{{ $item->team->team_name}}</td>
                      <td style="border: 2px solid black">{{ $item->played ?? 0 }}</td>
                        <td style="border: 2px solid black">{{ $item->won ?? 0 }}</td>
                        <td style="border: 2px solid black">{{ $item->drawn ?? 0 }}</td>
                        <td style="border: 2px solid black">{{ $item->lost ?? 0 }}</td>
                        <td style="border: 2px solid black">{{ $item->goals_for ?? 0 }}</td>
                        <td style="border: 2px solid black">{{ $item->goals_against ?? 0 }}</td>
                        <td style="border: 2px solid black">{{ $item->goal_difference ?? 0 }}</td>
                        <td style="border: 2px solid black">{{ $item->points ?? 0 }}</td>

                    </tr>
                   @endforeach
                  </table>
                 
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