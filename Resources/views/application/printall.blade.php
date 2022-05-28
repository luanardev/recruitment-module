
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>{{$vacancy->getPosition()}}</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        
        <style>           
            .page-break {
                page-break-after: always;
            }

            .logo{
                /**display: block;
                text-align: center;**/
            }

            .logo img{
                /**align-items: position: absolute;
                top: 5%;
                left: 50%;                             
                transform: translate(-50%, -5%);**/
                max-width: 150px;
                max-height: 150px;
            }

            .header{
                align-items: position: absolute;
                left: 20%;                             
                transform: translate(-50%, -5%);
            }

            .field-label {
                display: inline-block;
                width: 200px;
                text-align: right;
            }

            .field-value {
                display: inline-block;
                width: auto;
                text-align: right;
                padding-left: 50px;
                
            }

            .vacancy-header{
                height: 50px;
                font-family: 'Segoe UI';
                font-weight:bolder;
                text-align: center;
            }

            .vacancy-header .vacancy-header-title{
                text-transform: uppercase;
            }

         </style>

    </head>
    <body>

        <main>

            @php
                $logo = Institution::get('company_logo');
                $company = Institution::get('company_name');
            @endphp

            <!-- Start page-->
            <div class="row">
                <div class="col-md-12">
                    <div class="vacancy-header py-4 mb-3">
                        <div class="vacancy-header-title">
                            <h4>{{$company}}</h4>
                            <h4>Job Applicants</h4> 
                        </div>
                    </div>
                    <br/>
                    <h5 class="mb-3">
                        {{$vacancy->getPosition()}}
                    </h5>
                    
                    <div class="row">

                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Phone 1</th>
                                    <th>Phone 2</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vacancy->applicants as $key => $applicant)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$applicant->title}}</td>
                                    <td>{{$applicant->name}}</td>
                                    <td>{{$applicant->gender}}</td>    
                                    <td>{{$applicant->phone1}}</td>
                                    <td>{{$applicant->phone2}}</td>
                                    <td>{{$applicant->physical_address}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                                      
                </div>
            </div>
         
        </main>

        <!-- Script for adding Page Number -->
        <script type="text/php">
            if (isset($pdf)) {
                $text = "page {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width) / 2;
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>
        <!-- End script --> 

    </body>
</html>