@extends('user_dashboard\user_dash_layouts\user_dash_layout')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Address</h1>
    </div>

    <!-- Content Row -->
<div class="container">
    <div class="row">
        <div class="col-4">

        <form method="POST" action="{{ route('postUserAddedAddress') }}">

        @if(session()->has('message'))
        <div class="alert alert-success">
            <button class="close" type="button" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
        </div>
        @endif
            @csrf
            <div class="mb-3">
              <label for="address_line1" class="form-label">Address Line 1 *</label>
              <input type="text" name="address_line1" class="form-control" id="address_line1">
              <span class="text-danger">@error('address_line1') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
              <label for="address_line2" class="form-label">Address Line 2</label>
              <input type="text" name="address_line2" class="form-control" id="address_line2">
              {{-- <span class="text-danger">@error('address_line2') {{ $message }} @enderror</span> --}}
            </div>
            <div class="mb-3">
              <label for="city" class="form-label">City *</label>
              <input type="text" name="city" class="form-control" id="city">
              <span class="text-danger">@error('city') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
              <label for="district" class="form-label">District *</label>
              <input type="text" name="district" class="form-control" id="district">
              <span class="text-danger">@error('district') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
              <label for="zip" class="form-label">ZIP Code *</label>
              <input type="text" name="zip" class="form-control" id="zip">
              <span class="text-danger">@error('zip') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
              <label for="country" class="form-label">Country *</label>
              <input type="text" name="country" class="form-control" id="country">
              <span class="text-danger">@error('country') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" name="latitude" class="form-control" id="txtLat" readonly="readonly">
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" name="longitude" class="form-control" id="txtLng" readonly="readonly">
            </div>

            <button type="submit" class="btn btn-primary">Add Address</button>
        </form>

    </div>
    <div class="col-8">

        <div id="map_canvas" style="width: auto; height: 400px;"></div>
        <br><br>
        <div id="floating-panel">
            <input id="map-submit" class="btn btn-success" type="button" value="Get Address" />
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
