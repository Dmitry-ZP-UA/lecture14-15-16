 <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#myModal">Comment</button>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action=" {{ route('comment.create') }}" method="post">
                    @csrf
                    <div style="display: flex">
                        @guest
                            <div class="input-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="input-group">
                                <label for="exampleInputPassword1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Name">
                            </div>
                        @else
                            <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                            <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        @endguest
                    </div>
                    <div class="input-group">
                        <label for="exampleInputPassword1">Your comments</label>
                        <input type="text" name="text" class="form-control" id="exampleInputPassword1">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="likes_counter" value="0">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <div class="modal-footer"><button class="btn btn-default" type="button" data-dismiss="modal">Закрыть</button></div>
            </div>
        </div>
    </div>

@foreach($comments as $parentcomment)
    @if ($parentcomment->parent_id === null)
        <div class="alert alert-info">
            <h2>{{ $parentcomment->name }}</h2>
            <p>{{ $parentcomment->text }}</p>
            <form action=" {{ route('comment.update') }}" method="post">
                @csrf
                <input type="hidden" name="likes_counter" value="{{ $parentcomment->likes_counter + 1 }}">
                <input type="hidden" name="id" value="{{ $parentcomment->id }}">
                <button type="submit" class="btn btn-warning">Like {{ $parentcomment->likes_counter }}</button>
            </form>
            <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#myModalChild">Reply</button>
            <div id="myModalChild" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action=" {{ route('comment.create', $product->slug) }}" method="post">
                            @csrf
                            <div style="display: flex">
                                @guest
                                    <div class="input-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="input-group">
                                        <label for="exampleInputPassword1">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Name">
                                    </div>
                                @else
                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                @endguest
                            </div>
                            <div class="input-group">
                                <label for="exampleInputPassword1">Your comments</label>
                                <input type="text" name="text" class="form-control" id="exampleInputPassword1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="parent_id" value="{{ $parentcomment->id }}">
                                <input type="hidden" name="likes_counter" value="0">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <div class="modal-footer"><button class="btn btn-default" type="button" data-dismiss="modal">Закрыть</button></div>
                    </div>
                </div>
            </div>

        </div>
    @endif
    @foreach($comments as $commentchild)
        @if ($commentchild->parent_id === $parentcomment->id)
            <div class="alert alert-info" style="margin-left: 100px;">
                <h2>{{ $commentchild->name }}</h2>
                <p>{{ $commentchild->text }}</p>
                <form action=" {{ route('comment.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="likes_counter" value="{{ $commentchild->likes_counter + 1 }}">
                    <input type="hidden" name="id" value="{{ $commentchild->id }}">
                    <button type="submit" class="btn btn-warning">Like {{ $commentchild->likes_counter }}</button>
                </form>
            </div>
        @endif
    @endforeach

@endforeach
