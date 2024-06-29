<?php

namespace App\Http\Controllers;

use App\Models\FreelanceCategory;
use App\Models\SupplierCategory;
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
    public function homepage(Request $request)
    {
        // Fetch all items that do not depend on search input
        $featuredCategories = Category::where("featured_category", 1)->get()->reverse();
        $allCategories = Category::all();
        $allmockup = Mockup::all()->reverse();
        $allevent = Event::latest()->limit(4)->get();

        // Initialize the products query with eager loading
        $productsQuery = Product::with(['section', 'category', 'vendor']);

        // Check for search query
        if ($request->has('search') && !empty($request->input('search'))) {
            $searchTerm = $request->input('search');
            $productsQuery->where(function ($q) use ($searchTerm) {
                $q->where('product_name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('shortdescription', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('product_code', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('product_image', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('group_code', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('fabrics', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('meta_title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('meta_description', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('product_price', 'LIKE', "%{$searchTerm}%")
                    ->orWhereHas('section', function ($query) use ($searchTerm) {
                        $query->where('name', 'LIKE', "%{$searchTerm}%");
                    })
                    ->orWhereHas('category', function ($query) use ($searchTerm) {
                        $query->where('category_name', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('featured_category', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('meta_title', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('meta_description', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('meta_keywords', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('description', 'LIKE', "%{$searchTerm}%");
                    })
                    ->orWhereHas('vendor', function ($query) use ($searchTerm) {
                        $query->where('name', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('mobile', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('email', 'LIKE', "%{$searchTerm}%");
                    });
            });
        }

        // Execute the query and get products
        $allproduct = $productsQuery->get()->reverse();

        return view("index")->with(
            compact(
                "featuredCategories",
                "allCategories",
                "allproduct",
                "allevent",
                "allmockup"
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
            "vendors_business_details.Gst_number",
            "vendors_business_details.vendorType",
            "vendors_business_details.keyservice1",
            "vendors_business_details.keyservice2",
            "vendors_business_details.keyservice3"
        )
        ->where("vendors.id", $request->id)
        ->get();

    // Check if suppliers collection is not empty
    if ($suppliers->isNotEmpty()) {
        // Initialize an empty array to store categories
        $categories = [];

        // Loop through each supplier
        foreach ($suppliers as $supplier) {
            // Check vendorType for each supplier
            if ($supplier->vendorType == "Supplier") {
                // Fetch categories for Supplier
                $supplierCategories = SupplierCategory::select('id', 'category_name', 'cover_image')->whereIn('id', json_decode($supplier->Business_Category))->get();
                // Merge categories
                $categories[$supplier->id] = $supplierCategories;
            } else {
                // Fetch categories for Freelance
                $freelanceCategories = FreelanceCategory::select('id', 'category_name', 'cover_image')->whereIn('id', json_decode($supplier->Business_Category))->get();
                // Merge categories
                $categories[$supplier->id] = $freelanceCategories;
            }
        }

        // Attach categories to each supplier
        foreach ($suppliers as $supplier) {
            if (isset($categories[$supplier->id])) {
                $supplier->categories = $categories[$supplier->id];
            }
        }
    }
    // echo '<pre>'; print_r($suppliers); die;
    return view("supliersprofile", compact("suppliers"));
    }

    public function contact()
    {
        return view("contactus");
    }
}
