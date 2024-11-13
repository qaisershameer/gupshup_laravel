@extends('admin.index')
@section('content')

    <style type="text/css">
    
        label
        {
          display: inline-block;
          width: 100px;
          font-size: 18px!important;
          color: white!important;
          padding: 16px;
        }

        input[type='text'], input[type='date'], select
        {
          width: 400px;
          height: 30px;
          padding: 45 10px;
          font-size: 16px;
          box-sizing: border-box;
        }
        
        /* Text input */
        /*input[type='text'] {*/
        /*  width: 820px;*/
        /*  height: 45px;*/
        /*  padding: 0 10px;*/
        /*  font-size: 16px;*/
        /*  box-sizing: border-box;*/
        /*}*/
        
        /* Number input */
        input[type='number'] {
          width: 160px;
          height: 30px;
          padding: 0 10px;
          font-size: 16px;
          box-sizing: border-box;
        }
        
        .div_deg
        {
            display: flex;
            justify-content: left;
            align-items: left;
        }

        .table_deg
        {
            width: 1500px;
            text-align: center;
            margin: left;
            margin-top: 50px;
            border: 2px solid yellowgreen;
        }

        th
        {
          background-color: skyblue;
          padding: 12px;
          font-size: 20px;
          font-weight: bold;
          color: white;
        }

        td
        {
          border: 1px solid skyblue;
          padding: 10px;
          font-size: 15px;
          color: white;
        }

    </style>
    
    <div class="container-fluid">
              
              <h1 style="color:white;">Update Journal JV</h1>

              <div class="div_deg">
    
                <form action="{{url('update_jv', $data->voucherId)}}" method="post">
                  @csrf
                  
                <div>

                    <!-- Hidden input for static "JV" voucherPrefix -->
                    <input type="hidden" id="voucherPrefix" name="voucherPrefix" value="JV">

                    <label for=""> Date </label>  
                    <!-- Input for Voucher Date -->
                    <input type="date" id="dateInput" name="voucherDate" value="{{$data->voucherDate}}" placeholder="11-Nov-2024" required>
                    
                </div>

                <div>
                    <label for=""> Credit </label>
                    <select name="crAcId" class="select2" required>
                        <option value="">Select Credit Account</option>
                        @foreach($accounts as $account)
                            <option value="{{$account->acId}}" 
                                {{ isset($data) && $data->crAcId == $account->acId ? 'selected' : '' }}>
                                {{$account->acTitle}}
                            </option>
                        @endforeach
                    </select>
                    <label for="">SR CR</label>
                    <input type="number" id="creditSR" name="creditSR" placeholder="SR Credit" step="any" value="{{ $data->creditSR}}">
                    <label for=""> PK CR</label>
                    <input type="number" id="credit" name="credit" placeholder="PK Credit" step="any" value="{{ $data->credit}}">
                </div>
                
                <div>
                    <label for="">Debit</label>
                    <select name="drAcId" class="select2" required>
                        <option value="">Select Debit Account</option>
                        @foreach($accounts as $account)
                            <option value="{{$account->acId}}" 
                                {{ isset($data) && $data->drAcId == $account->acId ? 'selected' : '' }}>
                                {{$account->acTitle}}
                            </option>
                        @endforeach
                    </select>

                    <label for="">SR DR</label>
                    <input type="number" id="debitSR" name="debitSR" placeholder="SR Debit" step="any" value="{{ $data->debitSR}}">
                    <label for="">PK DR</label>
                    <input type="number" id="debit" name="debit" placeholder="PK Debit" step="any" value="{{ $data->debit}}">                    
                                        
                </div>                
                        
                <div>
                    <label for=""> Remarks </label>  
                    <input type="text" name="remarks" placeholder="Enter Remarks" value="{{ $data->remarks}}" required>
                </div>    
              
                <div>
                    <label for=""> </label>  
                    <input class="btn btn-success" type="submit" value="Update Payment">
                </div>

              </form>
              
              </div>              

          </div>

@endsection