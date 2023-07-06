
@extends('main.adminlayout')

@section('title', 'tambah pertandingan')
@section('header')

@stop
@section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            tambah pertandingan
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
            <div class="alert alert-danger text-center">
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
           
            <a href="pertandingan" class="btn btn-warning">Kembali</a>
           <div class="box">
             <div class="box-header">
               <h3 class="box-title">tambah pertandingan</h3>
             </div><!-- /.box-header -->
             <div class="box-body">
                        <form action="" method="POST">
                @csrf
                            <div class="form-group">
                    <label for="group">Group</label>
                    <select name="group" id="group" class="form-control @error('group') is-invalid @enderror">
                        <option value="">Pilih Group</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                    @error('group')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="home_team">Home Team</label>
                    <select name="home_team" id="home_team" class="form-control @error('home_team') is-invalid @enderror" disabled>
                        <option value="">Pilih Home Team</option>
                    </select>
                    @error('home_team')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="away_team">Away Team</label>
                    <select name="away_team" id="away_team" class="form-control @error('away_team') is-invalid @enderror" disabled>
                        <option value="">Pilih Away Team</option>
                    </select>
                    @error('away_team')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="score-home-team">Score Home Team</label>
                    <input type="number" name="home_team_score" id="score-home-team" class="form-control @error('home_team_score') has-error @enderror">
                    @error('home_team_score')
                     <small class="text-danger">{{$message}}</small> 
                            @enderror
                </div>

                <div class="form-group">
                    <label for="score-away-team">Score Away Team</label>
                    <input type="number" name="away_team_score" id="score-away-team" class="form-control @error('away_team_score') has-error @enderror">
                    @error('away_team_score')
                     <small class="text-danger">{{$message}}</small> 
                            @enderror
                </div>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="match_date" id="tanggal" class="form-control  @error('match_date') has-error @enderror">
                    @error('match_date')
                     <small class="text-danger">{{$message}}</small> 
                            @enderror
                </div>

                <div class="form-group">
                    <label for="jam">Jam</label>
                    <input type="time" name="match_time" id="jam" class="form-control @error('match_time') has-error @enderror">
                    @error('match_time')
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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
    $(document).ready(function() {
        $('#group').on('change', function() {
            var groupId = $(this).val();

            if (groupId) {
                $('#home_team').prop('disabled', false);
                $('#away_team').prop('disabled', false);
                $('#home_team').html('<option value="">Pilih Home Team</option>');
                $('#away_team').html('<option value="">Pilih Away Team</option>');

                $.ajax({
                    url: '/get-teams/' + groupId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data.teams, function(key, value) {
                            $('#home_team').append('<option value="' + value.id + '">' + value.team_name + '</option>');
                            $('#away_team').append('<option value="' + value.id + '">' + value.team_name + '</option>');
                        });
                    }
                });
            } else {
                $('#home_team').prop('disabled', true);
                $('#away_team').prop('disabled', true);
                $('#home_team').html('<option value="">Pilih Home Team</option>');
                $('#away_team').html('<option value="">Pilih Away Team</option>');
            }
        });
        $('#home_team').on('change', function() {
            var selectedHomeTeam = $(this).val();
            $('#away_team option').each(function() {
                if ($(this).val() == selectedHomeTeam) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });

        $('#away_team').on('change', function() {
            var selectedAwayTeam = $(this).val();
            $('#home_team option').each(function() {
                if ($(this).val() == selectedAwayTeam) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    });
    
</script>
      @stop
      @section('footer')

       @stop