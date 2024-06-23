<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Order;
use App\Models\VendorsBusinessDetails;
use App\Models\VendorsBankDetails;
use Hash;

class AdminController extends Controller
{
   public function adminDashboard()
   {
    // Get the type of the logged-in admin
    $adminType = Auth::guard('admin')->user()->type;
    $vendor_id = Auth::guard('admin')->user()->vendor_id;

    // Initialize variable for product count
    $productCount = 0;

    // Calculate product count based on admin type
    if ($adminType == "vendor") {
        // For vendors, count only their products
        $productCount = Product::where('vendor_id', $vendor_id)->count();
    } else {
        // For admins, count all products
        $productCount = Product::count();
    }

    // Initialize variable for vendor count
    $vendorCount = 0;
    
    // Only admins should get the count of vendors
    if ($adminType != "vendor") {
        // Count the number of unique vendors
        $vendorCount = Admin::where('type', 'vendor')->distinct()->count('vendor_id');
    }

    // Initialize variable for order count
    $orderCount = 0;

    // Calculate order count based on admin type
    if ($adminType == "vendor") {
        // For vendors, count only their orders
        $orderCount = Order::whereHas('order_products', function ($query) use ($vendor_id) {
            $query->where('vendor_id', $vendor_id);
        })->count();
    } else {
        // For admins, count all orders
        $orderCount = Order::count();
    }

    return view("Admin.dashboardlayout.dashboard")->with(compact('productCount', 'vendorCount', 'orderCount'));
}





    public function admindetails()
    {
        return view("Admin.setting.updatedetail");
    }

