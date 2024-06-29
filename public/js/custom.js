$(document).ready(function () {
    $("#getPrice").change(function () {
        var size = $(this).val();
        var product_id = $(this).attr("product-id");
        alert("size");
        alert("product_id");

    });

    $(document).on("click", ".updateAdminStatus", function () {
        var status = $(this).children("i").attr("status");
        var admin_id = $(this).attr("admin_id");
        //console.log('CSRF Token:', $('meta[name="csrf-token"]').attr('content'));
        ///alert(admin_id);
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

            type: 'POST',
            url: '/admin/update-admin-status',
            data: { status: status, admin_id: admin_id },
            success: function (resp) {
                // alert(resp);  
                if (resp['status'] == 0) {
                    $("#admin-" + admin_id).html("<i class='fa fa-bookmark-o' status='Inactive'></i>")
                }
                else if (resp['status'] == 1) {
                    $("#admin-" + admin_id).html("<i class='fa fa-bookmark' status='Active'></i>")
                }

            },
            error: function () {
                alert("Error");
            }

        })
    });
});

// $(document).ready(function () {
//     // Initial options for Business Category dropdown
//     var supplierOptions = [
//         'Brand Labels & Tags', 'Sustainble Packaging Suppliers', 'Knitted Apparel Manufacturers - T Shirt & Hoodies',
//         'Fabric Printers', 'Fabric Dyer', 'Sustainable Fabric Suppliers', 'Embroiders & Craftsmen', 'Embroidery Material Suppliers',
//         'Trims Suppliers', 'Apparel Manufacturers-Woven Garments', 'Machine Suppliers', 'Bespoke Attire Makers', 'DTG/DTF/Heat Sublimation Printers/Puff Print',
//         'Swimwear Manufacturer', 'Athleisure/Sportswear Manufacturers', 'Miscellaneous', 'Shoe Manufacturer', 'Lifestyle Sector Suppliers','Others'
//     ];

//     var freelancerOptions = [
//         'Fashion Designer', 'Graphic Designers', 'Graphic Design Agency', 'Performance & Digital Marketing Agency',
//         'Performance Marketer', 'Photographer', 'Stylist', 'Marketing & PR Agency',
//         'Business Consultants', '3PL Marketing Agency', 'Website Developers',
//         'Content Creators', 'NGO Tie Ups', 'Brand Collab Tie Ups', 'Photoshoot Agency','Others'
//     ];

//     // Function to update Business Category dropdown based on selected Vendor Type
//     // Function to update Business Category dropdown based on selected Vendor Type
//     function updateBusinessCategoryOptions() {
//         var selectedVendorType = $('#vendorType').val();
//         var options = (selectedVendorType === 'Supplier') ? supplierOptions : freelancerOptions;

//         // Keep existing selected options
//         var selectedOptions = $('[name="Business_Category[]"]').val();

//         // Clear existing options
//         $('[name="Business_Category[]"]').empty();

//         // Add existing selected options back
//         if (selectedOptions) {
//             $.each(selectedOptions, function (index, value) {
//                 $('[name="Business_Category[]"]').append($('<option>').text(value).attr('selected', 'selected'));
//             });
//         }

//         // Add new options
//         $.each(options, function (index, value) {
//             $('[name="Business_Category[]"]').append($('<option>').text(value));
//         });
//     }


//     // Initial update based on the default selected Vendor Type
//     updateBusinessCategoryOptions();

//     // Handle changes in Vendor Type dropdown
//     $('#vendorType').change(function () {
//         updateBusinessCategoryOptions();
//     });
// });

$(document).ready(function() {
    // Fetch categories initially based on the default selected Vendor Type
    var initialVendorType = $('#vendorType').val();
    fetchCategories(initialVendorType);

    // Handle changes in Vendor Type dropdown
    $('#vendorType').change(function () {
        var selectedVendorType = $(this).val();
        fetchCategories(selectedVendorType);
    });
});

function fetchCategories(vendorType) {
    var url = (vendorType === 'Supplier') ? '/get-supplier-categories' : '/get-freelancer-categories';

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var selectedCategoryIds = [];
            if (vendorDetails && vendorDetails.Business_Category) {
                try {
                    selectedCategoryIds = JSON.parse(vendorDetails.Business_Category);
                } catch (e) {
                    console.error('Error parsing Business_Category:', e);
                }
            }
            updateBusinessCategoryOptions(data.data, selectedCategoryIds);
        },
        error: function (xhr, status, error) {
            console.error('Error fetching categories:', error);
        }
    });
}

function updateBusinessCategoryOptions(options, selectedCategoryIds) {
    var $businessCategory = $('#businessCategory');

    // Clear existing options
    $businessCategory.empty();

    // Add new options
    $.each(options, function (index, option) {
        var $option = $('<option>').text(option.category_name).val(option.id);

        // Check if this option's ID is in selectedCategoryIds and mark it as selected
        if (selectedCategoryIds.includes(option.id.toString())) {
            $option.prop('selected', true);
        }

        $businessCategory.append($option);
    });
}
