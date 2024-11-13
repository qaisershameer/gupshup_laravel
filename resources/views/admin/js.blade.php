<script type="text/javascript">

  function confirmation(ev)
  {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href')
    console.log(urlToRedirect);

    swal({
      title: "Are you sure to Delete this",
      text: "This delete will be permanent",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })

    .then((willCancel)=>
    {
      if(willCancel)
      {
        window.location.href = urlToRedirect;
      }
    });
  }
</script>
<script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('admin/vendor/popper.js/umd/popper.min.js')}}"> </script>
<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
<script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('admin/js/charts-home.js')}}"></script>
<script src="{{asset('admin/js/front.js')}}"></script>

<script>
  $('.select2').select2();
</script>