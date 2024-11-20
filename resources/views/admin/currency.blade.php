@extends('admin.index')
@section('content')

    <style type="text/css">
        /* General input styles */
        input[type='text'], input[type='number'], select {
            flex-grow: 1;
            width: 100%;
            max-width: 500px;
            height: 40px;
            padding: 10px;
            font-size: 12px;
            box-sizing: border-box;
        }
        
        input[type='submit'] {
            /* Keep the button's size consistent */
            flex-shrink: 0;
        }
        h3 {
            text-align: center;
            color:white;
        }
        .div_deg {
            display: flex;
            /*justify-content: flex-start;*/
            justify-content: center;
            align-items: center;
            padding: 6px;
            gap: 10px;             
        }

        .table_deg {
            width: 100%;
            /*max-width: 1000px;*/
            margin-top: 20px;
            border: 2px solid yellowgreen;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 0 auto;
        }

        /* Table headers and rows */
        th {
            background-color: darkcyan;
            border: 1px solid skyblue;
            padding: 6px;
            font-size: 14px;
            font-weight: bold;
            color: white;
        }

        td {
            border: 1px solid skyblue;
            padding: 6px;
            font-size: 14px;
            color: white;
        }

        .sar-th, .pkr-th {
            font-weight: bold; 
            color: white;
        }

        .sar-total, .pkr-total {
            background-color: deepskyblue;
            text-align: right;
            font-weight: bold;
            color: white;
        }

        .right {
            text-align: right;
        }

        .left {
            text-align: left;
        }

        /* Buttons */
        .btn {
            padding: 8px 12px;
            font-size: 14px;
            /*margin-top: 10px;*/
        }

        /* Form styling */
        .form-container {
            /*margin-bottom: 20px;*/
           display: flex;
           align-items: center;
           gap: 10px; /* Ensure the input and button have a gap between them */
           width: 100%;            
        }

        /* Responsive Media Queries */
        @media (max-width: 768px) {
            .table_deg {
                font-size: 12px;
            }

            input[type='text'], input[type='number'], select {
                width: 100%;
                max-width: 100%;
            }

            h3 {
                text-align: left;*/
                /*align-items: flex-start;*/
                font-size: 14px;
            }
            
            .div_deg {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-container {
                width: 100%;
                margin-bottom: 15px;
            }

            .table_deg {
                width: 100%;
                padding: 0;
                box-sizing: border-box;
            }
        }

        @media (max-width: 480px) {
            th, td {
                font-size: 12px;
                padding: 6px;
            }

            .btn {
                padding: 6px 12px;
                font-size: 12px;
            }

            .div_deg {
                gap: 15px;
                justify-content: center;
            }

            h3 {
                /*align-items: flex-start;*/
                text-align: left;*/
                font-size: 14px;
            }
        }
    </style>
    
    <div class="container-fluid ">

            <h3 style="color:white"> Currency Information </h3>

              <div class="div_deg form-container">
    
                <form action="{{url('add_currency')}}" method="post">
    
                    @csrf
    
                    <div class="form-container">
                        <input type="text" name="currency_name" placeholder="Enter Currency Title" required>
                        <input class="btn btn-success" type="submit" value="Save">
                    </div>
    
                </form>
    
              </div>              

            <table class="table_deg">
                <tr>
                    <th> Sr  </th>
                    <!--<th> ID  </th>-->
                    <th> Currency Title </th>
                    <!--<th> Updated @ </th>-->
                    <th> Action </th>
                </tr>

               @foreach ($data as $key => $data)                                    
                <tr>
                    <!-- SrNo column -->
                    <td>{{ $key + 1 }}</td>
                    <!--<td> {{$data->currencyId}} </td>-->
                    <td> {{$data->currencyTitle}} </td>
                    <!--<td> {{ \Carbon\Carbon::parse($data->updated_at)->format('d-M-y') }} </td>-->
                    
                    <td>
                        <a class="btn btn-success" href="{{url('edit_currency', $data->currencyId)}}"> <i class="fas fa-pencil-alt"></i> </a>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_currency', $data->currencyId)}}"> <i class="fas fa-trash-alt"></i> </a>
                    </td>                        
                </tr>
            @endforeach

            </table>            

          </div>

@endsection