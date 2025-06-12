<x-admin-layout title="users-reviews">
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>item</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="">
                            <div class="text-tiny">Reviews</div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name"
                                    tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href=""><i class="icon-plus"></i>Add
                        new</a>
                </div>
                <div class="wg-table table-all-user">
                    @if (Session::has('status'))
                        <p class="alert alert-success">{{ Session::get('status') }}</p>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>Product Name</th>
                                <th>Creacted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userReviews as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class="pname" style="height: 110px;">
                                        <div class="image" >
                                            {{-- @dd($item->image); --}}
                                            <img src="{{ asset('storage/uploads/reviewImage/' . $item->image) }}"
                                                alt="{{ $item->title }}" class="image" >

                                        </div>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->rating }}</td>
                                    <td>{{ $item->comment }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->creacted_at }}</td>
                                    <td>
                                        <form action="{{route('admin.uses-reviews.delete', ['id' => $item->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="item text-danger delete">
                                                <i class="icon-trash-2"></i>
                                            </div>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    {{ $userReviews->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

<script>
    $(function() {
        $('.delete').on('click', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');
            swal({
                title: "Are you sure?",
                text: "Sure!",
                icon: "warning",
                buttons: ["Cancel", "Yes, delete it!"],
                confirmButtonColor: '#dc3545',

            }).then((result) => {
                if (result) {
                    form.submit();
                }
            })
        })
    })
</script>