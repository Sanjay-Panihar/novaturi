@extends('Admin.dashboardlayout.layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title></title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style>
         body {
         color: #566787;
         background: #f5f5f5;
         font-family: 'Varela Round', sans-serif;
         font-size: 13px;
         }
         @media (min-width: 1200px) {
         .container {
         width: 1100px;
         }
         }
         .container {
         float: right;
         margin: 0px;
         padding-right: 15px;
         padding-left: 15px;
         /* margin-right: auto; */
         /* margin-left: auto; */
         }
         .table-wrapper {
         background: #fff;
         padding: 20px 25px;
         margin: 30px 0;
         border-radius: 3px;
         box-shadow: 0 1px 1px rgba(0,0,0,.05);
         }
         .table-title {        
         padding-bottom: 15px;
         background: #435d7d;
         color: #fff;
         padding: 16px 30px;
         margin: -20px -25px 10px;
         border-radius: 3px 3px 0 0;
         }
         .table-title h2 {
         margin: 5px 0 0;
         font-size: 24px;
         }
         .table-title .btn-group {
         float: right;
         }
         .table-title .btn {
         color: #fff;
         float: right;
         font-size: 13px;
         border: none;
         min-width: 50px;
         border-radius: 2px;
         border: none;
         outline: none !important;
         margin-left: 10px;
         }
         .table-title .btn i {
         float: left;
         font-size: 21px;
         margin-right: 5px;
         }
         .table-title .btn span {
         float: left;
         margin-top: 2px;
         }
         table.table tr th, table.table tr td {
         border-color: #e9e9e9;
         padding: 12px 15px;
         vertical-align: middle;
         }
         table.table tr th:first-child {
         width: 60px;
         }
         table.table tr th:last-child {
         width: 100px;
         }
         table.table-striped tbody tr:nth-of-type(odd) {
         background-color: #fcfcfc;
         }
         table.table-striped.table-hover tbody tr:hover {
         background: #f5f5f5;
         }
         table.table th i {
         font-size: 13px;
         margin: 0 5px;
         cursor: pointer;
         }	
         table.table td:last-child i {
         opacity: 0.9;
         font-size: 22px;
         margin: 0 5px;
         }
         table.table td a {
         font-weight: bold;
         color: #566787;
         display: inline-block;
         text-decoration: none;
         outline: none !important;
         }
         table.table td a:hover {
         color: #2196F3;
         }
         table.table td a.edit {
         color: #FFC107;
         }
         table.table td a.delete {
         color: #F44336;
         }
         table.table td i {
         font-size: 19px;
         }
         table.table .avatar {
         border-radius: 50%;
         vertical-align: middle;
         margin-right: 10px;
         }
         .pagination {
         float: right;
         margin: 0 0 5px;
         }
         .pagination li a {
         border: none;
         font-size: 13px;
         min-width: 30px;
         min-height: 30px;
         color: #999;
         margin: 0 2px;
         line-height: 30px;
         border-radius: 2px !important;
         text-align: center;
         padding: 0 6px;
         }
         .pagination li a:hover {
         color: #666;
         }	
         .pagination li.active a, .pagination li.active a.page-link {
         background: #03A9F4;
         }
         .pagination li.active a:hover {        
         background: #0397d6;
         }
         .pagination li.disabled i {
         color: #ccc;
         }
         .pagination li i {
         font-size: 16px;
         padding-top: 6px
         }
         .hint-text {
         float: left;
         margin-top: 10px;
         font-size: 13px;
         }    
         /* Custom checkbox */
         .custom-checkbox {
         position: relative;
         }
         .custom-checkbox input[type="checkbox"] {    
         opacity: 0;
         position: absolute;
         margin: 5px 0 0 3px;
         z-index: 9;
         }
         .custom-checkbox label:before{
         width: 18px;
         height: 18px;
         }
         .custom-checkbox label:before {
         content: '';
         margin-right: 10px;
         display: inline-block;
         vertical-align: text-top;
         background: white;
         border: 1px solid #bbb;
         border-radius: 2px;
         box-sizing: border-box;
         z-index: 2;
         }
         .custom-checkbox input[type="checkbox"]:checked + label:after {
         content: '';
         position: absolute;
         left: 6px;
         top: 3px;
         width: 6px;
         height: 11px;
         border: solid #000;
         border-width: 0 3px 3px 0;
         transform: inherit;
         z-index: 3;
         transform: rotateZ(45deg);
         }
         .custom-checkbox input[type="checkbox"]:checked + label:before {
         border-color: #03A9F4;
         background: #03A9F4;
         }
         .custom-checkbox input[type="checkbox"]:checked + label:after {
         border-color: #fff;
         }
         .custom-checkbox input[type="checkbox"]:disabled + label:before {
         color: #b8b8b8;
         cursor: auto;
         box-shadow: none;
         background: #ddd;
         }
         /* Modal styles */
         .modal .modal-dialog {
         max-width: 400px;
         }
         .modal .modal-header, .modal .modal-body, .modal .modal-footer {
         padding: 20px 30px;
         }
         .modal .modal-content {
         border-radius: 3px;
         }
         .modal .modal-footer {
         background: #ecf0f1;
         border-radius: 0 0 3px 3px;
         }
         .modal .modal-title {
         display: inline-block;
         }
         .modal .form-control {
         border-radius: 2px;
         box-shadow: none;
         border-color: #dddddd;
         }
         .modal textarea.form-control {
         resize: vertical;
         }
         .modal .btn {
         border-radius: 2px;
         min-width: 100px;
         }	
         .modal form label {
         font-weight: normal;
         }
      </style>
     
   <body>
      <div class="content-wrapper">
      <div class="container">
            <div class="table-wrapper">
               <div class="table-title">
                  <div class="row">
                     <div class="col-sm-6">
                        <h2>Manage <b>Sections</b></h2>
                     </div>
                     <div class="col-sm-6">
                     
                        <a href="{{url('Add-Edit-Mockupsection')}}" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Section</span></a>
                        <a href="" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
                     
                     				
                     </div>
                  </div>
                 
               </div>

               <table class="table table-striped table-hover">
               @if(Session::has('success_message'))
                         <div class="alert alert-primary d-flex align-items-center" role="alert">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" 
                         class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                         <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                       <div> Success:{{Session::get('success_message')}}</div>
                       </div>
                    @endif	
                  <thead>
                     <tr>

                        <th>Id</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody>
				 
                  @foreach($sections as $section)
                     <tr>
                       
                        <td>{{ $section['id'] }}</td>
                        <td>{{ $section['name'] }}</td>
                        <td>
                           @if($section['section_status'] == 1)   
                           <span class="custom-checkbox">
                           <a id="section-{{$section['id']}}" section_id="{{ $section['id'] }}" href="javascript:void(0)">
                           <input type="checkbox" id="checkbox1" name="options[]" value="1" id="section-status-{{$section['id']}}" type="checkbox" class="active-checkbox active" {{ $section['section_status'] == 1 ? 'checked' : '' }} disabled>
                           <label for="checkbox1"></label>
                           </a> 
                           </span>
                           @else
                           <a id="section-{{$section['id']}}" section_id="{{ $section['id'] }}" href="javascript:void(0)">
                           <input type="checkbox" id="checkbox1" name="options[]" value="1" id="section-status-{{$section['id']}}" type="checkbox" class="active-checkbox inactive" {{ $section['section_status'] == 1 ? 'checked' : '' }} disabled>
                           </a>
                           @endif
                        </td>
                        <td>
                           <a href="{{url('Add-Edit-section')}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                           <a href="{{url('delete-mockupsection/'. $section['id'])}}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                     </tr>
                  @endforeach
					
                    
                </tbody>
               </table>
               <div class="clearfix">
                  <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                  <ul class="pagination">
                     <li class="page-item disabled"><a href="#">Previous</a></li>
                     <li class="page-item"><a href="#" class="page-link">1</a></li>
                     <li class="page-item"><a href="#" class="page-link">2</a></li>
                     <li class="page-item active"><a href="#" class="page-link">3</a></li>
                     <li class="page-item"><a href="#" class="page-link">4</a></li>
                     <li class="page-item"><a href="#" class="page-link">5</a></li>
                     <li class="page-item"><a href="#" class="page-link">Next</a></li>
                  </ul>
               </div>
            </div>
         </div>
        
      </div>
     
   </body>
</html>
@endsection






       