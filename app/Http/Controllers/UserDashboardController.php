<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['PreventBackHistory', 'auth']);
    }

    public function userHome() {
        return view('user_dashboard.userHome');
    }

    public function userAddAddress() {
        return view('user_dashboard.addAddress');
    }

    public function postUserAddedAddress(Request $request) {
        $request->validate([
            'address_line1' => 'required',
            'city' => 'required',
            'district' => 'required',
            'zip' => 'required',
            'country' => 'required',
        ]);

        $address = new Address();
        $address->address_line1 = $request->address_line1;
        $address->address_line2 = $request->address_line2;
        $address->city = $request->city;
        $address->district = $request->district;
        $address->zip = $request->zip;
        $address->country = $request->country;
        $address->user_id = auth()->user()->id;

        $address->save();
        return redirect()->back()->with('message','Address Created Successfully');
    }

    public function userShowAddresses() {
        // get all addresses of current logged in user
        $addresses = Address::where('user_id', Auth::id())->get();
        return view('user_dashboard.showAddresses', compact('addresses'));
    }

    public function userUpdateAddress($addr_id) {
        $address = Address::find($addr_id);
        return view('user_dashboard.updateAddress', compact('address'));
    }

    public function userPostUpdatedAddress(Request $request, $id) {
        $address = Address::find($id);
        $address->address_line1 = $request->address_line1;
        $address->address_line2 = $request->address_line2;
        $address->city = $request->city;
        $address->district = $request->district;
        $address->zip = $request->zip;
        $address->country = $request->country;

        $address->update();
        return redirect()->back()->with('message','Address Updated Successfully');
    }

    public function userDeleteAddress($id) {
        $address = Address::find($id);
        $address->delete();
        return redirect()->back()->with('message', 'Address Deleted Successfully.');
    }
}
