@extends('layouts.app')
@section('content')
    @include('common.header')

  <!-- ======= Sidebar ======= -->
  @include('common.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      {{-- <h1>Dashboard</h1> --}}
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Balance Transfer</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Total Balance</h5>
                      <span class="amount-tag">{{ $balance !== null ? $balance->total : 0 }}$</span>
                      <!-- Recent Sales -->
                      <div class="alert alert-msg"></div>
                      <div class="col-12">
                        {{-- <div class="recent-sales overflow-auto">
                          <div class="row" id="show-add-blnce-form"> --}}
                            {{-- {{ route('admin.add.balance') }} --}}
                            <form method="POST" action="">
                                <div class="row">
                                    @csrf
                                    <div class="col-xl-3 col-lg-3 col-sm-6 col-12">
                                        <label for="user" class="form-label">User</label>
                                        <select id="inputUserId" name="user_id" class="form-select">
                                            <option value="not-selected">select user id</option>
                                            @foreach ($users as $user)
                                            @if ($user->id !== Auth::user()->id)
                                            <option value="{{ $user->id }}">{{ $user->uuid }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <span class="id-error" style="color: red"></span>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-sm-6 col-12 mt-1">
                                        <label for="inputNanme4" class="form-label">Amount$</label>
                                        <input type="text" class="form-control" name="amount" id="inputAmount">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-sm-6 col-12">
                                        <button type="submit" class="btn btn-sm btn-primary mt-3" id="balance-add">Submit</button>
                                    </div>
                                </div>
                            </form>
                          {{-- </div>
                        </div> --}}
                      </div><!-- End Recent Sales -->
                    </div>
                  </div>
            </div><!-- End Customers Card -->

          </div>
        </div><!-- End Left side columns -->



        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="javascript:void(0);" class="logo d-flex align-items-center text-center" style="padding-left: 115px;">
                                <img src="{{ asset('img/logo.png') }}" alt="">
                                <span class="d-lg-block">SmartUniqueInt</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                <strong class="amount-tag"></strong>$ transferred to <strong class="user-tag text-capitalize"></strong> succssfully.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary closs-modal" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
            </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SmartUniqueInt</span></strong>. All Rights Reserved
    </div>
  </footer>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $("#show-add-blnce").click(function(){
                $("#show-add-blnce-form").slideToggle();
            });
        });
        $(document).ready(function(){

            $('#balance-add').on('click',function(event){
                event.preventDefault();
                // $('#exampleModalCenter').modal('show');
                // return;
                if(confirm('Are you sure you want to transfer this amount?')){
                    let user_id     = $('#inputUserId').val();
                    var amount      = $('#inputAmount').val();
                    if(user_id === 'not-selected'){
                        $('.id-error').text('Select user name');
                        return;
                    }
                    $.ajax({
                    url:'{{ url("admin/add/user/balance") }}',
                    type:'post',
                    data:{
                        _token  : "{{ csrf_token() }}",
                        user_id : user_id,
                        amount  : amount,
                    },
                    success:function(data){
                        console.log(data,'ddd');
                        if(data.success == 'Balance transfered successfully'){
                            $('.amount-tag').text(data.balance.total);
                            $("#show-add-blnce-form").hide();
                            $('#inputAmount').val('');
                            $('.alert-msg').addClass('alert-success');
                            $('.alert-msg').text('Balance trasfered successfully.');
                            tableData.ajax.reload();
                          }else{
                              $('.alert-msg').addClass('alert-danger');
                              $('.alert-msg').text('Insufficient balance, you can not transfer amount.');
                          }
                        }
                      });
                  }
                });

            $('.closs-modal').on('click',function(){
                $('#exampleModalCenter').modal('hide');
            });
        });

    </script>
@endpush
