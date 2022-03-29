@extends('user_dashboard\user_dash_layouts\user_dash_layout')

@section('content')
    <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Update Address</h1>
            </div>

            <!-- Content Row -->
        <div class="container">
            <div class="row">
                <div class="col-4">

                <form method="POST" action="{{ route('userPostUpdatedAddress', $address->id) }}">

                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button class="close" type="button" data-dismiss="alert">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif
                    @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Address Line 1</label>
                      <input type="text" name="address_line1" value="{{ $address->address_line1 }}" class="form-control addr" id="">
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Address Line 2</label>
                      <input type="text" name="address_line2" value="{{ $address->address_line2 }}" class="form-control addr" id="">
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">City</label>
                      <input type="text" name="city" value="{{ $address->city }}" class="form-control addr" id="">
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">District</label>
                      <input type="text" name="district" value="{{ $address->district }}" class="form-control addr" id="">
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">ZIP Code</label>
                      <input type="text" name="zip" value="{{ $address->zip }}" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Country</label>
                      <input type="text" name="country" value="{{ $address->country }}" class="form-control addr" id="">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Address</button>
                </form>
            </div>

        <div class="col-8">
            <div id="googleMap" style="width:100%;height:400px;"></div>
        </div>
        </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

@endsection
