<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EvenCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use DB;
use Session;

class EventController extends Controller
{
    public function AllEvent()
    {
        $allevent = Event::all()->toArray();
        return view("Admin.event.Allevent")->with(compact("allevent"));
    }

    public function AddEvent(Request $request)
    {
        if ($request->isMethod("post")) {
            $data = $request->all();
            Log::info("Received form data:", $data); // Log form data

            try {
                // Create a new Event instance
                $event = new Event();

                // Assign data to the event object
                $event->category_id = $data["category_id"];
                $event->title = $data["name"]; // Update this line to use 'name' instead of 'title'
                $event->listedby = $data["listedby"]; //
                $event->venue = $data["venue"]; //
                $event->maplink = $data["maplink"];
                $event->date = $data["date"];
                $event->time = $data["time"];
                $event->tandc = $data["tandc"];
                $event->bookingpricerange = $data["bookingpricerange"];
                $event->contactforbookings = $data["contactforbookings"];
                $event->emailforbookings = $data["emailforbookings"];
                $event->description = $data["description"];
                $event->meta_title = $data["meta_title"];
                $event->meta_description = $data["meta_description"];
                $event->meta_keywords = $data["meta_keywords"];

                // Handle image upload if present
                if ($request->hasFile("product_image")) {
                    $image_tmp = $request->file("product_image");
                    if ($image_tmp->isValid()) {
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName =
                            "product_" . rand(111, 99999) . "." . $extension;
                        $imagepath =
                            "admin/product_image/largeimage/" . $imageName;

                        // Move uploaded image to the desired location
                        $image_tmp->move(
                            public_path("admin/product_image/largeimage/"),
                            $imageName
                        );

                        // Assign image name to the event object
                        $event->image = $imageName;
                    }
                }

                // Handle banner upload if present
                if ($request->hasFile("banner_image")) {
                    $banner_tmp = $request->file("banner_image");
                    if ($banner_tmp->isValid()) {
                        $extension = $banner_tmp->getClientOriginalExtension();
                        $bannerName =
                            "banner_" . rand(111, 99999) . "." . $extension;
                        $bannerpath =
                            "admin/product_image/largeimage/" . $bannerName;

                        // Move uploaded banner to the desired location
                        $banner_tmp->move(
                            public_path("admin/product_image/largeimage/"),
                            $bannerName
                        );

                        // Assign banner name to the event object
                        $event->banner_image = $bannerName;
                    }
                }

                // Handle multiple event images upload if present
                if ($request->hasFile("event_images")) {
                    $eventImages_tmp = $request->file("event_images");
                    $eventImages = []; // Initialize the array to hold image names
                    foreach ($eventImages_tmp as $eventImage_tmp) {
                        if ($eventImage_tmp->isValid()) {
                            $extension = $eventImage_tmp->getClientOriginalExtension();
                            $eventName =
                                "event_" . rand(111, 99999) . "." . $extension;
                            $imagePath =
                                "admin/product_image/largeimage/" . $eventName;

                            // Move uploaded event image to the desired location
                            $eventImage_tmp->move(
                                public_path("admin/product_image/largeimage/"),
                                $eventName
                            );

                            // Save event image names to an array
                            $eventImages[] = $eventName;
                        }
                    }
                    // Assign event image names array to the event object
                    $event->event_images = json_encode($eventImages);
                }

                // Handle multiple event images upload if present
                if ($request->hasFile("highlight")) {
                    $highlightImages_tmp = $request->file("highlight");
                    $highlightImages = []; // Initialize the array to hold image names
                    foreach ($highlightImages_tmp as $highlightImage_tmp) {
                        if ($highlightImage_tmp->isValid()) {
                            $extension = $highlightImage_tmp->getClientOriginalExtension();
                            $highlightName =
                                "highlight_" .
                                rand(111, 99999) .
                                "." .
                                $extension;
                            $imagePath =
                                "admin/product_image/largeimage/" .
                                $highlightName;

                            // Move uploaded highlight image to the desired location
                            $highlightImage_tmp->move(
                                public_path("admin/product_image/largeimage/"),
                                $highlightName
                            );

                            // Save highlight image names to an array
                            $highlightImages[] = $highlightName;
                        }
                    }
                    // Assign highlight image names array to the event object
                    $event->highlight = json_encode($highlightImages); // Fix the assignment here
                }

                $event->save();

                Log::info("Event saved successfully."); // Log success

                // Redirect to the 'AllEvent' route on success
                return redirect("AllEvent")->with(
                    "success_message",
                    "Event added successfully!"
                );
            } catch (\Exception $e) {
                // Log the error
                Log::error("Error adding event: " . $e->getMessage());

                // Redirect back with error message
                return redirect()
                    ->back()
                    ->with(
                        "error_message",
                        "Failed to add event. Please try again later."
                    );
            }
        }

        // Fetch categories for the form
        $categories = EvenCategory::all()->toArray();

        // Render the view with categories
        return view("Admin.event.Add-event")->with(compact("categories"));
    }

    public function eventgrid()
    {
        $url = Route::getFacadeRoot()
            ->current()
            ->uri();
        $categoryCount = EvenCategory::where([
            "url" => $url,
            "status" => 1,
        ])->count();

        if ($categoryCount > 0) {
            $categoryDetails = EvenCategory::categoryDetails($url);
            $categoryProducts = Event::whereIn(
                "category_id",
                $categoryDetails["catIds"]
            )->where("event_status", 1);

            if (isset($_GET["sort"]) && !empty($_GET["sort"])) {
                if ($_GET["sort"] == "product_latest") {
                    $categoryProducts->orderBy("id", "Desc");
                }
            }

            $categoryProducts = $categoryProducts->paginate(4); // Change 10 to the desired number of items per page

            return view("Admin.event.blog")->with(
                compact("categoryDetails", "categoryProducts")
            );
        } else {
            abort(404);
        }
    }

    public function vieweventsdetails(Request $request)
    {
        $events = DB::table("events")
            ->where("id", $request->id)
            ->get();

        return view("event")->with(compact("events"));
    }
    
    
    public function deletevent($id){
    Event::where('id',$id)->delete();
    return redirect()->back()->with('Success_message',
            'Your Event is deleted');
    }
}