    public function updateVendorDetails($slug, Request $request)
    {
        if ($slug == "personal") {
            if ($request->isMethod("post")) {
                $data = $request->all();

                $rules = [
                    "vendor_name" => "required|regex:/[\pL\s\-]*$/u",
                    "vendor_city" => "required|regex:/[\pL\s\-]*$/u",
                    "vendor_mobile" => "required|min:10|numeric",
                ];

                $customMessages = [
                    "vendor_name.required" => "Name is required",
                    "vendor_city.required" => "City is required",
                    "vendor_name.regex" => "Valid Name is required",
                    "vendor_city.regex" => "Valid city is required",
                    "vendor_mobile.required" => "Mobile Number is required",
                    "vendor_mobile.numeric" => "Valid Mobile is required",
                ];

                $this->validate($request, $rules, $customMessages);

                if ($request->hasFile("vendor_image")) {
                    $image_tmp = $request->file("vendor_image");
                    if ($image_tmp->isValid()) {
                        // Get image extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        // Generate New image Name
                        $imageName = rand(111, 99999) . "." . $extension;
                        $imagepath = "admin" . $imageName;

                        // Upload the image
                        Image::make($image_tmp)->save($imagepath);
                    }
                } elseif (!empty($data["current_vendor_image"])) {
                    $imageName = $data["current_vendor_image"];
                } else {
                    $imageName = "";
                }

                // Update in admin table
                Admin::where("id", Auth::guard("admin")->user()->id)->update([
                    "name" => $data["vendor_name"],
                    "mobile" => $data["vendor_mobile"],
                    "image" => $imageName,
                ]);

                // Update in vendor table
                Vendor::where(
                    "id",
                    Auth::guard("admin")->user()->vendor_id
                )->update([
                    "name" => $data["vendor_name"],
                    "mobile" => $data["vendor_mobile"],
                    "address" => $data["vendor_address"],
                    "city" => $data["vendor_city"],
                    "state" => $data["vendor_state"],
                    "country" => $data["vendor_country"],
                    "pincode" => $data["vendor_pincode"],
                    "image" => $imageName,
                ]);

                return redirect()
                    ->back()
                    ->with(
                        "success_message",
                        "Vendor details updated successfully!"
                    );
            }

            $vendorDetails = Vendor::where(
                "id",
                Auth::guard("admin")->user()->vendor_id
            )
                ->first()
                ->toArray();
        } elseif ($slug == "business") {
            if ($request->isMethod("post")) {
                $data = $request->all();
                // echo "<pre>"; print_r($data); die;
                $rules = [
                    "Business_name" => "required|regex:/[\pL\s\-]*$/u",
                    "Brand_name" => "required|regex:/[\pL\s\-]*$/u",
                    "Business_Category" => "required",
                    "Gst_number" => "required|regex:/[\pL\s\-]*$/u",
                    "Country" => "required|regex:/[\pL\s\-]*$/u",
                    "state" => "required|regex:/[\pL\s\-]*$/u",
                    "city" => "required|regex:/[\pL\s\-]*$/u",
                    "Business_catalogue" => "file|mimes:pdf|max:40000",
                    "logo" => "image|mimes:jpeg,png,jpg,gif|max:2048",
                    "product_sample" => "image|mimes:jpeg,png,jpg",
                    "sell_in_wholesale" => "required",
                    "moq_of_product" =>  "required",
                    "brand"  => "required",
                ];
                $customMessages = [
                    "business_name.required" => "Business Name is required",
                    "Brand_name.required" => "Brand Name is required",
                    "Business_Category" => "Please select Business Category",
                    "Gst_number" => "Please enter Gst number",
                    "Gst_number.regex" => "Valid Gst Number is required",
                    "city.required" => " city is required",
                    "city.regex" => "Valid city is required",
                    "Country.required" => " Country is required",
                    "sell_in_wholesale.required" => " Sell in wholesale is required",
                    "moq_of_product.required" => " MOQ of product is required",
                    "brand.required" => " Brand Brief is required",
                    "service" => " Service Details is required",
                    "Country.regex" => "Valid Country is required",
                    "state.required" => " state is required",
                    "state.regex" => "Valid state is required",
                    "Business_catalogue.file" =>
                        "The Business catalogue must be a file.",
                    "Business_catalogue.mimes" =>
                        "The Business catalogue must be a PDF file.",
                    "Business_catalogue.max' => 'The Business catalogue must be less than 40MB.",
                    "logo.image" => "The logo must be an image file.",
                    "logo.mimes" =>
                        "The logo must be a JPEG, PNG, JPG, or GIF file.",
                    "logo.max" => "The logo must be less than 2MB.",
                    "product_sample.image" => "The Product Sample must be an image file.",
                ];
                $this->validate($request, $rules, $customMessages);
                //upload logo
                if ($request->hasFile("logo")) {
                    $logoFile = $request->file("logo");
                    if ($logoFile->isValid()) {
                        // Get logo extension
                        $logoExtension = $logoFile->getClientOriginalExtension();

                        // Generate new logo file name
                        $logoName = rand(111, 99999) . "." . $logoExtension;

                        // Upload the logo file
                        $logoPath = "admin/product_image/" . $logoName;
                        $logoFile->move(public_path("admin/product_image/"), $logoName);
                    }
                } else {
                    $logoName = ""; // Set empty logo name if no logo uploaded
                }

                //upload catalogue Photo
                if ($request->hasFile("Business_catalogue")) {
                    $pdfFile = $request->file("Business_catalogue");

                    if ($pdfFile->isValid()) {
                        // Get PDF extension
                        $pdfExtension = $pdfFile->getClientOriginalExtension();

                        // Generate new PDF file name
                        $pdfName = rand(111, 99999) . "." . $pdfExtension;

                        // Upload the PDF file
                        $pdfPath = "admin/Businesscatalogue/" . $pdfName;
                        $pdfFile->move(
                            public_path("admin/Businesscatalogue/"),
                            $pdfName
                        );
                    }
                } elseif (!empty($data["Businesscatalogue"])) {
                    $pdfName = $data["Businesscatalogue"];
                } else {
                    $pdfName = "";
                }

                $productImageNames = [];
                if ($request->hasFile("product_sample")) {
                    foreach (
                        $request->file("product_sample")
                        as $productImage
                    ) {
                        if ($productImage->isValid()) {
                            // Get image extension
                            $imageExtension = $productImage->getClientOriginalExtension();

                            // Generate a new image file name
                            $imageName =
                                rand(111, 99999) . "." . $imageExtension;

                            // Upload the image file
                            $imagePath = "admin/product_image/" . $imageName;
                            $productImage->move(
                                public_path("admin/product_image/"),
                                $imageName
                            );

                            // Store the image name for later use
                            $productImageNames[] = $imageName;
                        }
                    }
                }

                // Initialize $productImageNames as an empty array if it is null
                $productImageNames = $productImageNames ?? [];
                $businessCategories = $request->input("Business_Category", []); // Get selected categories as an array

                VendorsBusinessDetails::where(
                    "vendor_id",
                    Auth::guard("admin")->user()->vendor_id
                )->update([
                    "Business_name" => $data["Business_name"],
                    "vendorType" => $data["vendorType"],
                    "Brand_name" => $data["Brand_name"],
                    "Business_Category" => $businessCategories, // Store the array of selected categories
                    "Gst_number" => $data["Gst_number"],
                    "Country" => $data["Country"],
                    "state" => $data["state"],
                    "city" => $data["city"],
                    "Business_catalogue" => $pdfName,
                    "sell_in_wholesale" => $data["sell_in_wholesale"],
                    "moq_of_product" => $data["moq_of_product"],
                    "websitelink" => $data["websitelink"],
                    "facebook" => $data["facebook"],
                    "instagram" => $data["instagram"],
                    "twitter" => $data["twitter"],
                    "linkedin" => $data["linkedin"],
                    "youtube" => $data["youtube"],
                    "brand" => $data["brand"],
                    "service" => $data["service"],
                    
                    "product_sample" => implode(",", $productImageNames),
                    "logo" => $logoName,
                    "delivery_time" => $data["delivery_time"],
                ]);

                return redirect()
                    ->back()
                    ->with(
                        "success_message",
                        "Vendor details updated successfully!"
                    );
            }

            $vendorDetails = VendorsBusinessDetails::where(
                "vendor_id",
                Auth::guard("admin")->user()->vendor_id
            )
                ->first()
                ->toArray();
        } elseif ($slug == "bank") {
            if ($request->isMethod("post")) {
                $data = $request->all();
                // echo "<pre>"; print_r($data); die;
                $rules = [
                    "account_holder_name" => "required|regex:/[\pL\s\-]*$/u",
                    "bank_name" => "required|regex:/[\pL\s\-]*$/u",
                    "account_number" => "required|regex:/[\pL\s\-]*$/u",
                    "bank_ifsc_code" => "required|regex:/[\pL\s\-]*$/u",
                ];
                $customMessages = [
                    "account_holder_name.required" =>
                        "Account holder Name is required",
                    "account_holder_name.regex" =>
                        "Valid Account holder Name Number is required",
                    "bank_name.required" => "Bank Name is required",
                    "bank_name.regex" => "Valid Bank Name is required",
                    "account_number.required" => "Please enter account number",
                    "account_number.regex" => "Valid enter account number",
                    "bank_ifsc_code.required" => "Please enter IFSC number",
                    "bank_ifsc_code.regex" => "Valid enter IFSC number",
                ];
                $this->validate($request, $rules, $customMessages);
                //upload Admin Photo

                // update in vendor business tables
                VendorsBankDetails::where(
                    "vendor_id",
                    Auth::guard("admin")->user()->vendor_id
                )->update([
                    "account_holder_name" => $data["account_holder_name"],
                    "account_number" => $data["account_number"],
                    "bank_name" => $data["bank_name"],
                    "bank_ifsc_code" => $data["bank_ifsc_code"],
                ]);
                return redirect()
                    ->back()
                    ->with(
                        "success_message",
                        "Vendor bank details updated successfully!"
                    );
            }
            $vendorDetails = VendorsBankDetails::where(
                "vendor_id",
                Auth::guard("admin")->user()->vendor_id
            )
                ->first()
                ->toArray();
        }

        return view("Admin.setting.update_vendor_details")->with(
            compact("slug", "vendorDetails")
        );
    }

