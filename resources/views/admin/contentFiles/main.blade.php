<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="jumbotron">
                <p><span class="label label-primary">Категории {{ $countCategories }}</span></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="jumbotron">
                <p><span class="label label-primary">Кол-во статей: 0</span></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="jumbotron">
                <p><span class="label label-primary">Посетители за месяц: 0</span></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="jumbotron">
                <p><span class="label label-primary">Посетитиели сегодня: 0</span></p>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
    <div class="row">
        <div class="col-sm-12">
            <p class="text-center">
                Categories
            </p>
            <div class="table-responsive table-hover">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Count</th>
                            <th scope="col">Edit buttons</th>
                            <th>Confirm</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach  ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->count }}</td>
                            <td><a class="btn btn-danger" href="{{url('admin/category/'.$category->id.'/delete') }}">Удалить</a>
                                <a class="btn btn-danger" href="{{url('admin/category/'.$category->id.'/delete') }}">Редактировать</a></td>
                            <td><select class="form-control form-control-sm">
                            <option>Show</option>
                            <option>Hide</option>
                            </select></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <p class="text-center">
                Records
            </p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
