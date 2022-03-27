    @extends('admin.layout.master')
    @section('content')
    <div class="row">
        <div class="col-md-10">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Category</h3>
                </div>


                <form action="{{route('store.category')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name='name'id="name" placeholder="Enter category">
                        </div>


                    </div>

                    <div class="card-footer">
                        <a href="{{route('index.category')}}" class="btn btn-secondary"><i class="fas fa-long-arrow-alt-left"></i> <span class="ml-2">Category list</span></a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
