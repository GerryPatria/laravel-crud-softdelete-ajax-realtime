<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <div class="row">
           <div class="col-lg-12">
            <h1>Belajar</h1>
            <button type="button" class="btn btn-primary" onclick="create()"> Add New Data</button>
            <div id="read" class="mt-3">
                
            </div>
        </div>
        </div>
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="page" class="p-2">

          </div>
        </div>
      </div>
    </div>
  </div>


    <!--- JS --->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    {{-- create jquery! --}}
    <script>

        $(document).ready(function(){
            read();
        });

        //Read Data
        function read(){
            $.get("{{url('read')}}",{}, function(data,status){
                $("#read").html(data);
            });
        }

        // Modal Create 
        function create(){
            $.get("{{url('create')}}",{}, function(data,status){
                $("#exampleModalLabel").html('Add New Data');
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
            }
        
        // Create Proccess Data Storage
        function store(){
            var name= $("#name").val();
            $.ajax({
                type:"get",
                url:"{{url('store')}}",
                data:"name="+name,
                success:function(data){
                    $(".btn-close").click();
                    read();
                }
            });
        }

        // update
        function show(id){
                $.get("{{url('show')}}/"+id,{}, function(data,status){
                    $("#exampleModalLabel").html('Modification');
                    $("#page").html(data);
                    $("#exampleModal").modal('show');
                });
                }
        function update(id){
            var name= $("#name").val();
            $.ajax({
                type:"get",
                url:"{{url('update')}}/"+ id,
                data:"name="+name,
                success:function(data){
                    // $("#page").html('');
                    $(".btn-close").click();
                    read();
                }
            });
        }

        // destroy
        function destroy(id) {
    // Menggunakan SweetAlert untuk konfirmasi
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Lakukan penghapusan dengan AJAX jika pengguna mengonfirmasi
            $.ajax({
                type: "get",
                url: "{{ url('destroy') }}/" + id,
                success: function (data) {
                    // $("#page").html('');
                    $(".btn-close").click();
                    read();
                }
            });
        }
    });
}

</script>
</body>
</html>