    public function updateAdminPassword(Request $request)
    {
        if ($request->isMethod("POST")) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            // check if current password is correct
            if (
                Hash::check(
                    $data["current_Password"],
                    Auth::guard("admin")->user()->password
                )
            ) {
                // check if new password is matching with confirm password
                if ($data["confirm_Password"] == $data["New_Password"]) {
                    Admin::where(
                        "id",
                        Auth::guard("admin")->user()->id
                    )->update(["password" => bcrypt($data["New_Password"])]);

                    return redirect()
                        ->back()
                        ->with(
                            "Success_message",
                            "Your Current password is Updated"
                        );
                } else {
                    return redirect()
                        ->back()
                        ->with("error_message", "Password not matching!");
                }
            } else {
                return redirect()
                    ->back()
                    ->with(
                        "error_message",
                        "Your Current password is Incorrect!"
                    );
            }
        }
        $adminDetails = Admin::where(
            "email",
            Auth::guard("admin")->user()->email
        )
            ->first()
            ->toArray();
        return view("Admin.setting.updateAdminPassword")->with(
            compact("adminDetails")
        );
    }

    public function index(Request $request)
    {
        if ($request->isMethod("POST")) {
            $data = $request->all();

            // if (Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])) {
            //    return redirect('AdminDashboard');
            // }else {
            //    return redirect()->back()->with('error_message','Invalid Email or password');
            // }

            if (
                Auth::guard("admin")->attempt([
                    "email" => $data["email"],
                    "password" => $data["password"],
                ])
            ) {
                if (
                    Auth::guard("admin")->user()->type == "vendor" &&
                    Auth::guard("admin")->user()->confirm == "No"
                ) {
                    return redirect()
                        ->back()
                        ->with(
                            "error_message",
                            'please confirm your email to 
                    activate your Vendor Account'
                        );
                } elseif (
                    Auth::guard("admin")->user()->type !== "vendor" &&
                    Auth::guard("admin")->user()->admin_status == "0"
                ) {
                    return redirect()
                        ->back()
                        ->with(
                            "error_message",
                            "Your Admin Account is not active"
                        );
                } else {
                    return redirect("AdminDashboard");
                }
            } else {
                return redirect()
                    ->back()
                    ->with("error_message", "Invalid Email or password");
            }
        }
        return view("Admin.login");
    }

    public function admins($type = null)
    {
        $admins = Admin::query();
        if (!empty($type)) {
            $admins = $admins->where("type", $type);
            $title = ucfirst($type);
        } else {
            $title = "All Admins/Subadmins/Vendors";
        }
        $admins = $admins->get()->toArray();
        //dd($admins);
        return view("Admin.admin.admins")->with(compact("admins", "title"));
    }

    public function viewvendordetails($id)
    {
        //$vendorDetails = Admin::where('id',$id)->first();
        $vendorDetails = Admin::with(
            "vendorPersonal",
            "vendorBusiness",
            "vendorBank"
        )
            ->where("id", $id)
            ->first();
        $vendorDetails = json_decode(json_encode($vendorDetails), true);
        //dd($vendorDetails); die;
        return view("Admin/vendordetails/vendorinfo")->with(
            compact("vendorDetails")
        );
    }

    public function updateadminstatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            if ($data["status"] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }

            // Fix the key in the update method: change $data['admin'] to $data['admin_id']
            // Admin::where('id', $data['admin_id'])->update(['status' => $status]);
            Admin::where("id", $data["admin_id"])->update([
                "admin_status" => $status,
            ]);
            Vendor::where("id", $data["admin_id"])->update([
                "vendor_status" => $status,
            ]);

            return response()->json([
                "status" => $status,
                "admin_id" => $data["admin_id"],
            ]);
        }
    }

    public function logout()
    {
        Auth::guard("admin")->logout();
        return redirect("AdminLogin");
    }
}

?>
