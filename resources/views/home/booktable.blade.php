<!-- book a table Section  -->
<div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
    <div class="">
        <h2 class="section-title mb-5">BOOK A TABLE</h2>
        
        <form action="{{url('book_table')}}" method="Post">
            @csrf

            <div class="row mb-5">
                
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="text" id="booktable" class="form-control form-control-lg custom-form-control" name="phone" placeholder="Phone Number">
                </div>

                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="number" id="booktable" class="form-control form-control-lg custom-form-control" name="guest" placeholder="NUMBER OF GUESTS" max="20" min="0">
                </div>

                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="time" id="timeInput" class="form-control form-control-lg custom-form-control" name="time" placeholder="Time">
                </div>
                
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="date" id="dateInput" class="form-control form-control-lg custom-form-control" name="date" placeholder="12/12/12">
                </div>

            </div>
            
            <div class="row mb-5">
                <div class="col-sm-12 col-md-12 col-xs-24 my-8">
                    <input type="text" id="booktable" class="form-control form-control-lg custom-form-control" name="note" placeholder="Special Instruction">
                </div>
            </div>

            <input type="submit" class="btn btn-lg btn-primary" id="rounded-btn" value="Book Table">            

        </form>
    </div>
</div>

<script>
    // Get current date and time
    const now = new Date();

    // Format time as HH:MM
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const currentTime = `${hours}:${minutes}`;

    // Format date as YYYY-MM-DD
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are zero-indexed
    const day = String(now.getDate()).padStart(2, '0');
    const currentDate = `${year}-${month}-${day}`;

    // Set the value of the input fields
    document.getElementById('timeInput').value = currentTime;
    document.getElementById('dateInput').value = currentDate;
</script>