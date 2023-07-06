
@extends('main.adminlayout')

@section('title', 'Sepak bola')
@section('header')

@stop
@section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
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
            <div class="col-xs-12">
           
              <a href="tambah-team" class="btn btn-primary">tambah team</a>
           <div class="box">
             <div class="box-header">
               <h3 class="box-title">Daftar Team</h3>
             </div><!-- /.box-header -->
             <div class="box-body">
             <table class="table table-bordered" style="border : 2px solid black">
                    <tr>
                      <th style="width: 10px;border : 2px solid black">No</th>
                      <th style="border : 2px solid black">Nama Team</th>
                      <th style="border : 2px solid black">Kabupaten</th>
                      <th style="border : 2px solid black">Coach</th>
                      <th style="border : 2px solid black">Tahun didirkan team</th>
                    
                    </tr>
                    @foreach($team as $item)
                    <tr>
                    <td style="border : 2px solid black">{{ $loop->iteration}}</td>
                      <td style="border : 2px solid black">{{ $item->team_name}}</td>
                      <td style="border : 2px solid black">{{ $item->kabupaten}}</td>
                      <td style="border : 2px solid black">{{ $item->coach}}</td>
                      <td style="border : 2px solid black">{{ $item->founded_year}}</td>
                      
        
    
                    </tr>
                   @endforeach
                  </table>
             </div><!-- /.box-body -->
           </div><!-- /.box -->
         </div><!-- /.col -->
       </div>
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      @stop
      @section('footer')

       @stop