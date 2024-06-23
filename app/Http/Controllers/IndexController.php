<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\VendorsBusinessDetails;
use App\Models\VendorsBankDetails;
use App\Models\Product;
use App\Models\Category;
use App\Models\Event;
use App\Models\Mockup;
use DB;

class IndexController extends Controller
{
    public function homepage()
    {
        $featuredCategories = Category::where("featured_category", 1)->get()->reverse() // Reversing the collection
    ->toArray(); // Converting to array


        $allCategories = Category::all()->toArray();
        $allproduct = Product::all()->reverse()->toArray();
        $allmockup = Mockup::all()->reverse()->toArray();

        $allevent = Event::latest()->limit(4)->get()->toArray();
        //dd($allevent);

        return view("index")->with(
            compact(
                "featuredCategories",
                "allCategories",
                "allproduct",
                "allevent","allmockup"
            )
        );
    }

    public function suppliers(Request $request)
    {
        $businessCategory = $request->Business_Category;

        // Convert to array if it's a string
        if (!is_array($businessCategory)) {
            $businessCategory = explode(",", $businessCategory);
        }

        // vendors
        // vendors_business_details
        $suppliersQuery = DB::table("vendors")
            ->join(
                "vendors_business_details",
                "vendors.id",
                "=",
                "vendors_business_details.vendor_id"
            )
            ->select(
                "vendors.*",
                "vendors_business_details.Business_name",
                "vendors_business_details.Brand_name",
                "vendors_business_details.Business_Category",
                "vendors_business_details.Business_catalogue",
                "vendors_business_details.product_sample",
                "vendors_business_details.logo",
                "vendors_business_details.keyservice1",
                "vendors_business_details.keyservice2",
                "vendors_business_details.keyservice3",
            )
            ->where(function ($query) use ($businessCategory) {
                // Loop through each category and add where clause
                foreach ($businessCategory as $category) {
                    $query->orWhereJsonContains(
                        "vendors_business_details.Business_Category",
                        $category
                    );
                }
            });

        // Pagination
        $perPage = 10; // Number of items per page
        $suppliers = $suppliersQuery->paginate($perPage);
        //dd($suppliers);

        return view("vendordetails")->with(compact("suppliers"));
    }

    public function viewsupliersdetails(Request $request)
    {
    // Fetch suppliers and their details
    $suppliers = DB::table("vendors")
        ->join("vendors_business_details", "vendors.id", "=", "vendors_business_details.vendor_id")
        ->select(
            "vendors.*",
            "vendors_business_details.Business_name",
                "vendors_business_details.city",
                "vendors_business_details.state",
                "vendors_business_details.Country",
                "vendors_business_details.Brand_name",
                "vendors_business_details.websitelink",
                "vendors_business_details.Business_Category",
                "vendors_business_details.sell_in_wholesale",
                "vendors_business_details.Business_catalogue",
                "vendors_business_details.delivery_time",
                "vendors_business_details.product_sample",
                "vendors_business_details.facebook",
                "vendors_business_details.instagram",
                "vendors_business_details.twitter",
                "vendors_business_details.linkedin",
                "vendors_business_details.youtube",
                "vendors_business_details.brand",
                "vendors_business_details.service",
                "vendors_business_details.usp_and_specialservice",
                "vendors_business_details.Business_gst",
                "vendors_business_details.moq_of_product",
                "vendors_business_details.Gst_number"
        )
        ->where("vendors.id", $request->id)
        ->get();

    return view("supliersprofile")->with(compact("suppliers"));
}

    public function contact() {
        return view("contactus");    
    }
}
