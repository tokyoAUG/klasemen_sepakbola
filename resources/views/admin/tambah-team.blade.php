
@extends('main.adminlayout')

@section('title', 'tambah team')
@section('header')

@stop
@section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            tambah team
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
            <div class="col-md-8">
           
            <a href="/" class="btn btn-warning">Kembali</a>
           <div class="box">
             <div class="box-header">
               <h3 class="box-title">tambah team</h3>
             </div><!-- /.box-header -->
             <div class="box-body">
             <form action="{{ route('tambah.team') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="team_name">Nama Team</label>
                    <input type="text" name="team_name" id="team_name" class="form-control @error('team_name') has-error @enderror">
                    @error('team_name')
                     <small class="text-danger">{{$message}}</small> 
                            @enderror
                </div>

                <div class="form-group">
                    <label for="district">Kabupaten</label>
                    <select name="kabupaten" id="district" class="form-control @error('kabupaten') has-error @enderror">
                        <option value="">Pilih Kabupaten</option>
                        <option value="Manggarai tengah">Manggarai tengah</option>
                        <option value="Manggari barat">Manggarai barat</option>
                        <option value="Manggari timur">Manggarai timur</option>
                        <!-- Tambahkan opsi kabupaten lainnya sesuai kebutuhan -->
                    </select>
                    @error('kabupaten')
                     <small class="text-danger">{{$message}}</small> 
                            @enderror
                </div>

                <div class="form-group">
                    <label for="coach">Pelatih</label>
                    <input type="text" name="coach" id="coach" class="form-control @error('coach') has-error @enderror">
                    @error('coach')
                     <small class="text-danger">{{$message}}</small> 
                            @enderror
                </div>

                <div class="form-group">
                    <label for="established_year">Tahun Didirikan Team</label>
                    <input type="number" name="founded_year" id="established_year" class="form-control  @error('founded_year') has-error @enderror" >
                    @error('founded_year')
                     <small class="text-danger">{{$message}}</small> 
                            @enderror
                </div>

                <div class="form-group">
                    <label for="district">Group</label>
                    <select name="group" id="district" class="form-control @error('group') has-error @enderror">
                        <option value="">Pilih Group</option>
                        @foreach($group as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        <!-- Tambahkan opsi kabupaten lainnya sesuai kebutuhan -->
                    </select>
                    @error('kabupaten')
                     <small class="text-danger">{{$message}}</small> 
                            @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
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