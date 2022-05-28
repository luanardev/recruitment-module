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
                            <h4>Job Vacancy</h4> 
                        </div>
                    </div>
                    <br/>
                    <h5 class="mb-3">
                        {{$vacancy->getPosition()}} ({{$vacancy->positions}} Positions)
                    </h5>
                    
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="card card-outline card-primary">                   
                                <div class="card-header">
                                    <h3 class="card-title text-bold">
                                        <a class="d-block w-100">
                                            Job Info
                                        </a>
                                    </h3>
                             
                                </div>
                
                             
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
            
                                            <div class="table-responsive">
                                                <table class="table table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <th>Position</th>
                                                            <td>
                                                                <a href="#">
                                                                    <span class="text-bold">{{$vacancy->getPosition()}}</span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Grade</th>
                                                            <td>
                                                                <a href="#">
                                                                    <span class="text-bold">Grade {{$vacancy->scale}}</span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Job Type</th>
                                                            <td>
                                                                <a href="#">
                                                                    <span class="text-bold">{{$vacancy->getJobType()}}</span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @if($vacancy->isNotPermanent())
                                                        <tr>
                                                            <th>Duration</th>
                                                            <td>
                                                                <a href="#">
                                                                    <span class="text-bold">{{$vacancy->duration}}</span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <th>Closing Date</th>
                                                            <td>
                                                                <a href="#">
                                                                    <span class="text-bold">{{$vacancy->closingDate()}}</span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Vacancy Type</th>
                                                            <td>
                                                                <a href="#">
                                                                    <span class="text-bold">{{$vacancy->audience}}</span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                        
                                        </div>
                                      
                                    </div>
                                </div>
                               
                            </div>
        
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title text-bold">
                                        <a class="d-block w-100">
                                            Job Description
                                        </a>
                                    </h3>
                                </div>                               
                                
                                <div class="card-body">
                                    <p>{{$vacancy->duties}}</p>
                                </div>
                                
                            </div>
                
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title text-bold">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#requirements" aria-expanded="false">
                                            Requirements
                                        </a>
                                    </h3>
                                </div>                               
                                
                                <div class="card-body">
                                    <p>{{$vacancy->requirements}}</p>
                                </div>
                                
                            </div>
                
                        </div>
                        
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