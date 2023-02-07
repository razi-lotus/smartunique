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
                      <h5 class="card-title text-start">Total Earning</h5>
                      <div class="text-success large pt-2 ps-1 mb-2">{{ $balance !== null ? $balance->total : 0 }}$</div>
                      <h5 class="mt-1 text-start">Send your earning to the company offical account. You will receive your payment in any bank account.</h5>
                      <!-- Recent Sales -->
                      <div class="alert alert-msg"></div>
                      <div class="col-12">
                        {{-- <div class="recent-sales overflow-auto">
                          <div class="row" id="show-add-blnce-form"> --}}
                            {{-- {{ route('admin.add.balance') }} --}}
                            <form method="POST" action="">
                                <div class="row text-start">
                                    @csrf
                                    <div class="col-xl-3 col-lg-3 col-sm-6 col-12">
                                        <label for="user" class="form-label">Withdraow Id</label>
                                        <input id="inputUserId" name="user_id" class="form-control">
                                        {{-- <select id="inputUserId" name="user_id" class="form-select">
                                            <option value="not-selected">select user id</option>
                                            @foreach ($users as $user)
                                            @if ($user->id !== Auth::user()->id)
                                            <option value="{{ $user->id }}">{{ $user->uuid }}</option>
                                            @endif
                                            @endforeach
                                        </select> --}}
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
                      </div>
                    </div>
                  </div>
            </div><!-- End Customers Card -->

          </div>
        </div><!-- End Left side columns -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <img height="200px" width="200px" style="position: absolute ; top: 40%; z-index: 1; right: 10%;" width="100px" src="{{ asset('img/stamp.png') }}" alt="">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="display:inline;">
                    <div class="row">
                        <div class="col-4 text-center text-lg-center">
                          <img style="position: absolute;top: 0%;z-index: 1;right: 68%;height: 16%;width: 30%;" src="{{ asset('img/stock-logo.png') }}" alt="">
                        </div>
                        <div class="col-8 text-center text-lg-center">
                            <a href="javascript:void(0);" class="logo d-flex align-items-center justify-content-center text-center" >
                                {{-- <img src="{{ asset('img/stock-logo.png') }}" alt=""> --}}
                                <div class="mb-2">
                                  <span class="d-lg-block">Smart-Official</span>
                                </div>
                            </a>
                            <span class="text-center" style="color: green;">Withdraw Successful</span><br>
                            <span class="text-center">Money has been sent</span>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                <small class="trans-date">28 Dec 2023 10:00 am</small>
                <small class="id-hash d-block"></small>
                <br/>
                <strong>Sent to User ID</strong>
                <h6 class="sent-to-uuid text-capitalize">Ali</h6>
                <strong>Sent to Name</strong>
                <h6 class="sent-to text-capitalize">Ali</h6>
                <strong>Sent by User ID</strong>
                <h6 class="sent-from-uuid text-capitalize">Razi</h6>
                <strong>Sent by Name</strong>
                <h6 class="sent-from text-capitalize">Razi</h6>
                <strong>Fee / Charges</strong>
                <strong>Sent by</strong>
                <h6 class="sent-from text-capitalize">Razi</h6>
                <strong>Fee / Charges</strong>
                <h6>No Charge</h6>
                <strong style="color: green;">Total Amount</strong>
                <h6 class="amount-tagg"></h6>
                {{-- <strong class="amount-tag"></strong>$ transferred to <strong class="user-tag text-capitalize"></strong> succssfully. --}}
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
                if(1){
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
                            $('.amount-tagg').text(data.balance.amount+'$');
                            $('.sent-to').text(data.balance.received_user.name);
                            $('.sent-to-uuid').text(data.balance.received_user.uuid);
                            $('.sent-from').text(data.balance.from_user.name);
                            $('.sent-from-uuid').text(data.balance.from_user.uuid);
                            $('.id-hash').text('ID#'+Math.floor(Math.random() * 1000000));
                            const monthNames = ["January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December"];
                            let date = new Date(data.balance.created_at);
                            $('.trans-date').text(date.getDate()+' '+monthNames[date.getMonth()]+' '+date.getFullYear()+' '+date.getHours()+':'+date.getMinutes());
                            $("#show-add-blnce-form").hide();
                            $('#inputAmount').val('');
                            $('.alert-msg').removeClass('alert-danger');
                            $('.alert-msg').addClass('alert-success');
                            $('.alert-msg').text('Balance trasfered successfully.');
                            $('#exampleModalCenter').modal('show');
                            // location.reload();
                          }else if(data.invalid){
                              $('.alert-msg').addClass('alert-danger');
                              $('.alert-msg').text('Invalid user id.');
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
